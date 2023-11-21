<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    // View Admin Dashboard
    public function index()
    {
        return view('admin.dashboard');
    }
    // View Admin Profile
    public function profile()
    {

        return view('admin.profile');
    }
    // Admin Profile Update
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('image')) {
            $oldImagePath = public_path($user->image);

            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

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

        return redirect()->back();
    }
    // View Admin Security
    public function security()
    {
        return view('admin.security');
    }

    // Admin Security Update
    public function securityUpdate(Request $request){
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        $user = User::find(Auth::user()->id);
        if(!Hash::check($request->oldPassword, $user->password)){
            toastr()->addError('Old password does not match');
            return redirect()->back();
        }
        $user->password = Hash::make($request->newPassword);
        $user->save();
        toastr()->addSuccess('Password updated successfully');
        return redirect()->back();

    }
    // Admin Login
    public function login()
    {
        return view('admin.login');
    }

    // Admin Login
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
