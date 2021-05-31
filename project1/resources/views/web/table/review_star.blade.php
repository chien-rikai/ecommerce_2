
@if(Session::has("Star") == null)
    @for ( $i = 1; $i < 6; $i++) 
        <li class="no-star" onclick="Review('{{$i}}')"><i class="fa fa-star"></i></li>  
    @endfor
    <input type="hidden" name="star_rating" value="0">
@else
    @for($i = 1; $i < 6; $i++)
      @if($i <= Session::get("Star"))
        <li onclick="Review('{{$i}}')"><i class="fa fa-star"></i></li>  
      @else 
        <li class="no-star" onclick="Review('{{$i}}')"><i class="fa fa-star"></i></li>  
      @endif
    @endfor
    <input type="hidden" name="star_rating" value="{{Session::pull('Star')}}">
@endif
