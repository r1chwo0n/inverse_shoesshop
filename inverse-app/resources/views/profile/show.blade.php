<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!-- Display user profile information -->
                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>First Name:</strong> {{ Auth::user()->firstname }}</p>
                    <p><strong>Last Name:</strong> {{ Auth::user()->lastname }}</p>
                    <p><strong>Phone Number:</strong> {{ Auth::user()->phone_number }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Gender:</strong></p>
                    <div class="flex space-x-4">
                        <span class="inline-flex">
                            <x-primary-button as="button" class="{{ Auth::user()->gender == 'male' ? 'bg-blue-500' : 'bg-gray-300' }}">
                                Male
                            </x-primary-button>
                        </span>
                        <span class="inline-flex">
                            <x-primary-button as="button" class="{{ Auth::user()->gender == 'female' ? 'bg-pink-500' : 'bg-gray-300' }}">
                                Female
                            </x-primary-button>
                        </span>
                    </div>
                </div>
                <!-- Edit Button -->
                <div class="max-w-xl mt-4">
                    <!-- Link to the edit page OLD VERSION -->
                    <!-- <a href="{{ route('profile.edit') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Edit Profile') }}
                    </a> -->
                    <div class="max-w-xl mt-4">
                    <!-- Link to the edit page -->
                    <x-primary-button as="a" href="{{ route('profile.edit') }}">
                        {{ __('Edit Profile') }}
                    </x-primary-button>
                </div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
