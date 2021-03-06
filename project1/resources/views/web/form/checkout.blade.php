@include('common.error')
@include('common.success')
@include('common.fail')
<form action="{{route('payment.store')}}" method="POST" id="checkout-form">
   @csrf
    <input type="hidden" name="user_id" value="{{$user->id}}">
    <div class="checkbox-form">
        <h3>{{__('lang.billing-detail')}}</h3>
        <div class="row">
            <div class="col-md-9">
                <div class="checkout-form-list">
                    <label>{{__('lang.customer-name')}} <span class="required">*</span></label>
                    <input placeholder="" type="text" name="name" value="{{$user->full_name}}">
                </div>
            </div>
            <div class="col-md-9">
                <div class="checkout-form-list">
                    <label>{{__('lang.address')}} <span class="required">*</span></label>
                    <input placeholder="Street address" name="address" type="text" value="{{$user->address}}">
                </div>
            </div>
            <div class="col-md-9">
                <div class="checkout-form-list">
                    <label>{{__('lang.email')}} <span class="required">*</span></label>
                    <input placeholder="" name="email" type="email" value="{{$user->email}}">
                </div>
            </div>
            <div class="col-md-9">
                <div class="checkout-form-list">
                    <label>{{__('lang.phone')}} <span class="required">*</span></label>
                    <input type="text" name="phone" value="{{$user->phone}}">
                </div>
            </div>
        </div>
    </div>
</form>
