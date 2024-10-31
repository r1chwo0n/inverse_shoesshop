<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6 flex flex-col lg:flex-row">
                <!-- Product Images -->
                <div class="w-full lg:w-1/2 flex justify-center">
                    <img class="w-full max-w-sm" src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}">
                </div>

                <!-- Product Details -->
                <div class="w-full lg:w-1/2 lg:pl-8 mt-6 lg:mt-0">
                    <h3 class="font-semibold text-2xl text-gray-800 mb-4">{{ $product->name }}</h3>
                    <p class="text-lg text-black-500 font-bold">{{ number_format($product->price, 2) }} THB</p>
                    @if($product->discounted_price)
                        <p class="line-through text-gray-400">{{ number_format($product->discounted_price, 2) }} THB</p>
                    @endif
                    <p class="text-gray-600 mt-4">{{ $product->description }}</p>

                    <!-- Total Available Stock -->
                    <p class="text-gray-600 mt-4">Total Available Stock: <span class="font-bold">{{ $product->sizes->sum('stock') }}</span></p>

                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <!-- Size Selection Dropdown -->
                        <div class="flex items-center mt-4 mb-6">
                            <label for="size" class="mr-4">Select Size:</label>
                            <select id="size" name="size" class="border border-gray-300 rounded-lg py-2 px-4 w-48 focus:outline-none focus:ring focus:ring-blue-300">
                                <option value="" disabled selected>Select size</option>
                                @foreach($product->sizes as $productSize)
                                    <option value="{{ $productSize->size }}" data-stock="{{ $productSize->stock }}">
                                        {{ $productSize->size }} 
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Quantity Input -->
                        <div class="flex items-center mt-4 mb-6"> 
                            <label for="quantity" class="mr-4">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" value="1" min="0" class="border border-gray-300 rounded-lg py-2 px-4 w-20 focus:outline-none focus:ring focus:ring-blue-300">
                        </div>
                        
                        <button type="submit" id="addToCartButton" class="w-full bg-black text-white py-2 rounded-md hover:bg-gray-800 transition">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sizeSelect = document.getElementById('size');
            const quantityInput = document.getElementById('quantity');
            const addToCartButton = document.getElementById('addToCartButton');

            sizeSelect.addEventListener('change', function () {
                const selectedOption = sizeSelect.options[sizeSelect.selectedIndex];
                const stock = selectedOption.dataset.stock;

                // Set the max value of the quantity input to the stock of the selected size
                quantityInput.setAttribute('max', stock);

                // Enable or disable the Add to Cart button based on stock
                if (stock > 0) {
                    quantityInput.setAttribute('min', 1);
                    quantityInput.value = 1; // Reset quantity to 1 if there's stock
                    addToCartButton.classList.remove('opacity-50', 'cursor-not-allowed');
                    addToCartButton.disabled = false; // Enable button
                } else {
                    quantityInput.setAttribute('min', 0);
                    quantityInput.value = 0; // Reset quantity to 0 if there's no stock
                    addToCartButton.classList.add('opacity-50', 'cursor-not-allowed');
                    addToCartButton.disabled = true; // Disable button
                }

                // Reset quantity if the selected stock is lower than the current value
                if (parseInt(quantityInput.value) > stock) {
                    quantityInput.value = stock;
                }
            });
        });
    </script>
</x-app-layout>
