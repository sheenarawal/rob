@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center pagination-sm mb-0">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a tabindex="-1" href="#" class="page-link">Previous</a>
                </li>
            @else
                <li class="page-item">
                    <a tabindex="-1" href="{{ $paginator->previousPageUrl() }}" class="page-link">Previous</a>
                </li>
            @endif
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><a href="#" class="page-link ">1</a></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a href="#" class="page-link">{{ $page }}</a></li>
                        @else
                            <li class="page-item "><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a href="#" class="page-link">Next</a>
                </li>
            @endif
        </ul>
    </nav>
@endif