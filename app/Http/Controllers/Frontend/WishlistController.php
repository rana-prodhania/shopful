<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    // view wishlist
    public function viewWishlist()
    {
        $wishlists = Wishlist::with('product:id,name,thumbnail,price,discount_price,in_stock,quantity')
            ->where('user_id', Auth::user()->id)
            ->select('id', 'product_id')
            ->get();
        return view('frontend.wishlist', compact('wishlists'));
    }

    // add to wishlist
    public function addToWishlist(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $productId = $request->id;

            $existingWishlistItem = Wishlist::where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();

            if ($existingWishlistItem) {
                return response()->json(['status' => 'exists', 'message' => 'Product already added to wishlist']);
            }

            $wishlist = new Wishlist();
            $wishlist->user_id = $userId;
            $wishlist->product_id = $productId;
            $wishlist->save();

            return response()->json(['status' => 'success', 'message' => 'Product added to wishlist']);
        }
    }

    // remove wishlist
    public function removeWishlist(Request $request)
    {
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', Auth::user()->id)->findOrFail($request->id);
            $wishlist->delete();
            toastr()->addSuccess('Wishlist removed successfully');
            return redirect()->back();
        }
    }
}
