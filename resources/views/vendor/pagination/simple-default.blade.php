@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <ol class="disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></ol>
            @else
                <ol><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></ol>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <ol><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></ol>
            @else
                <ol class="disabled" aria-disabled="true"><span>@lang('pagination.next')</span></ol>
            @endif
        </ul>
    </nav>
@endif
