<form action="{{route('register')}}" method="POST">
  @csrf
  <div class="login-form">
    <h4 class="login-title">{{__('lang.register')}}</h4>
    <div class="row">
      <div class="col-md-6 col-12 mb-20">
        <label>{{__('lang.username')}}</label>
        <input class="mb-0" name="username" type="text" placeholder="{{__('lang.enter-username')}}">
      </div>
      <div class="col-md-12 mb-20">
        <label>{{__('lang.email')}}</label>
        <input class="mb-0" name="email" type="email" placeholder="{{__('lang.enter-email')}}">
      </div>
      <div class="col-md-6 mb-20">
        <label>{{__('lang.password')}}</label>
        <input class="mb-0" name="password" type="password" placeholder="{{__('lang.enter-password')}}">
      </div>
      <div class="col-md-6 mb-20">
        <label>{{__('lang.confirm-password')}}</label>
        <input class="mb-0" name="confirm_password" type="password" placeholder="{{__('lang.enter-confirm-password')}}">
      </div>
      <div class="col-12">
        <button class="register-button mt-0">{{__('lang.register')}}</button>
      </div>
    </div>
  </div>
</form>