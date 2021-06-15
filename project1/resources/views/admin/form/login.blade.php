<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.post') }}">
  {{ csrf_field() }}

  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">{{__('lang.username')}}</label>
    <div class="col-md-6">
      <input type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
    </div>
  </div>
  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-4 control-label">{{__('lang.password')}}</label>
    <div class="col-md-6">
      <input id="password" type="password" class="form-control" name="password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-8 col-md-offset-4">
      <button type="submit" class="btn btn-primary">
        {{__('lang.login')}}
      </button>
    </div>
  </div>
</form>