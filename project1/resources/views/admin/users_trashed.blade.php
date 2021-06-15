@extends('admin.layout.users_table_data')
@section('action')
<tbody>
        @if(!empty($users))
        <?php $stt = 1 ?>
        @foreach($users as $user)
        <tr id="user_{{$user->id}}">
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
                <div class="recover-btn">
                    <a class="btn-default btn-xs" href="{{route('user.restore',[$user->id])}}">
                        <i class="fa fa-recycle"></i>&nbsp;{{__('lang.restore')}}</a>
                </div>
                <div class="hard-delete-btn">
                    <a class="btn-default btn-xs" href="{{route('user.destroy',[$user->id])}}">
                        <i class="glyphicon glyphicon-trash"></i>&nbsp;{{__('lang.hard-delete')}}</a>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <h2>{{__('lang.no-data')}}</h2>
        @endif
    </tbody>
@endsection