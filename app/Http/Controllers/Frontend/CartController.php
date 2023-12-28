<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Add To Cart
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->id);

        Cart::add($product->id, $product->name, $request->quantity ?? 1, $product->discount_price ?? $product->price, ['image' => $product->thumbnail]);
        toastr()->addSuccess('Product added to cart');
        return to_route('frontend.home');
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

    // delete cart
    public function deleteCart($rowId){
        Cart::remove($rowId);
        toastr()->addSuccess('Product removed from cart');
        return to_route('frontend.cart.view');
    }

}
