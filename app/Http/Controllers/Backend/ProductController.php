<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->code = $request->code;
        $product->quantity = $request->quantity;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->in_stock = $request->has('in_stock') ? 'yes' : 'no';
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->status = $request->status;
        $product->featured = $request->has('featured') ? 'yes' : 'no';
        // image upload
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/product/thumbnail/' . $imageName;
            Image::make($image)
            ->fit(584, 584, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })
            ->save(public_path($imagePath));
            $product->thumbnail = $imagePath;
        }
        $product->save();
        $product_id = $product->id;
        
        // Multiple Image Upload
        $images = $request->file('images');
        foreach($images as $image){
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/product/images/' . $imageName;
            Image::make($image)
            ->fit(584, 584, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })
            ->save(public_path($imagePath));

            $productImage = new ProductImage();
            $productImage->product_id = $product_id;
            $productImage->image = $imagePath;
            $productImage->save();
            
        }

        toastr()->addSuccess('Product created successfully');
        return to_route('admin.product.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
