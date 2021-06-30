<ul class="hb-dropdown hb-sub-dropdown">
@foreach($cates as $cate)
    <li><a href="{{ route('home.show',[$cate->id])}}">{{$cate->name}}</a></li>
@endforeach
</ul>