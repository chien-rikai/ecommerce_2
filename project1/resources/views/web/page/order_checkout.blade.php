@extends('web.layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-12">
            @include('web.form.checkout')
        </div>
        <div class="col-lg-6 col-12">
            <div class="your-order">
                <h3>{{__('lang.your-order')}}</h3>
                <div class="your-order-table table-responsive">
                    @include('web.table.total_checkout')
                </div>
                <div class="payment-method">
                        <div class="order-button-payment">
                            <input value="Place order" type="submit">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection