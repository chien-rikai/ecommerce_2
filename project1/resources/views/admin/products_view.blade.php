@extends('admin.layout.layout')
@section('content')
<!-- @if(Session::has('message'))
<div class="alert alert-success text-center" role="alert">
    <strong></strong> {{Session::get('message')}}
</div>
@endif -->

<body>
  <div class="container">
    <div class="row list-product">
      @include('common.success')
      @include('common.fail')
      @include('common.error')
      <div class="col-sm-6">
        <h2>{{__('lang.product-list')}}</h2>
      </div>
      <div class="col-sm-6">
        <a type="button" class="btn-sm btn-primary new-btn" href="{{route('product.create')}}">{{__('lang.add')}}</a>
      </div>
    </div>
    <table class="table-view table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>{{__('lang.img')}}</th>
          <th>{{__('lang.name-product')}}</th>
          <th>{{__('lang.product-type')}}</th>
          <th>{{__('lang.view')}}</th>
          <th>{{__('lang.price')}}</th>
          <th>{{__('lang.feature')}}</th>
        </tr>
      </thead>
      <tbody id="productData">

      </tbody>
    </table>
  </div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $.ajax({
        type: "GET",
        url: "/admin/product/getProductData",

        cache: false,
        data: {
          _token: '{{ csrf_token() }}'
        },

        dataType: 'json',
        success: function(dataResult) {
          console.log(dataResult.data);
          var resultData = dataResult.data;
          var productData = '';
          var i = 1;
          $.each(resultData, function(index, product) {
            var editUrl = "/admin/product/" + product.id + "/edit";
            productData += "<tr id='product-id" + product.id + "'>"
            productData += "<td><a class='btn btn-default btn-circle'>" + product.id + "</a></td>"
            productData += "<td><img class='admin-product-img' id='img-product' src='/images/" + product.url_img + "'alt='Img'></img></td>"
            productData += "<td>" + product.name + "</td>"
            productData += "<td>" + product.category.name + "</td>"
            productData += "<td>" + product.view + "</td>"
            productData += "<td>" + product.price + "</td>"
            productData += "<td><a class='btn-default btn-xs' href='/admin/product/" + product.id + "/edit/'>" +
              "<i class='glyphicon glyphicon-pencil'></i>" + "{{__('lang.edit')}}" + "</a>" +
              "<a class='btn-default btn-xs' onclick='DeleteProduct(" + product.id + ")'>" +
              "<i class='glyphicon glyphicon-pencil'></i>" + "{{__('lang.delete')}}" + "</a></td>"
            productData += "</tr>";
          })
          $("#productData").append(productData);
        }
      });
    });
  </script>


  <script>
    function DeleteProduct(id) {
      if (confirm("{{__('lang.delete-product')}}")) {
        $.ajax({
          url: "/admin/product/" + id,
          type: "DELETE",
          cache: false,
          data: {
            _token: '{{ csrf_token() }}'
          },
        }).done(function(response) {
          if (response.hasDelete) {
            $("#product-id" + id).remove();
            alertify.success(response.success);
          } else {
            alertify.error(response.fail);
          }

        });
      }
    }
  </script>

  @include('admin.layout.footer')
</body>

@endsection