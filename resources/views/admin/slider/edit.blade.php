@extends('admin.layouts.app')
@section('content')
  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row mb-4 justify-content-center">
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Edit Slider</h5>
              <a href="{{ route('admin.slider.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
            </div>
            <div class="card-body mt-4">
              <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="name" class="form-label">Slider Title <span class="text-danger">*</span></label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" value="{{ $slider->title??old('title') }}" class="form-control"placeholder="Enter Slider Title"
                      name="title" id="name" />
                    @error('title')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="name" class="form-label">Slider Url</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" value="{{ $slider->url??old('title') }}" class="form-control"placeholder="Enter Slider Url"
                      name="url" id="name" />
                    @error('url')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-2">
                    <label for="name" class="form-label">Slider Image <span class="text-danger">*</span></label>
                  </div>
                  <div class="col-sm-10">
                    <input type="file" data-default-file="{{ asset($slider->image) }}" class="form-control dropify"
                      data-min-width="500" data-allowed-file-extensions="jpg jpeg png webp"
                      data-max-file-size="1M" name="image" id="image" />
                    @error('image')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="mb-3 row ecommerce-select2-dropdown">
                  <div class="col-sm-2">
                    <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="category-org">
                      <span>Product Status</span>
                    </label>
                  </div>
                  <div class="col-sm-10">
                      <select id="status-org" name="status" class="select2 form-select" data-placeholder="Status">
                        <option {{ $slider->status == 1 ? 'selected' : '' }} value="1">Active</option>
                        <option {{ $slider->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                      </select>
                    @error('status')
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
  <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/select2/select2.css') }}">
@endpush
@push('page_js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
  <script src="{{ asset('backend/assets/vendor/libs/select2/select2.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('.dropify').dropify();
    $('.select2').select2();
    })
  </script>
@endpush
