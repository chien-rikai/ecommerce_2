@extends('web.layouts.profile_layout')
@section('tab')
<div class="tab-pane active show" id="orders" aria-labelledby="orders-tab">
    <div class="row">
        <div class="col-md-3">
            <h4 class="font-weight-bold mt-0 mb-4">{{__('lang.past-order')}}</h4>
        </div>
        <div class="col-md-9">
            <ul class="filters" id="filters">
                <li>{{__('lang.status')}} :</li>
                @foreach($status as $key=>$st)
                <li>
                    <input type="checkbox" value="{{$st}}" id="filter-categorya" />
                    <label for="filter-categorya">{{$key}}</label>
                </li>
                @endforeach
                <li>
                    <div class="btn btn-primary">Lọc</div>
                </li>
            </ul>
        </div>
    </div>
    @include('web.shared.order_history_element')
</div>
@endsection
