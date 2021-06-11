<table class="table-view table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>{{__('lang.customer-name')}}</th>
            <th>{{__('lang.phone')}}</th>
            <th>{{__('lang.orders-address')}}</th>
            <th>{{__('lang.orders-status')}}</th>
            <th>{{__('lang.feature')}}</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 1 ?>
        @if(!empty($orders))
        @foreach($orders as $order)
        <tr id="order_{{$order->id}}">
            <td>
                <a class="btn btn-default btn-circle">{{$stt++}}</a>
            </td>
            <td>
                {{$order->name}}
            </td>
            <td>
                {{$order->phone}}
            </td>
            <td>
                {{$order->address}}
            </td>
            <td>
                <input type="hidden" class="id_order" value="{{$order->id}}">
                <div class="switch-toggle switch-3 switch-candy">
                    @foreach($status as $key=>$st)
                    @if($st!=$status['cancelled'])
                    <input id='{{$order->id}}_{{$key}}' class="status_toggle" type="radio" @if($order->status->id==$st)
                    checked @endif/>
                    <label for="{{$order->id}}_{{$key}}">{{$key}}</label>
                    @endif
                    @endforeach
                    <a></a>
                </div>
            </td>
            <td>
                <!--
        Action form
        Form button to cancel/ delete
        Delete button only show when order had been canncelled
      -->
                <a class="btn btn-xs" href="{{route('order.show',[$order->id])}}">
                    <i class="fa fa-eye"></i></a>
                @if($order->status_id!==$status['cancelled'])
                <form action="{{route('order.update',[$order->id])}}" method="POST">
                    <input type="hidden" name="id" value="{{$order->id}}">
                    @csrf
                    @Method('PUT')
                    <input type="hidden" name="status" value="cancelled">
                    <button type="submit" class="btn-default btn-xs">
                        <i class="glyphicon glyphicon-trash"></i>{{__('lang.cancel')}}
                    </button>
                </form>
                @else
                <div class="delete-order">
                    <a class="btn-default btn-xs" href="{{route('order.destroy',[$order->id])}}">
                        <i class="glyphicon glyphicon-trash"></i>{{__('lang.delete')}}</a>
                </div>
                @endif
                <!--
       End action
    -->
            </td>
        </tr>
        @endforeach
        <!--Pagination start-->
        {{ $orders->links() }}
        <!--Pagination end-->
        @else
        <h3>{{__('lang.no-data')}}</h3>
        @endif

    </tbody>
</table>
