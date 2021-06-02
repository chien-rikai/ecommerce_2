@extends('web.layouts.profile_layout')
@section('tab')
<div class="page-section mb-60">
  <div class="container">
    @include('common.error')
    @include('common.fail')
    @include('common.success')
    <div class="row">
      <div class="col-sm-12 col-md-12 col-xs-12 mb-30">
        <!-- Login Form s-->
        @include('web.form.profile')
      </div>
    </div>
  </div>
</div>
@endsection