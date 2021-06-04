<script>
    $(document).ready(function () {
        $("#all, #popular, #history").on("click", function () {
            var $button = $(this);
            var type = $button.attr('id');
            $.ajax({
                url: 'home/fetch/' + type,
                type: 'GET',
                dataType: 'json',
                cache: false,
                data: {
                    page: 1,
                },
            }).done(function (res) {
            }).fail(function (res) {
                $('.tab-content').html(res.responseText);
            });

        });
        $(document).on('click', '.pagination a', function(event) {
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          var type = $(this).attr('href').substring($(this).attr('href').lastIndexOf('/') + 1).split('?page=')[0];
          console.log(type);
          fetch_data(type,page);
        });

        function fetch_data(type,page) {
        $.ajax({
            url: "/web.com/home/fetch/" + type,
            dataType: 'json',
                cache: false,
            data: {
                    page: page,
            },
            success: function(data) {
                $('.tab-content').html(data.responseText);
            }
        }).done(function(res){
          console.log(res);
        }).fail(function (res) {
            $('.tab-content').html(res.responseText);
         });
    }
    });

</script>
