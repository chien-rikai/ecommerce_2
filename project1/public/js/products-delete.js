function DeleteProduct(id) {
  var deleteValue = document.getElementById('delete-value').value;
    if (confirm(deleteValue)) {
      $.ajax({
        url: "/admin/product/" + id,
        type: "DELETE",
        cache: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
      }).done(function(response) {
          $("#table-products").empty();
          $("#table-products").html(response);
      });
    }
  }