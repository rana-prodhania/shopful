@extends('admin.layouts.app')
@section('content')
  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row mb-4 justify-content-center">
        <div class="col-xxl">
          <div class="card mb-4 p-3">
            <div class="card-header px-0 m-0 d-flex justify-content-between">
              <div class="head-label">
                <h5 class="card-title mb-0 text-uppercase">
                  List of coupons
                </h5>
              </div>
              <div>
                <a href="{{ route('admin.coupon.create') }}"><button type="button" class="btn btn-primary">
                    Add Coupon
                  </button></a>
              </div>
            </div>
            <table id="example" class="table table-striped" style="width: 100%">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Code</th>
                  <th>Amount</th>
                  <th>Validity</th>
                  <th>Status</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($coupons as $index => $coupon)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->discount }}%</td>
                    <td>{{ $coupon->validity }}</td>
                    @if ($coupon->validity >= now())
                      <td><span class="badge rounded-pill bg-success">Valid</span></td>
                    @else
                      <td><span class="badge rounded-pill bg-danger">Expired</span></td>
                      
                    @endif
                    <td class="text-center">
                      <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.coupon.edit', $coupon->id) }}">
                        <i class="fs-5 bx bx-edit"></i>
                      </a>

                      <a onclick="destroy({{ $coupon->id }})" href="javascript:void(0)"
                        class="btn btn-sm btn-outline-danger">
                        <i class="fs-5 bx bx-trash"></i>
                      </a>

                      <form id="delete-form-{{ $coupon->id }}" action="{{ route('admin.coupon.destroy', $coupon->id) }}"
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
