<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIPETANJAG') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animation-delay-1000 {
            animation-delay: 1000ms;
        }

        .animation-delay-2000 {
            animation-delay: 2000ms;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="relative min-h-screen overflow-hidden bg-gradient-to-br from-green-50 via-white to-yellow-50">
        <!-- Background Elements -->
        <div class="absolute inset-0">
            <div
                class="absolute bg-green-200 rounded-full -top-20 -left-20 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-float">
            </div>
            <div
                class="absolute bg-yellow-200 rounded-full top-40 -right-20 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-float animation-delay-1000">
            </div>
            <div
                class="absolute bg-green-300 rounded-full -bottom-20 left-1/2 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-float animation-delay-2000">
            </div>
        </div>

        <!-- Content -->
        <div class="relative z-10 flex flex-col justify-center min-h-screen py-12 sm:px-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <img class="w-auto mx-auto h-36" src="{{ asset('storage/images/logo-sipentajag-1.png') }}"
                    alt="Logo">
            </div>

            <div class="w-full px-4 mt-8 sm:mx-auto sm:max-w-md">
                <div class="px-4 py-8 shadow-xl bg-white/80 backdrop-blur-sm sm:rounded-lg sm:px-10">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
