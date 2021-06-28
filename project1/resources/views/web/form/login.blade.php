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
      <div class="col-md-4 mb-20">
        <button class="register-button mt-0">{{__('lang.login')}}</button>
      </div>

      <div class="col-sm-4 mb-20">
        <a href="{{ route('login.provider', ['facebook']) }}">
          <button type="button" class="register-button mt-0 facebook-btn">
            <i class="fa fa-facebook mr-2"></i>Facebook
          </button>
        </a>
      </div>
      <div class="col-sm-4 mb-20">
        <a href="{{ route('login.provider',['google']) }}">
          <button type="button" class="register-button mt-0 google-btn">
            <i class="fa fa-google mr-2"></i>Google
          </button>
        </a>
      </div>
    </div>
  </div>
</form>