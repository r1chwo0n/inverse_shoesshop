<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Summary') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
            <!-- Left side: User details form -->
            <div class="bg-white shadow-sm sm:rounded-lg p-6 w-2/3 mr-4">
                <h3 class="text-lg font-semibold text-gray-800">Enter Your Personal Details</h3>
                
                <!-- User Information Form -->
                <form>
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div>
                            <label class="block text-gray-700">First Name *</label>
                            <input type="text" class="w-full border-gray-300 rounded-md" value="{{ $user->firstname }}" disabled>
                        </div>
                        <div>
                            <label class="block text-gray-700">Last Name *</label>
                            <input type="text" class="w-full border-gray-300 rounded-md" value="{{ $user->lastname }}" disabled>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700">Mobile Number *</label>
                        <input type="text" class="w-full border-gray-300 rounded-md" value="{{ $user->phone_number }}" disabled>
                    </div>
                    
                    <div class="mt-4">
                        <h4 class="font-semibold text-gray-700">Shipping Method</h4>
                        <div class="flex items-center mt-2">
                            <input type="radio" class="mr-2" name="shipping" checked>
                            <label>Free Shipping</label>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Right side: Order summary -->
            <div class="bg-white shadow-sm sm:rounded-lg p-6 w-1/3">
                <h3 class="text-lg font-semibold text-gray-800">Order Summary</h3>
                <div class="mt-4">
                    @foreach($cartItems as $item)
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <p class="font-semibold">{{ $item->product->name }}</p>
                                <p class="text-sm text-gray-600">Quantity: {{ $item->quantity }}</p>
                                <p class="text-sm text-gray-600">Size: {{ $item->size ?? 'N/A' }}</p> <!-- Display size -->
                            </div>
                            <p>{{ number_format($item->product->price * $item->quantity, 2) }} THB</p>
                        </div>
                    @endforeach
                </div>
                <hr class="my-4">

                @php
                    // Calculate subtotal and discount
                    $subtotal = $cartItems->sum(function($item) {
                        return $item->product->price * $item->quantity;
                    });
                    $discount = $subtotal > 2000 ? $subtotal * 0.10 : 0;
                    $total = $subtotal - $discount;
                @endphp

                <div class="flex justify-between">
                    <p class="text-gray-800 font-semibold">Subtotal:</p>
                    <p class="text-lg font-bold text-gray-900">{{ number_format($subtotal, 2) }} THB</p>
                </div>

                @if ($discount > 0)
                    <div class="flex justify-between">
                        <p class="text-gray-800 font-semibold">10% Discount:</p>
                        <p class="text-lg font-bold text-gray-900">-{{ number_format($discount, 2) }} THB</p>
                    </div>
                @endif

                <div class="flex justify-between mt-2">
                    <p class="text-gray-800 font-semibold">Total After Discount:</p>
                    <p class="text-lg font-bold text-gray-900">{{ number_format($total, 2) }} THB</p>
                </div>

                <form action="{{ route('confirm-order') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full mt-4 bg-black text-white py-2 rounded-lg hover:bg-gray-800">Confirm Order</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
