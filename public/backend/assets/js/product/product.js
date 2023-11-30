$(document).ready(function () {
    ClassicEditor.create(document.querySelector("#description")).catch(
        (error) => {
            console.error(error);
        }
    );
    $(".dropify").dropify();
    $(".select2").select2();
    const input = document.querySelector("input[name=color]");
    new Tagify(input);

    // Category
    $("#category").on("change", function () {
        const category_id = $(this).val();
        if (category_id) {
            $.ajax({
                url: "{{ url('admin/subcategory/ajax/') }}/" + category_id,
                success: function (data) {
                    $("#sub-category").empty();
                    $("#sub-category").append(
                        '<option value="">Sub Category</option>'
                    );
                    $.each(data, function (key, value) {
                        $("#sub-category").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.name +
                                "</option>"
                        );
                    });
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText); // Log error
                    alert("An error occurred while fetching subcategories.");
                },
            });
        } else {
            alert("Please select a valid category.");
        }
    });

    // Image Preview
    $("#images").on("change", function (e) {
        if (
            window.File &&
            window.FileReader &&
            window.FileList &&
            window.Blob
        ) {
            $.each(e.target.files, function (index, file) {
                if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        $("<img/>", {
                            class: "img-fluid",
                            src: event.target.result,
                            width: 150,
                        }).appendTo("#preview_img");
                    };
                    reader.readAsDataURL(file);
                }
            });
        } else {
            alert("Your browser doesn't support File API!");
        }
    });
});
