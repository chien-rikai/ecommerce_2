<script src="/js/filter_admin.js"></script>
<script>
    $(document).ready(function () {
      $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var status = $('#status').val();
            var field = $('#field').val();
            var key = $('#txt-search').val();
            fetch_data(status, page , field ,key);
        });
        $('#search a').on('click', function(event){
            event.preventDefault();
            $('#field').val($('#txt-field').val());
            $('#status').val($('#txt-status').val());
            var status = $('#status').val();
            var field = $('#field').val();
            var key = $('#txt-search').val();
            fetch_data(status,1,field,key);
        });

        function fetch_data(status, page,field,key) {
            field =field||'id';
            key = key||'';
            $.ajax({
                url: "/admin/order/filter/" + status,
                dataType: 'json',
                cache: false,
                data: {
                    page: page,
                    field: field,
                    key: key
                },
                success: function (data) {
                    $('.data-content').html(data.view);
                }
            }).done(function (res) {
            }).fail(function (res) {
            });
        }
        $(document).on('click', '.delete-order a', function (event) {
            event.preventDefault();
            //var page = $(this).attr('href').split('page=')[1];
            var id = $(this).attr('href').substring($(this).attr('href').lastIndexOf('/') + 1);
            if (confirm("{{__('lang.delete_order_confirmation')}}")) {
                delete_order(id);
            }
            //fetch_data(status, page);
        });
        $(document).on('click', '.hard-delete-order a', function (event) {
            event.preventDefault();
            //var page = $(this).attr('href').split('page=')[1];
            var id = $(this).attr('href').substring($(this).attr('href').lastIndexOf('/') + 1);
            if (confirm("{{__('lang.hard_delete_order_confirmation')}}")) {
                delete_order(id);
            }
            //fetch_data(status, page);
        });
        $(document).on('click', '.recover-btn a', function (event) {
            event.preventDefault();
            //var page = $(this).attr('href').split('page=')[1];
            var id = $(this).attr('href').substring($(this).attr('href').lastIndexOf('/') + 1);
            if (confirm("{{__('lang.restore-order')}}")) {
                $.ajax({
                    url: "/admin/order/restore/" + id,
                    type: "PUT",
                    cache: false,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                }).done(function (response) {
                    if (response.hasDelete) {
                        $("#order_" + id).remove();
                        alertify.success(response.message);
                    } else {
                        alertify.error(response.message);
                        $("#order_" + id).remove();
                    }

                });
            }
            //fetch_data(status, page);
        });
        function delete_order(id){
            $.ajax({
                    url: "/admin/order/" + id,
                    type: "DELETE",
                    cache: false,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                }).done(function (response) {
                    if (response.hasDelete) {
                        $("#order_" + id).remove();
                        alertify.success(response.message);
                    } else {
                        alertify.error(response.message);
                        $("#order_" + id).remove();
                    }

                });
        }
        $(document).on('click','.status_toggle',function(){
            var $button = $(this);
            var id = $button.parent().prev('.id_order').val();
            var status = $button.attr('id');
            status = status.split('_')[1];
            update(id,status);
            $(this).parent().children('input:radio').each(function () {
                        $(this).prop('checked', false);
                    });
            this.checked = true;
        });
        function update(id,status){
            $.ajax({
            url: '/admin/order/' + id,
            type: 'PUT',
            dataType : 'json',
            cache: false,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                status: status,
            }
        }).done(function (res) {
            var msg = alertify.message(res.message);
            msg.delay(1).setContent(res.message);
        });
        }
    }); 
</script>
