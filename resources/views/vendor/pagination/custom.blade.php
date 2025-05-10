@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center mt-6">
        <ul class="inline-flex items-center space-x-1 pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded cursor-not-allowed">&laquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-100">
                        &laquo;
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded cursor-not-allowed">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-4 py-2 text-white bg-blue-500 border border-blue-500 rounded">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-100">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-100">
                        &raquo;
                    </a>
                </li>
            @else
                <li>
                    <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded cursor-not-allowed">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paginationLinks = document.querySelectorAll('.pagination a'); // Select pagination links
        const loadingSpinner = document.getElementById('pagination-loading-spinner'); // Select the spinner

        paginationLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                // Remove e.preventDefault() to allow default navigation
                const url = this.href; // Get the URL of the clicked link

                // Show the loading spinner
                loadingSpinner.classList.remove('hidden');
            });
        });
    });
</script>