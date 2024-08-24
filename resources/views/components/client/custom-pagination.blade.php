@if ($paginator->hasPages())
    <div class="paginations">
        <ul class="pager">
            @if ($paginator->onFirstPage())
                <li class="disabled"><span></span></li>
            @else
                <li><a class="pager-prev" href="{{ $paginator->previousPageUrl() }}"></a></li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

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

            @if ($paginator->hasMorePages())
                <li><a class="pager-next" href="{{ $paginator->nextPageUrl() }}"></a></li>
            @else
                <li class="disabled"><span></span></li>
            @endif
        </ul>
    </div>
@endif
