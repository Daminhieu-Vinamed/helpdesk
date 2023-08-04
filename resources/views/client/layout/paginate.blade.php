@if ($paginator->lastPage() > 1)
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center mb-0">
        <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url(1) }}" aria-label="Previous">
                <span aria-hidden="true">Prev</span>
            </a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}" aria-current="page">
                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}" aria-label="Next">
                <span aria-hidden="true">Next</span>
            </a>
        </li>
    </ul>
</nav>
@endif