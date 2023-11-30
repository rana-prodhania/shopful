<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('subcategory_id')->constrained('sub_categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->string('code')->nullable();
            $table->string('thumbnail');
            $table->string('short_desc');
            $table->text('long_desc');
            $table->integer('price');
            $table->integer('discount_price');
            $table->integer('quantity')->default(0);
            $table->string('color')->nullable();
            $table->enum('featured', ['yes', 'no']);
            $table->enum('in_stock', ['yes', 'no']);
            $table->enum('status',['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
