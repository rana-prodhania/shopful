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

    // All Cart
    public function allCart()
    {
        $carts = Cart::content();
        return view('frontend.cart', compact('carts'));
    }

    // delete cart
    public function deleteCart($rowId){
        Cart::remove($rowId);
        toastr()->addSuccess('Product removed from cart');
        return response()->json(['status' => 'success', 'message' => 'Product removed from cart']);
    }

    // destroy all cart
    public function destroyCart(){
        Cart::destroy();
        toastr()->addSuccess('All Cart cleared successfully');
        return redirect()->back();
    }

}
