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
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-cover bg-center bg-no-repeat relative"
    style="background-image: url('{{ asset('images/Background_admin _sepatu_neon.webp') }}')">
        
        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative z-10">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-cyan-400 drop-shadow-[0_0_10px_rgba(6,182,212,0.8)]" />
            </a>
        </div>

        <div class="relative z-10 w-full sm:max-w-md mt-6 px-6 py-8 
                    bg-gray-900/80 backdrop-blur-md 
                    border-t-2 border-l-2 border-cyan-500/50 
                    border-b-2 border-r-2 border-purple-600/50
                    shadow-[0_0_20px_rgba(6,182,212,0.3)] 
                    overflow-hidden sm:rounded-xl">
            
            <div class="absolute top-0 right-0 w-8 h-8 border-t-2 border-r-2 border-cyan-400"></div>
            <div class="absolute bottom-0 left-0 w-8 h-8 border-b-2 border-l-2 border-purple-500"></div>

            <div class="text-gray-100">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
