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

                <form action="{{ route('confirm-order') }}" method="POST">
                    @csrf
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
                        <h4 class="font-semibold text-gray-700">Select Shipping Address</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-2">
                            @foreach ($addresses as $address)
                                <div class="border rounded-lg shadow-md p-4 flex items-start">
                                    <input type="radio" id="address_{{ $address->id }}" name="address_id" value="{{ $address->id }}" class="mr-2" required>
                                    <label for="address_{{ $address->id }}" class="flex-grow">
                                        <h5 class="font-bold text-gray-800">Address {{ $loop->iteration }}</h5>
                                        <p><strong>Address Line 1:</strong> {{ $address->address_line_1 }}</p>
                                        <p><strong>Address Line 2:</strong> {{ $address->address_line_2 }}</p>
                                        <p><strong>Address Line 3:</strong> {{ $address->address_line_3 }}</p>
                                        <p><strong>Subdistrict:</strong> {{ $address->subdistrict }}</p>
                                        <p><strong>District:</strong> {{ $address->district }}</p>
                                        <p><strong>Province:</strong> {{ $address->province }}</p>
                                        <p><strong>Postal Code:</strong> {{ $address->postal_code }}</p>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-4">
                        <h4 class="font-semibold text-gray-700">Shipping Method</h4>
                        <div class="flex items-center mt-2">
                            <input type="radio" class="mr-2" name="shipping" value="free" checked>
                            <label>Free Shipping</label>
                        </div>
                    </div>

                    <button type="submit" class="w-full mt-4 bg-black text-white py-2 rounded-lg hover:bg-gray-800">Confirm Order</button>
                </form>
            </div>

            <!-- Right side: Order summary -->
            <div class="bg-white shadow-sm sm:rounded-lg p-6 w-1/3">
                <h3 class="text-lg font-semibold text-gray-800">Order Summary</h3>
                <div class="mt-4">
                    @foreach($cartItems as $item)
                        <div class="flex justify-between items-center mb-4 border-b pb-2">
                            <div>
                                <p class="font-semibold">{{ $item->product->name }}</p>
                                <p class="text-sm text-gray-600">Quantity: {{ $item->quantity }}</p>
                                <p class="text-sm text-gray-600">Size: {{ $item->size ?? 'N/A' }}</p>
                            </div>
                            <p class="text-gray-800 font-semibold">{{ number_format($item->product->price * $item->quantity, 2) }} THB</p>
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

                <div class="flex justify-between font-semibold">
                    <p class="text-gray-800">Subtotal:</p>
                    <p class="text-lg text-gray-900">{{ number_format($subtotal, 2) }} THB</p>
                </div>

                @if ($discount > 0)
                    <div class="flex justify-between">
                        <p class="text-gray-800 font-semibold">10% Discount:</p>
                        <p class="text-lg font-bold text-gray-900">-{{ number_format($discount, 2) }} THB</p>
                    </div>
                @endif

                <div class="flex justify-between mt-2 font-semibold">
                    <p class="text-gray-800">Total After Discount:</p>
                    <p class="text-lg text-gray-900">{{ number_format($total, 2) }} THB</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
