$(document).ready(function() {
    $('#myForm').validate({
      rules: {
        name: {
          required: true,
          minlength: 5
        },
        code: {
          required: true,
        },
        quantity: {
          required: true,
        },
        thumbnail: {
          required: true,
        },
        images: {
          required: true,
        },
        short_desc: {
          required: true,
        },
        long_desc: {
          required: true,
        },
        price: {
          required: true,
        },
        category_id: {
          required: true,
        },
        subcategory_id: {
          required: true,
        },
        brand_id: {
          required: true,
        }
      },
      messages: {
        name: {
          required: 'Please enter a product name',
        },
        code: {
          required: 'Please enter a product code',
        },
        quantity: {
          required: 'Please enter a product quantity',
        },
        thumbnail: {
          required: 'Please select a product thumbnail',
        },
        images: {
          required: 'Please select a product images',
        },
        short_desc: {
          required: 'Please enter a product short description',
        },
        long_desc: {
          required: 'Please enter a product long description',
        },
        price: {
          required: 'Please enter a product price',
        },
        category_id: {
          required: 'Please select a product category',
        },
        subcategory_id: {
          required: 'Please select a product subcategory',
        },
        brand_id: {
          required: 'Please select a product brand',
        }
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');

      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    })
  })