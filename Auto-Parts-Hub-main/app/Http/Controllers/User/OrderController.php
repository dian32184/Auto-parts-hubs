<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with(['items.product', 'transaction'])
            ->latest()
            ->paginate(10);
            
        return view('user.orders', compact('orders'));
    }

    public function show(Order $order)
    {
        // Check if the order belongs to the authenticated user
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $order->load(['items.product', 'transaction']);
        return view('user.order-details', compact('order'));
    }

    public function cancel(Order $order)
    {
        // Check if the order belongs to the authenticated user
        if ($order->user_id !== Auth::id()) {
            return back()->with('error', 'You are not authorized to cancel this order.');
        }

        // Check if the order can be cancelled
        if ($order->status !== 'pending') {
            return back()->with('error', 'Only pending orders can be cancelled. Please contact support if you need to cancel a processing order.');
        }

        // Check if the order has a payment transaction
        if ($order->transaction) {
            return back()->with('error', 'This order has already been paid. Please contact support for cancellation and refund.');
        }

        try {
            // Update order status and set cancelled timestamp
            $order->status = 'cancelled';
            $order->cancelled_at = now();
            $order->save();

            // Return success message
            return back()->with('success', 'Your order has been cancelled successfully. If you made any payment, it will be refunded according to our refund policy.');
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Order cancellation failed: ' . $e->getMessage());
            return back()->with('error', 'Unable to cancel the order. Please try again or contact support.');
        }
    }
} 