@if ($paginator->lastPage() > 1)
<ul class="pagination-box">
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a href="#" name='{{$i}}' aria-controls="grid-view" class="paginate" aria-selected="true" data-toggle="tab" id="paginate">{{ $i }}</a>
        </li>
    @endfor
</ul>
@endif