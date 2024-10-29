<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Address') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl mx-auto p-4">
                    <h2 class="text-2xl font-semibold mb-4">Add Address</h2>
                    <form method="post" action="{{ route('addresses.store') }}" class="mt-6 space-y-6">
                        @csrf
        
                        <!-- Address Line 1 -->
                        <div class="relative">
                            <x-input-label for="address_line_1" :value="__('Address Line 1')" />
                            <x-text-input id="address_line_1" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="text" name="address_line_1" :value="old('address_line_1')" required autofocus autocomplete="address_line_1" />
                            <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                            <!-- <x-input-error :messages="$errors->get('address_line_1')" class="mt-2" /> -->
                        </div>
                        <!-- <div class="mb-4">
                            <label for="address_line_1" class="block text-gray-700">Address Line 1</label>
                            <input type="text" id="address_line_1" name="address_line_1" maxlength="255" required
                                class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('address_line_1') }}">
                            @error('address_line_1')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div> -->

                        <!-- Address Line 2 -->
                        <div class="relative">
                            <x-input-label for="address_line_2" :value="__('Address Line 2')" />
                            <x-text-input id="address_line_2" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="text" name="address_line_2" :value="old('address_line_2')" required autofocus autocomplete="address_line_2" />
                            <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                            <x-input-error :messages="$errors->get('address_line_2')" class="mt-2" />
                        </div>
                        <!-- <div class="mb-4">
                            <label for="address_line_2" class="block text-gray-700">Address Line 2 (Optional)</label>
                            <input type="text" id="address_line_2" name="address_line_2" maxlength="255"
                                class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('address_line_2') }}">
                            @error('address_line_2')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div> -->

                        <!-- Address Line 3 -->
                        <div class="relative">
                            <x-input-label for="address_line_3" :value="__('Address Line 3')" />
                            <x-text-input id="address_line_3" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="text" name="address_line_3" :value="old('address_line_3')" required autofocus autocomplete="address_line_3" />
                            <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                            <x-input-error :messages="$errors->get('address_line_3')" class="mt-2" />
                        </div>
                        <!-- <div class="mb-4">
                            <label for="address_line_3" class="block text-gray-700">Address Line 3 (Optional)</label>
                            <input type="text" id="address_line_3" name="address_line_3" maxlength="255"
                                class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('address_line_3') }}">
                            @error('address_line_3')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div> -->

                        <!-- Street -->
                        <div class="relative">
                            <x-input-label for="street" :value="__('Street')" />
                            <x-text-input id="street" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="text" name="street" :value="old('street')" required autofocus autocomplete="street" />
                            <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                            <x-input-error :messages="$errors->get('street')" class="mt-2" />
                        </div>
                        <!-- <div class="mb-4">
                            <label for="street" class="block text-gray-700">Street (Optional)</label>
                            <input type="text" id="street" name="street" maxlength="255"
                                class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('street') }}">
                            @error('street')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div> -->

                        <!-- Subdistrict -->
                        <div class="relative">
                            <x-input-label for="subdistrict" :value="__('Sub District')" />
                            <x-text-input id="subdistrict" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="text" name="subdistrict" :value="old('subdistrict')" required autofocus autocomplete="subdistrict" />
                            <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                            <x-input-error :messages="$errors->get('subdistrict')" class="mt-2" />
                        </div>
                        <!-- <div class="mb-4">
                            <label for="subdistrict" class="block text-gray-700">Subdistrict</label>
                            <input type="text" id="subdistrict" name="subdistrict" maxlength="255" required
                                class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('subdistrict') }}">
                            @error('subdistrict')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div> -->

                        <!-- District -->
                        <div class="relative">
                            <x-input-label for="district" :value="__('District')" />
                            <x-text-input id="district" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="text" name="district" :value="old('district')" required autofocus autocomplete="district" />
                            <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                            <x-input-error :messages="$errors->get('district')" class="mt-2" />
                        </div>
                        <!-- <div class="mb-4">
                            <label for="district" class="block text-gray-700">District</label>
                            <input type="text" id="district" name="district" maxlength="255" required
                                class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('district') }}">
                            @error('district')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div> -->

                        <!-- Province -->
                        <div class="relative">
                            <x-input-label for="province" :value="__('Province')" />
                            <x-text-input id="province" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="text" name="province" :value="old('province')" required autofocus autocomplete="province" />
                            <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                            <x-input-error :messages="$errors->get('province')" class="mt-2" />
                        </div>
                        <!-- <div class="mb-4">
                            <label for="province" class="block text-gray-700">Province</label>
                            <input type="text" id="province" name="province" maxlength="255" required
                                class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('province') }}">
                            @error('province')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div> -->

                        <!-- Country -->
                        <div class="relative">
                            <x-input-label for="country" :value="__('Country')" />
                            <x-text-input id="country" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="text" name="country" :value="old('country')" required autofocus autocomplete="country" />
                            <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                        </div>

                        <!-- Postal Code -->
                        <div class="relative">
                            <x-input-label for="postal_code" :value="__('Postal Code')" />
                            <x-text-input id="postal_code" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="text" name="postal_code" :value="old('postal_code')" required autofocus autocomplete="postal_code" />
                            <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                            <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
                        </div>
                        <!-- <div class="mb-4">
                            <label for="postal_code" class="block text-gray-700">Postal Code</label>
                            <input type="text" id="postal_code" name="postal_code" maxlength="10" required
                                class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('postal_code') }}">
                            @error('postal_code')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div> -->

                        <!-- Submit Button -->
                        <div class="flex items-center gap-4 justify-end">
                            <x-primary-button>{{ __('Add Address') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
