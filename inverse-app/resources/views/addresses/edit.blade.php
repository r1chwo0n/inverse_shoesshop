<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Address') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <x-primary-button as="a" href="{{ route('profile.show') }}">
                        {{ __('Back to Profile') }}
                    </x-primary-button>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl mx-auto p-4">
                    <h2 class="text-2xl font-semibold mb-4">Edit Address</h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Update your account's address information.") }}
                    </p>
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>
                    <form method="post" action="{{ route('addresses.update', $address) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')
                        <!-- Address Line 1 -->
                        <div>
                            <x-input-label for="address_line_1" :value="__('Address Line 1')" />
                            <x-text-input id="address_line_1" name="address_line_1" type="text" class="mt-1 block w-full" :value="old('address_line_1', $address->address_line_1)" required autofocus autocomplete="address_line_1" />
                            <x-input-error class="mt-2" :messages="$errors->get('address_line_1')" />
                        </div>

                        <!-- Address Line 2 -->
                        <div>
                            <x-input-label for="address_line_2" :value="__('Address Line 2')" />
                            <x-text-input id="address_line_2" name="address_line_2" type="text" class="mt-1 block w-full" :value="old('address_line_2', $address->address_line_2)" required autofocus autocomplete="address_line_2" />
                            <x-input-error class="mt-2" :messages="$errors->get('address_line_2')" />
                        </div>

                        <!-- Address Line 3 -->
                        <div>
                            <x-input-label for="address_line_3" :value="__('Address Line 3')" />
                            <x-text-input id="address_line_3" name="address_line_3" type="text" class="mt-1 block w-full" :value="old('address_line_3', $address->address_line_3)" required autofocus autocomplete="address_line_3" />
                            <x-input-error class="mt-2" :messages="$errors->get('address_line_3')" />
                        </div>

                        <!-- Street -->
                        <div>
                            <x-input-label for="street" :value="__('Street')" />
                            <x-text-input id="street" name="street" type="text" class="mt-1 block w-full" :value="old('street', $address->street)" required autofocus autocomplete="street" />
                            <x-input-error class="mt-2" :messages="$errors->get('street')" />
                        </div>

                        <!-- Subdistrict -->
                        <div>
                            <x-input-label for="subdistrict" :value="__('Sub District')" />
                            <x-text-input id="subdistrict" name="subdistrict" type="text" class="mt-1 block w-full" :value="old('subdistrict', $address->subdistrict)" required autofocus autocomplete="subdistrict" />
                            <x-input-error class="mt-2" :messages="$errors->get('subdistrict')" />
                        </div>

                        <!-- District -->
                        <div>
                            <x-input-label for="district" :value="__('District')" />
                            <x-text-input id="district" name="district" type="text" class="mt-1 block w-full" :value="old('district', $address->district)" required autofocus autocomplete="district" />
                            <x-input-error class="mt-2" :messages="$errors->get('district')" />
                        </div>

                        <!-- Province -->
                        <div>
                            <x-input-label for="province" :value="__('Province')" />
                            <x-text-input id="province" name="province" type="text" class="mt-1 block w-full" :value="old('province', $address->province)" required autofocus autocomplete="province" />
                            <x-input-error class="mt-2" :messages="$errors->get('province')" />
                        </div>

                        <!-- Country -->
                        <div>
                            <x-input-label for="country" :value="__('Country')" />
                            <x-text-input id="country" name="country" type="text" class="mt-1 block w-full" :value="old('country', $address->country)" required autofocus autocomplete="country" />
                            <x-input-error class="mt-2" :messages="$errors->get('country')" />
                        </div>

                        <!-- Postal Code -->
                        <div>
                            <x-input-label for="postal_code" :value="__('Postal Code')" />
                            <x-text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full" :value="old('postal_code', $address->postal_code)" required autofocus autocomplete="postal_code" />
                            <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center gap-4 justify-end">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
