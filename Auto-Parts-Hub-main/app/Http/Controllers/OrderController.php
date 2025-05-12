<?php
// File: app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'pickup_time' => 'required|string',
            'special_instructions' => 'nullable|string',
        ]);

        // Create new order
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->pickup_time = $request->pickup_time;
        $order->special_instructions = $request->special_instructions;
        
        // Set financial details
        if(Session::has('discounts')) {
            $order->subtotal = floatval(str_replace(',', '', Session::get('discounts')['subtotal']));
            $order->tax = floatval(str_replace(',', '', Session::get('discounts')['tax']));
            $order->total = floatval(str_replace(',', '', Session::get('discounts')['total']));
            $order->discount = floatval(str_replace(',', '', Session::get('discounts')['discounts']));
        } else {
            $order->subtotal = Cart::instance('cart')->subtotal();
            $order->tax = Cart::instance('cart')->tax();
            $order->total = Cart::instance('cart')->total();
            $order->discount = 0;
        }
        
        $order->status = 'pending';
        $order->save();
        
        // Save order items
        foreach(Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }
        
        // Save pickup information as address for future use
        $existingAddress = Address::where('user_id', Auth::user()->id)
                                ->where('isdefault', 1)
                                ->first();
        
        if(!$existingAddress) {
            $address = new Address();
            $address->user_id = Auth::user()->id;
            $address->name = $request->name;
            $address->phone = $request->phone;
            $address->pickup_time = $request->pickup_time;
            $address->special_instructions = $request->special_instructions;
            $address->type = 'pickup';
            $address->isdefault = true;
            $address->save();
        }
        
        // Clear cart and session variables
        if(Session::has('coupon')) {
            Session::forget('coupon');
        }
        if(Session::has('discounts')) {
            Session::forget('discounts');
        }
        Cart::instance('cart')->destroy();
        
        // Redirect to order confirmation
        return redirect()->route('order.confirmation', ['id' => $order->id])
                        ->with('success', 'Your order has been placed successfully!');
    }
    
    public function confirmation($id)
{
    // Ensure user is authenticated
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please log in to view your order.');
    }

    // Find the order
    $order = Order::where('id', $id)
                ->where('user_id', Auth::id())
                ->first();

    // Check if order exists
    if (!$order) {
        return redirect()->route('home.index')
                         ->with('error', 'Order not found.');
    }

    // Return the view
    return view('order.confirmation', compact('order'));
}
    
    public function userOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
                    
        return view('user.orders', compact('orders'));
    }
    
    public function orderDetails($id)
    {
        $order = Order::where('id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->firstOrFail();
                    
        return view('user.order-details', compact('order'));
    }

    public function cancelOrder($id)
{
    $order = Order::where('id', $id)
                ->where('user_id', Auth::user()->id)
                ->whereIn('status', ['pending', 'ready_for_pickup'])
                ->firstOrFail();
    
    $order->status = 'cancelled';
    $order->save();
    
    return redirect()->route('user.orders')
                    ->with('success', 'Your order has been cancelled successfully!');
}
}