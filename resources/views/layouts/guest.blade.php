<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gradient-to-br from-primary-50 to-accent-50">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="mb-8">
            <x-application-logo />
        </div>

        <div class="w-full sm:max-w-md px-6 py-8 bg-white/80 backdrop-blur-sm shadow-xl overflow-hidden sm:rounded-2xl border border-primary-100">
            {{ $slot }}
        </div>

        <!-- Decorative elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-accent-200 rounded-full opacity-20"></div>
        <div class="absolute bottom-20 right-10 w-32 h-32 bg-primary-200 rounded-full opacity-20"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-accent-300 rounded-full opacity-10"></div>
    </div>
</body>
</html>
