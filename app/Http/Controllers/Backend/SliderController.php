<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->status = $request->status;
        // Image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/slider/' . $imageName;
            Image::make($image)
                ->fit(680, 548, function ($constraint) {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                })
                ->save(public_path($imagePath));
            $slider->image = $imagePath;
        }

        $slider->save();
        toastr()->addSuccess('Slider created successfully');

        return to_route('admin.slider.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->status = $request->status;
        // Image upload
        if ($request->hasFile('image')) {
            unlink(public_path($slider->image));
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/slider/' . $imageName;
            Image::make($image)
                ->fit(680, 548, function ($constraint) {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                })
                ->save(public_path($imagePath));
            $slider->image = $imagePath;
        }
        $slider->save();
        toastr()->addSuccess('Slider updated successfully');
        return to_route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        unlink(public_path($slider->image));
        $slider->delete();
        toastr()->addSuccess('Slider deleted successfully');
        return to_route('admin.slider.index');
    }
}
