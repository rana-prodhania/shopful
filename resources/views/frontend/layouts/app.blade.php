<!doctype html>
<html class="no-js" lang="en">

<head>
  @include('frontend.layouts.partials.head')
</head>

<body>
  <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
  <!-- Start Header -->
  @include('frontend.layouts.partials.header')
  <!-- End Header -->

  <main class="main-wrapper">
    @yield('content')
  </main>


  <!-- Start Footer Area  -->
  @include('frontend.layouts.partials.footer')
  <!-- End Footer Area  -->

  <!-- JS
============================================ -->
  @include('frontend.layouts.partials.scripts')

</body>

</html>
