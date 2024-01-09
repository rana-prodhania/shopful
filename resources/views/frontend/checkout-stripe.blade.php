@extends('frontend.layouts.app')
@section('title', 'Checkout Success')
@section('content')
  <!-- Start Checkout Area  -->
  <div class="axil-checkout-area axil-section-gap">
    <div class="container">
      <form action="#">
        <div class="row">
          <h1>Stripe Checkout</h1>
          <div class="col-lg-6">
            <form action="{{ route('frontend.checkout.store') }}" method="post">
              @csrf
              <div class="axil-checkout-billing card p-5">
                <h4 class="title mb--40">Your Order Details</h4>
                <table class="table">
                  <thead>
                    <th></th>
                    <th></th>
                  </thead>
                  <tbody>
                    <tr>
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
                        <td>Shipping Amout</td>
                        <td>50৳</td>
                      </tr>
                      <tr class="order-total">
                        <td>Total</td>
                        <td class="order-total-amount" id="cart-total">{{ Session::get('coupon')['total_amount'] + 50 }}৳
                        </td>
                      </tr>
                    @else
                    <tr class="order-shipping">
                      <td>Shipping Amout</td>
                      <td>50৳</td>
                    </tr>
                      <tr class="order-total">
                        <td class="fw-bold">Total</td>
                        <td class="order-total-amount fw-bold">{{ $cartTotal + 50 }}৳</td>
                      </tr>
                    @endif
                  </tbody>
                </table>
              </div>
            </form>
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

                    @if (Session::has('coupon'))
                      <tr class="order-tax" id="coupon-show">
                        <td>Coupon Code</td>
                        <td id="coupon-code-show">{{ Session::get('coupon')['coupon_code'] }}
                          <span>
                            <a href="{{ route('frontend.coupon.remove') }}" onclick="removeCoupon()"><i
                                class="fal fa-trash"></i>
                            </a>
                          </span>
                        </td>
                      </tr>
                      <tr class="order-tax" id="coupon-show">
                        <td>Coupon Discount(%)</td>
                        <td id="coupon-discount">{{ Session::get('coupon')['coupon_discount'] }}%</td>
                      </tr>
                      <tr class="order-tax" id="coupon-show">
                        <td>Discount Amount</td>
                        <td id="coupon-amount">{{ Session::get('coupon')['discount_amount'] }}৳</td>
                      </tr>
                      <tr class="order-total">
                        <td>Total</td>
                        <td class="order-total-amount" id="cart-total">{{ Session::get('coupon')['total_amount'] }}৳
                        </td>
                      </tr>
                    @else
                      <tr class="order-total">
                        <td>Total</td>
                        <td class="order-total-amount">$323.00</td>
                      </tr>
                    @endif
                    {{-- <tr class="order-shipping">
                      <td colspan="2">
                        <div class="shipping-amount">
                          <span class="title">Shipping Method</span>
                          <span class="amount">50.00</span>
                        </div>
                        <div class="input-group">
                          <input type="radio" id="radio1" name="shipping" checked>
                          <label for="radio1">Free Shippping</label>
                        </div>
                        <div class="input-group">
                          <input type="radio" id="radio2" name="shipping">
                          <label for="radio2">Local</label>
                        </div>
                        <div class="input-group">
                          <input type="radio" id="radio3" name="shipping">
                          <label for="radio3">Flat rate</label>
                        </div>
                      </td>
                    </tr> --}}

                  </tbody>
                </table>
              </div>
              <div class="order-payment-method">
                <div class="single-payment">
                  <div class="input-group">
                    <input type="radio" id="radio4" name="payment">
                    <label for="radio4">Direct bank transfer</label>
                  </div>
                  <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.
                    Your order will not be shipped until the funds have cleared in our account.</p>
                </div>
                <div class="single-payment">
                  <div class="input-group">
                    <input type="radio" id="radio5" name="payment">
                    <label for="radio5">Cash on delivery</label>
                  </div>
                  <p>Pay with cash upon delivery.</p>
                </div>
                <div class="single-payment">
                  <div class="input-group justify-content-between align-items-center">
                    <input type="radio" id="radio6" name="payment" checked>
                    <label for="radio6">Paypal</label>
                    <img src="assets/images/others/payment.png" alt="Paypal payment">
                  </div>
                  <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
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
