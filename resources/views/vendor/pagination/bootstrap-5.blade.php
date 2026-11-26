@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex flex-col sm:flex-row items-center justify-between gap-3">
        {{-- Mobile View --}}
        <div class="flex justify-between w-full sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center rounded-lg border border-border bg-gray-100 px-3 py-1.5 text-xs font-medium text-gray-400 cursor-not-allowed">
                    &laquo; Sebelumnya
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center rounded-lg border border-border bg-white px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                    &laquo; Sebelumnya
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center rounded-lg border border-border bg-white px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                    Berikutnya &raquo;
                </a>
            @else
                <span class="inline-flex items-center rounded-lg border border-border bg-gray-100 px-3 py-1.5 text-xs font-medium text-gray-400 cursor-not-allowed">
                    Berikutnya &raquo;
                </span>
            @endif
        </div>

        {{-- Desktop View --}}
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div class="text-xs text-muted-foreground">
                Menampilkan
                <span class="font-semibold text-gray-900">{{ $paginator->firstItem() }}</span>
                sampai
                <span class="font-semibold text-gray-900">{{ $paginator->lastItem() }}</span>
                dari
                <span class="font-semibold text-gray-900">{{ $paginator->total() }}</span>
                data
            </div>

            <ul class="inline-flex items-center gap-1">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-border bg-gray-50 text-xs text-gray-400 cursor-not-allowed" aria-hidden="true">&lsaquo;</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"
                           class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-border bg-white text-xs font-medium text-gray-700 hover:bg-gray-50 transition-colors">&lsaquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li aria-disabled="true">
                            <span class="inline-flex h-8 px-2 items-center justify-center text-xs text-muted-foreground">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li aria-current="page">
                                    <span class="inline-flex h-8 min-w-[2rem] px-2.5 items-center justify-center rounded-lg bg-primary text-xs font-semibold text-white shadow-sm">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}"
                                       class="inline-flex h-8 min-w-[2rem] px-2.5 items-center justify-center rounded-lg border border-border bg-white text-xs font-medium text-gray-700 hover:bg-gray-50 transition-colors">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"
                           class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-border bg-white text-xs font-medium text-gray-700 hover:bg-gray-50 transition-colors">&rsaquo;</a>
                    </li>
                @else
                    <li aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-border bg-gray-50 text-xs text-gray-400 cursor-not-allowed" aria-hidden="true">&rsaquo;</span>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
@endif
