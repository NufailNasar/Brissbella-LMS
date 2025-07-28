// script.js
$(document).ready(function () {
    $(document).ready(function () {
        // const modal = bootstrap.Modal.getInstance(document.getElementById('addCourseModal'));

        $("#courseForm").on("submit", function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: '/courses/save',
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
                    location.reload()
                },
                error: function (xhr) {
                   toastr.error("Something went wrong.");
                    $('#addCourseModal').modal('hide');
                    // $('#courseForm')[0].reset();
                },
            });
        });

        $("#lectureForm").on("submit", function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: '/lectures/save',
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
                    location.reload()
                },
                error: function (xhr) {
                   toastr.error("Something went wrong.");
                    $('#addCourseModal').modal('hide');
                    // $('#courseForm')[0].reset();
                },
            });
        });
    });
});
