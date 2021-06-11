<table class="table-view table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>{{__('lang.user')}}</th>
            <th>{{__('lang.customer-name')}}</th>
            <th>{{__('lang.email')}}</th>
            <th>{{__('lang.phone')}}</th>
            <th>{{__('lang.address')}}</th>
            <th>{{__('lang.user-status')}}</th>
            <th>{{__('lang.feature')}}</th>
        </tr>
    </thead>
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
                @if((int)$user->block==0)
                <form action="{{route('user.update',[$user->id])}}" method="post"
                    onsubmit="return block_confirmation()">
                    @csrf
                    {{ method_field('PATCH') }}
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <input type="hidden" name="block" value="{{(int)$user->block}}">
                    <input type="submit" value="Block" class="glyphicon glyphicon-pencil"></input>
                </form>
                @else
                <form action="{{route('user.update',[$user->id])}}" method="post"
                    onsubmit='return unblock_confirmation()'>
                    @csrf
                    {{ method_field('PATCH') }}
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <input type="hidden" name="block" value="{{(int)$user->block}}">
                    <input type="submit" value="Unblock" class="glyphicon glyphicon-pencil"></input>
                </form>
                </form>
                @endif
                <div class="delete-btn">
                    <a class="btn-default btn-xs" href="{{route('user.destroy',[$user->id])}}">
                        <i class="glyphicon glyphicon-trash"></i>{{__('lang.delete')}}</a>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <h2>{{__('lang.no-data')}}</h2>
        @endif
    </tbody>
    <tfoot>{{$users->links()}}</tfoot>
</table>
