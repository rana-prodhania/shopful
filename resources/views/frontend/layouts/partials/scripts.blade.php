<!-- Modernizer JS -->
<script src="{{ asset('frontend/assets/js/vendor/modernizr.min.js') }}"></script>
<!-- jQuery JS -->
<script src="{{ asset('frontend/assets/js/vendor/jquery.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('frontend/assets/js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/slick.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/vendor/js.cookie.js') }}"></script>
<!-- <script src="assets/js/vendor/jquery.style.switcher.js"></script> -->
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
@stack('page-js')
