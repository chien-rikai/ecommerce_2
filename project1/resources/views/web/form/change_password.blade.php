<form action="{{route('post.change.password',[Auth::id()])}}" method="POST">
  @csrf
  <div class="login-form">
    <h4 class="login-title">{{__('lang.change-password')}}</h4>
    <div class="col-md-6 mb-20">
        <label>{{__('lang.password-old')}}</label>
        <input class="mb-0" name="old_password" type="password" placeholder="{{__('lang.enter-password-old')}}">
      </div>
      <div class="col-md-6 mb-20">
        <label>{{__('lang.password-new')}}</label>
        <input class="mb-0" name="password" type="password" placeholder="{{__('lang.enter-password-new')}}">
      </div>
      <div class="col-md-6 mb-20">
        <label>{{__('lang.confirm-password')}}</label>
        <input class="mb-0" name="confirm_password" type="password" placeholder="{{__('lang.enter-confirm-password')}}">
      </div>
      <div class="col-12">
        <button class="register-button mt-0">{{__('lang.change')}}</button>
      </div>
    </div>
  </div>
</form>