<!-- Modernizer JS -->
<script src="{{ asset('frontend/assets/js/vendor/modernizr.min.js') }}"></script>
<!-- jQuery JS -->
<script src="{{ asset('frontend/assets/js/vendor/jquery.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('frontend/assets/js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/slick.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/js.cookie.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/jquery.style.switcher.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/jquery-ui.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/sal.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/counterup.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/waypoints.min.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{-- Custom JS --}}
<script>
  toastr.options.progressBar = true;
</script>

<script>
  $(document).ready(function() {
    $('.header-department').on('mouseenter', function() {
      $('.department-nav-menu').removeClass('d-none').addClass('d-block');

    })
    $('.header-department').on('mouseleave', function() {
      $('.department-nav-menu').removeClass('d-block').addClass('d-none');
    })


  });
</script>
<script type="text/javascript">
  const assetBaseUrl = "{{ asset('') }}";
  const crsfToken = "{{ csrf_token() }}";

  // get product details
  function getProductDetails(id) {
    $.ajax({
      url: "{{ url('/product/view') }}" + '/' + id,
      success: function(data) {
        $('#product-title').text(data.name);
        if (data.discount_price != null) {
          $('#price-old').text(data.price + '৳');
          $('#price-new').text(data.discount_price + '৳');
        } else {
          $('#price-new').text(data.price + '৳');
        }

        if (data.quantity > 0 && data.in_stock == 1) {
          $('#stock').html('<i class="fal fa-check"></i>In Stock');
        } else {
          $('#stock').html('<i class="fal fa-times text-danger"></i>Out of Stock');
        }
        $('#short-desc').text(data.short_desc);

        const discountPercentage = ((data.price - data.discount_price) / data.price) * 100;


        if (data.thumbnail) {
          const imageUrl = assetBaseUrl + data.thumbnail;

          $('.product-thumbnail').html('<img class="thumb-img" src="' + imageUrl + '" alt="Product Image">');
        }


        if (data.discount_price != null) {
          $('#product-discount').text(Math.round(discountPercentage) + '% OFF');
        } else {
          $('#product-discount').text('New');
        }
      }
    })
  }

  viewCart()

  // add to cart
  function addToCart(id) {
    $.ajax({
      type: 'POST',
      url: "{{ url('/cart/add') }}",
      data: {
        _token: crsfToken,
        id: id
      },
      success: function(response) {
        if (response.status === 'success') {
          toastr.success(response.message, 'Success');
        }
        viewCart()
      }
    })
  }

  // view cart
  function viewCart() {
    $.ajax({
      url: "{{ url('/cart/view') }}",
      success: function(data) {
        $('#cart-count').text(data.cartQty);
        let productCart = ""
        $('#productCart').html("")
        if (data.cartQty > 0) {
          $.each(data.carts, function(key, value) {
            const imageUrl = assetBaseUrl + value.options.image
            productCart += `
            <li class="cart-item">
            <div class="item-img">
              <a href="single-product.html"><img src="${imageUrl}"
                alt="product image"></a>
            <a class="close-btn" type="submit" id="${value.rowId}" onclick="deleteCart(this.id)"><i class="fas fa-times text-danger pt-3 ps-3"></i></a>
          </div>
          <div class="item-content">
            
            <h3 class="item-title"><a id="cart-title" href="single-product-3.html">${value.name}</a></h3>
            <div class="item-price">${value.price}<span class="currency-symbol">৳</span></div>
            <div class="pro-qty item-quantity">
              <span class="dec qtybtn">-</span>
              <input type="number" class="quantity-input" value="${value.qty}">
              <span class="inc qtybtn">+</span>
            </div>
          </div>
          </li>
          `
            $('#productCart').html(productCart)
          });
        }
        $('#cart-subtotal').text(data.cartTotal + '৳');
      }
    })
  }

  // delete cart
  function deleteCart(rowId) {
    $.ajax({
      url: "{{ url('/cart/delete') }}" + '/' + rowId,
      success: function(response) {
        if (response.status === 'success') {
          toastr.success(response.message, 'Success');
        }
        viewCart()
        
      }
    })
  }

  // add to wishlist
  function addToWishlist(id) {
    $.ajax({
      type: 'POST',
      url: "{{ url('/wishlist/add') }}",
      data: {
        _token: crsfToken,
        id: id
      },
      success: function(response) {
        if (response.status === 'success') {
          toastr.success(response.message, 'Success');
        } else if (response.status === 'exists') {
          toastr.warning(response.message, 'Warning');        
        } else {
          console.log('Unexpected response');
        }
      },
      error: function(response) {
        if(response.status === 401){
          window.location.href = "{{ route('login') }}";
          // toastr.error('Please login first');
        }
      }
    })
  }
</script>

@stack('page-js')
