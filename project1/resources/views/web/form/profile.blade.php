<form action="{{route('member.update', [Auth::id()])}}" method="POST">
  @csrf
  {{ method_field('PATCH') }}
  <div class="profile-form">
    <h4 class="login-title">{{__('lang.profile')}}</h4>
    <div class="row">
        <div class="col-md-6 mb-20">
        <label>{{__('lang.first-name')}}</label>
        <input class="mb-0" name="first_name" type="text" placeholder="{{__('lang.enter-first-name')}}" value="{{Auth::user()->first_name}}">
      </div>
      <div class="col-md-6 mb-20">
        <label>{{__('lang.last-name')}}</label>
        <input class="mb-0" name="last_name" type="text" placeholder="{{__('lang.enter-last-name')}}" value="{{Auth::user()->last_name}}">
      </div>
      <div class="col-md-12 mb-20">
        <label>{{__('lang.email')}}</label>
        <input class="mb-0" name="email" type="email" placeholder="{{__('lang.enter-email')}}" value="{{Auth::user()->email}}">
      </div>
      <div class="col-md-12 mb-20">
        <label>{{__('lang.phone')}}</label>
        <input class="mb-0" name="phone" type="text" placeholder="{{__('lang.enter-number-phone')}}" value="{{Auth::user()->phone}}">
      </div>
      <div class="col-md-12 mb-20">
        <label>{{__('lang.address')}}</label>
        <input class="mb-0" name="address" type="text" placeholder="{{__('lang.enter-address')}}" value="{{Auth::user()->address}}">
      </div>
      <div class="col-md-6 mb-20">
        <label>{{__('lang.birthday')}}</label>
        <input class="mb-0" name="birthday" type="date"  value="{{Auth::user()->birthday}}">
      </div>
      <div class="col-md-6 mb-20">
      </div>
      <div class="col-md-3">
        <label>{{__('lang.gender')}}</label>
      </div>  
        @if(Auth::user()->gender === $gender['boy'])      
        <div class="col-md-1">
                <input class="mb-1" name="gender" value="{{$gender['boy']}}" type="radio" checked>{{__('lang.boy')}}
            </div>
            <div class="col-md-1">
                <input class="mb-0" name="gender" value="{{$gender['girl']}}" type="radio">{{__('lang.girl')}}
            </div>
        @elseif(Auth::user()->gender === $gender['girl'])
        <div class="col-md-1">
                <input class="mb-1" name="gender" value="{{$gender['boy']}}" type="radio">{{__('lang.boy')}}
            </div>
            <div class="col-md-1">
                <input class="mb-0" name="gender" value="{{$gender['girl']}}" type="radio" checked>{{__('lang.girl')}}
            </div>
        @else
            <div class="col-md-1">
                <input class="mb-1" name="gender" value="{{$gender['boy']}}" type="radio">{{__('lang.boy')}}
            </div>
            <div class="col-md-1">
                <input class="mb-0" name="gender" value="{{$gender['girl']}}" type="radio">{{__('lang.girl')}}
            </div>
        @endif
      <div class="col-12">
        <button class="register-button mt-0">{{__('lang.edit')}}</button>
      </div>
    </div>
  </div>
</form>