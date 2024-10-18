<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filters Sidebar + Product Grid in a flex container -->
            <div class="flex flex-col lg:flex-row">
                <!-- Filters Sidebar -->
                <aside class="w-full lg:w-1/4 bg-white p-6 shadow-md rounded-lg mb-6 lg:mb-0 lg:mr-6"> 
                    <h3 class="font-semibold text-lg mb-4">Filter Options</h3>
                    <!-- Gender Filter -->
                    <div class="mb-6">
                        <h4 class="font-semibold mb-2">CATEGORY</h4>
                        <ul>
                            <li>
                                <a href="{{ route('chuck70') }}" class="text-black-500 hover:text-gray-500">CHUCK 70</a>
                            </li>
                            <li>
                                <a href="{{ route('classicchuck') }}" class="text-black-500 hover:text-gray-500">CLASSIC CHUCK</a>
                            </li>
                            <li>
                                <a href="{{ route('sport') }}" class="text-black-500 hover:text-gray-500">SPORT</a>
                            </li>
                            <li>
                                <a href="{{ route('elevation') }}" class="text-black-500 hover:text-gray-500">ELEVATION</a>
                            </li>
                        </ul>
                    </div>
                </aside>

                <!-- Product Grid -->
                <div class="w-full lg:w-3/4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($products as $product)
                    <!-- Product Card -->
                    <a href="{{ route('productDetail', $product->id) }}" class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition">
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
