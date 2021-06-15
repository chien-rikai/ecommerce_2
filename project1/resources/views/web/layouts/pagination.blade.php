
@if ($paginator->lastPage() > 1)
<ul class="pagination-box">
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <nav id="paginate"><a aria-selected="true" href="#" aria-controls="grid-view" class="paginate show" data-toggle="tab" >{{ $i }}</a></nav>
        </li>
    @endfor
</ul>
@endif