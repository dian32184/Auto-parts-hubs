{{-- File: resources/views/checkout.blade.php --}}
@extends('layouts.app')
@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Pickup and Checkout</h2>
      <div class="checkout-steps">
        <a href="{{ route('cart.index') }}" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">01</span>
          <span class="checkout-steps__item-title">
            <span>Shopping Bag</span>
            <em>Manage Your Items List</em>
          </span>
        </a>
        <a href="javascript:void(0)" class="checkout-steps__item active">
          <span class="checkout-steps__item-number">02</span>
          <span class="checkout-steps__item-title">
            <span>Pickup and Checkout</span>
            <em>Checkout Your Items List</em>
          </span>
        </a>
        <a href="javascript:void(0)" class="checkout-steps__item">
          <span class="checkout-steps__item-number">03</span>
          <span class="checkout-steps__item-title">
            <span>Confirmation</span>
            <em>Review And Submit Your Order</em>
          </span>
        </a>
      </div>
      <form name="checkout-form" action="{{ route('place.order') }}" method="POST">
        @csrf
        <div class="checkout-form">
          <div class="billing-info__wrapper">
            <div class="row">
              <div class="col-6">
                <h4>PICKUP DETAILS</h4>
              </div>
              <div class="col-6">
              </div>
            </div>

            <div class="row mt-5">
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="name" required="" value="{{ $pickupInfo->name ?? Auth::user()->name }}">
                  <label for="name">Full Name *</label>
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input type="text" class="form-control" name="phone" required="" value="{{ $pickupInfo->phone ?? '' }}">
                  <label for="phone">Phone Number *</label>
                  @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating my-3">
                  <select class="form-control" name="pickup_time" required="">
                    <option value="">Select a pickup time</option>
                    <option value="morning" {{ isset($pickupInfo) && $pickupInfo->pickup_time == 'morning' ? 'selected' : '' }}>Morning (9AM - 12PM)</option>
                    <option value="afternoon" {{ isset($pickupInfo) && $pickupInfo->pickup_time == 'afternoon' ? 'selected' : '' }}>Afternoon (12PM - 5PM)</option>
                    <option value="evening" {{ isset($pickupInfo) && $pickupInfo->pickup_time == 'evening' ? 'selected' : '' }}>Evening (5PM - 8PM)</option>
                  </select>
                  <label for="pickup_time">Preferred Pickup Time *</label>
                  @error('pickup_time')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating my-3">
                  <textarea class="form-control" name="special_instructions" rows="3">{{ $pickupInfo->special_instructions ?? '' }}</textarea>
                  <label for="special_instructions">Special Instructions (Optional)</label>
                  @error('special_instructions')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="alert alert-info">
                  <i class="fa fa-info-circle"></i> Your order will be available for pickup at our shop located at:
                  <strong>123 Main Street, Your City, Your Country</strong>
                </div>
              </div>
            </div>
          </div>
          <div class="checkout__totals-wrapper">
            <div class="sticky-content">
              <div class="checkout__totals">
                <h3>Your Order</h3>
                <table class="checkout-cart-items">
                  <thead>
                    <tr>
                      <th>PRODUCT</th>
                      <th align="right">SUBTOTAL</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach(Cart::instance('cart')->content()as $item)

                    <tr>
                      <td>
                        {{ $item->name }} x {{ $item->qty }}
                      </td>
                      <td align="right">
                        ${{ number_format($item->subtotal, 2) }}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <table class="checkout-totals">
                  <tbody>
                    <tr>
                      <th>SUBTOTAL</th>
                      <td align="right">${{Cart::instance('cart')->subtotal() }}</td>
                    </tr>
                    @if(Session::has('discounts'))
                    <tr>
                      <th>DISCOUNT</th>
                      <td align="right">-${{ Session::get('discounts')['discounts'] }}</td>
                    </tr>
                    @endif
                    <tr>
                      <th>VAT</th>
                      <td align="right">${{Cart::instance('cart')->tax() }}</td>
                    </tr>
                    <tr>
                      <th>TOTAL</th>
                      @if(Session::has('discounts'))
                        <td align="right">${{ Session::get('discounts')['total'] }}</td>
                      @else
                        <td align="right">${{Cart::instance('cart')->total() }}</td>
                      @endif
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="checkout__payment-methods">
                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method"
                    id="checkout_payment_method_1" checked>
                  <label class="form-check-label" for="checkout_payment_method_1">
                    Direct bank transfer
                    <p class="option-detail">
                      Make your payment directly into our bank account. Please use your Order ID as the payment
                      reference. Your order will not be ready for pickup until the funds have cleared in our account.
                    </p>
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method"
                    id="checkout_payment_method_2">
                  <label class="form-check-label" for="checkout_payment_method_2">
                    Check payments
                    <p class="option-detail">
                      Phasellus sed volutpat orci. Fusce eget lore mauris vehicula elementum gravida nec dui. Aenean
                      aliquam varius ipsum, non ultricies tellus sodales eu. Donec dignissim viverra nunc, ut aliquet
                      magna posuere eget.
                    </p>
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method"
                    id="checkout_payment_method_3">
                  <label class="form-check-label" for="checkout_payment_method_3">
                    Pay at pickup
                    <p class="option-detail">
                      Pay when you pick up your order at our shop. We accept cash and all major credit cards.
                    </p>
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input form-check-input_fill" type="radio" name="checkout_payment_method"
                    id="checkout_payment_method_4">
                  <label class="form-check-label" for="checkout_payment_method_4">
                    Paypal
                    <p class="option-detail">
                      Phasellus sed volutpat orci. Fusce eget lore mauris vehicula elementum gravida nec dui. Aenean
                      aliquam varius ipsum, non ultricies tellus sodales eu. Donec dignissim viverra nunc, ut aliquet
                      magna posuere eget.
                    </p>
                  </label>
                </div>
                <div class="policy-text">
                  Your personal data will be used to process your order, support your experience throughout this
                  website, and for other purposes described in our <a href="terms.html" target="_blank">privacy
                    policy</a>.
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-checkout">PLACE ORDER</button>
            </div>
          </div>
        </div>
      </form>
    </section>
  </main>
@endsection