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
            title: '<span class="block text-2xl font-bold text-[#00b206] mb-2">Checkout</span>',
            width: 600, // Set fixed width
            html: `
                <div class="text-left space-y-4">
                    <div>
                        <label for="swal-name" class="block text-sm font-semibold text-gray-700 mb-1">Full Name</label>
                        <input id="swal-name" class="swal2-input " value="{{ auth()->user() ? auth()->user()->name : '' }}" placeholder="Enter your full name" disabled>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Address</label>
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
                        <input id="swal-address" class="swal2-input " placeholder="Enter your address">
                        <button id="select-map-btn" type="button" class="swal2-confirm swal2-styled mt-2" style="display:none;background:#00b206;">Select Address from Map</button>
                    </div>
                    <div>
                        <label for="swal-payment" class="block text-sm font-semibold text-gray-700 mb-1">Payment Type</label>
                        <select id="swal-payment" class="swal2-input w-full">
                            <option value="" disabled selected>Select Payment Type</option>
                            <option value="cash">Pay by Cash</option>
                            <option value="bank">Pay by Bank Transfer</option>
                        </select>
                    </div>
                    <div id="bank-upload-div" style="display:none;">
                        <label for="swal-bank-slip" class="block text-sm font-semibold text-gray-700 mb-1">Upload Transaction Slip</label>
                        <input type="file" id="swal-bank-slip" class="swal2-file w-full" accept="image/*">
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

                // Payment type toggle
                document.getElementById('swal-payment').addEventListener('change', function() {
                    if (this.value === 'bank') {
                        document.getElementById('bank-upload-div').style.display = '';
                    } else {
                        document.getElementById('bank-upload-div').style.display = 'none';
                    }
                });
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
                const payment = document.getElementById('swal-payment').value;
                let bankSlip = null;
                if (payment === 'bank') {
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
});
</script>
@endsection