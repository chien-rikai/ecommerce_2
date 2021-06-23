<form action="{{route('request.store')}}" method="POST">
  @csrf
  {{ method_field('POST') }}
  <div class="profile-form">
    <h4 class="login-title">{{__('lang.request-new-product')}}</h4>
    <div class="row">
      <div class="col-md-12 mb-20">
        <label>{{__('lang.name-product')}}</label>
        <input class="mb-0" name="name" type="text" placeholder="{{__('lang.enter-product-name')}}" value="">
      </div>
      <div class="col-md-12 mb-20">
        <label>{{__('lang.description')}}</label>
        <textarea name="note"></textarea>
      </div> 
      <div class="col-12">
        <button class="register-button mt-0">{{__('lang.request')}}</button>
      </div>
    </div>
  </div>
</form>