@if ($paginator->hasPages())
    <div class="pagination" >
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')"> <i class="icon"></i> </a>
        @else
            <a class="item" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> <span class="icon">上一页</span> </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="item disabled" aria-disabled="true">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="item active" href="{{ $url }}" aria-current="page">{{ $page }}</a>
                    @else
                        <a class="item" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="item" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <span class="icon">下一页</span> </a>
        @else
            <a class="item disabled" aria-disabled="true" aria-label="@lang('pagination.next')"> <i class="icon"></i> </a>
        @endif
    </div>
@endif
