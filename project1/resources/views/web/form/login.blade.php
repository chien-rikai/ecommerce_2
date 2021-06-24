<form action="{{ route('login.post')}}" method="POST">
  @csrf
  <div class="login-form">
    <h4 class="login-title">{{__('lang.login')}}</h4>
    <div class="row">
      <div class="col-md-12 col-12 mb-20">
        <label>{{__('lang.username')}}</label>
        <input class="mb-0" name="username" type="username" placeholder="{{__('lang.enter-username')}}" value="{{ old('username')}}">
      </div>
      <div class="col-12 mb-20">
        <label>{{__('lang.password')}}</label>
        <input class="mb-0" name="password" type="password" placeholder="{{__('lang.enter-password')}}">
      </div>
      <div class="col-md-12">
        <button class="register-button mt-0">{{__('lang.login')}}</button>
      </div>
    </div>
    <br>
    OR
    <br>
    <a class="social-button btn btn-lg btn-danger btn-block" href="/web.com/login/google/">
      <i class="fa fa-google-plus-square"></i>&nbsp;{{__('lang.login-with-google')}}</a>
    <a class="social-button btn btn-lg btn-primary btn-block social-button" href="/web.com/login/facebook/">
      <i class="fa fa-facebook-official"></i>&nbsp;{{__('lang.login-with-facebook')}}</a>
  </div>
</form>
