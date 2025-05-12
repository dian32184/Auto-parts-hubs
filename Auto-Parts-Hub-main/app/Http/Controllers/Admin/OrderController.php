<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'items.product', 'transaction'])
            ->latest()
            ->paginate(10);
            
        $totalOrders = Order::count();
        $completedOrders = Order::where('status', 'completed')->count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $processingOrders = Order::where('status', 'processing')->count();
        $cancelledOrders = Order::where('status', 'cancelled')->count();
        
        return view('admin.orders.index', compact(
            'orders', 
            'totalOrders', 
            'completedOrders', 
            'pendingOrders', 
            'processingOrders', 
            'cancelledOrders'
        ));
    }

    public function show(Order $order)
    {
        $order->load([
            'user',
            'items.product',
            'transaction'
        ]);

        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,ready,completed,cancelled'
        ]);

        // Store the old status for comparison
        $oldStatus = $order->status;
        
        // Update the order status
        $order->status = $request->status;
        
        // Add status change timestamp
        if ($request->status === 'completed') {
            $order->completed_at = now();
        } elseif ($request->status === 'cancelled') {
            $order->cancelled_at = now();
        }
        
        $order->save();

        // Create a success message based on the status change
        $statusMessage = match($request->status) {
            'pending' => 'Order has been marked as pending.',
            'processing' => 'Order is now being processed.',
            'ready' => 'Order is ready for pickup.',
            'completed' => 'Order has been marked as completed.',
            'cancelled' => 'Order has been cancelled.',
            default => 'Order status has been updated.'
        };

        return redirect()
            ->back()
            ->with('success', $statusMessage);
    }
} 