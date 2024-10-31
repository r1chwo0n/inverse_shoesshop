<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Summary') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
            <!-- Left side: User details -->
            <div class="bg-white shadow-sm sm:rounded-lg p-6 w-2/3 mr-4">
                <h3 class="text-lg font-semibold text-gray-800">User Information</h3>
                <div class="mt-4">
                    <p class="font-semibold">Name: {{ $user->firstname }} {{ $user->lastname }}</p>
                    <p class="text-sm text-gray-600">Phone: {{ $user->phone_number }}</p>
                    <!-- Add other user details as needed -->
                </div>
            </div>

            <!-- Right side: Order details -->
            <div class="bg-white shadow-sm sm:rounded-lg p-6 w-1/3">
                <h3 class="text-lg font-semibold text-gray-800">Order Details</h3>
                <div class="mt-4">
                    @foreach($order->orderItems as $item)
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex-1">
                                <p class="font-semibold">{{ $item->product->name }}</p>
                                <p class="text-sm text-gray-600">Quantity: {{ $item->quantity }}</p>
                                <p class="text-sm text-gray-600">Size: {{ $item->size ?? 'N/A' }}</p> 
                            </div>
                            <p class="text-lg font-bold">{{ number_format($item->price * $item->quantity, 2) }} THB</p>
                        </div>
                    @endforeach
                </div>
                <hr class="my-4">
                <div class="flex justify-between">
                    <p class="text-gray-800 font-semibold">Total Price:</p>
                    <p class="text-lg font-bold text-gray-900">
                        {{ number_format($order->total_price, 2) }} THB
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
