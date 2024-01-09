@extends('admin.layouts.app')
@section('title', 'Edit District')
@section('content')
  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row mb-4 justify-content-center">
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Edit District</h5>
              <a href="{{ route('admin.district.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
            </div>
            <div class="card-body mt-4">
              <form action="{{ route('admin.district.update',$district->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 row ecommerce-select2-dropdown">
                  <div class="col-sm-2">
                    <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="division-org">
                      <span>Select Division</span>
                    </label>
                  </div>

                  <div class="col-sm-10">
                    <select id="category-org" name="division" class="select2 form-select"
                      data-placeholder="Select division">
                      <option value="">Select division</option>
                      @foreach ($divisions as $division)
                        <option @if ($division->id == $district->division_id) selected @endif value="{{ $division->id }}">{{ $division->name }}</option>
                      @endforeach
                    </select>
                    @error('division')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="name" class="form-label">District name</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text"
                      class="form-control"placeholder="Enter District Name" name="name" value="{{ $district->name }}" id="name" />
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
