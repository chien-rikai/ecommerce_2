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
        $('#paginate').on('click', function () {
            console.log('he');
            var page = $(this).name;
            var type = $('.type_view').val();
            console.log(page+" "+ type);
            fetch_data(type, page);
        });

        function fetch_data(type, page) {
            $.ajax({
                url: "/home/fetch/" + type,
                data: {
                    page: page,
                },
                success: function (data) {
                    $('.tab-content').html(res.responseText);
                }
            }).done(function (res) {

            }).fail(function (res) {
                //$('.tab-content').html(res.responseText);
            });
        }
    });

</script>
