// script.js
$(document).ready(function () {
    $(document).ready(function () {
        // const modal = bootstrap.Modal.getInstance(document.getElementById('addCourseModal'));

        $("#courseForm").on("submit", function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "/courses/save",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    toastr.success("Course saved successfully!");
                    location.reload();
                },
                error: function (xhr) {
                    toastr.error("Something went wrong.");
                    $("#addCourseModal").modal("hide");
                    // $('#courseForm')[0].reset();
                },
            });
        });

        $("#lectureForm").on("submit", function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "/lectures/save",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    toastr.success("Lecture saved successfully!");
                    location.reload();
                },
                error: function (xhr) {
                    toastr.error("Something went wrong.");
                    $("#addCourseModal").modal("hide");
                    // $('#courseForm')[0].reset();
                },
            });
        });

        $("#studentForm").on("submit", function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "/student/save",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    toastr.success("Student saved successfully!");
                    location.reload();
                },
                error: function (xhr) {
                    toastr.error("Something went wrong.");
                    $("#addCourseModal").modal("hide");
                    // $('#courseForm')[0].reset();
                },
            });
        });

        $("#courseFormUpdate").on("submit", function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "/courses/edit",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    toastr.success("Student saved successfully!");
                    location.reload();
                },
                error: function (xhr) {
                    toastr.error("Something went wrong.");
                    $("#addCourseModal").modal("hide");
                    // $('#courseForm')[0].reset();
                },
            });
        });

        $(document).on("click", ".delete-btn-c", function () {
            let id = $(this).data("id");
            if (!confirm("Are you sure you want to delete this course?"))
                return;

            $.ajax({
                url: "/courses/delete/" + id,
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
                        location.reload(); // or remove the row with jQuery
                    } else {
                        toastr.error("Error: " + response.message);
                    }
                },
                error: function (xhr) {
                    toastr.error(
                        "An error occurred while deleting the course."
                    );
                    console.error(xhr.responseText);
                },
            });
        });

        $("#summernote").summernote({
            height: 250, // Set editor height
            toolbar: [
                ["style", ["style"]],
                ["font", ["bold", "italic", "underline", "clear"]],
                ["fontname", ["fontname"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["table", ["table"]],
                ["insert", ["link", "picture", "video"]],
                ["view", ["fullscreen", "codeview", "help"]],
            ],
        });


    });
});
