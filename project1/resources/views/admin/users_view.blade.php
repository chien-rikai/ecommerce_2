@extends('admin.layout.users_table_layout')
@section('users-data')
@if(!empty($users))
<?php $stt = 1 ?>
@foreach($users as $user)
<tr>
    <td>
        <a class="btn btn-default btn-circle">{{$stt++}}</a>
    </td>
    <td>
        {{$user->username}}
    </td>
    <td>
        {{$user->full_name}}
    </td>
    <td>
        {{$user->email}}
    </td>
    <td>
        {{$user->phone}}
    </td>
    <td>
        {{$user->address}}
    </td>
    <td>
        @if($user->block)
        Blocked
        @else
        Active
        @endif
    </td>
    <td>
        @if((int)$user->block==0)
        <form action="{{route('user.update',[$user->id])}}" method="post" onclick="block_confirmation()">
            @csrf
            {{ method_field('PATCH') }}
            <input type="hidden" name="id" value="{{$user->id}}">
            <input type="hidden" name="block" value="{{(int)$user->block}}">
            <input type="submit" value="Block" class="glyphicon glyphicon-pencil"></input>
        </form>
        @else
        <form action="{{route('user.update',[$user->id])}}" method="post" onclick='unblock_confirmation()'>
            @csrf
            {{ method_field('PATCH') }}
            <input type="hidden" name="id" value="{{$user->id}}">
            <input type="hidden" name="block" value="{{(int)$user->block}}">
            <input type="submit" value="Unblock" class="glyphicon glyphicon-pencil"></input>
        </form>
        </form>
        @endif
        <a class="btn-default btn-xs" href="">
            <i class="glyphicon glyphicon-trash"></i>Xóa</a>
    </td>
</tr>
@endforeach
@else
<h2>Không có dữ liệu</h2>
@endif
@endsection
