$(document).ready(function(){
    $('input:radio[class="status"]').change(function(){
      if(this.checked){
        var status = $(this).val();
        load(status);
        $('input:radio[class="status"]').each(function (){
          $(this).prop('checked', false);
        });
        this.checked = true;
      }
    });

    function load(status){
      $.ajax({
        url: '/admin/category/filter/' + status,
        type: 'GET',
      }).done(function(res){
        $("#table-categories").empty();
        $("#table-categories").html(res);
      });
    }
});
function DeleteCategory(id) {
    var status = checkStatus();
    var deleteValue = document.getElementById('delete_confirm').value;
    if (confirm(deleteValue)) {
        $.ajax({
            url: "/admin/category/" + id,
            type: "DELETE",
            cache: false,
            data: {
                status: status
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).done(function (response) {
            $("#table-categories").empty();
            $("#table-categories").html(response);
        });
    }
}

function RestoreCategory(id) {
    var status = checkStatus();
    $.ajax({
        url: "/admin/category/restore/" + id,
        type: "PUT",
        cache: false,
        data: {
            status: status
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    }).done(function (response) {
        $("#table-categories").empty();
        $("#table-categories").html(response);
    });

}
function checkStatus(){
    var status
    $('input:radio[class="status"]').each(function () {
        if (this.checked) {
            status = $(this).val();
        }
    });
    return status;
}
