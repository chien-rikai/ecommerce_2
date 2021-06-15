$(document).ready(function () {
    $("#all, #popular, #history").on("click", function () {
        var $button = $(this);
        var type = $button.attr('id');
        fetch_data(1,type);
        $('.view-types').val(type);
    });
    $(".sort-by").on("change", function () {
        var type= $('.view-types').val();
        fetch_data(1,type);
    });
    $(".order-by").on("change", function () {
        var type= $('.view-types').val();
        fetch_data(1,type);
    });
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        var type = $(this).attr('href').substring($(this).attr('href').lastIndexOf('/') + 1).split('?page=')[0];
        //var type= $('.view-types').val();
        fetch_data(page,type);
      });
    function fetch_data(page,type) {
        var sortBy = $('.sort-by').val();
        var orderBy = $('.order-by').val();
        $.ajax({
            url: "/web.com/home/fetch/" + type,
            dataType: 'json',
                cache: false,
            data: {
                page: page,
                orderBy:orderBy,
                sortBy:sortBy
            },
            success: function(data) {
                $('.tab-content').html(data.view);
            }
        }).done(function(res){
        }).fail(function (res) {
         });
         }
});
