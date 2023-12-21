<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->get();
        $newProducts = Product::where('status', 1)->orderBy('id', 'desc')->limit(8)->get();
        $categories = Category::all();
        return view('frontend.index', compact('sliders', 'newProducts', 'categories'));
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->with('subCategories')->select('id', 'name')->first();
        $products = Product::where('category_id', $category->id)->where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.category', compact('category', 'products'));
    }

    public function subCategory($slug)
    {
        $subCategory = SubCategory::where('slug', $slug)->first();
        $products = Product::where('subcategory_id', $subCategory->id)->where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.subcategory', compact('subCategory', 'products'));
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->with('productImages')->first();
        $productColors = explode(',', $product->color);
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->where('status', 1)->orderBy('id', 'desc')->limit(4)->get();
        return view('frontend.product-detail', compact('product', 'productColors', 'relatedProducts'));
    }

    public function productModal($id)
    {
        $product = Product::where('id', $id)->select('id', 'name', 'price', 'discount_price', 'quantity', 'in_stock', 'short_desc', 'thumbnail')->first();
        return $product;
    }
}
