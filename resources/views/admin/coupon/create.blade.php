@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
 <div class="container-xxl flex-grow-1 container-p-y">
   <div class="row mb-4 justify-content-center">
     <div class="col-xxl">
       <div class="card mb-4">
         <div class="card-header border-bottom d-flex align-items-center justify-content-between">
           <h5 class="mb-0">Add Coupon</h5>
           <a href="{{ route('admin.coupon.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
         </div>
         <div class="card-body mt-4">
           <form action="{{ route('admin.coupon.store') }}" method="POST">
             @csrf
             <div class="row mb-3">
               <div class="col-sm-2">
                 <label for="name" class="form-label">Coupon Code</label>
               </div>
               <div class="col-sm-10">
                 <input type="text" value="{{ old('code') }}" class="form-control"placeholder="Enter Coupon Code"
                   name="code" id="name" />
                 @error('code')
                 <span class="text-danger">{{ $message }}</span>
                 @enderror
               </div>
             </div>
             <div class="row mb-3">
               <div class="col-sm-2">
                 <label for="name" class="form-label">Coupon Discount</label>
               </div>
               <div class="col-sm-10">
                 <input type="number" value="{{ old('code') }}" class="form-control"placeholder="Enter Coupon Discount"
                   name="discount" id="name" />
                 @error('discount')
                 <span class="text-danger">{{ $message }}</span>
                 @enderror
               </div>
             </div>
             <div class="row mb-3">
               <div class="col-sm-2">
                 <label for="name" class="form-label">Coupon Validity</label>
               </div>
               <div class="col-sm-10">
                 <input type="date" value="{{ old('validity') }}" class="form-control"placeholder="Enter Coupon Discount"
                   name="validity" id="name" />
                 @error('validity')
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