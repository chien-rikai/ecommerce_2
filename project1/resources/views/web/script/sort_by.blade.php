<script>
    function SortBy(yesNo){
        var sort = document.getElementById('sort_by_id').value;
        var orderBy = document.getElementById('order_by_id').value;
        var category_id = document.getElementById('category_sort_by').value;
        $.ajax({
            url: "/web.com/sort"+sort,
            type: "GET",
            data:{
                "data" : [
                    category_id,
                    orderBy,
                    yesNo,
                ],
            }
        }).done(function(response){
            $("#sort_by").empty();
			$("#sort_by").html(response);
        });
    }
</script>