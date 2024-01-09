@extends('admin.layouts.app')
@section('title', 'List of areas')
@section('content')
  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row mb-4 justify-content-center">
        <div class="col-xxl">
          <div class="card mb-4 p-3">
            <div class="card-header px-0 m-0 d-flex justify-content-between">
              <div class="head-label">
                <h5 class="card-title mb-0 text-uppercase">
                  List of Areas
                </h5>
              </div>
              <div>
                <a href="{{ route('admin.area.create') }}"><button type="button" class="btn btn-primary">
                    Add Area
                  </button></a>
              </div>
            </div>
            <table id="example" class="table table-striped" style="width: 100%">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>District</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($areas as $index => $area)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $area->name }}</td>
                    <td>{{ $area->slug }}</td>
                    <td>{{ $area->district->name }}</td>
                    <td class="text-center">
                      <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.area.edit', $area->id) }}">
                        <i class="fs-5 bx bx-edit"></i>
                      </a>

                      <a onclick="destroy({{ $area->id }})" href="javascript:void(0)"
                        class="btn btn-sm btn-outline-danger">
                        <i class="fs-5 bx bx-trash"></i>
                      </a>

                      <form id="delete-form-{{ $area->id }}" action="{{ route('admin.area.destroy', $area->id) }}"
                        method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('page_css')
  <link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/r-2.5.0/datatables.min.css" rel="stylesheet">
  <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet">
@endpush
@push('page_js')
  <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/r-2.5.0/datatables.min.js"></script>
  <script src="
              https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
              "></script>
  <script>
    $('#example').DataTable({
      responsive: true
    });

    function destroy(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {

        if (result.value) {
          $('#delete-form-' + id).submit();
        }
      });
    }
  </script>
@endpush
