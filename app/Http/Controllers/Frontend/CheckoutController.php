<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\OrderItem;
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

        
        

        // Create a new order
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->division_id = $request->division_id;
        $order->district_id = $request->district_id;
        $order->area_id = $request->area_id;
        $order->notes = $request->notes;
        $order->zip_code = $request->zip_code;
        $order->payment_method = $request->payment_method;
        $order->amount = Cart::total();
        $order->invoice_no = random_int(100000, 999999);
        $order->order_date = date('Y-m-d');
        $order->status = 'pending';
        $order->save();

        // Create order details
        foreach (Cart::content() as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem->id;
            $orderItem->price = $cartItem->price;
            $orderItem->quantity = $cartItem->qty;
            $orderItem->save();
        }

        
        Cart::destroy();
        return to_route('home');
        
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
