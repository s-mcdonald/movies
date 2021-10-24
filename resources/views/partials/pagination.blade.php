<div class="paginator">

    @if ($paginator->current > 1)
        <a href="{{ route('search-get', ['phrase' => $phrase, 'page' => ($paginator->current - 1)]) }}">{{ __('app.prev') }}</a>
    @endif

    @for ($i = $paginator->start_at; $i < $paginator->end_at; $i++)
        <a @if ($page === $i) class="current" @endif href="{{ route('search-get', ['phrase' => $phrase, 'page' => $i]) }}">{{ $i }}</a>
    @endfor

    @if ($page < $paginator->total_pages -1)
        <a href="{{ route('search-get', ['phrase' => $phrase, 'page' => ($paginator->current + 1)]) }}">{{ __('app.next') }}</a>
    @endif

    @if ($paginator->total_pages > ($page + 10))
        <a href="{{ route('search-get', ['phrase' => $phrase, 'page' => ($paginator->current + 10)]) }}">{{ __('app.skip_ten') }}</a>
    @endif
</div>