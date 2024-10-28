<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Address') }}
        </h2>
    </x-slot>
<div class="max-w-2xl mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Add Address</h2>
        <form action="{{ route('addresses.store') }}" method="POST">
            @csrf
        
            <!-- Address Line 1 -->
            <div class="mb-4">
                <label for="address_line_1" class="block text-gray-700">Address Line 1</label>
                <input type="text" id="address_line_1" name="address_line_1" maxlength="255" required
                    class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('address_line_1') }}">
                @error('address_line_1')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Address Line 2 -->
            <div class="mb-4">
                <label for="address_line_2" class="block text-gray-700">Address Line 2 (Optional)</label>
                <input type="text" id="address_line_2" name="address_line_2" maxlength="255"
                    class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('address_line_2') }}">
                @error('address_line_2')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Address Line 3 -->
            <div class="mb-4">
                <label for="address_line_3" class="block text-gray-700">Address Line 3 (Optional)</label>
                <input type="text" id="address_line_3" name="address_line_3" maxlength="255"
                    class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('address_line_3') }}">
                @error('address_line_3')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Street -->
            <div class="mb-4">
                <label for="street" class="block text-gray-700">Street (Optional)</label>
                <input type="text" id="street" name="street" maxlength="255"
                       class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('street') }}">
                @error('street')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Subdistrict -->
            <div class="mb-4">
                <label for="subdistrict" class="block text-gray-700">Subdistrict</label>
                <input type="text" id="subdistrict" name="subdistrict" maxlength="255" required
                    class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('subdistrict') }}">
                @error('subdistrict')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- District -->
            <div class="mb-4">
                <label for="district" class="block text-gray-700">District</label>
                <input type="text" id="district" name="district" maxlength="255" required
                    class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('district') }}">
                @error('district')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Province -->
            <div class="mb-4">
                <label for="province" class="block text-gray-700">Province</label>
                <input type="text" id="province" name="province" maxlength="255" required
                    class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('province') }}">
                @error('province')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Postal Code -->
            <div class="mb-4">
                <label for="postal_code" class="block text-gray-700">Postal Code</label>
                <input type="text" id="postal_code" name="postal_code" maxlength="10" required
                    class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('postal_code') }}">
                @error('postal_code')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                    Add Address
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
