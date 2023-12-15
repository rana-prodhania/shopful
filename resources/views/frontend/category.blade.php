@extends('frontend.layouts.app')
@section('title', 'Category')
@section('content')
  <!-- Start Breadcrumb Area  -->
  <div class="axil-breadcrumb-area">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-8">
          <div class="inner">
            <ul class="axil-breadcrumb">
              <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="separator"></li>
              <li class="axil-breadcrumb-item" aria-current="page">Sub Category</li>
              <li class="separator"></li>
              <li class="axil-breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ul>
            <h4>Explore All Products Of {{$category->name }}</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumb Area  -->
  <hr class="divider border-top">
  <!-- Start Shop Area  -->
  <div class="axil-shop-area axil-section-gap bg-color-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="axil-shop-sidebar">
            <div class="d-lg-none">
              <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
            </div>

            <div class="toggle-list product-categories active">
              <h6 class="title">SUB CATEGORIES</h6>
              <div class="shop-submenu">
                <ul>
                  @forelse ($category->subCategories as $subCategory)
                    <li><a href="{{ route('frontend.subcategory', $subCategory->slug) }}">{{ $subCategory->name }}</a></li>
                  @empty
                    <span>No Sub Category Found!</span>
                  @endforelse
                </ul>
              </div>
            </div>
            <div class="toggle-list product-price-range active">
              <h6 class="title">PRICE</h6>
              <div class="shop-submenu">
                <ul>
                  <li class="chosen"><a href="#">30</a></li>
                  <li><a href="#">5000</a></li>
                </ul>
                <form action="#" class="mt--25">
                  <div id="slider-range"></div>
                  <div class="flex-center mt--20">
                    <span class="input-range">Price: </span>
                    <input type="text" id="amount" class="amount-range" readonly>
                  </div>
                </form>
              </div>
            </div>
            <button class="axil-btn btn-bg-primary">All Reset</button>
          </div>
          <!-- End .axil-shop-sidebar -->
        </div>
        <div class="col-lg-9">
          <div class="row">
            <div class="col-lg-12">
              <div class="axil-shop-top mb--40">
                <div class="category-select align-items-center justify-content-lg-end justify-content-between">
                  <!-- Start Single Select  -->
                  <span class="filter-results">Showing 1-12 of 84 results</span>
                  <select class="single-select">
                    <option>Short by Latest</option>
                    <option>Short by Oldest</option>
                    <option>Short by Name</option>
                    <option>Short by Price</option>
                  </select>
                  <!-- End Single Select  -->
                </div>
                <div class="d-lg-none">
                  <button class="product-filter-mobile filter-toggle"><i class="fas fa-filter"></i> FILTER</button>
                </div>
              </div>
            </div>
          </div>
          <!-- End .row -->
          <div class="row row--15">
            @forelse ($products as $product)
              <div class="col-xl-4 col-sm-6">
                <div class="axil-product product-style-one mb--30">
                  <div class="thumbnail">
                    <a href="single-product.html">
                      <img src="{{ asset($product->thumbnail) }}" alt="Product Images">
                    </a>
                    @php
                      $originalPrice = $product->price;
                      $discountedPrice = $product->discount_price;
                      $discountPercentage = (($originalPrice - $discountedPrice) / $originalPrice) * 100;
                    @endphp
                    @if ($discountedPrice != null && $discountedPrice > 0)
                      <div class="label-block label-right">
                        <div class="product-badget">{{ round($discountPercentage) }}% OFF</div>
                      </div>
                    @else
                      <div class="label-block label-right">
                        <div class="product-badget">New</div>
                      </div>
                    @endif
                    <div class="product-hover-action">
                      <ul class="cart-action">
                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                            data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="product-content">
                    <div class="inner">
                      <h5 class="title"><a href="single-product.html">{{ $product->name }}</a></h5>
                      <div class="product-price-variant">
                        @if ($product->discount_price != null && $product->discount_price > 0)
                          <span class="price old-price">{{ $product->price }} TK</span>
                          <span class="price current-price">{{ $product->discount_price }} TK</span>
                        @else
                          <span class="price current-price">{{ $product->price }} TK</span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @empty
              <span>No Product Found!</span>
            @endforelse

            <!-- End Single Product  -->
          </div>
          <div class="text-center pt--20">
            <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a>
          </div>
        </div>
      </div>
    </div>
    <!-- End .container -->
  </div>
  <!-- End Shop Area  -->
@endsection
