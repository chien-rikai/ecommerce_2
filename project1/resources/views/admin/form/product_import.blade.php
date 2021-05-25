<form action="{{route('product.import')}}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div>
    <label for="file">{{__('lang.choose-file')}}</label>
    <input type="file" name="file" class="form-control">
  </div>
  <button type="submit" name="submit">{{__('lang.import')}}</button>
</form>