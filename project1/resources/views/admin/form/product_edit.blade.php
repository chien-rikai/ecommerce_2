<form method="POST" action="{!! route('product.update',[$product->id]) !!}" class="table-view" enctype="multipart/form-data">
  @csrf
  {{ method_field('PATCH') }}
  <div class="form-group">
    <label>{{__('lang.img')}}</label>
    <br>
    <img class="admin-product-edit-img" src="/images/{{$product->url_img}}" alt="ERROR">
    <div class="input-group img">
      <div class="custom-file">
        <input type="file" name="images" class="custom-file-input" value="{{__('lang.add-img')}}">
        </input>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label>{{__('lang.name-product')}}</label>
    <input id="tieude" type="text" class="form-control" name="name" placeholder="{{__('lang.enter-name-pro')}}" value="{{$product->name}}" />
  </div>
  <div class="form-group">
    <label>{{__('lang.description')}}</label>
    <input type="text" class="form-control" name="describe" value="{{$product->describe}}" />
  </div>
  <div class="form-group">
    <label>{{__('lang.sale')}}</label>
    <input type="text" class="form-control" name="discount" placeholder="%" value="{{$product->discount}}" />
  </div>
  <div class="form-group">
    <label>{{__('lang.price')}}</label>
    <input type="text" class="form-control" name="price" placeholder="{{__('lang.enter-price')}}" value="{{number_format($product->price)}}" />
  </div>
  <div class="form-group ">
    <label for="">{{__('lang.cate')}}</label>
    <select name="category_id">
      @foreach($categories as $row)
      @if($row->id == $product->category_id)
      <option value="{{$row->id}}" selected>{{$row->name}}</option>
      @else
      <option value="{{$row->id}}">{{$row->name}}</option>
      @endif
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>{{__('lang.quantity')}}</label>
    <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}"/>
  </div>
  <div class="form-group">
    <label>{{__('lang.sale-price')}}</label>
    {{number_format($product->sale_price)}}
  </div>
  <div class="form-group">
    <label>{{__('lang.view')}} :</label>
    {{number_format($product->view)}}
  </div>
  <div class="form-group">
    <label>{{__('lang.sold')}} :</label>
    {{$product->sold}}
  </div>
  <div class="form-group">
    <label>{{__('lang.star-rating')}}</label>
    {{$product->star_rating}}
  </div>

  <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i>{{__('lang.edit')}}</button>
</form>