@extends('admin.layout.orders_table_data')
@section('action')
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
            {{__('lang.'.$order->status->status)}}
        </td>
        <td>
            <!--
        Action form
        Form button to cancel/ delete
        Delete button only show when order had been canncelled
      -->
            <div class="recover-btn">
                <a class="btn-default btn-xs" href="{{route('order.restore',[$order->id])}}">
                    <i class="fa fa-recycle"></i>&nbsp;{{__('lang.restore')}}</a>
            </div>
            <div class="hard-delete-order">
                <a class="btn-default btn-xs" href="{{route('order.destroy',[$order->id])}}">
                    <i class="glyphicon glyphicon-trash"></i>&nbsp;{{__('lang.hard-delete')}}</a>
            </div>
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
@endsection
