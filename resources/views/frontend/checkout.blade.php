@extends('frontend.layouts.app')
@section('title', 'Chckout')
@section('content')
  <!-- Start Checkout Area  -->
  <div class="axil-checkout-area axil-section-gap">
    <div class="container">
      <form action="{{ route('frontend.checkout.store') }}" method="post">
        @csrf
        <div class="row">
          <div class="col-lg-6">
            <div class="axil-checkout-billing">
              <h4 class="title mb--40">Billing details</h4>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Name <span>*</span></label>
                    <input type="text" name="name" value="{{ auth()->user()->name }}" id="first-name"
                      placeholder="Enter your name">
                  </div>
                </div>
                <div class="form-group col">
                  <label>Email Address <span>*</span></label>
                  <input type="email" name="email" value="{{ auth()->user()->email }}" id="email"
                    placeholder="Enter your email">
                </div>
              </div>
              <div class="form-group">
                <label>Phone <span>*</span></label>
                <input type="tel" name="phone" value="{{ auth()->user()->phone }}" placeholder="Enter your phone"
                  id="phone">
              </div>
              <div class="row">
                <div class="form-group col">
                  <label>Division <span>*</span></label>
                  <input type="text" name="division" id="address1" class="mb--15" placeholder="Enter your division">

                </div>
                <div class="form-group col">
                  <label>District <span>*</span></label>
                  <input type="text" name="district" id="address1" class="mb--15" placeholder="Enter your district">
                </div>
              </div>
              <div class="row">
                <div class="form-group col">
                  <label>State <span>*</span></label>
                  <input type="text" name="town" id="town">
                </div>
                <div class="form-group col">
                  <label>Zip Code <span>*</span></label>
                  <input type="number" name="zip" id="town">
                </div>
              </div>
              <div class="form-group">
                <label>Address <span>*</span></label>
                <input type="text" id="address1" name="address" class="mb--15"
                  placeholder="House number and street name">
              </div>
              <div class="form-group">
                <label>Other Notes (optional)</label>
                <textarea id="notes" name="notes" rows="2"
                  placeholder="Notes about your order, e.g. speacial notes for delivery."></textarea>
              </div>
            </div>

            @if (!Session::has('coupon'))
              <form action="{{ route('frontend.coupon.apply') }}" method="post">
                @csrf
                <div class="axil-checkout-notice toggle-open">
                  <div class="axil-toggle-box">
                    <div class="axil-checkout-coupon">
                      <p>If you have a coupon code, please apply it below.</p>
                      <div class="input-group">
                        <input placeholder="Enter coupon code" name="coupon_code" type="text">
                        <div class="apply-btn">
                          <button type="submit" class="axil-btn btn-bg-primary">Apply</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            @endif
          </div>
          <div class="col-lg-6">
            <div class="axil-order-summery order-checkout-summery">
              <h5 class="title mb--20">Your Order</h5>
              <div class="summery-table-wrap">
                <table class="table summery-table">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($carts as $cart)
                      <tr class="order-product">
                        <td>
                          <img src="{{ asset($cart->options->image) }}" class="img-fluid w-25" alt="Cart Product">
                          <span class="mt-5">{{ $cart->name }} <span class="quantity">×
                              {{ $cart->qty }}</span></span>
                        </td>
                        <td>{{ $cart->subtotal }}৳</td>
                      </tr>
                    @empty
                      <td colspan="6" class="text-center">No Product Found!</td>
                    @endforelse
                    <tr class="order-subtotal">
                      <td>Subtotal</td>
                      <td>{{ $cartTotal }}৳</td>
                    </tr>
                    @if (Session::has('coupon'))
                      <tr class="order-tax" id="coupon-show">
                        <td>Coupon Code</td>
                        <td id="coupon-code-show">{{ Session::get('coupon')['coupon_code'] }}
                          ({{ Session::get('coupon')['coupon_discount'] }}%)
                          <span>
                            <a href="{{ route('frontend.coupon.remove') }}" onclick="removeCoupon()"><i
                                class="fal fa-trash"></i>
                            </a>
                          </span>
                        </td>
                      </tr>
                      <tr class="order-tax" id="coupon-show">
                        <td>Discount Amount</td>
                        <td id="coupon-amount">{{ Session::get('coupon')['discount_amount'] }}৳</td>
                      </tr>
                      <tr class="order-shipping">
                        <td colspan="2">
                          <div class="shipping-amount">
                            <span class="title">Shipping Amout</span>
                            <span class="amount">50৳</span>
                          </div>
                        </td>
                      </tr>
                      <tr class="order-total">
                        <td>Total</td>
                        <td class="order-total-amount" id="cart-total">
                          {{ Session::get('coupon')['total_amount'] + 50 }}৳
                        </td>
                      </tr>
                    @else
                      <tr class="order-shipping">
                        <td colspan="2">
                          <div class="shipping-amount">
                            <span class="title">Shipping Amout</span>
                            <span class="amount">50৳</span>
                          </div>
                        </td>
                      </tr>
                      <tr class="order-total">
                        <td>Total</td>
                        <td class="order-total-amount">{{ $cartTotal + 50 }}৳</td>
                      </tr>
                    @endif

                  </tbody>
                </table>
              </div>
              <div class="order-payment-method">
                {{-- <div class="single-payment">
                  <div class="input-group">
                    <input type="radio" id="radio4" value="stripe" name="payment_method">
                    <label for="radio4">Stripe</label>
                  </div>
                </div> --}}
                <div class="single-payment">
                  <div class="input-group">
                    <input type="radio" checked id="radio5" value="cash" name="payment_method">
                    <label for="radio5">Cash on delivery</label>
                  </div>
                </div>
              </div>

              <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- End Checkout Area  -->
@endsection