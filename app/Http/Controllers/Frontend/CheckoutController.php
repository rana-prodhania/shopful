<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    // checkout
    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Cart::count() <= 0) {
            toastr()->addWarning('Your cart is empty, please add some products');
            return redirect()->back();
        }

        $carts = Cart::content();
        $cartTotal = Cart::total();
        $divisions = Division::all();
        return view('frontend.checkout', compact('carts', 'cartTotal', 'divisions'));
    }

    // checkout store
    public function checkoutStore(Request $request)
    {
        $request->validate([
            'payment_method' => 'required',
        ]);

        if($request->payment_method === 'cash') {
            $cartTotal = Cart::total();
            return view('frontend.checkout-cash', compact('cartTotal'));
        }

        
        if (Cart::count() <= 0) {
            toastr()->addWarning('Your cart is empty, please add some products');
            return redirect()->back();
        }

        // Create a new order
        // $order = new Order();
        // $order->user_id = Auth::user()->id;
        // $order->name = Auth::user()->name;
        // $order->email = Auth::user()->email;
        // $order->phone = Auth::user()->phone;

        // $order->total = Cart::total();
        // $order->save();
    }

    public function getDistrict($division_id){
        $districts = District::where('division_id', $division_id)->get();
        return response()->json($districts);
    }
    public function getArea($district_id){
        $areas = Area::where('district_id', $district_id)->get();
        return response()->json($areas);
    }
}
