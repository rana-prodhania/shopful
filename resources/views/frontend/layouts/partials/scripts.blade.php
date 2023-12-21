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
{{-- Custom JS --}}

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
  $ajaxSetup = {
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }

  function getProductDetails(id) {
    $.ajax({
      url: "{{ url('/product/view') }}" + '/' + id,
      type: 'get',
      success: function(data) {
        console.log(data.thumbnail);
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
          var imageUrl = assetBaseUrl + data.thumbnail;
          
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
</script>
@stack('page-js')
