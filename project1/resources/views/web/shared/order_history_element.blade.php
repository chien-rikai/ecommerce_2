@foreach($orders as $order)
<div class="bg-white card  order-list shadow-sm">
    <div class="p-4">
        <div class="media">
            <div class="media-body">
                <a href="#">
                <span class="float-right badge badge-primary">{{__('lang.'.$order->status->status)}}</span>
                </a>
                <h6 class="mb-2">
                    <a href="#"></a>
                    <a href="#" class="text-black">ORDER #{{$order->id}}</a>
                </h6>
                <p class="text-gray mb-1"><i class="fa fa-map-marker"></i>
                    {{$order->address}}
                </p>
                <p class="text-gray mb-3"><i class="fa fa-calendar"></i>{{ $order->created_at}}</p>
                <p class="text-dark"><i class="fa fa-spinner">{{$order->summary}}</i>
                </p>
                <p class="mb-0 text-black text-primary pt-2"><span class="text-black font-weight-bold"> Total
                        Paid:</span> {{number_format($order->total_cost)}}(vnd)
                </p>
            </div>
        </div>
    </div>
</div>
<br>
@endforeach
