@if($paginator->hasPages())
<div class="d-flex justify-content-around align-items-center py-3">
    <span >
        {{__('Showing') }} {{ $paginator->firstItem() }} - {{ $paginator->count() }} {{__('of') }} {{ $paginator->lastPage() }}
    </span>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <!-- Pagination Elements -->
            <!-- "Three Dots" Separator -->
            @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1" aria-disabled="true">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @endif
            @foreach ($elements as $element)
            <!-- Array Of Links -->
            @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">{{ $page }}</a></li>
            @else
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endforeach
            @endif
            @endforeach
            @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            @else
            <li class="page-item disabled">
                <a class="page-link" href="#" rel="next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            @endif
        </ul>
    </nav>
</div>
@endif