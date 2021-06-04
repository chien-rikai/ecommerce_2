
<table class="table-view table table-bordered">
@include('common.success')
@include('common.fail')
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
    @foreach($products as $product)
    <tr id="product-id-{{$product->id}}">
      <td><a class="btn btn-default btn-circle">{{$product->id}}</a></td>
      <td><img class="admin-product-img" id="img-product" src="/images/{{$product->url_img}}" alt="Img"></img></td>
      <td>{{$product->name}}</td>
      <td>{{$product->category->name}}</td>
      <td>{{number_format($product->view)}}</td>
      <td>{{number_format($product->price)}}</td>
      <td><a class="btn-default btn-xs" href="/admin/product/{{$product->id}}/edit/">
        <i class="glyphicon glyphicon-pencil"></i>{{__('lang.edit')}}</a>
        <a class="btn-default btn-xs" onclick="DeleteProduct('{{$product->id}}')">
        <i class="glyphicon glyphicon-pencil"></i>{{__('lang.delete')}}</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div>
  {{$products->links()}}
</div>