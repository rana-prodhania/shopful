@extends('frontend.layouts.app')
@section('title', 'Product')
@section('content')
  <!-- Start Shop Area  -->
  <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
    <div class="single-product-thumb mb--40">
      <div class="container mt-5">
        <div class="row">
          <div class="col-lg-7 mb--40">
            <div class="row">
              <div class="col-lg-10 order-lg-2">
                <div class="single-product-thumbnail-wrap zoom-gallery">
                  <div class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                    <div class="thumbnail">
                      <a href="{{ asset($product->thumbnail) }}" class="popup-zoom">
                        <img src="{{ asset($product->thumbnail) }}" alt="Product Images">
                      </a>
                    </div>
                    @forelse ($product->productImages as $image)
                      <div class="thumbnail">
                        <a href="{{ asset($image->image) }}" class="popup-zoom">
                          <img src="{{ asset($image->image) }}" alt="Product Images">
                        </a>
                      </div>
                    @empty
                    @endforelse
                  </div>
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
                </div>
              </div>
              <div class="col-lg-2 order-lg-1">
                <div class="product-small-thumb-3 small-thumb-wrapper">
                  <div class="small-thumb-img">
                    <img src="{{ asset($product->thumbnail) }}" alt="thumb image">
                  </div>
                  @forelse ($product->productImages as $image)
                    <div class="small-thumb-img">
                      <img src="{{ asset($image->image) }}" alt="thumb image">
                    </div>
                  @empty
                  @endforelse
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 mb--40">
            <div class="single-product-content">
              <div class="inner">
                <h2 class="product-title">{{ $product->name }}</h2>
                <span class="price-amount">
                  @if ($product->discount_price != null && $product->discount_price > 0)
                    <span class="price old-price text-decoration-line-through text-secondary">{{ $product->price }}৳</span>
                    <span class="price current-price">{{ $product->discount_price }}৳</span>
                  @else
                    <span class="price current-price">{{ $product->price }} TK</span>
                  @endif
                </span>
                <div class="product-rating">
                  <div class="star-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                  </div>
                  <div class="review-link">
                    <a href="#">(<span>2</span> customer reviews)</a>
                  </div>
                </div>
                <ul class="product-meta">
                  @if ($product->quantity > 0 && $product->in_stock == 1)
                    <li><i class="fal fa-check"></i>In Stock</li>
                  @else
                    <li><i class="fal fa-times text-danger"></i>Out of Stock</li>
                  @endif
                  <li><i class="fal fa-check"></i>Free delivery available</li>
                  <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li>
                </ul>
                <p class="description">{{ $product->short_desc }}</p>

                @if (count($productColors) > 1)
                  <div class="product-variations-wrapper">
                    <!-- Start Product Variation  -->
                    <div class="product-variation">
                      <h6 class="title">Colors:</h6>
                      <div class="color-variant-wrapper">
                        <ul class="color-variant">
                          @foreach ($productColors as $productColor)
                            <li>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="color" value="{{ $productColor }}"
                                  id="{{ $productColor }}">
                                <label class="form-check-label" for="{{ $productColor }}">
                                  {{ ucfirst($productColor) }}
                                </label>
                              </div>
                            </li>
                          @endforeach
                      </div>
                      </ul>
                    </div>
                  </div>
                @endif

                <!-- End Product Variation  -->
              </div>

              <!-- Start Product Action Wrapper  -->
              <div class="product-action-wrapper d-flex-center">
                <!-- Start Quentity Action  -->
                <div class="pro-qty"><input type="text" value="1"></div>
                <!-- End Quentity Action  -->

                <!-- Start Product Action  -->
                <ul class="product-action d-flex-center mb--0">
                  <li class="add-to-cart"><a href="cart.html" class="axil-btn btn-bg-primary">Add to Cart</a></li>
                  <li class="wishlist"><a href="wishlist.html" class="axil-btn wishlist-btn"><i
                        class="far fa-heart"></i></a></li>
                </ul>
                <!-- End Product Action  -->

              </div>
              <!-- End Product Action Wrapper  -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End .single-product-thumb -->

  <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
    <div class="container">
      <ul class="nav tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab"
            aria-controls="description" aria-selected="true">Description</a>
        </li>
        <li class="nav-item " role="presentation">
          <a id="additional-info-tab" data-bs-toggle="tab" href="#additional-info" role="tab"
            aria-controls="additional-info" aria-selected="false">Additional Information</a>
        </li>
        <li class="nav-item" role="presentation">
          <a id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
            aria-selected="false">Reviews</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
          <div class="product-desc-wrapper">
            <div>
              {!! Illuminate\Mail\Markdown::parse($product->long_desc) !!}
            </div>
            <!-- End .row -->
          </div>
          <!-- End .product-desc-wrapper -->
        </div>
        <div class="tab-pane fade" id="additional-info" role="tabpanel" aria-labelledby="additional-info-tab">
          <div class="product-additional-info">
            <div class="table-responsive">
              <table>
                <tbody>
                  <tr>
                    <th>Stand Up</th>
                    <td>35″L x 24″W x 37-45″H(front to back wheel)</td>
                  </tr>
                  <tr>
                    <th>Folded (w/o wheels) </th>
                    <td>32.5″L x 18.5″W x 16.5″H</td>
                  </tr>
                  <tr>
                    <th>Folded (w/ wheels) </th>
                    <td>32.5″L x 24″W x 18.5″H</td>
                  </tr>
                  <tr>
                    <th>Door Pass Through </th>
                    <td>24</td>
                  </tr>
                  <tr>
                    <th>Frame </th>
                    <td>Aluminum</td>
                  </tr>
                  <tr>
                    <th>Weight (w/o wheels) </th>
                    <td>20 LBS</td>
                  </tr>
                  <tr>
                    <th>Weight Capacity </th>
                    <td>60 LBS</td>
                  </tr>
                  <tr>
                    <th>Width</th>
                    <td>24″</td>
                  </tr>
                  <tr>
                    <th>Handle height (ground to handle) </th>
                    <td>37-45″</td>
                  </tr>
                  <tr>
                    <th>Wheels</th>
                    <td>Aluminum</td>
                  </tr>
                  <tr>
                    <th>Size</th>
                    <td>S, M, X, XL</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
          <div class="reviews-wrapper">
            <div class="row">
              <div class="col-lg-6 mb--40">
                <div class="axil-comment-area pro-desc-commnet-area">
                  <h5 class="title">01 Review for this product</h5>
                  <ul class="comment-list">
                    <!-- Start Single Comment  -->
                    <li class="comment">
                      <div class="comment-body">
                        <div class="single-comment">
                          <div class="comment-img">
                            <img src="assets/images/blog/author-image-4.png" alt="Author Images">
                          </div>
                          <div class="comment-inner">
                            <h6 class="commenter">
                              <a class="hover-flip-item-wrapper" href="#">
                                <span class="hover-flip-item">
                                  <span data-text="Cameron Williamson">Eleanor Pena</span>
                                </span>
                              </a>
                              <span class="commenter-rating ratiing-four-star">
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star empty-rating"></i></a>
                              </span>
                            </h6>
                            <div class="comment-text">
                              <p>“We’ve created a full-stack structure for our working workflow processes, were from the
                                funny the century initial all the made, have spare to negatives. ” </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <!-- End Single Comment  -->

                    <!-- Start Single Comment  -->
                    <li class="comment">
                      <div class="comment-body">
                        <div class="single-comment">
                          <div class="comment-img">
                            <img src="assets/images/blog/author-image-4.png" alt="Author Images">
                          </div>
                          <div class="comment-inner">
                            <h6 class="commenter">
                              <a class="hover-flip-item-wrapper" href="#">
                                <span class="hover-flip-item">
                                  <span data-text="Rahabi Khan">Courtney Henry</span>
                                </span>
                              </a>
                              <span class="commenter-rating ratiing-four-star">
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                              </span>
                            </h6>
                            <div class="comment-text">
                              <p>“We’ve created a full-stack structure for our working workflow processes, were from the
                                funny the century initial all the made, have spare to negatives. ”</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <!-- End Single Comment  -->

                    <!-- Start Single Comment  -->
                    <li class="comment">
                      <div class="comment-body">
                        <div class="single-comment">
                          <div class="comment-img">
                            <img src="assets/images/blog/author-image-5.png" alt="Author Images">
                          </div>
                          <div class="comment-inner">
                            <h6 class="commenter">
                              <a class="hover-flip-item-wrapper" href="#">
                                <span class="hover-flip-item">
                                  <span data-text="Rahabi Khan">Devon Lane</span>
                                </span>
                              </a>
                              <span class="commenter-rating ratiing-four-star">
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                                <a href="#"><i class="fas fa-star"></i></a>
                              </span>
                            </h6>
                            <div class="comment-text">
                              <p>“We’ve created a full-stack structure for our working workflow processes, were from the
                                funny the century initial all the made, have spare to negatives. ” </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <!-- End Single Comment  -->
                  </ul>
                </div>
                <!-- End .axil-commnet-area -->
              </div>
              <!-- End .col -->
              <div class="col-lg-6 mb--40">
                <!-- Start Comment Respond  -->
                <div class="comment-respond pro-des-commend-respond mt--0">
                  <h5 class="title mb--30">Add a Review</h5>
                  <p>Your email address will not be published. Required fields are marked *</p>
                  <div class="rating-wrapper d-flex-center mb--40">
                    Your Rating <span class="require">*</span>
                    <div class="reating-inner ml--20">
                      <a href="#"><i class="fal fa-star"></i></a>
                      <a href="#"><i class="fal fa-star"></i></a>
                      <a href="#"><i class="fal fa-star"></i></a>
                      <a href="#"><i class="fal fa-star"></i></a>
                      <a href="#"><i class="fal fa-star"></i></a>
                    </div>
                  </div>

                  <form action="#">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label>Other Notes (optional)</label>
                          <textarea name="message" placeholder="Your Comment"></textarea>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                          <label>Name <span class="require">*</span></label>
                          <input id="name" type="text">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                          <label>Email <span class="require">*</span> </label>
                          <input id="email" type="email">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-submit">
                          <button type="submit" id="submit" class="axil-btn btn-bg-primary w-auto">Submit
                            Comment</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- End Comment Respond  -->
              </div>
              <!-- End .col -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- woocommerce-tabs -->
  <!-- End Shop Area  -->

  <!-- Start Related Product Area  -->
  <div class="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30 pt-5">
    <div class="container">
      <div class="section-title-wrapper">
        <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> You May Also
          Like</span>
        <h2 class="title">Related Products</h2>
      </div>
      <div class="recent-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
        @forelse ($relatedProducts as $product)
          <div class="slick-single-layout">
            <div class="axil-product">
              <div class="thumbnail">
                <a href="single-product.html">
                  <img src="{{ asset($product->thumbnail) }}" alt="Product Images">
                </a>
                <div class="label-block label-right">
                  <div class="product-badget">20% OFF</div>
                </div>
                <div class="product-hover-action">
                  <ul class="cart-action">
                    <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                    <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                    <li class="quickview"><a href="#" data-bs-toggle="modal"
                        data-bs-target="#quick-view-modal" id="{{ $product->id }}" onclick="getProductDetails(this.id)"><i class="far fa-eye"></i></a></li>
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
          <span>No Related Product Found!</span>
        @endforelse
      </div>
    </div>
  </div>
  <!-- End Recently Viewed Product Area  -->
@endsection
