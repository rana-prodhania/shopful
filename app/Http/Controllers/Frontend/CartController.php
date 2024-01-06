<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\CouponHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    // Add To Cart
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->id);

        Cart::add($product->id, $product->name, $request->quantity ?? 1, $product->discount_price ?? $product->price, ['image' => $product->thumbnail]);
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        return response()->json(['status' => 'success', 'message' => 'Product added to cart']);
    }

    // View Cart
    public function viewCart()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json([
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal
        ]);
    }

    // update cart
    public function updateCart(Request $request)
    {
        $rowId = $request->rowId;
        $quantity = $request->quantity;
        Cart::update($rowId, $quantity);
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        toastr()->addSuccess('Cart updated successfully');
        return redirect()->back();
    }

    // All Cart
    public function allCart()
    {
        $carts = Cart::content();
        $cartTotal = Cart::total();
        return view('frontend.cart', compact('carts', 'cartTotal'));
    }

    // delete cart
    public function deleteCart($rowId)
    {
        Cart::remove($rowId);
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        return redirect()->back();
    }

    // destroy all cart
    public function destroyCart()
    {
        Cart::destroy();
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        toastr()->addSuccess('All Cart cleared successfully');
        return redirect()->back();
    }
}
