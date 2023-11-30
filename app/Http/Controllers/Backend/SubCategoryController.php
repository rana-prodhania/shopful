<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = SubCategory::with('category')->get();
        return view('admin.sub_category.index',compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub_category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryRequest $request)
    {
        $SubCategory = new SubCategory();
        $SubCategory->name = $request->name;
        $SubCategory->slug = Str::slug($request->name);
        $SubCategory->category_id = $request->category;
        $SubCategory->save();
        toastr()->addSuccess('Sub Category created successfully');
        return to_route('admin.sub-category.index');
        
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
        $subCategory = SubCategory::find($id);
        $categories = Category::all();
        return view('admin.sub_category.edit',compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryRequest $request, string $id)
    {
        $SubCategory = SubCategory::find($id);
        $SubCategory->name = $request->name;
        $SubCategory->slug = Str::slug($request->name);
        $SubCategory->category_id = $request->category;
        $SubCategory->save();
        toastr()->addSuccess('Sub Category updated successfully');
        return to_route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $SubCategory = SubCategory::find($id);
        $SubCategory->delete();
        toastr()->addSuccess('Sub Category deleted successfully');
        return to_route('admin.sub-category.index');
    }

    // Get SubCategory
    public function getSubCategory($category_id)
    {
        $subCategory = SubCategory::where('category_id', $category_id)->get();
        return $subCategory;
    }
}
