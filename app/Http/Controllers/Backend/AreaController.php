<?php

namespace App\Http\Controllers\Backend;

use App\Models\Area;
use App\Models\District;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Division;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::with('division', 'district')->get();
        return view('admin.area.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::all();
        return view('admin.area.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|unique:areas',
            'division_id' => 'required',
            'district_id' => 'required',
        ]);
        $area = new Area();
        $area->name = $request->name;
        $area->slug = Str::slug($request->name);
        $area->division_id = $request->division_id;
        $area->district_id = $request->district_id;
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
        $divisions = Division::all();
        return view('admin.area.edit', compact('area', 'divisions'));
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
        $area->division_id = $request->division_id;
        $area->district_id = $request->district_id;
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
