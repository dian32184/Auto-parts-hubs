<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Cart;
use Auth;
use Session;

class CheckoutController extends Controller
{
    public function index()
    {
        if(Cart::instance('cart')->count() == 0) {
            return redirect()->route('shop.index');
        }
        return view('checkout');
    }

    public function placeOrder(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'pickup_time' => 'required',
            'payment_method' => 'required|in:gcash,paymaya,cash',
        ]);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->pickup_time = $request->pickup_time;
        $order->special_instructions = $request->special_instructions;
        $order->payment_method = $request->payment_method;
        $order->subtotal = Cart::instance('cart')->subtotal();
        $order->tax = Cart::instance('cart')->tax();
        $order->total = Cart::instance('cart')->total();
        
        if(Session::has('discounts')) {
            $order->discount = Session::get('discounts')['discounts'];
            $order->total = Session::get('discounts')['total'];
        }
        
        $order->status = 'pending';
        $order->save();

        foreach(Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        // Clear cart after successful order
        Cart::instance('cart')->destroy();
        Session::forget('discounts');

        // Redirect based on payment method
        switch($request->payment_method) {
            case 'gcash':
                return redirect()->route('payment.gcash', $order->id);
            case 'paymaya':
                return redirect()->route('payment.paymaya', $order->id);
            default:
                return redirect()->route('order.confirmation', $order->id);
        }
    }
} 