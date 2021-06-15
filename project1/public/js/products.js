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
      url: '/admin/product/filter/' + status,
      type: 'GET',
    }).done(function(res){
      $("#table-products").empty();
      $("#table-products").html(res);
    });
  }
});
function DeleteProduct(id) {
  var status = checkStatus();
  var deleteValue = document.getElementById('delete-value').value;
  if (confirm(deleteValue)) {
    $.ajax({
      url: "/admin/product/" + id,
      type: "DELETE",
      cache: false,
      data:{
        status: status
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
    }).done(function (response) {
      $("#table-products").empty();
      $("#table-products").html(response);
    });
  }
}

function RestoreProduct(id) {
  var status = checkStatus();
  $.ajax({
    url: "/admin/product/restore/" + id,
    type: "PUT",
    cache: false,
    data: {
      status: status
    },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
  }).done(function (response) {
    $("#table-products").empty();
    $("#table-products").html(response);
  });
}

function checkStatus() {
  var status
  $('input:radio[class="status"]').each(function () {
    if (this.checked) {
      status = $(this).val();
    }
  });
  return status;
}