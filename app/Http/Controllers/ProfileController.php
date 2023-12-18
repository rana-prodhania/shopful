<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function index(){
        return view('frontend.dashboard');
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = User::findOrFail($request->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        // Image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/profile/' . $imageName;

            Image::make($image)
                ->fit(200, 200, function ($constraint) {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                })
                ->save(public_path($imagePath));

            $user->image = $imagePath;
        }



        $user->save();
        toastr()->addSuccess('Profile updated successfully');
        return to_route('dashboard');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login');
    }
}
