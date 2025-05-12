@extends('layouts.app')
@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">GCash Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="{{ asset('assets/images/gcash-logo.png') }}" alt="GCash" style="height: 60px;">
                        </div>

                        <div class="alert alert-info">
                            <h5>Order Summary</h5>
                            <p>Order #: {{ $order->id }}</p>
                            <p>Total Amount: ${{ number_format($order->total, 2) }}</p>
                        </div>

                        <div class="mb-4">
                            <h5>Payment Instructions:</h5>
                            <ol>
                                <li>Open your GCash app</li>
                                <li>Scan this QR code or enter the number below</li>
                                <li>Enter the exact amount: ${{ number_format($order->total, 2) }}</li>
                                <li>Complete the payment in your GCash app</li>
                            </ol>
                        </div>

                        <div class="text-center mb-4">
                            <!-- Replace with actual QR code -->
                            <img src="{{ asset('assets/images/sample-qr.png') }}" alt="GCash QR Code" style="height: 200px;">
                            <p class="mt-2">GCash Number: 09123456789</p>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('payment.cancel') }}" class="btn btn-secondary">Cancel Payment</a>
                            <a href="{{ route('payment.success', ['order_id' => $order->id]) }}" class="btn btn-primary">
                                I've Completed the Payment
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection 