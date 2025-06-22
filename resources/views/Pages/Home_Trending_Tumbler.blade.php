@extends('Component.header')
@extends('TailwindCssLink.style')
@section('title', 'Top Rated Tumblers')
@section('contents')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .rating-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(5px);
        }
    </style>
</head>
<body class="gradient-bg">
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Top Rated Tumblers</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Discover our highest rated tumblers loved by customers
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($trendingTumblers as $tumbler)
                <div class="bg-white rounded-xl overflow-hidden card-hover relative">
                    <!-- Rating Badge -->
                    <div class="rating-badge px-3 py-1 rounded-full flex items-center">
                        <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <span class="font-semibold text-gray-800">{{ number_format($tumbler->avg_rating, 1) }}</span>
                        <span class="text-xs text-gray-500 ml-1">({{ $tumbler->review_count }})</span>
                    </div>

                    <!-- Product Image -->
                    <a href="{{ route('tumbler.details', $tumbler->id) }}">
                        @php
                            $thumbs = is_array($tumbler->thumbnails) ? $tumbler->thumbnails : json_decode($tumbler->thumbnails, true);
                            $firstThumb = $thumbs[0] ?? 'default.png';
                        @endphp
                        <div class="h-[500px] overflow-hidden">
                            <img src="{{ asset('storage/' . $firstThumb) }}" alt="{{ $tumbler->name }}" 
                                class="w-full h-full object-fix transition duration-500 hover:scale-105">
                        </div>
                    </a>

                    <!-- Product Info -->
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <span class="text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ $tumbler->category->name ?? 'Uncategorized' }}
                                </span>
                                <h3 class="text-lg font-semibold text-gray-900 mt-1">
                                    <a href="{{ route('tumbler.details', $tumbler->id) }}" class="hover:text-blue-600">
                                        {{ $tumbler->tumbler_name }}
                                    </a>
                                </h3>
                            </div>
                            <span class="text-sm font-medium text-gray-500">
                                {{ $tumbler->size }} OZ
                            </span>
                        </div>

                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xl font-bold text-gray-900">
                                ${{ number_format($tumbler->price, 2) }}
                            </span>
                           <div class="ml-auto">
                        @if($tumbler->stock > 0)
                      <form action="{{route('add.to.cart', $tumbler->id)}}" method="POST" class="flex items-center add-to-cart-form">
    @csrf
    <button
        type="button" 
        onclick="addToCart(this)"
        class="border border-2 text-sm text-gray-600 px-4 py-2 rounded hover:bg-gray-300 transition duration-200 flex items-center justify-center hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-6 h-6 inline-block mr-2 items-center">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
        </svg>
        Add to Cart
    </button>
</form>
                        @else
                        <p class="text-sm text-red-600 ml-2">Out of Stock</p>
                        @endif
                    </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $trendingTumblers->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>

    @if(session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function addToCart(button) {
    const form = button.closest('form');
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: data.message || 'Added to cart!',
                timer: 2000,
                showConfirmButton: false
            });
            // Optionally update cart count here
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.message || 'Something went wrong!',
            });
        }
    })
    .catch(error => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Something went wrong!',
        });
    });
}
</script>
@endif
</body>
</html>
@endsection