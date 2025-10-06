<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Citra Negara') }}</title>

    {{-- Load Vite (kalau ada build) --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    {{-- Tailwind & Alpine --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

    {{-- Font Awesome & Swiper --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- Custom Tailwind config (biar lebih modern dan konsisten) --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    container: {
                        center: true,
                        padding: {
                            DEFAULT: '1rem',
                            sm: '2rem',
                            lg: '3rem',
                            xl: '4rem',
                        },
                    },
                    colors: {
                        primary: '#699D15',
                        accent: '#E9DC00',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'ui-sans-serif', 'system-ui'],
                    },
                },
            },
        }
    </script>

    <style>
        html {
            scroll-behavior: smooth;
        }
        /* Fallback supaya sebelum Tailwind load tampilan tetap rapi */
        body {
            margin: 0;
            font-family: 'Poppins', Arial, sans-serif;
        }
    </style>

    @stack('styles')
</head>

<body class="flex flex-col min-h-screen bg-gray-50 text-gray-800 overflow-x-hidden antialiased">

    {{-- Header Component --}}
    <x-header class="sticky top-0 z-50 bg-white shadow-sm" />

    {{-- Main Content --}}
    <main class="flex-1">
        <div class="container mx-auto">
            @yield('content')
        </div>
    </main>

    {{-- Footer Component --}}
    <x-footer class="mt-auto" />

    {{-- Swiper Script --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- Smooth animations & responsive tweaks --}}
    <script>
        // Untuk efek halus transisi masuk konten
        document.addEventListener("DOMContentLoaded", () => {
            document.body.classList.add("opacity-100");
        });
    </script>

    @stack('scripts')
</body>
</html>
