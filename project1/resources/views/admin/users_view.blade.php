@extends('admin.layout.layout')
@section('content')

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2>Danh sách người dùng</h2>
            </div>
            <div class="col-sm-6">
                <div class="container">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Tất cả
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('user.view')}}/1">Block</a></li>
                            <li><a href="{{route('user.view')}}/0">Non-block</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <table class="table-view table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên người dùng</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
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
                        <form action="{{route('user.block')}}" method="post" onclick="block_confirmation()">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Block" class="glyphicon glyphicon-pencil"></input>
                        </form>
                        @else
                        <form action="{{route('user.unblock')}}" method="post" onclick='unblock_confirmation()'>
                            <input type="hidden" name="id" value="{{$user->id}}">
                            @csrf
                            @method('PUT')
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
            </tbody>
        </table>
    </div>
</body>
<script>
    function block_confirmation() {
        confirm("{{__('lang.block_confirmation')}}");
    }

    function unblock_confirmation() {
        confirm("{{__('lang.unblock_confirmation')}}");
    }
</script>
@endsection
