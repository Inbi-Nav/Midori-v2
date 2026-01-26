<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

            <div class="petals-container pointer-events-none">
                <div class="petal text-pink-200 text-3xl">🌸</div>
                <div class="petal text-pink-400 text-xl">🌸</div>
                <div class="petal text-pink-300 text-3xl">🌸</div>
                <div class="petal text-pink-400 text-2xl">🌸</div>
            </div>

            <div class="leaves-container pointer-events-none">
                <div class="leaf text-green-400 text-2xl">🍃</div>
                <div class="leaf text-green-500 text-xl">🍃</div>
                <div class="leaf text-green-400 text-3xl">🍃</div>
                <div class="leaf text-green-600 text-xl">🍃</div>
                <div class="leaf text-green-500 text-2xl">🍃</div>
            </div>
            <div>
                <!-- <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a> -->
            </div>
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-emerald-100 shadow-md overflow-hidden sm:rounded-3xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
