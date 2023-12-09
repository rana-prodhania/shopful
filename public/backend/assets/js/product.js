$(document).ready(function () {
    ClassicEditor.create(document.querySelector("#description")).catch(
        (error) => {
          console.error(error);
        }
      );
      $(".dropify").dropify();
      $(".select2").select2();

      // Category
      const selectedCategory = $("#category").val();

      if (selectedCategory) {
        loadSubcategories(selectedCategory);
      }

      // Event listener for category change
      $("#category").on("change", function() {
        const category_id = $(this).val();
        if (category_id) {
          loadSubcategories(category_id);
        } else {
          $("#sub-category").empty();
        }
      });

      // Function to load subcategories by AJAX
      

      // Image Preview
      $("#images").on("change", function(e) {
        if (
          window.File &&
          window.FileReader &&
          window.FileList &&
          window.Blob
        ) {
          $.each(e.target.files, function(index, file) {
            if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)) {
              const reader = new FileReader();
              reader.onload = function(event) {
                $("<img/>", {
                  class: "img-fluid",
                  src: event.target.result,
                  width: 120,
                }).appendTo("#preview_img");
              };
              reader.readAsDataURL(file);
            }
          });
        } else {
          alert("Your browser doesn't support File API!");
        }
      });
})