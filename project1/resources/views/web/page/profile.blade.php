@extends('web.layouts.profile_layout')
@section('tab')
<div class="tab-pane active show" id="orders" aria-labelledby="orders-tab">
    <div class="row">
        <div class="col-md-3">
            <h4 class="font-weight-bold mt-0 mb-4">{{__('lang.past-order')}}</h4>
        </div>
    </div>
    @include('web.shared.order_history_element')
</div>
@endsection
