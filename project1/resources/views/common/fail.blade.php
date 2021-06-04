@if(Session::has('fail'))
  <div class="alert alert-danger">
    {{Session::pull('fail')}}
  </div>
@endif 

