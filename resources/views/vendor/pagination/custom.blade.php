@if($paginator->hasPages())
    <div class="paginations">
        <ul class="pager">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"><a class="pager-prev" href="#"></a></li>
            @else
                <li><a class="pager-prev" href="{{ $paginator->previousPageUrl() }}"></a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled"><a href="#">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="pager-number active" href="#">{{ $page }}</a></li>
                        @else
                            <li><a class="pager-number" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a class="pager-next" href="{{ $paginator->nextPageUrl() }}"></a></li>
            @else
                <li class="disabled"><a class="pager-next" href="#"></a></li>
            @endif
        </ul>
    </div>
@endif
