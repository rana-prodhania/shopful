@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
 <div class="container-xxl flex-grow-1 container-p-y">
   <div class="row mb-4 justify-content-center">
     <div class="col-xxl">
       <div class="card mb-4">
         <div class="card-header border-bottom d-flex align-items-center justify-content-between">
           <h5 class="mb-0">Edit Category</h5>
           <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
         </div>
         <div class="card-body mt-4">
           <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('PUT')
             <div class="row mb-3">
               <div class="col-sm-2">
                 <label for="name" class="form-label">Category Name</label>
               </div>
               <div class="col-sm-10">
                 <input type="text" value="{{ $category->name??old('name') }}" class="form-control"placeholder="Enter Category Name"
                   name="name" id="name" />
                 @error('name')
                 <span class="text-danger">{{ $message }}</span>
                 @enderror
               </div>
             </div>
             <div class="row mb-3">
              <div class="col-sm-2">
                <label for="name" class="form-label">Category Image</label>
              </div>
              <div class="col-sm-10 w-25">
                <input type="file" data-default-file="{{ asset($category->image)??old('image') }}"  class="form-control dropify"placeholder="Enter Category Name"  data-allowed-file-extensions="jpg jpeg png webp" data-max-file-size="1M"
                  name="image" id="image" />
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>

             <div class="row justify-content-end">
               <div class="col-sm-10">
                 <button type="submit" name="submit" class="btn btn-primary">
                   Submit
                 </button>
               </div>
             </div>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
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