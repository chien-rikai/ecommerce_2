$(document).ready(function(){
 
  $('input:radio[class="status"]').change(function(){
    if(this.checked){
      var status = $(this).val();
      load(status,1);
      $('input:radio[class="status"]').each(function (){
        $(this).prop('checked', false);
      });
      this.checked = true;
    }
  });
  $("#search-id").on('click', function () {
    var status = checkStatus();
    load(status,1);
  });
  $("#name, #search-id").keyup(function (event) {
    if (event.keyCode === 13) {
      var status = checkStatus();
      load(status,1);
    }
  });
  $("#name").on("keydown", function () {
    var status = checkStatus();
    load(status,1);
  })
  $(document).on('click', '.pagination a', function (event) {
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    var status = checkStatus();
    load(status, page);
  });
  function load(status,page){
    var name = $('#name').val();
    var id = $('#category_id').val();
    $.ajax({
      url: '/admin/product/filter/' + status,
      type: 'GET',
      data:{
        page: page,
        name: name,
        id: id
      },
    }).done(function(res){
      $("#table-products").empty();
      $("#table-products").html(res);
    });
  }
});
function DeleteProduct(id) {
  var status = checkStatus();
  var name = $('#name').val();
  var category_id = $('#category_id').val();
  var deleteValue = document.getElementById('delete-value').value;
  if (confirm(deleteValue)) {
    $.ajax({
      url: "/admin/product/" + id,
      type: "DELETE",
      cache: false,
      data:{
        status: status,
        name: name,
        category_id: category_id
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
  var name = $('#name').val();
  var category_id = $('#category_id').val();
  $.ajax({
    url: "/admin/product/restore/" + id,
    type: "PUT",
    cache: false,
    data: {
      status: status,
      name: name,
      category_id: category_id
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