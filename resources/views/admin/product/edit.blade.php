@extends('admin.layouts.app')
@section('title', 'Edit Product')
@section('content')
  <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="app-ecommerce">
        <div class="card mb-4">
          <div class="card-header border-bottom d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Product</h5>
            <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
          </div>

          <form action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data" method="POST"
            id="myForm">
            @csrf
            @method('PUT')
            <div class="row mt-0">
              <!-- First column-->
              <div class="col-12 col-lg-8">
                <!-- Product Information -->
                <div class="">
                  <div class="card-body">
                    {{-- Product Name --}}
                    <div class="mb-3 form-group">
                      <label class="form-label" for="name">Name <span class="text-danger">*</span>
                      </label>
                      <input type="text" class="form-control" id="name" placeholder="Product name" name="name"
                        aria-label="Product title" value="{{ $product->name }}">
                      @error('name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    {{-- Product Code and Quantity --}}
                    <div class="row mb-3 ">
                      {{-- Product Code --}}
                      <div class="col form-group">
                        <label class="form-label" for="code">Code
                          <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control" id="code" placeholder="Product Code"
                          name="code" aria-label="Product SKU" value="{{ $product->code }}">
                        @error('code')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      {{-- Product Quantity --}}
                      <div class="col form-group">
                        <label class="form-label" for="quantity">Quantity
                          <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control" id="quantity" placeholder="Product Quantity"
                          name="quantity" aria-label="Product SKU" value="{{ $product->quantity }}">
                        @error('quantity')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    {{-- Product Thumbnail --}}
                    <div class="row mb-3">
                      <div class="col form-group"><label class="form-label" for="thumbnail">Thubmnail <span
                            class="text-danger">*</span></label>
                        <input data-height="300" data-default-file="{{ asset($product->thumbnail) }}"
                          data-max-file-size="1M" data-allowed-file-extensions="jpg jpeg png webp"
                          class="form-control dropify" name="thumbnail" type="file" id="thumbnail"/>
                        @error('thumbnail')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    {{-- Product Images --}}
                    <div class="row mb-3">
                      <div class="col form-group">
                        <label class="form-label" for="images">Images
                          <span class="text-danger">*</span>
                        </label>
                        <input class="form-control" type="file" name="images[]" id="images" multiple>
                        @error('images')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mt-3" id="preview_img"></div>
                        @foreach ($product->productImages as $image)
                          <img class="img-fluid" width="100" src="{{ asset($image->image) }}" >
                        @endforeach
                      </div>
                    </div>


                    <!-- Short Description -->
                    <div class="mb-3 form-group">
                      <label class="form-label" for="ecommerce-product-sku">Short Description <span
                          class="text-danger">*</span></label>
                      <textarea class="form-control" name="short_desc" cols="30" rows="2">{{ $product->short_desc }}</textarea>
                      @error('short_desc')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <!--Long Description -->
                    <div class="form-group">
                      <label class="form-label" for="ecommerce-product-sku">Long Description <span
                          class="text-danger">*</span></label>
                      <textarea name="long_desc" id="description" cols="30" rows="10">{{ $product->long_desc }}</textarea>
                      @error('long_desc')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                </div>
                <!-- /Product Information -->
              </div>
              <!-- /First column -->

              <!-- Second column -->
              <div class="col-12 col-lg-4">
                <!-- Pricing Card -->
                <div class=" mb-4">
                  <div class="card-header">
                    <h5 class="card-title mb-0">Pricing</h5>
                  </div>
                  <div class="card-body">
                    <!-- Base Price -->
                    <div class="mb-3 form-group">
                      <label class="form-label" for="price">Base Price <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" id="price" placeholder="Price" name="price"
                        aria-label="Product price" value="{{ $product->price }}">
                      @error('price')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <!-- Discounted Price -->
                    <div class="mb-3">
                      <label class="form-label" for="ecommerce-product-discount-price">Discounted Price </label>
                      <input type="number" class="form-control" id="ecommerce-product-discount-price"
                        placeholder="Discounted Price" name="discount_price" aria-label="Product discounted price"
                        value="{{ $product->discount_price }}">
                      @error('discountPrice')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <!-- Instock switch -->
                    <div class="d-flex  pt-3 form-check form-switch mb-2">
                      <input @if ($product->in_stock == 1) checked @endif class="form-check-input" name="in_stock"
                        type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label fw-bold ps-2" for="flexSwitchCheckDefault">In Stock</label>
                      @error('in_stock')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <!-- /Pricing Card -->
                <!-- Organize Card -->
                <div class="mb-4">
                  <div class="card-header">
                    <h5 class="card-title mb-0">Organize</h5>
                  </div>
                  <div class="card-body">
                    <!-- Category -->
                    <div class="mb-3 col form-group ecommerce-select2-dropdown">
                      <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="category">
                        <span>Category <span class="text-danger">*</span></span>
                      </label>
                      <select id="category" name="category_id" class="select2 form-select"
                        data-placeholder="Select Category">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                          <option {{ $product->category_id == $category->id ? 'selected' : '' }}
                            value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        @error('category_id')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </select>
                    </div>
                    <!-- Sub Category -->
                    <div class="mb-3 col form-group ecommerce-select2-dropdown">
                      <label class="form-label mb-1" for="sub-category">Sub Category <span class="text-danger">*</span>
                      </label>
                      <select id="sub-category" name="subcategory_id" id="sub-category" class="select2 form-select"
                        data-placeholder="Sub Category">
                        <option value="">Sub Category</option>
                      </select>
                      @error('subcategory_id')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <!-- Brand -->
                    <div class="mb-3 col form-group ecommerce-select2-dropdown">
                      <label class="form-label mb-1" for="brand">Brand <span class="text-danger">*</span>
                      </label>
                      <select id="brand" name="brand_id" class="select2 form-select" data-placeholder="Brand">
                        <option value="">Brand</option>
                        @foreach ($brands as $brand)
                          <option {{ $brand->id == $product->brand_id ? 'selected' : '' }} value="{{ $brand->id }}">
                            {{ $brand->name }}</option>
                        @endforeach
                        @error('brand_id')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </select>
                    </div>

                    <!-- Color -->
                    <div class="mb-3">
                      <label for="color" class="form-label mb-1">Colors</label>
                      <input id="color" class="form-control" name="color" value="{{ $product->color }}"
                        aria-label="Product color" placeholder="Color" />
                    </div>

                    <!-- Status -->
                    <div class="mb-3 col ecommerce-select2-dropdown">
                      <label class="form-label mb-1" for="status-org">Status
                      </label>
                      <select id="status-org" name="status" class="select2 form-select" data-placeholder="Status">
                        <option {{ $product->status == 1 ? 'selected' : '' }} value="1">Active</option>
                        <option {{ $product->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                      </select>
                    </div>
                    {{-- <!-- Featured --> --}}
                    <div class="form-check form-switch mb-2">
                      <input @if ($product->featured == 1) checked @endif class="form-check-input" name="featured"
                        type="checkbox" id="flexSwitchCheckChecked">
                      <label class="form-check-label fw-bold" for="flexSwitchCheckChecked">Featured</label>
                    </div>
                  </div>
                </div>
                <!-- /Organize Card -->
              </div>
              <!-- /Second column -->
            </div>
            <div class="row mb-4 ms-2">
              <div class="col-sm-12">
                <button type="submit" name="submit" class="btn btn-primary">
                  Update
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- / Content -->
  </div>
@endsection
@push('page_css')
  <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/select2/select2.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
  <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/tagify/tagify.css') }}" />
@endpush
@push('page_js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
  <script src="{{ asset('backend/assets/vendor/libs/select2/select2.js') }}"></script>
  {{-- Custom JS --}}
  {{-- <script src="{{ asset('backend/assets/js/validation/product.js') }}"></script> --}}
  <script src="{{ asset('backend/assets/js/product.js') }}"></script>
  <script>
    function loadSubcategories(category_id) {
        $.ajax({
          url: "{{ url('admin/subcategory/ajax/') }}/" + category_id,
          success: function(data) {
            $("#sub-category").empty();
            $.each(data, function(key, value) {
              const selected = (value.id == {{ $product->subcategory_id }}) ? 'selected' : '';
              $("#sub-category").append(
                '<option ' + selected + '  value="' +
                value.id +
                '">' +
                value.name +
                "</option>"
              );
            });
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText); // Log error
            alert("An error occurred while fetching subcategories.");
          },
        });
      }
  </script>
@endpush
