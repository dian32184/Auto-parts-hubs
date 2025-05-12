<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function gcash(Order $order)
    {
        // Check if payment already exists
        if ($order->transaction()->exists()) {
            return redirect()->route('order.confirmation', $order->id)
                ->with('info', 'This order has already been paid.');
        }

        return view('payment.gcash', compact('order'));
    }

    public function paymaya(Order $order)
    {
        // Check if payment already exists
        if ($order->transaction()->exists()) {
            return redirect()->route('order.confirmation', $order->id)
                ->with('info', 'This order has already been paid.');
        }

        return view('payment.paymaya', compact('order'));
    }

    public function success(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        
        // Create transaction record
        $transaction = new Transaction();
        $transaction->order_id = $order->id;
        $transaction->payment_method = $order->payment_method;
        $transaction->payment_status = 'completed';
        $transaction->transaction_id = 'TXN-' . Str::random(10);
        $transaction->amount = $order->total;
        $transaction->paid_at = Carbon::now();
        $transaction->save();

        // Update order status
        $order->status = 'processing';
        $order->save();

        return redirect()->route('order.confirmation', $order->id)
            ->with('success', 'Payment successful! Your order is now being processed.');
    }

    public function cancel()
    {
        return redirect()->route('checkout')
            ->with('error', 'Payment was cancelled. Please try again.');
    }

    // For admin dashboard - get all transactions
    public function transactions()
    {
        $transactions = Transaction::with('order')->latest()->paginate(10);
        return view('admin.transactions.index', compact('transactions'));
    }
} 