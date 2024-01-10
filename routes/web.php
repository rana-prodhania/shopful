<?php

use App\Models\District;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AreaController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\CouponController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\CouponController as AdminCouponController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
route::name('frontend.')->group(function () {
    route::get('/', [IndexController::class, 'index'])->name('home');
    route::get('/category/{slug}', [IndexController::class, 'category'])->name('category');
    route::get('/subcategory/{slug}', [IndexController::class, 'subcategory'])->name('subcategory');
    route::get('/product/{slug}', [IndexController::class, 'productDetail'])->name('product');
    // Ajax Routes
    route::get('/product/view/{id}', [IndexController::class, 'productModal'])->name('product.modal');
    // Cart Routes
    route::get('/cart', [CartController::class, 'allCart'])->name('cart');
    route::post('/cart/add/', [CartController::class, 'addToCart'])->name('cart.store');
    route::get('/cart/view/', [CartController::class, 'viewCart'])->name('cart.view');
    route::post('/cart/update/', [CartController::class, 'updateCart'])->name('cart.update');
    route::get('/cart/delete/{rowId}', [CartController::class, 'deleteCart'])->name('cart.delete');
    route::get('/cart/destroy', [CartController::class, 'destroyCart'])->name('cart.destroy');
    // WishList Routes
    route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.store')->middleware('auth');
    route::get('/wishlist/view', [WishlistController::class, 'viewWishlist'])->name('wishlist')->middleware('auth');
    route::get('/wishlist/{id}', [WishlistController::class, 'removeWishlist'])->name('wishlist.remove')->middleware('auth');
    // Coupon Routes
    route::post('/coupon/apply', [CouponController::class, 'applyCoupon'])->name('coupon.apply');
    route::get('/coupon/remove', [CouponController::class, 'removeCoupon'])->name('coupon.remove');
    // Checkout Routes
    Route::get('/district/ajax/{division_id}', [CheckoutController::class, 'getDistrict'])->name('district.ajax')->middleware('auth');
    Route::get('/area/ajax/{district_id}', [CheckoutController::class, 'getArea'])->name('area.ajax')->middleware('auth');
    route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout')->middleware('auth');
    route::post('/checkout/store', [CheckoutController::class, 'checkoutStore'])->name('checkout.store')->middleware('auth');
    
    
});
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login')->middleware('guest');

Route::middleware(['auth', 'admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/profile', [AdminController::class, 'update'])->name('profile.update');
    Route::get('/security', [AdminController::class, 'security'])->name('security');
    Route::post('/security', [AdminController::class, 'securityUpdate'])->name('security.update');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::resource('/category', CategoryController::class);
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'getSubCategory'])->name('subcategory.ajax');
    Route::resource('/sub-category', SubCategoryController::class);
    Route::resource('/brand', BrandController::class);
    Route::get('/product/status/{product}', [ProductController::class, 'toggleStatus'])->name('product.status');
    Route::resource('/product', ProductController::class);
    Route::resource('/slider', SliderController::class);
    Route::resource('/coupon', AdminCouponController::class);
    Route::resource('/division', DivisionController::class);
    Route::get('/district/ajax/{division_id}', [DistrictController::class, 'getDistrict'])->name('district.ajax')->middleware('auth');
    Route::resource('/district', DistrictController::class);
    Route::resource('/area', AreaController::class);
});
