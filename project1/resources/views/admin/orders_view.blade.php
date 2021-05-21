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
        {{$order->email}}
    </td>
    <td>
        {{$order->address}}
    </td>
    <td>
        {{trans('lang.'.$order->status->status)}}
    </td>
    <td>
        <a class="btn btn-xs" href="">
            <i class="fa fa-eye"></i></a>
        @if($order->status->status!=='cancelled')    
        <form action="" method="POST">
            <input type="hidden" name="id" value="">
            @csrf
            @Method('PUT')
            <button type="submit" class="btn-default btn-xs">
                <i class="glyphicon glyphicon-trash"></i>{{__('lang.cancel')}}
            </button>
        </form>
        @else
            <div class="btn" disable>{{__('lang.cancelled')}}</div>
        @endif
    </td>
</tr>
@endforeach
@else
    <h3>{{__('lang.no-data')}}</h3>
@endif
@endsection
