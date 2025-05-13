<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cart;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        // Get motor and vehicle categories
        $motorCategories = Category::where('type', 'motor')->get();
        $vehicleCategories = Category::where('type', 'vehicle')->get();

        // Get products with sorting
        $query = Product::where('status', 'active');

        // Price filter
        if ($request->has('min_price')) {
            $query->where('regular_price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $query->where('regular_price', '<=', $request->max_price);
        }

        // Sorting
        switch ($request->sort) {
            case 'price_low':
                $query->orderBy('regular_price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('regular_price', 'desc');
                break;
            case 'popular':
                $query->orderBy('views', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        $products = $query->paginate(12);

        return view('shop.index', compact(
            'motorCategories',
            'vehicleCategories',
            'products'
        ));
    }

    public function category($category)
    {
        $category = Category::where('slug', $category)->firstOrFail();
        
        $products = Product::where('category_id', $category->id)
            ->where('status', 'active')
            ->paginate(12);

        return view('shop.category', compact('category', 'products'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        
        // Check if product is in stock
        if ($product->stock_status !== 'instock' || $product->quantity < $request->quantity) {
            return response()->json([
                'message' => 'Product is out of stock or requested quantity is not available'
            ], 422);
        }

        // Get or create cart session
        $cart = session()->get('cart', []);
        
        // Add/update product in cart
        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] += $request->quantity;
        } else {
            $cart[$request->product_id] = [
                'name' => $product->name,
                'quantity' => $request->quantity,
                'price' => $product->regular_price,
                'image' => $product->image_path
            ];
        }
        
        session()->put('cart', $cart);
        
        return response()->json([
            'message' => 'Product added to cart successfully',
            'cartCount' => count($cart)
        ]);
    }

    public function product_details($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $product->incrementViews(); // Increment the view count
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 'active')
            ->take(8)
            ->get();
        return view('shop.product.details', compact('product', 'relatedProducts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search-keyword');
        
        $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhereHas('category', function($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->where('status', 'active')
            ->paginate(12);
            
        return view('shop.search', [
            'products' => $products,
            'query' => $query
        ]);
    }
}
