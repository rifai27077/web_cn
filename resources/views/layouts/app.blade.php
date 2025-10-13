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
        section {
            scroll-margin-top: 4rem; /* Sesuaikan dengan tinggi header (biasanya 4rem–6rem) */
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(105,157,21, 0.6); }
            50% { transform: scale(1.05); box-shadow: 0 0 0 12px rgba(105,157,21, 0); }
        }
        #chat-robibtn {
            animation: pulse 2.5s infinite;
        }

        @media (max-width: 640px) {
            #chat-robibtn-wrapper {
                right: 1rem;
                bottom: 1rem;
            }
            #robi-tooltip {
                font-size: 0.75rem;
                padding: 0.25rem 0.5rem;
            }
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-50 text-gray-800 overflow-x-hidden antialiased">
    <x-header class="site-header sticky top-0 z-50 bg-white shadow-sm h-16 md:h-20" />

    <main class="flex-1 pt-16 md:pt-20">
        @yield('content')
    </main>
    
    <x-chatrobi />
    <x-footer class="mt-auto" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
    const isDesktop = window.matchMedia("(min-width: 768px)").matches;

    if (isDesktop) {
        // Buat elemen script untuk load AOS hanya di desktop
        const aosScript = document.createElement("script");
        aosScript.src = "https://unpkg.com/aos@2.3.4/dist/aos.js";
        aosScript.onload = function() {
        AOS.init({
            once: true,
            duration: 700,
            delay: 100,
            offset: 80,
            easing: "ease-out-cubic",
        });
        };
        document.body.appendChild(aosScript);

        // Tambahkan stylesheet AOS juga
        const aosStyle = document.createElement("link");
        aosStyle.rel = "stylesheet";
        aosStyle.href = "https://unpkg.com/aos@2.3.4/dist/aos.css";
        document.head.appendChild(aosStyle);
    } else {
        // Nonaktifkan efek AOS di mobile
        document.querySelectorAll("[data-aos]").forEach(el => {
        el.removeAttribute("data-aos");
        el.removeAttribute("data-aos-delay");
        el.removeAttribute("data-aos-duration");
        el.removeAttribute("data-aos-offset");
        });
    }
    });
    </script>


    @stack('scripts')
</body>
</html>
