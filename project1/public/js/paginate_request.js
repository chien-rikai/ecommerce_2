$(document).ready(function () {
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        //var type= $('.view-types').val();
        fetch_data(page);
      });
    function fetch_data(page) {
        $.ajax({
            url: "/admin/request",
            dataType: 'json',
                cache: false,
            data: {
                page: page,
            },
            success: function(data) {
                $('.data-content').html(data.view);
            }
        });
         }
});
