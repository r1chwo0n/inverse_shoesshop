<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Account Information Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-semibold text-gray-900">
                        {{ __('Account Information') }}
                    </h2>
                </header>
                <div class="max-w-xl mt-4">
                    <p><strong>{{ __('Name:') }}</strong> {{ Auth::user()->name }}</p>
                    <p><strong>{{ __('First Name:') }}</strong> {{ Auth::user()->firstname }}</p>
                    <p><strong>{{ __('Last Name:') }}</strong> {{ Auth::user()->lastname }}</p>
                    <p><strong>{{ __('Phone Number:') }}</strong> {{ Auth::user()->phone_number }}</p>
                    <p><strong>{{ __('Email Address:') }}</strong> {{ Auth::user()->email }}</p>
                    <p><strong>{{ __('Birthdate:') }}</strong> {{ \Carbon\Carbon::parse(Auth::user()->birthdate)->format('d F Y') }}</p>
                    <p><strong>{{ __('Gender:') }}</strong></p>
                    <div class="flex space-x-4 mt-1">
                        <span class="inline-flex">
                            <span class="px-4 py-2 {{ Auth::user()->gender == 'male' ? 'bg-gray-800 text-white' : 'bg-gray-300 text-gray-600' }} rounded-full">
                                {{ __('Male') }}
                            </span>
                        </span>
                        <span class="inline-flex">
                            <span class="px-4 py-2 {{ Auth::user()->gender == 'female' ? 'bg-gray-800 text-white' : 'bg-gray-300 text-gray-600' }} rounded-full">
                                {{ __('Female') }}
                            </span>
                        </span>
                    </div>                    
                </div>
                
                <!-- Edit Profile Button -->
                <div class="max-w-xl mt-6">
                    <x-primary-button as="a" href="{{ route('profile.edit') }}">
                        {{ __('Edit Profile') }}
                    </x-primary-button>
                </div>
                <p class="mt-4"><strong>{{ __('Joined Date:') }}</strong> {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('d F Y') }}</p>
            </div>

            <!-- Address Information Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="font-semibold text-gray-900">{{ __('Address Information') }}</h3>
                    <p>{{ __('Your address information will be displayed here.') }}</p>
                    <div class="max-w-xl mt-6">
                    <div class="flex flex-wrap gap-4">
                        @foreach ($addresses as $address)
                            <div class="w-full sm:w-1/2 bg-white shadow-md rounded-lg p-4 flex-1 flex-col justify-between h-64"> <!-- Set a fixed height -->
                                <div>
                                    <p><strong>Address Line 1:</strong> {{ $address->address_line_1 }}</p>
                                    <p><strong>Address Line 2:</strong> {{ $address->address_line_2 }}</p>
                                    <p><strong>Address Line 3:</strong> {{ $address->address_line_3 }}</p>
                                    <p><strong>Subdistrict:</strong> {{ $address->subdistrict }}</p>
                                    <p><strong>District:</strong> {{ $address->district }}</p>
                                    <p><strong>Province:</strong> {{ $address->province }}</p>
                                    <p><strong>Postal Code:</strong> {{ $address->postal_code }}</p>
                                </div>

                                <!-- Edit and Delete buttons -->
                                <div class="mt-auto flex justify-end gap-2"> <!-- Use mt-auto to push this to the bottom -->
                                    <x-primary-button as="a" href="{{ route('addresses.edit', $address) }}">
                                        {{ __('Edit') }}
                                    </x-primary-button>
                                    <form action="{{ route('addresses.destroy', $address) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button type="submit" class="text-red-600 hover:text-red-800">Delete</x-danger-button>
                                    </form>
                                </div>
                            </div>
                        @endforeach

                        <!-- Grayed-Out Box for Adding New Address -->
                        @if ($addresses->count() < 2)
                        <div class="flex-1 w-full sm:w-1/2 bg-gray-100 shadow-md rounded-lg p-4 flex items-center justify-center">
                            <a href="{{ route('addresses.create') }}" class="text-gray-600 hover:text-gray-800 font-semibold">
                                Add New Address
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                </div>
            </div>

            <!-- Account Deletion Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
