@extends('admin.layout.login')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">{{__('lang.login')}}</div>
        <div class="panel-body">
          @include('common.error')
          @include('common.success')
          @include('common.fail')
          @include('admin.form.login')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection