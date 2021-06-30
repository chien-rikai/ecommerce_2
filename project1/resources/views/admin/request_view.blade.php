@extends('admin.layout.layout')
@section('content')
@include('common.fail')
@if(!empty($suggestMore))
@foreach($suggestMore as $suggest)
<div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
    <div class="ticket-details col-md-10">
        <div class="d-flex pt-20">
            <p class="pl-20">{{$suggest->user->username}}</p>
            @if(!isset($suggest->product_id))
            <p class="pl-20">{{__('lang.request-import')}}</p>
            @else
            <p class="pl-20">{{__('lang.request-increment')}}</p>
            @endif
        </div>
        <p class="pl-20"><strong>{{$suggest->name}}</strong> </p>
        <p class="pl-20">{{$suggest->note}}</p>
        <div class="pl-20">
            <div class="col-4 d-flex">
                <small class="mb-0 mr-2 text-muted text-muted">{{__('lang.created-at')}} :</small>
                <small class="Last-responded mr-2 mb-0 text-muted text-muted">{{$suggest->created_at}}</small>
            </div>
        </div>
    </div>
    <div class="col-md-2 pt-50">
        <div class="btn-group ">
            @include('admin.form.request')
        </div>
    </div>
</div>
<hr/>
@endforeach
{{$suggestMore->links()}}
@else
  {{__('lang.no-data')}}
@endif 
@endsection