<!doctype html>
<html class="no-js" lang="en">

<head>
  @section('title', 'Forgot Password')
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
          <a href="{{ route('login') }}" class="back-btn"><i class="far fa-angle-left"></i></a>
        </div>
        <div class="col-xl-6 col-lg-4 col-sm-6">
          <div class="singin-header-btn">
            <p>Already a member?</p>
            <a href="{{ route('login') }}" class="sign-up-btn axil-btn btn-bg-secondary">Sign In</a>
          </div>
        </div>
      </div>
    </div>
    <!-- End Header -->

    <!-- Session Status -->


    <div class="row">
      <div class="col-lg-11 offset-xl-1">
        <div class="axil-signin-form-wrap">
          <div class="axil-signin-form">
            <h3 class="title">Forgot Password?</h3>
            <p class="b2 mb--55">Enter the email address you used when you joined and we’ll send you instructions to
              reset your password.</p>

            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form class="singin-form" method="POST" action="{{ route('password.email') }}">
              @csrf
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                @error('email')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Send Password Reset Link</button>
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
