<!-- Product Quick View Modal Start -->
<div class="modal fade quick-view-product" id="quick-view-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
            class="far fa-times"></i></button>
      </div>
      <div class="modal-body">
        <div class="single-product-thumb">
          <div class="row">
            <div class="col-lg-7 mb--40">
              <div class="row">
                <div class="col-lg-10 order-lg-2">
                  <div
                    class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery">
                    <div class="thumbnail product-thumbnail">
                      <div class="label-block label-right">
                        <div class="product-badget" id="product-discount"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-2 order-lg-1">
                  <div class="product-small-thumb small-thumb-wrapper">
                    <div class="small-thumb-img product-thumbnail">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5 mb--40">
              <div class="single-product-content">
                <div class="inner">
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
                  <h3 class="product-title" id="product-title"></h3>
                  <span class="price-amount" id="price-amount">
                    <span class="price old-price text-decoration-line-through text-secondary" id="price-old"></span>
                    <span class="price current-price" id="price-new"></span>
                  </span>
                  <ul class="product-meta">
                    <li id="stock"></li>
                    <li><i class="fal fa-check"></i>Free delivery available</li>
                    <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li>
                  </ul>
                  <p class="description" id="short-desc"></p>
                  <div class="product-variations-wrapper">

                    <!-- Start Product Variation  -->
                    <div class="product-variation">
                      <h6 class="title">Colors:</h6>
                      <div class="color-variant-wrapper">
                        <ul class="color-variant mt--0">
                          <li class="color-extra-01 active"><span><span class="color"></span></span>
                          </li>
                          <li class="color-extra-02"><span><span class="color"></span></span>
                          </li>
                          <li class="color-extra-03"><span><span class="color"></span></span>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- End Product Variation  -->
                  </div>
                  <!-- Start Product Action Wrapper  -->
                  {{-- <form id="add-to-cart-form" action="{{ route('frontend.cart.store',$product->id) }}" method="POST">
                  @csrf --}}
                  <div class="product-action-wrapper d-flex-center">
                    <!-- Start Quentity Action  -->
                    <div class="pro-qty">
                      <input type="number" id="quantity" name="quantity">
                    </div>
                    <!-- End Quentity Action  -->

                    <!-- Start Product Action  -->
                    <ul class="product-action d-flex-center mb--0">
                      <li class="add-to-cart">
                        {{-- <button type="submit" class="axil-btn btn-bg-primary">Add to Cart</button> --}}
                        <a href="javascript:void(0)" onclick="addToCart({{ $product->id??null }})" class="axil-btn btn-bg-primary">Add to Cart</a>
                      </li>
                      <li class="wishlist"><a href="wishlist.html" class="axil-btn wishlist-btn"><i
                            class="far fa-heart"></i></a></li>
                    </ul>
                    <!-- End Product Action  -->

                  </div>
                {{-- </form> --}}
                  <!-- End Product Action Wrapper  -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Product Quick View Modal End -->

<!-- Header Search Modal End -->
<div class="header-search-modal" id="header-search-modal">
  <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
  <div class="header-search-wrap">
    <div class="card-header">
      <form action="#">
        <div class="input-group">
          <input type="search" class="form-control" name="prod-search" id="prod-search"
            placeholder="Write Something....">
          <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
        </div>
      </form>
    </div>
    <div class="card-body">
      <div class="search-result-header">
        <h6 class="title">24 Result Found</h6>
        <a href="shop.html" class="view-all">View All</a>
      </div>
      <div class="psearch-results">
        <div class="axil-product-list">
          <div class="thumbnail">
            <a href="single-product.html">
              <img src="assets/images/product/electric/product-09.png" alt="Yantiti Leather Bags">
            </a>
          </div>
          <div class="product-content">
            <div class="product-rating">
              <span class="rating-icon">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fal fa-star"></i>
              </span>
              <span class="rating-number"><span>100+</span> Reviews</span>
            </div>
            <h6 class="product-title"><a href="single-product.html">Media Remote</a></h6>
            <div class="product-price-variant">
              <span class="price current-price">$29.99</span>
              <span class="price old-price">$49.99</span>
            </div>
            <div class="product-cart">
              <a href="cart.html" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
              <a href="wishlist.html" class="cart-btn"><i class="fal fa-heart"></i></a>
            </div>
          </div>
        </div>
        <div class="axil-product-list">
          <div class="thumbnail">
            <a href="single-product.html">
              <img src="assets/images/product/electric/product-09.png" alt="Yantiti Leather Bags">
            </a>
          </div>
          <div class="product-content">
            <div class="product-rating">
              <span class="rating-icon">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fal fa-star"></i>
              </span>
              <span class="rating-number"><span>100+</span> Reviews</span>
            </div>
            <h6 class="product-title"><a href="single-product.html">Media Remote</a></h6>
            <div class="product-price-variant">
              <span class="price current-price">$29.99</span>
              <span class="price old-price">$49.99</span>
            </div>
            <div class="product-cart">
              <a href="cart.html" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
              <a href="wishlist.html" class="cart-btn"><i class="fal fa-heart"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Header Search Modal End -->



<div class="cart-dropdown" id="cart-dropdown">
  <div class="cart-content-wrap">
    <div class="cart-header">
      <h2 class="header-title">Cart review</h2>
      <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
    </div>
    <div class="cart-body">
      <ul class="cart-item-list" >
        <div id="productCart">
        </div>
      </ul>
    </div>
    <div class="cart-footer">
      <h3 class="cart-subtotal">
        <span class="subtotal-title">Subtotal:</span>
        <span class="subtotal-amount" id="cart-subtotal"></span>
      </h3>
      <div class="group-btn">
        <a href="{{ route('frontend.cart') }}" class="axil-btn btn-bg-primary viewcart-btn">View Cart</a>
        <a href="{{ route('frontend.checkout') }}" class="axil-btn btn-bg-secondary checkout-btn">Checkout</a>
      </div>
    </div>
  </div>
</div>
