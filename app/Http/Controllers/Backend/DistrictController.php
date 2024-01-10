<?php

namespace App\Http\Controllers\Backend;

use App\Models\District;
use App\Models\Division;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = District::with('division')->get();
        return view('admin.district.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::all();
        return view('admin.district.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:districts',
            'division' => 'required',
        ]);
        $district = new District();
        $district->name = $request->name;
        $district->slug = Str::slug($request->name);
        $district->division_id = $request->division;
        $district->save();
        toastr()->addSuccess('District created successfully');
        return to_route('admin.district.index');
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
        $district = District::findOrFail($id);
        $divisions = Division::all();
        return view('admin.district.edit', compact('district', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'division' => 'required',
        ]);
        $district = District::findOrFail($id);
        $district->name = $request->name;
        $district->slug = Str::slug($request->name);
        $district->division_id = $request->division;
        $district->save();
        toastr()->addSuccess('District updated successfully');
        return to_route('admin.district.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $district = District::findOrFail($id);
        $district->delete();
        toastr()->addSuccess('District deleted successfully');
        return to_route('admin.district.index');
    }

    public function getDistrict($division_id){
        $districts = District::where('division_id', $division_id)->get();
        return response()->json($districts);
    }
}
