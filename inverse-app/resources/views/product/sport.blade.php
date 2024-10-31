<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Sport') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <div class="text-sm text-gray-600 mb-4">
                <a href="{{ route('product') }}" class="hover:underline">HOME</a> / Sport Shoes
            </div>

            <!-- Filters Sidebar + Product Grid in a flex container -->
            <div class="flex flex-col lg:flex-row">
                <!-- Sidebar Filters -->
                <aside class="w-full lg:w-1/4 bg-white p-6 shadow-md rounded-lg mb-6 lg:mb-0 lg:mr-6"> 
                    <h3 class="font-semibold text-lg mb-4">Filters</h3>
                    <!-- Add filter options here as needed -->
                </aside>

                <!-- Product Grid -->
                <div class="w-full lg:w-3/4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($products as $product)
                    <!-- Product Card -->
                    <a href="{{ route('productDetail', $product->id) }}" class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition transform hover:-translate-y-1 duration-200 ease-in-out">
                        <img class="w-full" src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}">
                        <div class="p-4">
                            <h3 class="font-semibold text-lg">{{ $product->name }}</h3>
                            <p class="text-gray-500">
                                <span class="text-black-500 font-bold">{{ number_format($product->price, 2) }} THB</span>
                                @if($product->discounted_price)
                                <span class="line-through text-gray-400">{{ number_format($product->discounted_price, 2) }} THB</span>
                                @endif
                            </p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
