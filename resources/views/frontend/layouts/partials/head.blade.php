<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>@yield('title') - {{ config('app.name') }}</title>
<meta name="robots" content="noindex, follow" />
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon.png') }}">

<!-- CSS
============================================ -->
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/font-awesome.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/flaticon/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/slick.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/slick-theme.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/sal.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/base.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.min.css') }}">

@stack('page-css')