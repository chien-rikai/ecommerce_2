<form action="{!! route('request.update',[$suggest->id]) !!}" method="POST">
  @csrf
  {{ method_field('PATCH') }}
  @if(!isset($suggest->product_id))
  <button type="submit" class="btn btn-success btn-sm">{{__('lang.import')}}</button>
  @else
  <button type="submit" class="btn btn-success btn-sm">{{__('lang.increment')}}</button>
  @endif
</form>