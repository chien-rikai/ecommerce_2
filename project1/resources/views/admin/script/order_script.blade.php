<script >
    $(document).ready(function () {
        $('input:radio[class="status-order"]').change(
            function () {
                if (this.checked) {
                    var status = $(this).val();
                    console.log(status);
                    load(status);
                    $('input:radio[class="status-order"]').each(function () {
                        $(this).prop('checked', false);
                    });
                    this.checked = true
                }
            });
        function load(status){
            $.ajax({
                        url: '/admin/order/filter/' + status,
                        type: 'GET',
                        dataType: 'json',
                        cache: false,
                    }).done(function (res) {

                    }).fail(function (res) {
                        $('.data-content').html(res.responseText);
                    });
        }    
        $(document).on('click', '.delete-order a', function (event) {
            event.preventDefault();
            //var page = $(this).attr('href').split('page=')[1];
            var id = $(this).attr('href').substring($(this).attr('href').lastIndexOf('/') + 1);
            console.log(id);
            if (confirm("{{__('lang.delete-order')}}")) {
        $.ajax({
          url: "/admin/order/" + id,
          type: "DELETE",
          cache: false,
          data: {
            _token: '{{ csrf_token() }}'
          },
        }).done(function(response) {
          if (response.hasDelete) {
            $("#order_" + id).remove();
            alertify.success(response.success);
          } else {
            alertify.error(response.fail);
            $("#order_" + id).remove();
          }

        });
      }
            //fetch_data(status, page);
        });
        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var status = $(this).attr('href').substring($(this).attr('href').lastIndexOf('/') + 1).split('?page=')[0];
            console.log(status);
            fetch_data(status, page);
        });

        function fetch_data(status, page) {
            $.ajax({
                url: "/admin/order/" ,
                dataType: 'json',
                cache: false,
                data: {
                    page: page,
                },
                success: function (data) {
                    $('.data-content').html(data.responseText);
                }
            }).done(function (res) {
                console.log(res);
            }).fail(function (res) {
                $('.data-content').html(res.responseText);
            });
        }
    });
</script>
