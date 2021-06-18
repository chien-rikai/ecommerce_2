<?php $stt = 1 ?>
<table class="table table-bordered">
@include('common.success')
@include('common.fail')
  <thead>
    <tr>
      <th>Stt</th>
      <th>{{__('lang.img')}}</th>
      <th>{{__('lang.name-product')}}</th>
      <th>{{__('lang.product-type')}}</th>
      <th>{{__('lang.view')}}</th>
      <th>{{__('lang.price')}}</th>
      <th>{{__('lang.feature')}}</th>
    </tr>
  </thead>
  <tbody id="productData">
    @if(!empty($products))
    @foreach($products as $product)
    <tr id="product-id-{{$product->id}}">
      <td><a class="btn btn-default btn-circle">{{$stt++}}</a></td>
      <td><img class="admin-product-img" id="img-product" src="/images/{{$product->url_img}}" alt="Img"></img></td>
      <td>{{$product->name}}</td>
      @if($product->category == null)
      <td></td>
      @else
      <td>{{$product->category->name}}</td>
      @endif
      <td>{{number_format($product->view)}}</td>
      <td>{{number_format($product->price)}}</td>
      <td>
      @if($product->deleted_at == null)
        <a class="btn-default btn-xs" href="/admin/product/{{$product->id}}/edit/">
        <i class="glyphicon glyphicon-pencil"></i>{{__('lang.edit')}}</a>
        <input type="hidden" id="delete-value" value="{{__('lang.soft-delete-product')}}">
        <a class="btn-default btn-xs" onclick="DeleteProduct('{{$product->id}}')">
        <i class="glyphicon glyphicon-trash"></i>{{__('lang.delete')}}</a></td>
      @else
        <a class="btn-default btn-xs" onclick="RestoreProduct('{{$product->id}}')">
          <i class="glyphicon glyphicon-pencil"></i>{{__('lang.restore')}}</a>
          <input type="hidden" id="delete-value" value="{{__('lang.delete-product')}}">
          <a class="btn-default btn-xs" onclick="DeleteProduct('{{$product->id}}')">
        <i class="glyphicon glyphicon-trash"></i>{{__('lang.delete')}}</a></td>
        @endif
    </tr>
    @endforeach
    @else
      <div class="t-center">{{__('lang.no-results')}}</div>
      <br>
    @endif
  </tbody>
</table>
<div>
  {{$products->links()}}
</div>