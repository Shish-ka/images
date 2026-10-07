<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <script src="{{ asset('tailwindcss.js') }}"></script>

        @livewireStyles
    </head>
    <body>
        <header class="py-2 px-[10%] flex justify-between border-b border-b-gray-400">
            <a href="{{ route('home') }}">Home</a>
            <div class="flex gap-5">
                <a href="{{ route('products.index') }}">Products</a>
                <a href="{{ route('products.create') }}">New product</a>
            </div>
        </header>
        <main class="py-5 px-[10%]">
            {{ $slot }}
        </main>

        @livewireScripts
    </body>
</html>
