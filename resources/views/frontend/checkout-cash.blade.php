@extends('frontend.layouts.app')
@section('title', 'Checkout Success')
@section('content')
  <!-- Start Checkout Area  -->
  <div class="axil-checkout-area axil-section-gap">
    <div class="container">
      <form action="#">
        <div class="row">
          <h2>Cash On Delivery Checkout</h2>
          <form action="{{ route('frontend.checkout.store') }}" method="post">
            @csrf
            <div class="col-lg-6 p-2">
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
            </div>
          </form>
        </div>
      </form>
    </div>
  </div>
  <!-- End Checkout Area  -->
@endsection
