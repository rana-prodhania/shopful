<!doctype html>
<html class="no-js" lang="en">

<head>
  @include('frontend.layouts.partials.head')
</head>


<body>
  <div class="axil-signin-area">
    <!-- Start Header -->
    <div class="signin-header">
      <div class="row align-items-center">
        <div class="col-xl-4 col-sm-6">
          <a href="index.html" class="site-logo"><img src="{{ asset('frontend/assets/images/logo/logo.png') }}"
              alt="logo"></a>
        </div>
        <div class="col-md-2 d-lg-block d-none">
          <a href="{{ route('password.request') }}" class="back-btn"><i class="far fa-angle-left"></i></a>
        </div>
        <div class="col-xl-6 col-lg-4 col-sm-6">
          <div class="{{ route('login') }}">
            <p>Already a member? <a href="sign-in.html" class="sign-in-btn">Sign In</a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- End Header -->

    <div class="row">
      <div class="col-xl-4 col-lg-6">
        <div class="axil-signin-banner bg_image bg_image--10">
          <h2 class="title">We Offer the Best Products</h2>
        </div>
      </div>
      <div class="col-lg-6 offset-xl-2">
        <div class="axil-signin-form-wrap">
          <div class="axil-signin-form">
            <h3 class="title mb--35">Reset Password</h3>
            <form class="singin-form" method="POST" action="{{ route('password.store') }}">
              @csrf
              <!-- Password Reset Token -->
              <input type="hidden" name="token" value="{{ $request->route('token') }}">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', $request->email) }}">
                @error('email')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label>New password</label>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                @error('password')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label>Confirm password</label>
                <input type="password" class="form-control" name="password_confirmation"
                  value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Resrt Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JS
============================================ -->
  @include('frontend.layouts.partials.scripts')
</body>

</html>
