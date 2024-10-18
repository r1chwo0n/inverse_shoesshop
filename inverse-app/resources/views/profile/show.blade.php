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
                    <p><strong>{{ __('Gender:') }}</strong></p>
                        <div class="flex space-x-4 mt-1">
                            <span class="inline-flex">
                                <span class="px-4 py-2 {{ Auth::user()->gender == 'male' ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-600' }} rounded-full">
                                    {{ __('Male') }}
                                </span>
                            </span>
                            <span class="inline-flex">
                                <span class="px-4 py-2 {{ Auth::user()->gender == 'female' ? 'bg-pink-500 text-white' : 'bg-gray-300 text-gray-600' }} rounded-full">
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
            </div>

            <!-- Address Information Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="font-semibold text-gray-900">{{ __('Address Information') }}</h3>
                    <p>{{ __('Your address information will be displayed here.') }}</p>
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
