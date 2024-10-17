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
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white">
            <img src="{{ asset('images/INVERSE_bg.png') }}" alt="My Logo" class="w-80 h-40">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!--Sign up-->
                <div class="relative">
                    <span class="text-gray-600 text-sm">
                        {{ __('Don’t have an account yet?') }} 
                        <a href="{{ route('register') }}" class="underline text-indigo-600 hover:text-red-500">
                            {{ __('Sign Up') }}
                        </a>
                    </span>
                </div>
                
                <!-- Email Address -->
                <div class="relative mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="relative mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full bg-gray-100 border-none focus:ring-0 focus:outline-none"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                                    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-black"></div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-red-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-48">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </body>
</html>