@extends('Component.header')
@include('TailwindCssLink.style')

@section('title', 'Customize Tumbler')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
@section('contents')

    <section class="w-11/12 mx-auto bg-white py-9 px-8 mt-24 mb-12 rounded-lg">
        <h1 class="text-center text-[#191919]  text-[32px] font-semibold leading-[38px]">
            My Shopping Cart
        </h1>
        <div class="flex items-start mt-8 gap-6">
            <div class="bg-white p-4 w-[800px] rounded-xl">
                <table class="w-full bg-white rounded-xl">
                    <thead>
                        <tr
                            class="text-center border-b border-gray-400 w-full text-[#7f7f7f] text-sm font-medium uppercase leading-[14px] tracking-wide">
                            <th class="text-left px-2 py-2">Product</th>
                            <th class="px-2 py-2">Name</th>
                            <th class="px-2 py-2">Color</th>
                            <th class="px-2 py-2">price</th>
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
                                                    class="w-[100px] mr-2 inline-block h-[100px]" />
                                            </td>
                                            <td>{{$item['name']}}</td>
                                            <td class="" ">
                                            <div class=" w-[30px] h-[30px] inline-block rounded-full"
                                                style="background-color: {{ $item['color'] }};">
                            </div>
                            </td>
                            <td class="px-2 py-2">${{ number_format($item['price'], 2) }}</td>
                            <td class="p-2">
                                <form action="{{ route('update.cart.quantity', $key) }}" method="POST"
                                    style="display:inline-flex; align-items:center;">
                                    @csrf
                                    <button type="submit" name="action" value="decrease"
                                        class="px-2 py-1 bg-gray-200 rounded-l hover:bg-gray-300">-</button>
                                    <input type="text" name="quantity" value="{{ $item['quantity'] }}"
                                        class="w-10 text-center border border-gray-300" readonly>
                                    <button type="submit" name="action" value="increase"
                                        class="px-2 py-1 bg-gray-200 rounded-r hover:bg-gray-300">+</button>
                                </form>
                            </td>
                            <td class="px-2 py-2">${{ number_format($subtotal, 2) }}</td>
                            <td class="px-2 py-2">
                                <form action="{{ route('remove.from.cart', $key) }}" method="POST" class="remove-cart-form">
                                    @csrf
                                    <button type="button" class="text-red-500 remove-cart-btn">Remove</button>
                                </form>
                            </td>
                            </tr>
                        @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Your cart is empty.</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
                <tr class="border-t border-gray-400">
                    <td class="px-2 py-2" colspan="2">
                        <span class="font-bold">Total: ${{ number_format($total, 2) }}</span>
                    </td>
                </tr>
            </tfoot>
            </table>
        </div>
        <div class="w-[424px] bg-white rounded-lg p-6">
            <h2 class="text-[#191919] mb-2 text-xl font-medium leading-[30px]">
                Cart Total
            </h2>
            <div class="w-[376px] py-3 justify-between items-center flex">
                <span class="text-[#4c4c4c] text-base font-normal leading-normal">Total:</span><span
                    class="text-[#191919] text-base font-semibold leading-tight">${{ number_format($total, 2) }}</span>
            </div>
            <div class="w-[376px] py-3 shadow-[0px_1px_0px_0px_rgba(229,229,229,1.00)] justify-between items-center flex">
                <span class="text-[#4c4c4c] text-sm font-normal leading-[21px]">Shipping:</span><span
                    class="text-[#191919] text-sm font-medium leading-[21px]">Free</span>
            </div>
            <div class="w-[376px] py-3 shadow-[0px_1px_0px_0px_rgba(229,229,229,1.00)] justify-between items-center flex">
                <span class="text-[#4c4c4c] text-sm font-normal leading-[21px]">Subtotal:</span><span
                    class="text-[#191919] text-sm font-medium leading-[21px]">${{ number_format($total, 2) }}</span>
            </div>
            <button id="proceed-checkout" type="button"
                class="w-[376px] text-white mt-5 px-10 py-4 bg-[#00b206] rounded-[44px] gap-4 text-base font-semibold leading-tight">
                Proceed to checkout
            </button>
        </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.userAddress = @json(auth()->user()->address);
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // AJAX for quantity update
            document.querySelectorAll('form[action*="update.cart.quantity"]').forEach(function (form) {
                form.addEventListener('submit', function (e) {
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
            document.querySelectorAll('.remove-cart-btn').forEach(function (btn) {
                btn.addEventListener('click', function (e) {
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
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: formData
                            })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        btn.closest('tr').remove();
                                        Swal.fire('Removed!', 'Item removed from cart.', 'success');
                                        // Optionally reload to update totals
                                        location.reload();
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

            document.getElementById('proceed-checkout').addEventListener('click', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: '<h1 class="block text-3xl font-bold text-[#00b206] mb-2">Checkout</h1>',
                    width: 800,
                    html: `
            <div class="text-left space-y-4">
                <div class="flex w-full item-center justify-between gap-4">
                <div class="w-1/2">
                    <label class="block text-xl font-semibold text-gray-700 mb-2 text-start">Username</label>
                    <input id="swal-username" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" type="text" value="{{ auth()->user() ? auth()->user()->username : '' }}">
                </div>
                 <div class="w-1/2">
                    <label class="block text-xl font-semibold text-gray-700 mb-2 text-start">Phone Number</label>
                    @if(auth()->user() && auth()->user()->phone)
                        <input id="swal-phone" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" type="text" value="{{ auth()->user()->phone }}">
                    @else
                        <input id="swal-phone" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline:none focus:border-slate-500 hover:shadow" type="text" placeholder="Enter your phone number">
                    @endif
                </div>
                </div>
                <div>
                    <label class="block text-xl font-semibold text-gray-700 mb-2 text-start">Address</label>
                    <div class="flex items-center space-x-4 mb-2">
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
            <div class="address-item flex items-center gap-2">
                @if(auth()->user() && auth()->user()->address)
                    <input name="addresses[]" class="w-full px-4 py-2 border border-slate-200 rounded-lg" type="text" placeholder="Enter your address" value="{{ auth()->user()->address }}">
                @else
                    <input name="addresses[]" class="w-full px-4 py-2 border border-slate-200 rounded-lg" type="text" placeholder="Enter your address">
                    <button type="button" id="add-address-btn" class="mt-2 p-2 bg-blue-500 text-white rounded-full flex items-center justify-center" title="Add Address">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </button>
                @endif
            </div>
        </div>
    </div>
                        <div id="map-container" style="display:none;">
                        <div id="map" style="height: 300px; width: 100%; margin-bottom: 10px;"></div>
                        <input type="text" id="selected-coords" class="w-full px-4 py-2 border border-slate-200 rounded-lg" placeholder="Selected coordinates" readonly>
                        <input id="selected-location-name" class="mt-2 text-sm text-blue-700 w-full px-4 py-2 border border-slate-200 rounded-lg"  placeholder="location selected" readonly/>
                    </div>
                </div>
                <div>
                   <div class="flex  items-center">
      <div class="">
        <label class="block text-xl font-semibold text-gray-700 mb-2 text-start">Payment Method</label>
        <div class="flex flex-wrap gap-3">
          <label class="cursor-pointer border border-gray-300 rounded-md hover:shadow-lg transition-shadow">
            <input type="radio" class="peer sr-only" name="payment" value="cash" checked />
            <div class="w-72 max-w-xl rounded-md bg-white  p-5 text-gray-600  ring-2 ring-transparent transition-all hover:shadow peer-checked:text-sky-600 peer-checked:ring-blue-400 peer-checked:ring-offset-2">
                <div class="flex items-center justify-between">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
    </svg>

                  <div class="text-sm font-bold">Pay by Cash</div>
                </div>
            </div>
          </label>

          <label class="cursor-pointer border border-gray-300 rounded-md hover:shadow-lg transition-shadow">
            <input type="radio" class="peer sr-only" name="payment" value="online" id="pay-online-radio" />
            <div class="w-72 max-w-xl rounded-md bg-white  p-5 text-gray-600  ring-2 ring-transparent transition-all hover:shadow peer-checked:text-sky-600 peer-checked:ring-blue-400 peer-checked:ring-offset-2">
                <div class="flex items-center justify-between">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
    </svg>
                  <div class="text-sm font-bold">Online Pay</div>
                </div>
            </div>
          </label>
        </div>
        </div>
      </div>
    </div>
                        </div>
                        <div id="bank-upload-div" style="display:none;">
                          <div class="mt-4 flex items-center justify-center gap-5">
                           <image src="{{ asset('qr (1).jpg') }}" alt="Bank Slip" class="w-56 56 mb-4 mt-4 rounded-lg shadow-md">
                        <image src="{{ asset('qr (1).jpg') }}" alt="Bank Slip" class="w-56 56 mb-4 mt-4 rounded-lg shadow-md">
                          </div>
                            <label for="swal-bank-slip" class="block text-sm font-semibold text-gray-700 mb-1">Upload Transaction Slip</label>
                            <input type="file" id="swal-bank-slip" class="w-full border-2 rounded-lg" accept="image/*">
    <span id="bank-slip-tick" style="display:none;" class="inline-block align-middle ml-2 text-green-600 text-2xl">✔️</span>
    <img id="bank-slip-preview" src="" alt="Preview" class="mt-2 rounded shadow w-56" style="display:none;">
                        </div>
                    </div>
                `,
                    customClass: {
                        popup: 'p-6 rounded-2xl shadow-lg',
                        confirmButton: 'bg-[#00b206] text-white px-6 py-2 rounded-lg font-semibold',
                        cancelButton: 'bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-semibold ml-2'
                    },
                    didOpen: () => {
                        Swal.getPopup().style.overflowY = 'auto';

                        // Multi-address logic
                        const addressInputDiv = document.getElementById('address-input-div');
                        const mapContainer = document.getElementById('map-container');
                        const addressList = document.getElementById('address-list');
                        const addAddressBtn = document.getElementById('add-address-btn');
                        if (addAddressBtn) {
                            addAddressBtn.addEventListener('click', function () {
                                const input = document.createElement('input');
                                input.name = "addresses[]";
                                input.type = "text";
                                input.placeholder = "Enter your address";
                                input.className = "mb-2 w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:border-slate-500 hover:shadow";
                                addressList.appendChild(input);
                            });
                        }

                        // Address input/map toggle
                        document.getElementById('address-input-radio').addEventListener('change', function () {
                            addressInputDiv.style.display = '';
                            mapContainer.style.display = 'none';
                        });
                        document.getElementById('address-map-radio').addEventListener('change', function () {
                            addressInputDiv.style.display = 'none';
                            mapContainer.style.display = '';
                            // Initialize map only once per modal open
                            if (!window._mapInitialized) {
                                window._mapInitialized = true;
                                // Cambodia bounding box: [SouthWest latlng, NorthEast latlng]
                                const cambodiaBounds = [
                                    [9.912, 102.333],   // Southwest corner (lat, lng)
                                    [14.704, 107.627]   // Northeast corner (lat, lng)
                                ];
                                const map = L.map('map', {
                                    maxBounds: cambodiaBounds,
                                    maxBoundsViscosity: 1.0,
                                    minZoom: 6,
                                    maxZoom: 18
                                }).setView([12.5657, 104.9910], 7); // Center on Cambodia

                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    attribution: '© OpenStreetMap contributors'
                                }).addTo(map);

                                let marker;
                                map.on('click', function (e) {
                                    if (marker) map.removeLayer(marker);
                                    marker = L.marker(e.latlng).addTo(map);

                                    document.getElementById('selected-coords').value = `${e.latlng.lat}, ${e.latlng.lng}`;

                                    // Reverse geocoding (as before)
                                    fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${e.latlng.lat}&lon=${e.latlng.lng}`)
                                        .then(response => response.json())
                                        .then(data => {
                                            let displayName = data.display_name || 'Unknown location';
                                            let nameDiv = document.getElementById('selected-location-name');
                                            if (!nameDiv) {
                                                nameDiv = document.createElement('div');
                                                nameDiv.id = 'selected-location-name';
                                                nameDiv.className = 'mt-2 text-sm text-blue-700';
                                                document.getElementById('map-container').appendChild(nameDiv);
                                            }
                                            nameDiv.textContent = `Selected location: ${displayName}`;
                                        })
                                        .catch(() => {
                                            let nameDiv = document.getElementById('selected-location-name');
                                            if (!nameDiv) {
                                                nameDiv = document.createElement('div');
                                                nameDiv.id = 'selected-location-name';
                                                nameDiv.className = 'mt-2 text-sm text-blue-700';
                                                document.getElementById('map-container').appendChild(nameDiv);
                                            }
                                            nameDiv.textContent = 'Selected location: (unable to fetch name)';
                                        });
                                });
                            }
                        });

                        // Default state
                        addressInputDiv.style.display = '';
                        mapContainer.style.display = 'none';

                        // Payment method toggle
                        document.querySelectorAll('input[name="payment"]').forEach(function (radio) {
                            radio.addEventListener('change', function () {
                                if (this.value === 'online') {
                                    document.getElementById('bank-upload-div').style.display = '';
                                } else {
                                    document.getElementById('bank-upload-div').style.display = 'none';
                                }
                            });
                        });
                        // Hide upload by default
                        document.getElementById('bank-upload-div').style.display = 'none';

                        // --- ADD THIS BLOCK INSIDE didOpen ---
                        const bankSlipInput = document.getElementById('swal-bank-slip');
                        const previewImg = document.getElementById('bank-slip-preview');
                        const tickIcon = document.getElementById('bank-slip-tick');
                        if (bankSlipInput && previewImg && tickIcon) {
                            bankSlipInput.addEventListener('change', function () {
                                const file = this.files[0];
                                if (file) {
                                    const reader = new FileReader();
                                    reader.onload = function (e) {
                                        previewImg.src = e.target.result;
                                        previewImg.style.display = 'block';
                                        tickIcon.style.display = 'inline-block'; // Show green tick
                                    };
                                    reader.readAsDataURL(file);
                                } else {
                                    previewImg.src = '';
                                    previewImg.style.display = 'none';
                                    tickIcon.style.display = 'none'; // Hide green tick
                                }
                            });
                        }
                        // --- END BLOCK ---
                    },
                    focusConfirm: false,
                    showCancelButton: true,
                    confirmButtonText: 'Submit Order',
                    cancelButtonText: 'Cancel',
                    preConfirm: () => {
                        const name = document.getElementById('swal-name').value.trim();
                        const addressType = document.getElementById('address-input-radio').checked ? 'input' : 'map';
                        const address = addressType === 'input'
                            ? document.getElementById('swal-address').value.trim()
                            : 'Selected from map';
                        const payment = document.querySelector('input[name="payment"]:checked')?.value;
                        let bankSlip = null;
                        if (payment === 'online') {
                            bankSlip = document.getElementById('swal-bank-slip').files[0];
                            if (!bankSlip) {
                                Swal.showValidationMessage('Please upload your transaction slip.');
                                return false;
                            }
                        }
                        if (!name || (!address && addressType === 'input') || !payment) {
                            Swal.showValidationMessage('Please fill all fields');
                            return false;
                        }
                        let addresses = [];
                        let coords = '';
                        if (document.getElementById('address-input-radio').checked) {
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
                        }
                        // You can send the data to your backend here
                        Swal.fire({
                            icon: 'success',
                            title: 'Order Placed!',
                            text: 'Thank you for your purchase.',
                            confirmButtonColor: '#00b206'
                        });
                    }
                });
            });

            const bankSlipInput = document.getElementById('swal-bank-slip');
            const previewImg = document.getElementById('bank-slip-preview');
            const tickIcon = document.getElementById('bank-slip-tick');
            bankSlipInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImg.src = e.target.result;
                        previewImg.style.display = 'block';
                        tickIcon.style.display = 'inline-block'; // Show green tick
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewImg.src = '';
                    previewImg.style.display = 'none';
                    tickIcon.style.display = 'none'; // Hide green tick
                }
            });

            const addressList = document.getElementById('address-list');
            const addAddressBtn = document.getElementById('add-address-btn');

            // Function to add a new address input with remove icon
            function addAddressInput(value = '') {
                const wrapper = document.createElement('div');
                wrapper.className = "address-item flex items-center gap-2";
                const input = document.createElement('input');
                input.name = "addresses[]";
                input.type = "text";
                input.placeholder = "Enter your address";
                input.className = "w-full px-4 py-2 border border-slate-200 rounded-lg";
                input.value = value;

                // Remove button
                const removeBtn = document.createElement('button');
                removeBtn.type = "button";
                removeBtn.className = "p-2 text-red-500 hover:bg-red-100 rounded-full";
                removeBtn.title = "Remove";
                removeBtn.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        `;
                removeBtn.onclick = function () {
                    wrapper.remove();
                    // Prevent all addresses from being removed
                    if (addressList.children.length === 0) addAddressInput();
                };

                wrapper.appendChild(input);
                wrapper.appendChild(removeBtn);
                addressList.appendChild(wrapper);
            }

            // Start with one address input
            addAddressInput();

            addAddressBtn.addEventListener('click', function () {
                addAddressInput();
            });

            const mapContainer = document.getElementById('map-container');
            const addressInputDiv = document.getElementById('address-input-div');
            document.getElementById('address-input-radio').addEventListener('change', function () {
                addressInputDiv.style.display = '';
                mapContainer.style.display = 'none';
            });
            document.getElementById('address-map-radio').addEventListener('change', function () {
                addressInputDiv.style.display = 'none';
                mapContainer.style.display = '';
                // Initialize map only once
                if (!window._mapInitialized) {
                    window._mapInitialized = true;
                    // Cambodia bounding box: [SouthWest latlng, NorthEast latlng]
                    const cambodiaBounds = [
                        [9.912, 102.333],   // Southwest corner (lat, lng)
                        [14.704, 107.627]   // Northeast corner (lat, lng)
                    ];
                    const map = L.map('map', {
                        maxBounds: cambodiaBounds,
                        maxBoundsViscosity: 1.0,
                        minZoom: 6,
                        maxZoom: 18
                    }).setView([12.5657, 104.9910], 7); // Center on Cambodia
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                    }).addTo(map);
                    let marker;
                    map.on('click', function (e) {
                        if (marker) map.removeLayer(marker);
                        marker = L.marker(e.latlng).addTo(map);

                        // Show the selected coordinates in the input
                        document.getElementById('selected-coords').value = `${e.latlng.lat}, ${e.latlng.lng}`;

                        // --- Reverse Geocoding to get location name ---
                        fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${e.latlng.lat}&lon=${e.latlng.lng}`)
                            .then(response => response.json())
                            .then(data => {
                                let displayName = data.display_name || 'Unknown location';
                                // Show the location name below the input
                                let nameDiv = document.getElementById('selected-location-name');
                                if (!nameDiv) {
                                    nameDiv = document.createElement('div');
                                    nameDiv.id = 'selected-location-name';
                                    nameDiv.className = 'mt-2 text-sm text-blue-700';
                                    document.getElementById('map-container').appendChild(nameDiv);
                                }
                                nameDiv.textContent = `Selected location: ${displayName}`;
                            })
                            .catch(() => {
                                let nameDiv = document.getElementById('selected-location-name');
                                if (!nameDiv) {
                                    nameDiv = document.createElement('div');
                                    nameDiv.id = 'selected-location-name';
                                    nameDiv.className = 'mt-2 text-sm text-blue-700';
                                    document.getElementById('map-container').appendChild(nameDiv);
                                }
                                nameDiv.textContent = 'Selected location: (unable to fetch name)';
                            });
                        // --- End Reverse Geocoding ---
                    });
                }
            });
        });
    </script>
@endsection
