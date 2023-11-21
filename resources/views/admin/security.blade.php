@extends('admin.layouts.app')
@section('title', 'Security')
@section('content')
<!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">
 
<div class="row">
  <div class="col-md-12">
  <!-- Change Password -->
  <div class="card mb-4">
   <h5 class="card-header">Change Password</h5>
   <div class="card-body">
     <form id="formAccountSettings" method="POST" action="{{ route('admin.security.update') }}">
       @csrf
       <div class="row mb-3 form-password-toggle">
          <div class="col-sm-2"><label class="form-label" for="currentPassword">Current Password</label></div>
           <div class="col-sm-10">
            <div class="input-group input-group-merge">
              <input class="form-control" value="{{ old('oldPassword') }}" type="password" name="oldPassword" id="currentPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              
            </div>
            @error('oldPassword')
              <span class="text-danger">{{ $message }}</span>
              @enderror
           </div>
       </div>
       <div class="row mb-3 form-password-toggle">
          <div class="col-sm-2">
            <label class="form-label" for="newPassword">New Password</label>
          </div>
           <div class="col-sm-10">
            <div class="input-group input-group-merge">
              <input value="{{ old('newPassword') }}" class="form-control" type="password" id="newPassword" name="newPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
             <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
             
            </div>
            @error('newPassword')
              <span class="text-danger">{{ $message }}</span>
              @enderror
           </div>
       </div>
       <div class="row mb-3 form-password-toggle">
          <div class="col-sm-2">
            <label class="form-label" for="confirmPassword">Confirm New Password</label>
          </div>
           <div class="col-sm-10">
            <div class="input-group input-group-merge">
              <input value="{{ old('confirmPassword') }}" class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              
            </div>
            @error('confirmPassword')
              <span class="text-danger">{{ $message }}</span>
              @enderror
           </div>
       </div>
         {{-- <div class="row justify-content-end">
          <div class="col-sm-10 mb-3">
            <p class="fw-medium">Password Requirements:</p>
            <ul class="ps-3 mb-0">
              <li class="mb-1">
                Minimum 8 characters long - the more, the better
              </li>
              <li class="mb-1">At least one lowercase character</li>
              <li>At least one number, symbol, or whitespace character</li>
            </ul>
          </div>
         </div> --}}
         <div class="row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" name="submit" class="btn btn-primary">
              Save
            </button>
          </div>
        </div>
       </div>
     </form>
   </div>
 </div>
 <!--/ Change Password -->
</div>
</div>
 
 
           </div>
           <!-- / Content -->
@endsection