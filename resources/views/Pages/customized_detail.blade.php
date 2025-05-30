{{-- filepath: resources/views/Pages/customized_detail.blade.php --}}
@extends('Component.header')
@include('TailwindCssLink.style')

@section('title', 'Customized Tumbler Detail')

@section('contents')
<div class="w-full max-w-xl mx-auto mt-20 bg-white shadow-lg p-8 rounded-lg">
    <h1 class="text-2xl font-bold mb-6">Customized Tumbler Detail</h1>
    @if(session('error'))
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">{{ session('error') }}</div>
    @endif
    @if($tumbler)
        @php
            $thumbs = $tumbler->thumbnails ? (is_array($tumbler->thumbnails) ? $tumbler->thumbnails : json_decode($tumbler->thumbnails, true)) : [];
            $firstThumb = $thumbs[0] ?? 'black-nobg.png';
        @endphp
        <img src="{{ asset('storage/' . $firstThumb) }}" alt="Tumbler" class="w-40 h-40 object-cover rounded border mb-4">
    @endif
    @if(!empty($custom['image']))
        <img src="{{ asset('storage/' . $custom['image']) }}" alt="Custom Image" class="w-40 h-40 object-cover rounded border-2 border-blue-400 mb-4">
    @endif
    <div class="mb-2"><strong>Engraving:</strong> {{ $custom['engraving'] ?? '-' }}</div>
    <div class="mb-2"><strong>Font:</strong> {{ $custom['font'] ?? '-' }}</div>
    <div class="mb-2"><strong>Color:</strong> <span style="display:inline-block;width:20px;height:20px;background:{{ $custom['color'] }};border-radius:50%;vertical-align:middle;"></span> {{ $custom['color'] }}</div>
    <div class="mb-2"><strong>Quantity:</strong> {{ $custom['quantity'] }}</div>
    <a href="{{ route('customized.tumblers') }}" class="mt-4 inline-block bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Back to My Customizations</a>
</div>
@endsection