@extends('Component.header')
@include('TailwindCssLink.style')

@section('title', 'Customize Tumbler')

@section('contents')

<section class="w-11/12 mx-auto bg-white py-9 px-8 mt-24 mb-12 rounded-lg">
  <h1
    class="text-center text-[#191919]  text-[32px] font-semibold leading-[38px]"
  >
    My Shopping Cart
  </h1>
  <div class="flex items-start mt-8 gap-6">
    <div class="bg-white p-4 w-[800px] rounded-xl">
      <table class="w-full bg-white rounded-xl">
        <thead>
          <tr
            class="text-center border-b border-gray-400 w-full text-[#7f7f7f] text-sm font-medium uppercase leading-[14px] tracking-wide"
          >
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
                          class="w-[100px] mr-2 inline-block h-[100px]"
                      />
                  </td>
                  <td>{{$item['name']}}</td>
                  <td class="" ">
                        <div class="w-[30px] h-[30px] inline-block rounded-full"
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
        <span class="text-[#4c4c4c] text-base font-normal leading-normal"
          >Total:</span
        ><span class="text-[#191919] text-base font-semibold leading-tight"
          >${{ number_format($total, 2) }}</span
        >
      </div>
      <div
        class="w-[376px] py-3 shadow-[0px_1px_0px_0px_rgba(229,229,229,1.00)] justify-between items-center flex"
      >
        <span class="text-[#4c4c4c] text-sm font-normal leading-[21px]"
          >Shipping:</span
        ><span class="text-[#191919] text-sm font-medium leading-[21px]"
          >Free</span
        >
      </div>
      <div
        class="w-[376px] py-3 shadow-[0px_1px_0px_0px_rgba(229,229,229,1.00)] justify-between items-center flex"
      >
        <span class="text-[#4c4c4c] text-sm font-normal leading-[21px]"
          >Subtotal:</span
        ><span class="text-[#191919] text-sm font-medium leading-[21px]"
          >${{ number_format($total, 2) }}</span
        >
      </div>
      <button
        class="w-[376px] text-white mt-5 px-10 py-4 bg-[#00b206] rounded-[44px] gap-4 text-base font-semibold leading-tight"
      >
        Proceed to checkout
      </button>
    </div>
  </div>
  <div
    class="mt-6 p-5 w-[800px] bg-white rounded-lg border border-[#e6e6e6] justify-start items-center gap-6 inline-flex"
  >
    <h3
      class="text-[#191919] w-1/4 text-xl font-medium className leading-[30px]"
    >
      Coupon Code
    </h3>
    <div class="w-full border border-[#e6e6e6]">
      <input
        placeholder="Enter code"
        type="text"
        class="w-2/3 px-6 py-3.5 outline-none bg-white rounded-[46px] text-[#999999] text-base font-normal leading-normal"
      /><button
        class="px-10 py-4 bg-[#333333] rounded-[43px] text-white text-base font-semibold leading-tight"
      >
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
});
</script>
@endsection
