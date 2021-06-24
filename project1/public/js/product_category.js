$(document).ready(function () {
    $("#category-id-1").on('change', function () {
        var parent_id = $(this).val();
        $.ajax({
            url: '/admin/product/category',
            type: "GET",
            data: {
                parent_id: parent_id
            },
        }).done(function (res) {
            $(".select-category").empty();
            $(".select-category").html(res);
        })
    });
    $("#category-id-2").on('change', function () {
        var parent_id = $(this).val();
        console.log(1);
        $.ajax({
            url: '/admin/product/category',
            type: "GET",
            data: {
                parent_id_2: parent_id
            },
        }).done(function (res) {
            $(".select-category-2").empty();
            $(".select-category-2").html(res);
        })
    });
});