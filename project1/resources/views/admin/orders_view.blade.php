@extends('admin.layout.orders_table_layout')
@section('orders-data')
<?php $stt = 1 ?>
@if(!empty($orders))
@foreach($orders as $order)
<tr>
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
        {{trans('lang.'.$order->status->status)}}
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
        <form action="{{route('order.destroy',[$order->id])}}" method="POST" onclick='delete_confirmation()'>
            <input type="hidden" name="id" value="{{$order->id}}">
            @csrf
            @Method('DELETE')
            <button type="submit" class="btn-default btn-xs">
                <i class="glyphicon glyphicon-trash"></i>{{__('lang.delete')}}
            </button>
        </form>
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
<script>
    function delete_confirmation() {
        confirm("{{__('lang.delete_order_confirmation')}}");
    }
</script>
@endsection
