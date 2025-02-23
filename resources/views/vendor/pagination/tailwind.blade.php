@if ($paginator->hasPages())
<table class="">
    <tr>
        <td>
            <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
            <p class="text-sm text-muted">
                {!! __('Showing') !!}
                @if ($paginator->firstItem())
                    <span class="font-weight-bold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-weight-bold">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span class="font-weight-bold">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>
        </div>
    </div>
        </td>
    </tr>

    <tr>
        <td>
            <div class="d-flex justify-content-between align-item-center mb-3">
                <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="d-flex justify-content-between">
                    <div class="d-flex justify-content-between flex-1 d-sm-none">
                        @if ($paginator->onFirstPage())
                            <span class="page-link disabled" aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                                {!! __('pagination.previous') !!}
                            </span>
                        @else
                            <a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev" aria-label="{{ __('pagination.previous') }}">
                                {!! __('pagination.previous') !!}
                            </a>
                        @endif

                        @if ($paginator->hasMorePages())
                            <a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next" aria-label="{{ __('pagination.next') }}">
                                {!! __('pagination.next') !!}
                            </a>
                        @else
                            <span class="page-link disabled" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                                {!! __('pagination.next') !!}
                            </span>
                        @endif
                    </div>

                    <div class="d-none d-sm-flex flex-1 justify-content-between align-items-center">
                        <div>
                            <ul class="pagination">
                                {{-- Previous Page Link --}}
                                @if ($paginator->onFirstPage())
                                    <li class="page-item disabled" aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                                        <span class="page-link" aria-hidden="true">&laquo;</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('pagination.previous') }}">&laquo;</a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($elements as $element)
                                    {{-- "Three Dots" Separator --}}
                                    @if (is_string($element))
                                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                                    @endif

                                    {{-- Array Of Links --}}
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            @if ($page == $paginator->currentPage())
                                                <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                            @else
                                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($paginator->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ __('pagination.next') }}">&raquo;</a>
                                    </li>
                                @else
                                    <li class="page-item disabled" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                                        <span class="page-link" aria-hidden="true">&raquo;</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </td>
    </tr>
</table>


@endif
