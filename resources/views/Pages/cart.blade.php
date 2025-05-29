@extends('Component.header')
@include('TailwindCssLink.style')

@section('title', 'Customize Tumbler')

@section('contents')

<section class="w-11/12 mx-auto bg-white py-9 px-8 mt-24 mb-12 rounded-lg">
  <h1
    class="text-center text-[#191919]  text-[32px] font-semibold leading-[38px]">
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
          @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
          <tr class="text-center">
            <td class="px-2 py-2 text-left align-top">
              <img
                src="{{ asset('storage/' . $item['image']) }}"
                alt="{{ $item['name'] }}"
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
      <form action="{{ route('update.cart.quantity', $key) }}" method="POST" style="display:inline-flex; align-items:center;">
        @csrf
        <button type="submit" name="action" value="decrease" class="px-2 py-1 bg-gray-200 rounded-l hover:bg-gray-300">-</button>
        <input type="text" name="quantity" value="{{ $item['quantity'] }}" class="w-10 text-center border border-gray-300" readonly>
        <button type="submit" name="action" value="increase" class="px-2 py-1 bg-gray-200 rounded-r hover:bg-gray-300">+</button>
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
        <td class="px-2 py-2" colspan="3">
          <a href="/" class="px-8 cursor-pointer py-3.5 bg-[#f2f2f2] rounded-[43px] text-[#4c4c4c] text-sm font-semibold leading-[16px]">
            Return to shop
          </a>
        </td>
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
      <span class="text-[#4c4c4c] text-base font-normal leading-normal">Total:</span><span class="text-[#191919] text-base font-semibold leading-tight">${{ number_format($total, 2) }}</span>
    </div>
    <div
      class="w-[376px] py-3 shadow-[0px_1px_0px_0px_rgba(229,229,229,1.00)] justify-between items-center flex">
      <span class="text-[#4c4c4c] text-sm font-normal leading-[21px]">Shipping:</span><span class="text-[#191919] text-sm font-medium leading-[21px]">Free</span>
    </div>
    <div
      class="w-[376px] py-3 shadow-[0px_1px_0px_0px_rgba(229,229,229,1.00)] justify-between items-center flex">
      <span class="text-[#4c4c4c] text-sm font-normal leading-[21px]">Subtotal:</span><span class="text-[#191919] text-sm font-medium leading-[21px]">${{ number_format($total, 2) }}</span>
    </div>
    <button
      id="proceed-checkout"
      type="button"
      class="w-[376px] text-white mt-5 px-10 py-4 bg-[#00b206] rounded-[44px] gap-4 text-base font-semibold leading-tight">
      Proceed to checkout
    </button>
  </div>
  </div>
  <div
    class="mt-6 p-5 w-[800px] bg-white rounded-lg border border-[#e6e6e6] justify-start items-center gap-6 inline-flex">
    <h3
      class="text-[#191919] w-1/4 text-xl font-medium className leading-[30px]">
      Coupon Code
    </h3>
    <div class="w-full border border-[#e6e6e6]">
      <input
        placeholder="Enter code"
        type="text"
        class="w-2/3 px-6 py-3.5 outline-none bg-white rounded-[46px] text-[#999999] text-base font-normal leading-normal" /><button
        class="px-10 py-4 bg-[#333333] rounded-[43px] text-white text-base font-semibold leading-tight">
        Apply Coupon
      </button>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
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
                    btn.closest('form').submit();
                }
            });
        });
    });

    document.getElementById('proceed-checkout').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: '<h1 class="block text-3xl font-bold text-[#00b206] mb-2">Checkout</h1>',
            width: 800, // Set fixed width
            html: `
                <div class="text-left space-y-4">
                <div>
                                             <label class="block text-xl font-semibold text-gray-700 mb-2 text-start">Person Username</label>  
                    <input
                        id="swal-username"
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow "
                        type="text"
                        value="{{ auth()->user() ? auth()->user()->username : '' }}"
                        >
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
                    <input
                        id="swal-address"
                        class="mb-10 w-full px-4 py-4 border border-slate-200 rounded-lg  focus:outline-none focus:border-slate-500 hover:shadow "
                        type="text"
                        placeholder="Enter your address"
                        >
                </div>
                </div>
                        <button id="select-map-btn" type="button" class="swal2-confirm swal2-styled mt-2" style="display:none;background:#00b206;">Select Address from Map</button>
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
                        <input type="file" id="swal-bank-slip" class=" w-full border-2 rounded-lg" accept="image/*">
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
                // Address input/map toggle
                const addressInput = document.getElementById('swal-address');
                const mapBtn = document.getElementById('select-map-btn');
                document.getElementById('address-input-radio').addEventListener('change', function() {
                    addressInput.style.display = '';
                    mapBtn.style.display = 'none';
                });
                document.getElementById('address-map-radio').addEventListener('change', function() {
                    addressInput.style.display = 'none';
                    mapBtn.style.display = '';
                });

                // Payment method toggle
                document.querySelectorAll('input[name="payment"]').forEach(function(radio) {
                    radio.addEventListener('change', function() {
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
    if (bankSlipInput && previewImg) {
        bankSlipInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewImg.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                previewImg.src = '';
                previewImg.style.display = 'none';
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
bankSlipInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewImg.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        previewImg.src = '';
        previewImg.style.display = 'none';
    }
});
});
</script>
@endsection