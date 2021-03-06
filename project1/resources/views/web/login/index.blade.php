@extends('web.layouts.layout')
@section('content')
<div class="page-section mb-60">
  <div class="container">
    @include('common.error')
    @include('common.fail')
    @include('common.success')
    <div class="row">
      <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
        <!-- Login Form s-->
        @include('web.form.login')
      </div>
      <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
        @include('web.form.register')
      </div>
    </div>
  </div>
</div>
@endsection