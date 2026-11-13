<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Titre dynamique -->
        <title>{{ config('app.name', 'Mini-Blog') }}</title>

        <!-- Polices -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts & CSS (Tailwind) via Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900 bg-gray-50">
        <div class="min-h-screen">
            
            <!-- Le menu de navigation (généré par Breeze) -->
            @include('layouts.navigation')

            <!-- En-tête de page optionnel (si on utilise <x-slot name="header">) -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Contenu principal de la page (là où s'afficheront nos articles) -->
            <main>
                @yield('content')
            </main>

        </div>
    </body>
</html>