<?php

namespace App\Http\Controllers\Backend;

use App\Models\Area;
use App\Models\District;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::with('district')->get();
        return view('admin.area.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = District::all();
        return view('admin.area.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:areas',
            'district' => 'required',
        ]);
        $area = new Area();
        $area->name = $request->name;
        $area->slug = Str::slug($request->name);
        $area->district_id = $request->district;
        $area->save();
        toastr()->addSuccess('Area created successfully');
        return to_route('admin.area.index');
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
        $area = Area::find($id);
        $districts = District::all();
        return view('admin.area.edit', compact('area', 'districts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $area = Area::find($id);
        $area->name = $request->name;
        $area->slug = Str::slug($request->name);
        $area->district_id = $request->district;
        $area->save();
        toastr()->addSuccess('Area update successfully');
        return to_route('admin.area.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $area = area::find($id);
        $area->delete();
        toastr()->addSuccess('Area deleted successfully');
        return to_route('admin.area.index');
    }
}
