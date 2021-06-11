$(document).ready(function () {
    $("#search-id").on('click', function () {
        search();
    });
    $("#name, #search-id").keyup(function (event) {
        if (event.keyCode === 13) {
            search();
        }
    });
    $("#name").on("keydown", function(){
        console.log(1);
        search();
    })
    function search() {
        var name = $('#name').val();
        var id = $('#category_id').val();
        $.ajax({
            url: '/admin/product/search',
            type: "GET",
            data: {
                name: name,
                id: id,
            }
        }).done(function (res) {
            $("#table-products").empty();
            $("#table-products").html(res);
        });
    }
});