<script src="/js/filter_admin.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.delete-btn a', function (event) {
            event.preventDefault();
            //var page = $(this).attr('href').split('page=')[1];
            var id = $(this).attr('href').substring($(this).attr('href').lastIndexOf('/') + 1);
            console.log(id);
            if (confirm("{{__('lang.delete-user')}}")) {
                $.ajax({
                    url: "/admin/user/" + id,
                    type: "DELETE",
                    cache: false,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                }).done(function (response) {
                    if (response.hasDelete) {
                        $("#user_" + id).remove();
                        alertify.success(response.message);
                    } else {
                        alertify.error(response.message);
                        $("#user_" + id).remove();
                    }

                });
            }
            //fetch_data(status, page);
        });
        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            console.log($(this).attr('href'));
            var page = $(this).attr('href').split('page=')[1];
            var status = $('#status').val();
            var field = $('#field').val();
            var key = $('#txt-search').val();
            console.log(status + "hello");
            fetch_data(status, page , field ,key);
        });
        $(document).on('click','#search a', function(event){
            event.preventDefault();
            console.log('helo');
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
                url: "/admin/user/" + status,
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
                console.log(res);
            }).fail(function (res) {
                console.log(res);
            });
        }
    });

    function block_confirmation() {
        return confirm("{{__('lang.block_confirmation')}}");
    }

    function unblock_confirmation() {
        return confirm("{{__('lang.unblock_confirmation')}}");
    }

</script>
