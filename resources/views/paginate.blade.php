<div class="pagination">
    @if ($paginator->hasPages())
        @if ($paginator->onFirstPage())
            <span class="disabled">&laquo; Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
        @endif

        @foreach ($paginator->getUrlRange(max($paginator->currentPage() - 1, 1), min($paginator->currentPage() + 1, $paginator->lastPage())) as $page => $url)
            @if ($page == $paginator->currentPage())
                <span class="current">{{ $page }}</span>
            @else
                <a href="{{ $url }}">{{ $page }}</a>
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">Next &raquo;</a>
        @else
            <span class="disabled">Next &raquo;</span>
        @endif
    @endif
</div>
