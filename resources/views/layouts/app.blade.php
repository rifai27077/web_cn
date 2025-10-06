<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Citra Negara') }}</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />

    <style>
        html, body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
            }

            /* optional: jika kamu ingin tetap mengatur box-sizing atau spacing pada semua elemen, pisahkan itu */
        * { box-sizing: border-box; }
        @keyframes pulse {
  0%, 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(105,157,21, 0.6); }
  50% { transform: scale(1.05); box-shadow: 0 0 0 12px rgba(105,157,21, 0); }
}
#chat-robibtn {
  animation: pulse 2.5s infinite;
}
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-50 text-gray-800 overflow-x-hidden antialiased">
    <x-header class="sticky top-0 z-50 bg-white shadow-sm" />

    <main class="flex-1">
        @yield('content')
    </main>

    <x-footer class="mt-auto" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });

        document.querySelectorAll('.group').forEach(card => {
            card.addEventListener('mousemove', e => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;
                card.style.transform = `rotateY(${x / 30}deg) rotateX(${-y / 30}deg) scale(1.03)`;
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        });

    </script>

    @stack('scripts')
</body>
</html>
