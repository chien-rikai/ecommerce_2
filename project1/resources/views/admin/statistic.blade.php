@extends('admin.layout.layout')
@section('content')
<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-right">
            <p class="mb-0 text-right">{{__('lang.total-revenue')}}</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{number_format($data['total'])}}{{__('lang.vnd')}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-right">
            <p class="mb-0 text-right">{{__('lang.order')}}</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$data['orders']}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-right">
            <p class="mb-0 text-right">{{__('lang.sales')}}</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$data['countSale']}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-right">
            <p class="mb-0 text-right">{{__('lang.user')}}</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$data['users']}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
          <h2 class="card-title mb-0">{{__('lang.analysis')}}</h2>
        </div>
        <div id="chart-container">
        </div>
      </div>
    </div>
  </div>
</div>
<script src="/js/highcharts.js"></script>
@include('admin.script.chart')
@endsection
