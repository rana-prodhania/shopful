@extends('admin.layouts.app')
@section('title', 'Add Area')
@section('content')
  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row mb-4 justify-content-center">
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header border-bottom d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Add Area</h5>
              <a href="{{ route('admin.area.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
            </div>
            <div class="card-body mt-4">
              <form action="{{ route('admin.area.store') }}" method="POST">
                @csrf
                <div class="mb-3 row ecommerce-select2-dropdown">
                  <div class="col-sm-2">
                    <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="district-org">
                      <span>Select Division</span>
                    </label>
                  </div>

                  <div class="col-sm-10">
                    <select id="division" name="division_id" class="select2 form-select" data-placeholder="Select Division">
                      <option value="">Select Division</option>
                      @forelse ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                      @empty
                        <option value="0">No Division Found!</option>
                      @endforelse
                    </select>
                    @error('division')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="mb-3 row ecommerce-select2-dropdown">
                  <div class="col-sm-2">
                    <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="district-org">
                      <span>Select District</span>
                    </label>
                  </div>

                  <div class="col-sm-10">
                    <select id="district" name="district_id" class="select2 form-select"
                      data-placeholder="Select District">
                      <option value="">Select District</option>
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
                    <input type="text" value="{{ old('name') }}" class="form-control"placeholder="Enter Area Name"
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

      // Load District
      $("#division").on("change", function() {
        const division_id = $("#division").val();
        console.log(division_id);
        if (division_id) {
          loadDistrict(division_id);
        } else {
          $("#district").empty();
        }
      });

      function loadDistrict(division_id) {
        $.ajax({
          url: "{{ url('/admin/district/ajax/') }}/" + division_id,
          type: "GET",
          success: function(data) {
            console.log(data);
            $("#district").empty();
            $.each(data, function(key, value) {
              $("#district").append(
                '<option  value="' +
                value.id +
                '">' +
                value.name +
                "</option>"
              );
            });
          }
        });
      }
    });
  </script>
@endpush
