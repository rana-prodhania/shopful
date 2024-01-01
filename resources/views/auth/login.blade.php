<!doctype html>
<html class="no-js" lang="en">

<head>
  @section('title', 'Login')
  @include('frontend.layouts.partials.head')
  
</head>


<body>
  <div class="axil-signin-area">

    <!-- Start Header -->
    <div class="signin-header">
      <div class="row align-items-center">
        <div class="col-sm-4">
          <a href="{{ route('frontend.home') }}" class="site-logo"><img src="{{ asset('frontend/assets/images/logo/logo.png') }}" alt="logo"></a>
        </div>
        <div class="col-sm-8">
          <div class="singin-header-btn">
            <p>Not a member?</p>
            <a href="{{ route('register') }}" class="axil-btn btn-bg-secondary sign-up-btn">Sign Up Now</a>
          </div>
        </div>
      </div>
    </div>
    <!-- End Header -->

    <div class="row">
      <div class="col-lg-11 offset-xl-1 ">
        <div class="axil-signin-form-wrap">
          <div class="axil-signin-form">
            <h3 class="title">Sign in to eTrade.</h3>
            <p class="b2 mb--55">Enter your detail below</p>
            <form class="singin-form" method="POST" action="{{ route('login') }}">
              @csrf
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
              
              
              <div class="form-group d-flex align-items-center justify-content-between">
                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Sign In</button>
                <a href="{{ route('password.request') }}" class="forgot-btn">Forget password?</a>
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
