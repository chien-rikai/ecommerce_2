<form method="GET" action="{{ route('full.text.search') }}">
  <div class="row">
    <div class="col-md-6">
      <input type="text" name="search" class="form-control" placeholder="{{__('lang.search')}}">
    </div>
    <div class="col-md-6">
      <button class="btn btn-primary">{{__('lang.fulltextsearch')}}</button>
    </div>
  </div>
</form>