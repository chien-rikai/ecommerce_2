<form method="POST" action="{{route('product.store')}}" class="table-view" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label>{{__('lang.img')}}</label>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" name="images" class="custom-file-input" value="">
        </input>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label>{{__('lang.name-product')}}</label>
    <input id="tieude" type="text" class="form-control" value="@if(isset($info)){{$info->name}} @endif" name="name" placeholder="{{__('lang.enter-name-pro')}}" value="" />
  </div>
  <div class="form-group">
    <label>{{__('lang.description')}}</label>
    <textarea type="text" class="form-control" name="describe" placeholder="{{__('lang.enter-description')}}" value="">@if(isset($info)&&$info->note){{$info->note}} @endif</textarea>
    <!-- <input type="text" class="form-control" name="describe" placeholder="{{__('lang.enter-description')}}" value="" /> -->
  </div>
  <div class="form-group">
    <label>{{__('lang.price')}}</label>
    <input id="price" type="number" class="form-control" name="price" placeholder="{{__('lang.enter-price')}}" value="" />
  </div>
  <div class="form-group ">
    <label for="category_id">{{__('lang.cate')}}</label>
    <select name="category_id">
      @foreach($categories as $row)
      <option value="{{$row->id}}">{{$row->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>{{__('lang.sale')}}</label>
    <input type="text" class="form-control" name="discount" placeholder="%" value="" />
  </div>
  <div class="form-group">
    <label>{{__('lang.quantity')}}</label>
    <input type="number" class="form-control" name="quantity" placeholder="0"/>
  </div>
  <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i>{{__('lang.add')}}</button>
</form>