@extends('admin.layouts.app')
@section('title', 'Edit Area')
@section('content')
  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row mb-4 justify-content-center">
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Edit Area</h5>
              <a href="{{ route('admin.area.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
            </div>
            <div class="card-body mt-4">
              <form action="{{ route('admin.area.update',$area->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 row ecommerce-select2-dropdown">
                  <div class="col-sm-2">
                    <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="district-org">
                      <span>Select District</span>
                    </label>
                  </div>

                  <div class="col-sm-10">
                    <select id="category-org" name="district" class="select2 form-select"
                      data-placeholder="Select District">
                      <option value="">Select District</option>
                      @foreach ($districts as $district)
                        <option @if ($district->id == $area->district_id) selected @endif value="{{ $district->id }}">{{ $district->name }}</option>
                      @endforeach
                    </select>
                    @error('district')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="name" class="form-label">area name</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" value="{{ $area->name??old('name') }}"
                      class="form-control"placeholder="Enter area Name" name="name" id="name" />
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
