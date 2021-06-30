<input type="hidden" id="id" name="product_id" value="{{$product->id}}">
<input type="hidden" id="name" name="name" value="{{$product->name}}">
<div class="form-group">
  <label for="recipient-name" class="col-form-label">{{__('lang.name-product')}}</label>
  <input type="text" class="form-control" value="{{$product->name}}" disabled>
</div>
<div class="form-group">
  <label for="message-text" class="col-form-label">{{__('lang.note')}}</label>
  <textarea class="form-control" id="message" name="note"></textarea>
</div>