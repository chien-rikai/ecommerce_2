@extends('admin.layout.layout')
@section('content')
<body>
    <div class="view">
        <article class="card">
            <header class="card-header table-view">
                <a href="{{route('order.index')}}" class="btn btn-warning" data-abc="true"> <i
                        class="fa fa-chevron-left"></i>{{__('lang.back')}}</a>
            </header>
            <div class="card-body">
                <h3> Order ID: {{$order->id}}</h3>
                <div class="container card view">
                    <div class="row">
                        <div class="col-md-4"> <strong>{{__('lang.customer-name')}}</strong> <br>{{$order->name}}</div>
                        <div class="col-md-4"> <strong>{{__('lang.phone')}}</strong> <br> {{$order->phone}} </div>
                        <div class="col-md-4"> <strong>{{__('lang.email')}}</strong> <br> {{$order->email}}</div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4"> <strong>{{__('lang.orders-address')}}:</strong> <br> {{$order->address}} </div>
                        <div class="col-md-4"> <strong>{{__('lang.orders-status')}}:</strong> <br> {{__('lang.'.$order->status->status)}} </div>
                        <div class="col-md-4"> <strong>{{__('lang.total')}}</strong> <br> {{number_format($order->total_cost)}} (vnd) </div>
                    </div>
                </div>
                <div class="track">
                    <div class="step @if($order->status_id>=$status['processing']) active @endif"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span
                            class="text">{{__('lang.processing')}}</span> </div>
                    <div class="step @if($order->status_id>=$status['shipping']) active @endif"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span
                            class="text">{{__('lang.shipping')}}</span> </div>
                    <div class="step @if($order->status_id>=$status['completed']) active @endif"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
                            class="text">{{ __('lang.completed')}}</span> </div>
                    <div class="step @if($order->status_id>=$status['cancelled']) active @endif"> <span class="icon"> <i class="fa fa-ban "></i> </span> <span
                            class="text">{{__('lang.cancelled')}}</span> </div>
                </div>
                <hr>
                <ul class="row">
                  @foreach($order->detailOrders as $detail)  
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="/images/{{$detail->product->url_img}}" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">{{$detail->product->name}}</p> <span class="text-muted">{{number_format($detail->product->new_price)}}(vnd)</span>
                            <span class="text-muted">x {{$detail->quantity}}</span>
                        </figcaption>
                    </figure>
                </li>
                @endforeach
            </ul>
            </div>
        </article>
    </div>
</body>
@endsection
