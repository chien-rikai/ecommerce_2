@extends('admin.layout.layout')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4">{{__('lang.manage-request')}}</h5>
        <div class="fluid-container data-content">
          @include('admin.request_view')
        </div>
      </div>
    </div>
  </div>
</div>
<script src="/js/paginate_request.js"></script>
@endsection