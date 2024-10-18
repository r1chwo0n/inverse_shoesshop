<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shopping Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:space-x-6">
                <div class="w-full lg:w-2/3">
                    @if($cartItems->isEmpty())
                        <p>ตะกร้าของคุณว่างเปล่า</p>
                    @else
                        @foreach($cartItems as $item)
                            <div id="cart-item-{{ $item->id }}" class="bg-white shadow-sm sm:rounded-lg mb-6">
                                <div class="p-6">
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center space-x-4">
                                            <img src="{{ asset('storage/' . $item->product->image_path) }}" alt="{{ $item->product->name }}" class="w-24 h-24 object-cover">
                                            <div>
                                                <a href="{{ route('cart.show', $item->product->id) }}" class="text-lg font-semibold text-gray-900 hover:text-gray-700">
                                                    {{ $item->product->name }}
                                                </a>
                                                <p class="text-sm text-gray-600"><strong>สี:</strong> {{ $item->product->color }}</p>
                                                <p class="text-sm text-gray-600"><strong>ขนาด:</strong> {{ $item->product->size }}</p>
                                                <p class="product-price text-gray-900 font-semibold">
                                                    {{ number_format($item->product->price, 2) }} THB
                                                </p>
                                            </div>
                                        </div>

                                        <div class="flex items-center space-x-2">
                                            <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="button" class="bg-gray-200 px-3 py-1 rounded-lg text-gray-800" onclick="decreaseQuantity({{ $item->id }}, event)">-</button>
                                                <input 
                                                    type="number" 
                                                    id="quantity_{{ $item->id }}" 
                                                    name="quantity" 
                                                    class="w-16 text-center border border-gray-300 rounded-lg h-10" 
                                                    value="{{ $item->quantity }}" 
                                                    min="1" 
                                                    max="{{ $item->product->stock }}" 
                                                    readonly>
                                                <button type="button" class="bg-gray-200 px-3 py-1 rounded-lg text-gray-800" onclick="increaseQuantity({{ $item->id }}, event)">+</button>
                                            </form>
                                            <button type="button" class="text-red-500 hover:underline" onclick="deleteItem({{ $item->id }})">ลบ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="w-full lg:w-1/3">
                    <div class="bg-white shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800">สรุปรายการ</h3>
                        <div class="flex justify-between mt-4">
                            <p class="text-gray-600">ยอดรวมทั้งหมด:</p>
                            <p class="text-gray-900 font-semibold total-price">
                                {{ number_format($cartItems->sum(function($item) {
                                    return $item->product->price * $item->quantity;
                                }), 2) }} THB
                            </p>
                        </div>
                        <div class="flex justify-between mt-2">
                            <p class="text-gray-600">ค่าจัดส่ง:</p>
                            <p class="text-gray-900 font-semibold">ฟรี</p>
                        </div>
                        <hr class="my-4">
                        <div class="flex justify-between">
                            <p class="text-gray-800 font-semibold">ยอดรวมสุทธิ:</p>
                            <p class="text-lg font-bold text-gray-900 net-total">
                                {{ number_format($cartItems->sum(function($item) {
                                    return $item->product->price * $item->quantity;
                                }), 2) }} THB
                            </p>
                        </div>

                        <button class="w-full mt-4 bg-black text-white py-2 rounded-lg hover:bg-gray-800">ชำระเงิน</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ฟังก์ชัน JavaScript สำหรับเพิ่ม/ลดจำนวน -->
    <script>
        function increaseQuantity(cartId, event) {
            event.preventDefault(); // Prevent form submission
            const quantityInput = document.getElementById('quantity_' + cartId);
            const maxStock = parseInt(quantityInput.max);
            let currentValue = parseInt(quantityInput.value);

            if (currentValue < maxStock) {
                quantityInput.value = currentValue + 1;
                updateCartQuantity(cartId, quantityInput.value); // Update quantity in DB
            }
        }

        function decreaseQuantity(cartId, event) {
            event.preventDefault(); // Prevent form submission
            const quantityInput = document.getElementById('quantity_' + cartId);
            let currentValue = parseInt(quantityInput.value);

            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateCartQuantity(cartId, quantityInput.value); // Update quantity in DB
            }
        }

        function updateCartQuantity(cartId, quantity) {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/cart/${cartId}`, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ quantity: quantity }) // Send the new quantity to the server
            })
            .then(response => {
                if (response.ok) {
                    updateTotalPrice(); // Update total price after successful update
                } else {
                    console.error('Error updating quantity');
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function updateTotalPrice() {
            let totalPrice = 0;
            const cartItems = document.querySelectorAll('[id^="cart-item-"]');
            cartItems.forEach(item => {
                const cartId = item.id.split('-')[2];
                const quantityInput = document.getElementById('quantity_' + cartId);
                const quantity = parseInt(quantityInput.value);
                const price = parseFloat(item.querySelector('.product-price').textContent.replace(' THB', '').replace(',', ''));
                totalPrice += price * quantity;
            });
            document.querySelector('.total-price').textContent = totalPrice.toFixed(2) + " THB";
            document.querySelector('.net-total').textContent = totalPrice.toFixed(2) + " THB"; // Update net total
        }

        function deleteItem(cartId) {
            const itemElement = document.getElementById('cart-item-' + cartId);
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/cart/${cartId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Content-Type': 'application/json',
                },
            })
            .then(response => {
                if (response.ok) {
                    itemElement.remove(); // Remove the item from the DOM
                    updateTotalPrice(); // Update total price after deletion
                } else {
                    console.error('Error deleting item');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</x-app-layout>
