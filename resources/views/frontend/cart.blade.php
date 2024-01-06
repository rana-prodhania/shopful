@extends('frontend.layouts.app')
@section('title', 'Cart')
@section('content')
  <!-- Start Cart Area  -->
  <div class="axil-product-cart-area axil-section-gap">
    <div class="container">
      <div class="axil-product-cart-wrap">
        <div class="product-table-heading">
          <h4 class="title">Your Cart</h4>
          <a href="{{ route('frontend.cart.destroy') }}" class="cart-clear">Clear Shoping Cart</a>
        </div>
        <form action="{{ route('frontend.cart.update') }}" method="post">
          @csrf
          <div class="table-responsive">
            <table class="table axil-product-table axil-cart-table mb--40">
              <thead>
                <tr>
                  <th scope="col" class="product-remove"></th>
                  <th scope="col" class="product-thumbnail">Product</th>
                  <th scope="col" class="product-title"></th>
                  <th scope="col" class="product-price">Price</th>
                  <th scope="col" class="product-quantity">Quantity</th>
                  <th scope="col" class="product-subtotal">Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($carts as $cart)
                  <form action="{{ route('frontend.cart.update') }}" method="post">
                    @csrf
                    <tr>
                      <input type="hidden" name="rowId" id="cartId" value="{{ $cart->rowId }}">
                      <td class="product-remove">
                        <a href="{{ route('frontend.cart.delete', $cart->rowId) }}" class="remove-wishlist">
                          <i class="fal fa-times"></i>
                        </a>
                      </td>
                      <td class="product-thumbnail"><a href="single-product-2.html"><img
                            src="{{ asset($cart->options->image) }}" alt="Digital Product"></a></td>
                      <td class="product-title"><a href="single-product-2.html">{{ $cart->name }}</a></td>
                      <td class="product-price" data-title="Price">{{ $cart->price }}<span
                          class="currency-symbol">৳</span>
                      </td>
                      <td class="product-quantity" data-title="Qty">
                        <div class="pro-qty">
                          <input type="number" name="quantity" id="qty" class="quantity-input"
                            value="{{ $cart->qty }}">
                        </div>
                      </td>
                      <td class="product-subtotal" data-title="Subtotal">{{ $cart->subtotal }}<span
                          class="currency-symbol">৳</span></td>
                    </tr>

                  </form>
                @empty
                  <td colspan="6" class="text-center">No Product Found!</td>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="update-btn">
            <button type="submit" class="axil-btn btn-outline w-25">Update Cart</button>
          </div>
        </form>
        @if (!Session::has('coupon'))
          <div class="cart-update-btn-area">
            <form action="{{ route('frontend.coupon.apply') }}" method="post">
              @csrf
              <div class="input-group product-cupon" id="coupon">
                <input placeholder="Enter coupon code" name="coupon_code" id="coupon-code" type="text">
                <div class="product-cupon-btn">
                  <button type="submit" class="axil-btn btn-outline">Apply</button>
                </div>
              </div>
            </form>
          </div>
        @endif
        <div class="row">
          <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
            <div class="axil-order-summery mt--80">
              <h5 class="title mb--20">Order Summary</h5>
              <div class="summery-table-wrap">
                <table class="table summery-table mb--30">
                  <tbody>
                    <tr class="order-subtotal">
                      <td>Subtotal</td>
                      <td id="subtotal">{{ $cartTotal }}৳</td>
                    </tr>
                    @if (Session::has('coupon'))
                      <tr class="order-tax" id="coupon-show">
                        <td>Coupon Code</td>
                        <td id="coupon-code-show">{{ Session::get('coupon')['coupon_code'] }}
                          <span>
                            <a href="{{ route('frontend.coupon.remove') }}" onclick="removeCoupon()"><i class="fal fa-trash"></i>
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
                        <td class="order-total-amount" id="cart-total">{{ Session::get('coupon')['total_amount'] }}৳</td>
                      </tr>
                    @else
                      <tr class="order-total">
                        <td>Total</td>
                        <td class="order-total-amount" id="cart-total">{{ $cartTotal }}৳</td>
                      </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              <a href="checkout.html" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Cart Area  -->
@endsection
