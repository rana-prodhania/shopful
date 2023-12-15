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
        <div class="col-md-6">
          <a href="index.html" class="site-logo"><img src="{{ asset('frontend/assets/images/logo/logo.png') }}"
              alt="logo"></a>
        </div>
        <div class="col-md-6">
          <div class="singin-header-btn">
            <p>Already a member?</p>
            <a href="{{ route('login') }}" class="axil-btn btn-bg-secondary sign-up-btn">Sign In</a>
          </div>
        </div>
      </div>
    </div>
    <!-- End Header -->

    <div class="row">
      <div class="col-lg-11 offset-xl-1">
        <div class="axil-signin-form-wrap">
          <div class="axil-signin-form">
            <h3 class="title">I'm New Here</h3>
            <p class="b2 mb--55">Enter your detail below</p>
            <form class="singin-form" method="POST" action="{{ route('register') }}">
              @csrf
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                @error('name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                @error('email')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password') }}">
                @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Create Account</button>
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
