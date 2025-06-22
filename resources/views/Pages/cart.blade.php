@extends('Component.header')
@include('TailwindCssLink.style')

@section('title', 'Customize Tumbler')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('contents')

<section class="w-full max-w-7xl mx-auto bg-white py-6 px-2 sm:px-4 md:px-8 mt-2 mb-12 rounded-lg">
    <h1 class="text-center text-[#191919] text-2xl sm:text-3xl md:text-[32px] font-semibold leading-tight md:leading-[38px]">
        My Shopping Cart
    </h1>
    <div class="flex flex-col lg:flex-row items-start mt-8 gap-6">
        <div class="bg-white p-2 sm:p-4 w-full lg:w-[800px] rounded-xl overflow-x-auto">
            <div class="w-full overflow-x-auto">
                <table class="min-w-[600px] w-full bg-white rounded-xl">
                    <thead>
                        <tr
                            class="text-center border-b border-gray-400 w-full text-[#7f7f7f] text-xs sm:text-sm font-medium uppercase leading-[14px] tracking-wide">
                            <th class="text-left px-2 py-2">Product</th>
                            <th class="px-2 py-2">Name</th>
                            <th class="px-2 py-2">Color</th>
                            <th class="px-2 py-2">Price</th>
                            <th class="px-2 py-2">Quantity</th>
                            <th class="px-2 py-2">Subtotal</th>
                            <th class="w-7 px-2 py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $cart = session('cart', []);
                        $total = 0;
                        @endphp
                        @forelse($cart as $key => $item)
                        @php $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal; @endphp
                        <tr class="text-center">
                            <td class="px-2 py-2 text-left align-top">
                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}"
                                    class="w-[70px] sm:w-[100px] mr-2 inline-block h-[70px] sm:h-[100px]" />
                            </td>
                            <td>{{$item['name']}}</td>
                            <td>
                                <div class="w-6 h-6 sm:w-[30px] sm:h-[30px] inline-block rounded-full"
                                    style="background-color: {{ $item['color'] }};">
                                </div>
                            </td>
                            <td class="px-2 py-2">${{ number_format($item['price'], 2) }}</td>
                            <td class="p-2">
                                <form action="{{ route('update.cart.quantity', $key) }}" method="POST"
                                    class="inline-flex items-center">
                                    @csrf
                                    <button type="submit" name="action" value="decrease"
                                        class="px-2 py-1 bg-gray-200 rounded-l hover:bg-gray-300">-</button>
                                    <input type="text" name="quantity" value="{{ $item['quantity'] }}"
                                        class="w-8 sm:w-10 text-center border border-gray-300" readonly>
                                    <button type="submit" name="action" value="increase"
                                        class="px-2 py-1 bg-gray-200 rounded-r hover:bg-gray-300">+</button>
                                </form>
                            </td>
                            <td class="px-2 py-2">${{ number_format($subtotal, 2) }}</td>
                            <td class="px-2 py-2">
                                <form action="{{ route('remove.from.cart', $key) }}" method="POST" class="remove-cart-form" style="display:inline;">
                                    @csrf
                                    <button type="button" class="text-red-500 hover:text-red-700 remove-cart-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                                @if(isset($item['customized_id']))
                                <button
                                    type="button"
                                    class="inline-block ml-2 text-blue-500 hover:text-blue-700 view-customized-btn"
                                    data-customized-id="{{ $item['customized_id'] }}"
                                    title="View Details">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">Your cart is empty.</td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr class="border-t border-gray-400">
                            <td class="px-2 py-2" colspan="7">
                                <span class="font-bold">Total: ${{ number_format($total, 2) }}</span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="w-full lg:w-[424px] bg-white rounded-lg p-4 sm:p-6 mt-6 lg:mt-0">
            <h2 class="text-[#191919] mb-2 text-lg sm:text-xl font-medium leading-[30px]">
                Cart Total
            </h2>
            <div class="w-full py-3 flex justify-between items-center">
                <span class="text-[#4c4c4c] text-base font-normal leading-normal">Total:</span>
                <span class="text-[#191919] text-base font-semibold leading-tight">${{ number_format($total, 2) }}</span>
            </div>
            <div class="w-full py-3 border-t border-b border-gray-200 flex justify-between items-center">
                <span class="text-[#4c4c4c] text-sm font-normal leading-[21px]">Shipping:</span>
                <span class="text-[#191919] text-sm font-medium leading-[21px]">Free</span>
            </div>
            <div class="w-full py-3 border-b border-gray-200 flex justify-between items-center">
                <span class="text-[#4c4c4c] text-sm font-normal leading-[21px]">Subtotal:</span>
                <span class="text-[#191919] text-sm font-medium leading-[21px]">${{ number_format($total, 2) }}</span>
            </div>
            @php
            $cart = session('cart', []);
            $isAviableitem = !empty($cart);
            @endphp

            @if($isAviableitem)
            <button id="proceed-checkout" type="button"
                class="w-full text-white mt-5 px-6 py-4 bg-[#00b206] rounded-[44px] gap-4 text-base font-semibold leading-tight">
                Proceed to Checkout
            </button>
            @else
            <button type="button"
                class="w-full text-white mt-5 px-6 py-4 bg-gray-400 rounded-[44px] gap-4 text-base font-semibold leading-tight cursor-not-allowed"
                disabled>
                Proceed to Checkout
            </button>
            @endif
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // AJAX for quantity update
        document.querySelectorAll('form[action*="update.cart.quantity"]').forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(form);
                fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Option 1: Reload the page to update totals and UI
                            location.reload();
                            // Option 2: Update the quantity and subtotal in the DOM (advanced)
                        }
                    });
            });
        });

        // AJAX for remove
        document.querySelectorAll('.remove-cart-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to remove this item from your cart?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f53636',
                    cancelButtonColor: '#d5d5d5',
                    confirmButtonText: 'Yes, remove it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = btn.closest('form');
                        const formData = new FormData(form);
                        fetch(form.action, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'X-Requested-With': 'XMLHttpRequest'
                                },
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire('Removed!', 'Item removed from cart.', 'success').then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire('Error', 'Could not remove item.', 'error');
                                }
                            })
                            .catch(() => {
                                Swal.fire('Error', 'Could not remove item.', 'error');
                            });
                    }
                });
            });
        });

        document.getElementById('proceed-checkout').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: '<h1 class="block text-2xl sm:text-3xl font-bold text-[#00b206] mb-2">Checkout</h1>',
                width: '100%',
                customClass: {
                    popup: 'max-w-full sm:max-w-2xl md:max-w-3xl p-2 sm:p-6 rounded-2xl shadow-lg',
                    confirmButton: 'bg-[#00b206] text-white px-6 py-2 rounded-lg font-semibold',
                    cancelButton: 'bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-semibold ml-2'
                },
                html: `
                <div class="text-left space-y-4">
                    <div class="flex flex-col sm:flex-row w-full items-center justify-between gap-4">
                        <div class="w-full sm:w-1/2">
                            <label class="block text-base sm:text-xl font-semibold text-gray-700 mb-2 text-start">Username</label>
                            <input id="swal-username" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" type="text" value="{{ auth()->user() ? auth()->user()->username : '' }}">
                        </div>
                        <div class="w-full sm:w-1/2">
                            <label class="block text-base sm:text-xl font-semibold text-gray-700 mb-2 text-start">Phone Number</label>
                            <input id="swal-phone" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" type="text" value="{{ auth()->user() && auth()->user()->phone ? auth()->user()->phone : '' }}" placeholder="Enter your phone number">
                        </div>
                    </div>
                    <div>
                        <label class="block text-base sm:text-xl font-semibold text-gray-700 mb-2 text-start">Address</label>
                        <div class="flex flex-col sm:flex-row items-center sm:space-x-4 mb-2 gap-2">
                            <label class="flex items-center space-x-1">
                                <input type="radio" name="address-type" id="address-input-radio" checked>
                                <span class="text-sm">Input Address</span>
                            </label>
                            <label class="flex items-center space-x-1">
                                <input type="radio" name="address-type" id="address-map-radio">
                                <span class="text-sm">Select from Map</span>
                            </label>
                        </div>
                        <div id="address-input-div">
                            <div id="address-list" class="space-y-2">
                                <input name="addresses[]" class="w-full px-4 py-2 border border-slate-200 rounded-lg" type="text" placeholder="Enter your address" value="{{ auth()->user() && auth()->user()->address ? auth()->user()->address : '' }}">
                                <button type="button" id="add-address-btn" class="mt-2 p-2 bg-blue-500 text-white rounded-full flex items-center justify-center" title="Add Address">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div id="map-container" style="display:none;">
                            <div id="map" style="height: 300px; width: 100%; margin-bottom: 10px;"></div>
                            <input type="text" id="selected-coords" class="w-full px-4 py-2 border border-slate-200 rounded-lg" placeholder="Selected coordinates" readonly>
                            <input id="selected-location-name" class="mt-2 text-sm text-blue-700 w-full px-4 py-2 border border-slate-200 rounded-lg"  placeholder="location selected" readonly/>
                        </div>
                    </div>
                    <div>
                        <label class="block text-base sm:text-xl font-semibold text-gray-700 mb-2 text-start">Payment Method</label>
                        <div class="flex flex-col sm:flex-row flex-wrap gap-3">
                            <label class="cursor-pointer border border-gray-300 rounded-md hover:shadow-lg transition-shadow w-full sm:w-72">
                                <input type="radio" class="peer sr-only" name="payment" value="cash" checked />
                                <div class="rounded-md bg-white p-5 text-gray-600 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-sky-600 peer-checked:ring-blue-400 peer-checked:ring-offset-2">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-bold">Pay by Cash</span>
                                    </div>
                                </div>
                            </label>
                            <label class="cursor-pointer border border-gray-300 rounded-md hover:shadow-lg transition-shadow w-full sm:w-72">
                                <input type="radio" class="peer sr-only" name="payment" value="online" id="pay-online-radio" />
                                <div class="rounded-md bg-white p-5 text-gray-600 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-sky-600 peer-checked:ring-blue-400 peer-checked:ring-offset-2">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-bold">Online Pay</span>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div id="bank-upload-div" style="display:none;">
                        <img src={{ asset('qr1.jpg') }} alt="Bank Slip" class="w-64 h-72 mx-auto mb-2 mt-6">
                            <label for="swal-bank-slip" class="block text-sm font-semibold text-gray-700 mb-1">Upload Transaction Slip</label>
                            <input type="file" id="swal-bank-slip" class="w-full border-2 rounded-lg" accept="image/*">
                            <span id="bank-slip-tick" style="display:none;" class="inline-block align-middle ml-2 text-green-600 text-2xl">✔️</span>
                            <img id="bank-slip-preview" src="" alt="Preview" class="mt-2 rounded shadow w-56" style="display:none;">
                        </div>
                    </div>
                </div>
            `,
                customClass: {
                    popup: 'max-w-full sm:max-w-2xl md:max-w-3xl p-2 sm:p-6 rounded-2xl shadow-lg',
                    confirmButton: 'bg-[#00b206] text-white px-6 py-2 rounded-lg font-semibold',
                    cancelButton: 'bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-semibold ml-2'
                },
                didOpen: () => {
                    // Address logic
                    const addressInputDiv = document.getElementById('address-input-div');
                    const mapContainer = document.getElementById('map-container');
                    const addressList = document.getElementById('address-list');
                    const addAddressBtn = document.getElementById('add-address-btn');
                    if (addAddressBtn) {
                        addAddressBtn.addEventListener('click', function() {
                            const input = document.createElement('input');
                            input.name = "addresses[]";
                            input.type = "text";
                            input.placeholder = "Enter your address";
                            input.className = "mb-2 w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:border-slate-500 hover:shadow";
                            addressList.appendChild(input);
                        });
                    }
                    document.getElementById('address-input-radio').addEventListener('change', function() {
                        addressInputDiv.style.display = '';
                        mapContainer.style.display = 'none';
                    });
                    document.getElementById('address-map-radio').addEventListener('change', function() {
                        addressInputDiv.style.display = 'none';
                        mapContainer.style.display = '';
                        if (!window._mapInitialized) {
                            window._mapInitialized = true;
                            const cambodiaBounds = [
                                [9.912, 102.333],
                                [14.704, 107.627]
                            ];
                            const map = L.map('map', {
                                maxBounds: cambodiaBounds,
                                maxBoundsViscosity: 1.0,
                                minZoom: 6,
                                maxZoom: 18
                            }).setView([12.5657, 104.9910], 7);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '© OpenStreetMap contributors'
                            }).addTo(map);
                            let marker;
                            map.on('click', function(e) {
                                if (marker) map.removeLayer(marker);
                                marker = L.marker(e.latlng).addTo(map);
                                document.getElementById('selected-coords').value = `${e.latlng.lat}, ${e.latlng.lng}`;
                                fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${e.latlng.lat}&lon=${e.latlng.lng}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        let displayName = data.display_name || 'Unknown location';
                                        document.getElementById('selected-location-name').value = displayName;
                                    })
                                    .catch(() => {
                                        document.getElementById('selected-location-name').value = 'Unable to fetch name';
                                    });
                            });
                        }
                    });
                    // Payment logic
                    document.querySelectorAll('input[name="payment"]').forEach(function(radio) {
                        radio.addEventListener('change', function() {
                            if (this.value === 'online') {
                                document.getElementById('bank-upload-div').style.display = '';
                            } else {
                                document.getElementById('bank-upload-div').style.display = 'none';
                            }
                        });
                    });
                    document.getElementById('bank-upload-div').style.display = 'none';
                    // Bank slip preview with fixed animation
                    const bankSlipInput = document.getElementById('swal-bank-slip');
                    const previewImg = document.getElementById('bank-slip-preview');
                    const tickIcon = document.getElementById('bank-slip-tick');

                    if (bankSlipInput && previewImg && tickIcon) {
                        bankSlipInput.addEventListener('change', function() {
                            const file = this.files[0];
                            if (!file) return;

                            // Clear previous state
                            previewImg.style.display = 'none';
                            tickIcon.style.display = 'none';

                            // Show loading state
                            bankSlipInput.disabled = true;
                            bankSlipInput.parentElement.classList.add('opacity-50');

                            // Simulate processing delay (remove this in production)
                            setTimeout(() => {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    previewImg.src = e.target.result;
                                    previewImg.style.display = 'block';

                                    // Show success state
                                    tickIcon.style.display = 'inline-block';
                                    tickIcon.classList.add('animate-bounce');
                                    setTimeout(() => {
                                        tickIcon.classList.remove('animate-bounce');
                                        bankSlipInput.disabled = false;
                                        bankSlipInput.parentElement.classList.remove('opacity-50');
                                    }, 1000);
                                };
                                reader.readAsDataURL(file);
                            }, 500);
                        });
                    }
                },
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Submit Order',
                cancelButtonText: 'Cancel',
                preConfirm: () => {
                    const username = document.getElementById('swal-username').value.trim();
                    const phone = document.getElementById('swal-phone').value.trim();
                    const addressType = document.getElementById('address-input-radio').checked ? 'input' : 'map';
                    let addresses = [];
                    let coords = '';
                    let locationName = '';

                    if (addressType === 'input') {
                        document.querySelectorAll('input[name="addresses[]"]').forEach(input => {
                            if (input.value.trim()) addresses.push(input.value.trim());
                        });
                        if (addresses.length === 0) {
                            Swal.showValidationMessage('Please enter at least one address.');
                            return false;
                        }
                    } else {
                        coords = document.getElementById('selected-coords').value.trim();
                        if (!coords) {
                            Swal.showValidationMessage('Please select a location on the map.');
                            return false;
                        }
                        locationName = document.getElementById('selected-location-name').value;
                    }

                    const payment = document.querySelector('input[name="payment"]:checked')?.value;
                    let bankSlip = null;
                    if (payment === 'online') {
                        bankSlip = document.getElementById('swal-bank-slip').files[0];
                        if (!bankSlip) {
                            Swal.showValidationMessage('Please upload your transaction slip.');
                            return false;
                        }
                    }

                    if (!username || !phone || !payment) {
                        Swal.showValidationMessage('Please fill all fields');
                        return false;
                    }

                    // Prepare form data
                    const formData = new FormData();
                    formData.append('username', username);
                    formData.append('phone', phone);
                    formData.append('payment', payment);

                    if (addressType === 'input') {
                        addresses.forEach(addr => formData.append('addresses[]', addr));
                    } else {
                        formData.append('coords', coords);
                        if (locationName) {
                            formData.append('selected_location_name', locationName);
                        }
                    }

                    if (bankSlip) formData.append('bank_slip', bankSlip);

                    // CSRF token
                    formData.append('_token', '{{ csrf_token() }}');

                    // Submit order via AJAX
                    return fetch('{{ route("cart.submitOrder") }}', {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json'
                            },
                            body: formData,
                        })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().catch(() => {
                                    throw new Error('Order failed. Please check your input.');
                                }).then(err => {
                                    throw new Error(err.message || 'Order failed');
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (!data.success) {
                                Swal.showValidationMessage(data.message || 'Order failed.');
                                return false;
                            }
                            Swal.fire({
                                icon: 'success',
                                title: 'Order Placed!',
                                text: 'Thank you for your purchase.',
                                confirmButtonColor: '#00b206'
                            }).then(() => {
                                window.location.href = '/orders/' + data.order_id;
                            });
                        })
                        .catch(error => {
                            Swal.showValidationMessage(error.message || 'Order failed. Please try again.');
                            return false;
                        });
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Order Placed!',
                        text: 'Thank you for your purchase.',
                        confirmButtonColor: '#00b206'
                    }).then(() => {
                        window.location.reload();
                    });
                }
            });
        });

        document.querySelectorAll('.view-customized-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const id = btn.getAttribute('data-customized-id');
                // Fetch details via AJAX or show in a modal
                fetch(`/customized_tumbler/${id}/popup`)
                    .then(response => response.text())
                    .then(html => {
                        Swal.fire({
                            title: 'Customized Tumbler Details',
                            html: html,
                            width: 600,
                            showCloseButton: true,
                            showConfirmButton: false,
                        });
                    })
                    .catch(() => {
                        Swal.fire('Error', 'Could not load details.', 'error');
                    });
            });
        });
    });
</script>
@endsection