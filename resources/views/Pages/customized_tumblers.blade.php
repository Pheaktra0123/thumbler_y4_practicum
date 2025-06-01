@extends('Component.header')
@include('TailwindCssLink.style')

@section('title', 'My Customized Tumblers')

@section('contents')
<div class="w-11/12  mx-auto mt-24 mb-16 bg-white shadow-lg p-8 rounded-lg">
    <h1 class="text-2xl font-bold mb-6">My Customized Tumblers</h1>
    @if(empty($customized) || count($customized) === 0)
        <div class="text-gray-500">No customizations found.</div>
    @else
        <div class="space-y-6">
            @foreach($customized as $item)
                <div class="border rounded-lg p-4 flex items-center gap-6 bg-gray-50">
                    {{-- Show original tumbler image --}}
                    @php
                        $tumbler = \App\Models\Tumbler::find($item['tumbler_id']);
                        $thumbs = $tumbler && $tumbler->thumbnails ? (is_array($tumbler->thumbnails) ? $tumbler->thumbnails : json_decode($tumbler->thumbnails, true)) : [];
                        $firstThumb = $thumbs[0] ?? 'black-nobg.png';
                    @endphp
                    <img src="{{ asset('storage/' . $firstThumb) }}" alt="Tumbler" class="w-24 h-24 object-cover rounded border">

                    {{-- Show user's customized image if uploaded --}}
                    @if(!empty($item['image']))
                        <img src="{{ asset('storage/' . $item['image']) }}" alt="Custom Image" class="w-24 h-24 object-cover rounded border-2 border-blue-400">
                    @endif

                    <div class="flex-1">
                        <div><strong>Engraving:</strong> {{ $item['engraving'] ?? '-' }}</div>
                        <div><strong>Font:</strong> {{ $item['font'] ?? '-' }}</div>
                        <div><strong>Color:</strong> <span style="display:inline-block;width:20px;height:20px;background:{{ $item['color'] }};border-radius:50%;vertical-align:middle;"></span> {{ $item['color'] }}</div>
                        <div><strong>Quantity:</strong> {{ $item['quantity'] }}</div>
                    </div>
                    <div class="flex flex-col gap-2 items-end min-w-[160px]">
                        <button 
                            class="w-full bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition delete-btn"
                            data-id="{{ $item['id'] }}">
                            Delete
                        </button>
                        <form id="delete-form-{{ $item['id'] }}" action="{{ route('customized.tumbler.delete', ['id' => $item['id']]) }}" method="POST" style="display:none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full text-center">
        <h2 class="text-xl font-bold mb-4 text-red-600">Delete Customization?</h2>
        <p class="mb-6 text-gray-700">Are you sure you want to delete this customization?</p>
        <div class="flex justify-center gap-4">
            <button id="cancelDeleteBtn" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancel</button>
            <button id="confirmDeleteBtn" class="px-4 py-2 rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
        </div>
    </div>
</div>

<!-- Success Modal -->
@if(session('success'))
<div id="successModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full text-center">
        <h2 class="text-xl font-bold mb-4 text-green-600">Success</h2>
        <p class="mb-6 text-gray-700">{{ session('success') }}</p>
        <button id="closeSuccessBtn" class="px-4 py-2 rounded bg-green-500 text-white hover:bg-green-600">OK</button>
    </div>
</div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    let deleteId = null;
    const deleteModal = document.getElementById('deleteModal');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
    const deleteBtns = document.querySelectorAll('.delete-btn');

    deleteBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            deleteId = this.getAttribute('data-id');
            deleteModal.classList.remove('hidden');
        });
    });

    cancelDeleteBtn.addEventListener('click', function() {
        deleteModal.classList.add('hidden');
        deleteId = null;
    });

    confirmDeleteBtn.addEventListener('click', function() {
        if(deleteId) {
            document.getElementById('delete-form-' + deleteId).submit();
        }
    });

    // Success modal
    const successModal = document.getElementById('successModal');
    const closeSuccessBtn = document.getElementById('closeSuccessBtn');
    if(successModal && closeSuccessBtn) {
        closeSuccessBtn.addEventListener('click', function() {
            successModal.classList.add('hidden');
        });
    }
});
</script>
@endsection
