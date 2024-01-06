<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CouponController extends Controller
{
    // Apply Coupon
    public function applyCoupon(Request $request)
    {
        
        $coupon = Coupon::where('code', $request->coupon_code)
            ->where('validity', '>=', now()->format('Y-m-d'))
            ->first();

        if ($coupon) {
            $discountAmount = round(Cart::total() * $coupon->discount / 100);
            $totalAmount = round(Cart::total() - $discountAmount);

            $couponData = [
                'coupon_code' => $coupon->code,
                'coupon_discount' => $coupon->discount,
                'discount_amount' => $discountAmount,
                'total_amount' => $totalAmount
            ];

            session(['coupon' => $couponData]);

            toastr()->addSuccess('Coupon Applied Successfully');
            return redirect()->back();
        } else {
            toastr()->addError('Invalid Or Expired Coupon');
            return redirect()->back();
        }
    }

    // View Coupon
    public function viewCoupon()
    {
        if (Session::has('coupon')) {
            return response()->json([
                'subtotal' => Cart::total(),
                'coupon_code' => session()->get('coupon')['coupon_code'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount']
            ]);
        } else {
            return response()->json(
                ['total' => Cart::total(),]
            );
        }
    }

    // remove coupon
    public function removeCoupon()
    {
        session()->forget('coupon');
        toastr()->addSuccess('Coupon Removed Successfully');
        return redirect()->back();
    }
}
