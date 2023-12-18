@extends('frontend.layouts.app')
@section('title', 'Dashboard')
@section('content')
  <!-- Start Breadcrumb Area  -->
  <div class="axil-breadcrumb-area">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-8">
          <div class="inner">
            <ul class="axil-breadcrumb">
              <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="separator"></li>
              <li class="axil-breadcrumb-item active" aria-current="page">My Account</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumb Area  -->

  <!-- Start My Account Area  -->
  <div class="axil-dashboard-area axil-section-gap">
    <div class="container">
      <div class="axil-dashboard-warp">

        <div class="row">
          <div class="col-xl-3 col-md-4">
            <aside class="axil-dashboard-aside">
              <nav class="axil-dashboard-nav">
                <div class="nav nav-tabs" role="tablist">
                  <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard" role="tab"
                    aria-selected="true"><i class="fas fa-th-large"></i>Dashboard</a>
                  <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab"
                    aria-selected="false"><i class="fas fa-shopping-basket"></i>Orders</a>
                  <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-downloads" role="tab"
                    aria-selected="false"><i class="fas fa-file-download"></i>Downloads</a>
                  <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-address" role="tab"
                    aria-selected="false"><i class="fas fa-home"></i>Addresses</a>
                  <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab"
                    aria-selected="false"><i class="fas fa-user"></i>Account Details</a>
                  <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-password" role="tab"
                    aria-selected="false"><i class="fas fa-lock"></i>Change Password</a>
                  <a class="nav-item nav-link" href="{{ route('profile.destroy') }}"><i class="fal fa-sign-out"></i>Logout</a>
                </div>
              </nav>
            </aside>
          </div>
          <div class="col-xl-9 col-md-8">
            <div class="tab-content">

              <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                <div class="axil-dashboard-overview">
                  <div class="axil-dashboard-author">
                    <div class="media">
                      <div class="thumbnail w-50">
                        <img src="{{ asset(auth()->user()->image ?? 'uploads/profile/default.png') }}" alt="Hello Annie"
                          class="img-fluid w-25">
                      </div>
                      <div class="media-body">
                        <h5 class="title mb-0">Hello {{ auth()->user()->name }}</h5>
                        <span class="joining-date">eTrade Member Since Sep 2020</span>
                      </div>
                    </div>
                  </div>
                  <p>From your account dashboard you can view your recent orders, manage your shipping and billing
                    addresses, and edit your password and account details.</p>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                <div class="axil-dashboard-order">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Order</th>
                          <th scope="col">Date</th>
                          <th scope="col">Status</th>
                          <th scope="col">Total</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">#6523</th>
                          <td>September 10, 2020</td>
                          <td>Processing</td>
                          <td>$326.63 for 3 items</td>
                          <td><a href="#" class="axil-btn view-btn">View</a></td>
                        </tr>
                        <tr>
                          <th scope="row">#6523</th>
                          <td>September 10, 2020</td>
                          <td>On Hold</td>
                          <td>$326.63 for 3 items</td>
                          <td><a href="#" class="axil-btn view-btn">View</a></td>
                        </tr>
                        <tr>
                          <th scope="row">#6523</th>
                          <td>September 10, 2020</td>
                          <td>Processing</td>
                          <td>$326.63 for 3 items</td>
                          <td><a href="#" class="axil-btn view-btn">View</a></td>
                        </tr>
                        <tr>
                          <th scope="row">#6523</th>
                          <td>September 10, 2020</td>
                          <td>Processing</td>
                          <td>$326.63 for 3 items</td>
                          <td><a href="#" class="axil-btn view-btn">View</a></td>
                        </tr>
                        <tr>
                          <th scope="row">#6523</th>
                          <td>September 10, 2020</td>
                          <td>Processing</td>
                          <td>$326.63 for 3 items</td>
                          <td><a href="#" class="axil-btn view-btn">View</a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-downloads" role="tabpanel">
                <div class="axil-dashboard-order">
                  <p>You don't have any download</p>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-address" role="tabpanel">
                <div class="axil-dashboard-address">
                  <p class="notice-text">The following addresses will be used on the checkout page by default.</p>
                  <div class="row row--30">
                    <div class="col-lg-6">
                      <div class="address-info mb--40">
                        <div class="addrss-header d-flex align-items-center justify-content-between">
                          <h4 class="title mb-0">Shipping Address</h4>
                          <a href="#" class="address-edit"><i class="far fa-edit"></i></a>
                        </div>
                        <ul class="address-details">
                          <li>Name: Annie Mario</li>
                          <li>Email: annie@example.com</li>
                          <li>Phone: 1234 567890</li>
                          <li class="mt--30">7398 Smoke Ranch Road <br>
                            Las Vegas, Nevada 89128</li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="address-info">
                        <div class="addrss-header d-flex align-items-center justify-content-between">
                          <h4 class="title mb-0">Billing Address</h4>
                          <a href="#" class="address-edit"><i class="far fa-edit"></i></a>
                        </div>
                        <ul class="address-details">
                          <li>Name: Annie Mario</li>
                          <li>Email: annie@example.com</li>
                          <li>Phone: 1234 567890</li>
                          <li class="mt--30">7398 Smoke Ranch Road <br>
                            Las Vegas, Nevada 89128</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-account" role="tabpanel">
                <div class="col-lg-9">
                  <div class="axil-dashboard-account">
                    <form class="account-details-form" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                            @error('name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}">
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control" value="{{ auth()->user()->phone }}">
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="{{ auth()->user()->address }}">
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label>Image</label>
                            <input type="file" data-default-file="{{ asset(auth()->user()->image) }}"
                              class="form-control dropify"
                              data-allowed-file-extensions="jpg jpeg png webp" data-max-file-size="1M" name="image"
                              id="image" />
                          </div>
                        </div>
                        <div class="form-group mb--0">
                          <input type="submit" class="axil-btn" value="Save Changes">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-password" role="tabpanel">
                <div class="col-lg-9">
                  <div class="axil-dashboard-account">
                    <form class="account-details-form" method="post" action="{{ route('password.update') }}">
                      @csrf
                      @method('PUT')
                      <div class="row">
                        <div class="col-12">
                          <h5 class="title">Password Change</h5>
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="current_password" class="form-control" value="">
                            @error('current_password')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label>Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                            @error('password_confirmation')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="form-group mb--0">
                            <input type="submit" class="axil-btn" value="Save Changes">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End My Account Area  -->
@endsection
@push('page-css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
@endpush
@push('page-js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.dropify').dropify();
    })
  </script>
@endpush
