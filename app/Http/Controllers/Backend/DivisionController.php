<?php

namespace App\Http\Controllers\Backend;

use App\Models\Division;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions = Division::all();
        return view('admin.division.index', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.division.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:divisions',
        ]);
        $division = new Division();
        $division->name = $request->name;
        $division->slug = Str::slug($request->name);
        $division->save();
        toastr()->addSuccess('Division created successfully');
        return redirect()->route('admin.division.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $division = Division::find($id);
        return view('admin.division.edit', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:divisions',
        ]);
        $division = Division::find($id);
        $division->name = $request->name;
        $division->slug = Str::slug($request->name);
        $division->save();
        toastr()->addSuccess('Division updated successfully');
        return to_route('admin.division.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $division = Division::find($id);
        $division->delete();
        toastr()->addSuccess('Division deleted successfully');
        return to_route('admin.division.index');
    }
}
