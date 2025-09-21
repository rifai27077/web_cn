<header 
    x-data="{ open: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 10)"
    @keydown.escape="open = false"
    class="fixed w-full top-0 z-50 transition-all duration-500"
    :class="scrolled ? 'bg-white/70 backdrop-blur-md shadow-md' : 'bg-transparent'"
>
    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-3 md:py-4 transition-opacity duration-500"
         :class="scrolled ? 'opacity-100' : 'opacity-95'">

        {{-- Logo Sekolah --}}
        <a href="/" class="flex items-center gap-2">
            <img src="{{ asset('images/logo-cn.png') }}" alt="Logo" class="w-12 h-auto">
            <div>
                <h1 class="text-lg font-bold text-green-700">Citra Negara</h1>
                <p class="text-xs text-gray-600">Yayasan At-Taqwa Kemiri Jaya</p>
            </div>
        </a>

        {{-- Burger Button (Mobile) --}}
        <button 
            @click="open = !open" 
            class="md:hidden text-green-700 focus:outline-none transition-opacity duration-300"
            aria-label="Toggle Menu"
            :class="open ? 'opacity-80' : 'opacity-100'"
        >
            <template x-if="!open">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" 
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </template>
            <template x-if="open">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" 
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M6 18L18 6M6 6l12 12" />
                </svg>
            </template>
        </button>

        {{-- Menu Desktop --}}
        <nav class="hidden md:flex space-x-8 font-medium text-gray-700">
            @php
                $menus = [
                    '/' => 'Beranda',
                    'profil*' => 'Profil',
                    'informasi*' => 'Informasi',
                    'prestasi*' => 'Prestasi',
                    'kontak*' => 'Kontak',
                ];
            @endphp

            @foreach ($menus as $route => $label)
                <a href="{{ $route == '/' ? '/' : '/' . rtrim($route, '*') }}"
                   class="relative group transition 
                          {{ Request::is($route) ? 'text-green-700 font-semibold' : 'hover:text-green-700' }}">
                    {{ $label }}
                    <span class="absolute left-0 -bottom-1 w-0 h-0.5 bg-green-700 transition-all duration-300 group-hover:w-full 
                          {{ Request::is($route) ? 'w-full' : '' }}"></span>
                </a>
            @endforeach
        </nav>
    </div>

    {{-- Menu Mobile --}}
    <nav 
        x-show="open" 
        x-cloak
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-400"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-3"
        class="absolute top-full inset-x-0 md:hidden bg-green-700 text-white px-6 py-5 space-y-3 font-medium shadow-md rounded-b-lg"
    >
        @foreach ($menus as $route => $label)
            <a href="{{ $route == '/' ? '/' : '/' . rtrim($route, '*') }}"
               class="block transition-opacity duration-300 {{ Request::is($route) ? 'underline font-semibold' : 'hover:underline' }}">
               {{ $label }}
            </a>
        @endforeach
    </nav>
</header>
