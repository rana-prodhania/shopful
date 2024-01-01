<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    function productImages(){
        return $this->hasMany(ProductImage::class);
    }

    function category(){
        return $this->belongsTo(Category::class);
    }

    function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }

    function brand(){
        return $this->belongsTo(Brand::class);
    }

}
