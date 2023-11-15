@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
 <div class="container-xxl flex-grow-1 container-p-y">
   <div class="row mb-4 justify-content-center">
     <div class="col-xxl">
       <div class="card mb-4">
         <div class="card-header d-flex align-items-center justify-content-between">
           <h5 class="mb-0">Add Sub Category</h5>
           <a href="{{ route('admin.sub-category.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
         </div>
         <div class="card-body">
           <form action="{{ route('admin.sub-category.store') }}" method="POST">
             @csrf
             <div class="mb-3 row ecommerce-select2-dropdown">
              <div class="col-sm-2">
                <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="category-org">
                  <span>Select Category</span>
                </label>
              </div>
              
              <div class="col-sm-10">
                <select id="category-org" name="category" class="select2 form-select" data-placeholder="Select Category">
                  <option value="">Select Category</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
                @error('category')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
             <div class="row mb-3">
               <div class="col-sm-2">
                 <label for="name" class="form-label">Sub Category Name</label>
               </div>
               <div class="col-sm-10">
                 <input type="text" value="{{ old('name') }}" class="form-control"placeholder="Enter Sub Category Name"
                   name="name" id="name" />
                 @error('name')
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
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/select2/select2.css') }}">
@endpush
@push('page_js')
<script src="{{ asset('backend/assets/vendor/libs/select2/select2.js') }}"></script>
<script>
  $(document).ready(function() {
    $('.select2').select2();
});
</script>
@endpush