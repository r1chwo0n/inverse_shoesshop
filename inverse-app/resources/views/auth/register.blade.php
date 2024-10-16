<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
    </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <header class="bg-black p-[40px] text-white text-center text-3xl font-bold">REGISTER</header>
    
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-10 bg-white">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- FirstName -->
                <div class="relative">
                    <x-input-label for="firstname" :value="__('FirstName')" />
                    <x-text-input id="firstname" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                    <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                </div>

                <!-- LastName -->
                <div class="relative mt-4">
                    <x-input-label for="lastname" :value="__('LastName')" />
                    <x-text-input id="lastname" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                    <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                </div>
                
                <!-- Name -->
                <div class="relative mt-4">
                    <x-input-label for="name" :value="__('Username')" />
                    <x-text-input id="name" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Birthdate -->
                <div class="relative mt-4">
                    <x-input-label for="birthdate" :value="__('Birthdate')" />
                    <x-text-input id="birthdate" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="date" name="birthdate" :value="old('birthdate')" required />
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                    <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                </div>

                <!-- Gender -->
                <div class="relative mt-4">
                    <x-input-label for="gender" :value="__('Gender')" />
                    <select id="gender" name="gender" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none px-2 py-2">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>

                <!-- Phone Number -->
                <div class="relative mt-4">
                    <x-input-label for="phone_number" :value="__('Phone Number')" />
                    <x-text-input id="phone_number" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="text" name="phone_number" :value="old('phone_number')" required />
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="relative mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="relative mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="password" name="password" required autocomplete="new-password" />
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="relative mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4 pb-10">
                    <a class="underline text-sm text-gray-600 hover:text-red-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-48 text-white">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </body>
</html>