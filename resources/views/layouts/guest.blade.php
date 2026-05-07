<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
            .glass-effect {
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
        </style>
    </head>
    <body class="antialiased selection:bg-indigo-500 selection:text-white">
        <!-- Modern Animated Background -->
        <div class="fixed inset-0 -z-10 h-full w-full bg-white dark:bg-gray-950">
            <div class="absolute inset-0 bg-gradient-to-tr from-indigo-100 via-transparent to-rose-100 dark:from-indigo-950/20 dark:to-rose-950/20 opacity-40"></div>
            <div class="absolute left-[-10%] top-[-10%] h-[500px] w-[500px] rounded-full bg-indigo-500/10 blur-[120px]"></div>
            <div class="absolute right-[-10%] bottom-[-10%] h-[500px] w-[500px] rounded-full bg-rose-500/10 blur-[120px]"></div>
        </div>

        <div class="min-h-screen flex flex-col items-center justify-center p-6">
            <!-- Logo Section -->
            {{-- <div class="mb-8 transform transition hover:scale-105">
                <a href="/">
                    <x-application-logo class="w-16 h-16 fill-current text-indigo-600 dark:text-indigo-400" />
                </a>
            </div> --}}

            <!-- Main Card Container -->
            <div class="w-full sm:max-w-[450px] bg-white/70 dark:bg-gray-900/70 backdrop-blur-xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-white/20 dark:border-gray-800 p-8 sm:rounded-3xl overflow-hidden">
                {{ $slot }}
            </div>
            
            <!-- Minimal Footer -->
            <footer class="mt-8 text-sm text-gray-500 dark:text-gray-400">
                &copy; {{ date('Year') }} Shekh Mohsin | All rights reserved.
            </footer>
        </div>
    </body>
</html>