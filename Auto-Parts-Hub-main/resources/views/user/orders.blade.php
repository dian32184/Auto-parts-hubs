{{-- File: resources/views/user/orders.blade.php --}}
@extends('layouts.app')

@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="user-orders container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="page-title mb-0">My Orders</h2>
            <a href="{{ route('shop.index') }}" class="btn btn-primary">
                <i class="fa fa-shopping-cart"></i> Continue Shopping
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if($orders->count() > 0)
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Date</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                                    <td>{{ $order->items->count() }}</td>
                                    <td>${{ number_format($order->total, 2) }}</td>
                                    <td>
                                        <span class="badge bg-info">
                                            {{ ucfirst($order->payment_method) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($order->transaction)
                                            <span class="badge bg-success">Paid</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'cancelled' ? 'danger' : ($order->status == 'processing' ? 'info' : 'warning')) }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('user.order.details', $order->id) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                        @if($order->status == 'pending')
                                            <form action="{{ route('user.order.cancel', $order->id) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to cancel this order?')">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-times"></i> Cancel
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $orders->links() }}
            </div>
        @else
            <div class="card">
                <div class="card-body text-center py-5">
                    <h3>No Orders Yet</h3>
                    <p class="mb-4">You haven't placed any orders yet.</p>
                    <a href="{{ route('shop.index') }}" class="btn btn-primary">
                        <i class="fa fa-shopping-cart"></i> Start Shopping
                    </a>
                </div>
            </div>
        @endif
    </section>
</main>
@endsection
