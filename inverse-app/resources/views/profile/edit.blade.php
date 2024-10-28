<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Your Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- <div x-data="{ show: false }" x-show="show" x-init="show = true; setTimeout(() => show = false, 3000)" 
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 text-center"  
                role="alert" x-cloak>
                <span class="block sm:inline">{{ __('Profile information saved successfully!') }}</span>
            </div> -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <x-primary-button as="a" href="{{ route('profile.show') }}">
                        {{ __('Back to Profile') }}
                    </x-primary-button>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div> -->
        </div>
    </div>
</x-app-layout>
