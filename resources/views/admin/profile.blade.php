@extends('admin.layouts.app')
@section('title', 'Profile Details')
@section('content')
<!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">
 
 <div class="row">
   <div class="col-md-12">
     <div class="card mb-4">
       <h5 class="card-header">Profile Details</h5>
       <!-- Account -->
       <div class="card-body">
         <form id="formAccountSettings" method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
           @csrf
          <div class="row mb-3">
            <div class="col-sm-2">
              <label for="name" class="form-label">Profile Pic</label>
            </div>
            <div class="col-sm-10 w-25">
              <input type="file" data-default-file="{{ asset(auth()->user()->image ??'uploads/profile/default.png') }}" class="form-control dropify"  data-min-width="200" data-allowed-file-extensions="jpg jpeg png webp" data-max-file-size="1M"
                name="image" id="image" />
              @error('image')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-2">
              <label for="name" class="form-label">Name</label>
            </div>
            <div class="col-sm-10">
              <input class="form-control" type="text" id="name" name="name" value="{{ auth()->user()->name }}" autofocus />
              @error('name')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
           <div class="row mb-3">
            <div class="col-sm-2">
              <label for="name" class="form-label">E-mail</label>
            </div>
            <div class="col-sm-10">
              <input class="form-control" type="text" id="email" name="email" value="{{ auth()->user()->email }}" placeholder="john.doe@example.com" />
              @error('email')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" name="submit" class="btn btn-primary">
                Save
              </button>
            </div>
          </div>
         </form>
       </div>
       <!-- /Account -->
     </div>
 </div>
 
 
           </div>
           <!-- / Content -->
@endsection
@push('page_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
@endpush
@push('page_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
  $('.dropify').dropify();
</script>
@endpush