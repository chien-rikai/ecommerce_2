$(document).ready(function () {
    $("#category-id").on('change', function () {
        var parent_id = $(this).val();
        $.ajax({
            url: '/admin/category/multi-level',
            type: "GET",
            data: {
                parent_id: parent_id
            },
        }).done(function (res) {
            $(".select-category").empty();
            $(".select-category").html(res);
        })
    });
});