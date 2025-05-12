{{-- File: resources/views/order/confirmation.blade.php --}}
@extends('layouts.app')
@section('content')
<main class="pt-90">
  <div class="mb-4 pb-4"></div>
  <section class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body text-center">
            <div class="mb-4">
              <i class="fa fa-check-circle text-success" style="font-size: 64px;"></i>
            </div>
            
            <h2 class="mb-4">Thank You for Your Order!</h2>
            
            @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            <div class="order-details mb-4">
              <h4>Order Details</h4>
              <p>Order #: {{ $order->id }}</p>
              <p>Total Amount: ${{ number_format($order->total, 2) }}</p>
              <p>Payment Method: {{ ucfirst($order->payment_method) }}</p>
              <p>Status: {{ ucfirst($order->status) }}</p>
            </div>

            <div class="pickup-details mb-4">
              <h4>Pickup Details</h4>
              <p>Name: {{ $order->name }}</p>
              <p>Phone: {{ $order->phone }}</p>
              <p>Pickup Time: {{ ucfirst($order->pickup_time) }}</p>
              @if($order->special_instructions)
                <p>Special Instructions: {{ $order->special_instructions }}</p>
              @endif
            </div>

            <div class="alert alert-info">
              <h5>Pickup Location</h5>
              <p>123 Main Street, Your City, Your Country</p>
              <p>Please bring a valid ID when picking up your order.</p>
            </div>

            @if($order->payment_method == 'cash')
              <div class="alert alert-warning">
                <h5>Payment Instructions</h5>
                <p>Please prepare the exact amount of ${{ number_format($order->total, 2) }} when picking up your order.</p>
              </div>
            @endif

            <div class="mt-4">
              <a href="{{ route('user.orders') }}" class="btn btn-primary">View My Orders</a>
              <a href="{{ route('shop.index') }}" class="btn btn-secondary">Continue Shopping</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection