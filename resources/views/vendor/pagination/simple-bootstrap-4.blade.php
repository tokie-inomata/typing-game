@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <ol class="page-item disabled" aria-disabled="true">
                    <span class="page-link">前のページ</span>
                </ol>
            @else
                <ol class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">前のページ</a>
                </ol>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <ol class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">次のページ</a>
                </ol>
            @else
                <ol class="page-item disabled" aria-disabled="true">
                    <span class="page-link">次のページ</span>
                </ol>
            @endif
        </ul>
    </nav>
@endif
