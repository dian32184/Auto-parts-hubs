{{-- File: resources/views/user/order-details.blade.php - COMPLETED --}}
@extends('layouts.app')

@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="order-details container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="page-title mb-0">Order Details #{{ $order->id }}</h2>
            <a href="{{ route('user.orders') }}" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Back to Orders
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <!-- Order Status -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Status</h5>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'cancelled' ? 'danger' : ($order->status == 'processing' ? 'info' : ($order->status == 'ready' ? 'primary' : 'warning'))) }} fs-6 me-3">
                                    {{ ucfirst($order->status) }}
                                </span>
                                @if($order->completed_at)
                                    <span class="text-muted">
                                        <small>Completed on {{ $order->completed_at->format('M d, Y h:i A') }}</small>
                                    </span>
                                @elseif($order->cancelled_at)
                                    <span class="text-muted">
                                        <small>Cancelled on {{ $order->cancelled_at->format('M d, Y h:i A') }}</small>
                                    </span>
                                @endif
                            </div>
                            @if($order->status === 'pending' && !$order->transaction)
                                <button type="button" 
                                        class="btn btn-danger" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#cancelOrderModal">
                                    <i class="fa fa-times"></i> Cancel Order
                                </button>
                            @endif
                        </div>

                        <!-- Status Timeline -->
                        <div class="mt-4">
                            <div class="status-timeline">
                                <div class="d-flex justify-content-between position-relative">
                                    <div class="status-point {{ in_array($order->status, ['pending', 'processing', 'ready', 'completed']) ? 'active' : '' }}">
                                        <div class="status-label">Pending</div>
                                    </div>
                                    <div class="status-point {{ in_array($order->status, ['processing', 'ready', 'completed']) ? 'active' : '' }}">
                                        <div class="status-label">Processing</div>
                                    </div>
                                    <div class="status-point {{ in_array($order->status, ['ready', 'completed']) ? 'active' : '' }}">
                                        <div class="status-label">Ready</div>
                                    </div>
                                    <div class="status-point {{ $order->status === 'completed' ? 'active' : '' }}">
                                        <div class="status-label">Completed</div>
                                    </div>
                                    @if($order->status === 'cancelled')
                                        <div class="status-point cancelled">
                                            <div class="status-label text-danger">Cancelled</div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if($order->status === 'ready')
                            <div class="alert alert-info mt-4">
                                <i class="fa fa-info-circle"></i>
                                Your order is ready for pickup! Please proceed to our store during business hours.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Order Information -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Information</h5>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Order Date:</strong></td>
                                <td>{{ $order->created_at->format('M d, Y h:i A') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Pickup Time:</strong></td>
                                <td>{{ ucfirst($order->pickup_time) }}</td>
                            </tr>
                            @if($order->special_instructions)
                            <tr>
                                <td><strong>Special Instructions:</strong></td>
                                <td>{{ $order->special_instructions }}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>

            <!-- Payment Information -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Payment Information</h5>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Payment Method:</strong></td>
                                <td>
                                    <span class="badge bg-info">
                                        {{ ucfirst($order->payment_method) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Payment Status:</strong></td>
                                <td>
                                    @if($order->transaction)
                                        <span class="badge bg-success">Paid</span>
                                    @else
                                        <span class="badge bg-warning">Pending</span>
                                    @endif
                                </td>
                            </tr>
                            @if($order->transaction)
                            <tr>
                                <td><strong>Transaction ID:</strong></td>
                                <td>{{ $order->transaction->transaction_id }}</td>
                            </tr>
                            <tr>
                                <td><strong>Paid At:</strong></td>
                                <td>{{ $order->transaction->paid_at->format('M d, Y h:i A') }}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Items -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Order Items</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($item->product->image)
                                            <img src="{{ asset('storage/' . $item->product->image) }}" 
                                                 alt="{{ $item->product->name }}"
                                                 class="me-2"
                                                 style="width: 50px; height: 50px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <h6 class="mb-0">{{ $item->product->name }}</h6>
                                            <small class="text-muted">SKU: {{ $item->product->SKU }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td class="text-end">${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Subtotal:</strong></td>
                                <td class="text-end">${{ number_format($order->subtotal, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Tax:</strong></td>
                                <td class="text-end">${{ number_format($order->tax, 2) }}</td>
                            </tr>
                            @if($order->discount > 0)
                            <tr>
                                <td colspan="3" class="text-end"><strong>Discount:</strong></td>
                                <td class="text-end">-${{ number_format($order->discount, 2) }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                <td class="text-end"><strong>${{ number_format($order->total, 2) }}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Cancel Order Modal -->
<div class="modal fade" id="cancelOrderModal" tabindex="-1" aria-labelledby="cancelOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelOrderModalLabel">Cancel Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <i class="fa fa-exclamation-triangle"></i>
                    Are you sure you want to cancel this order? This action cannot be undone.
                </div>
                <p>Please note:</p>
                <ul>
                    <li>Cancelled orders cannot be reinstated</li>
                    <li>If you've made a payment, refund will be processed according to our policy</li>
                    <li>If you need to make changes instead, please contact our support</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keep Order</button>
                <form action="{{ route('user.order.cancel', $order->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-times"></i> Yes, Cancel Order
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.status-timeline {
    padding: 20px 0;
}

.status-point {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #e9ecef;
    border: 2px solid #dee2e6;
    position: relative;
    z-index: 1;
}

.status-point.active {
    background-color: #28a745;
    border-color: #28a745;
}

.status-point.cancelled {
    background-color: #dc3545;
    border-color: #dc3545;
}

.status-label {
    position: absolute;
    top: 35px;
    left: 50%;
    transform: translateX(-50%);
    white-space: nowrap;
    font-size: 0.875rem;
}

.status-point::before {
    content: '';
    position: absolute;
    height: 2px;
    background-color: #dee2e6;
    width: 100%;
    left: 50%;
    top: 50%;
    transform: translateY(-50%);
    z-index: -1;
}

.status-point:last-child::before {
    display: none;
}
</style>
@endsection