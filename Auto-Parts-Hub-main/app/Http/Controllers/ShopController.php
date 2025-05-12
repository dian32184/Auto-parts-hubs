<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $popularCategories = Category::whereNotNull('parent_id')
            ->withCount('products')
            ->orderBy('products_count', 'desc')
            ->take(3)
            ->get();

        return view('shop.index', compact('popularCategories'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        if ($category->parent_id === null) {
            // This is a main category, show its subcategories
            $subcategories = Category::where('parent_id', $category->id)->get();
            return view('shop.category', compact('category', 'subcategories'));
        } else {
            // This is a subcategory, show its products
            $mainCategory = Category::find($category->parent_id);
            $products = Product::where('category_id', $category->id)
                ->where('status', 'active')
                ->paginate(12);
            
            return view('shop.subcategory', [
                'mainCategory' => $mainCategory,
                'subcategory' => $category,
                'products' => $products
            ]);
        }
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

    public function product_details($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        $rproducts = Product::where('slug','<>',$product_slug)->get()->take(8);
        return view('details',compact('product','rproducts'));
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
