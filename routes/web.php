<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');

Route::middleware(['auth', 'admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('/profile',[AdminController::class,'profile'])->name('profile');
    Route::post('/profile',[AdminController::class,'update'])->name('profile.update');
    Route::get('/security',[AdminController::class,'security'])->name('security');
    Route::post('/security',[AdminController::class,'securityUpdate'])->name('security.update');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    Route::resource('/category',CategoryController::class);
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'getSubCategory'])->name('subcategory.ajax');
    Route::resource('/sub-category',SubCategoryController::class);
    Route::resource('/brand',BrandController::class);
    
    Route::resource('/product',ProductController::class);
});





