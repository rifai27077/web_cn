<header 
    x-data="{ open: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 10)"
    @keydown.escape.window="open = false"
    class="fixed top-0 left-0 w-full z-50 transition-all duration-500"
    :class="scrolled ? 'bg-white/80 backdrop-blur-md shadow-md' : 'bg-transparent'"
>
    {{-- Wrapper Utama --}}
    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6 lg:px-8 py-3">

        {{-- Logo Sekolah --}}
        <a href="/" class="flex items-center gap-2">
            <img src="{{ asset('images/logo-cn.png') }}" alt="Logo" class="w-10 h-10 object-contain">
            <span class="font-bold text-[#699D15] text-lg sm:text-xl tracking-wide">Citra Negara</span>
        </a>

        {{-- Tombol Hamburger (Muncul di Mobile) --}}
        <button 
            @click="open = !open"
            class="md:hidden text-gray-700 hover:text-[#699D15] transition focus:outline-none"
        >
            <template x-if="!open">
                <i class="fa-solid fa-bars text-2xl"></i>
            </template>
            <template x-if="open">
                <i class="fa-solid fa-xmark text-2xl"></i>
            </template>
        </button>

        {{-- Menu Desktop --}}
        @php
            $menus = [
                '/' => 'Beranda',
                'akademik' => 'Akademik',
                'berita' => 'Berita',
                'kontak' => 'Kontak',
                'kolaborasi' => 'Kolaborasi',
            ];
        @endphp

        <nav class="hidden md:flex gap-2 lg:gap-6 font-semibold items-center">
            @foreach ($menus as $route => $label)
                <a href="{{ $route == '/' ? '/' : '/' . $route }}"
                   class="px-4 py-2 rounded-full transition duration-300 ease-in-out
                   {{ Request::is($route == '/' ? '/' : $route.'*')
                        ? 'bg-[#699D15] text-white shadow-md'
                        : 'text-gray-800 hover:text-[#699D15] hover:bg-lime-100' }}">
                    {{ $label }}
                </a>
            @endforeach
        </nav>
    </div>

    {{-- Menu Mobile --}}
    <div 
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-400"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-3"
        class="md:hidden bg-[#699D15] text-white shadow-md rounded-b-2xl absolute top-full inset-x-0 z-40"
    >
        <nav class="flex flex-col px-6 py-4 space-y-3 text-base font-medium">
            @foreach ($menus as $route => $label)
                <a href="{{ $route == '/' ? '/' : '/' . rtrim($route, '*') }}"
                   class="block rounded-md px-3 py-2 transition duration-300
                   {{ Request::is($route) 
                        ? 'bg-white/20 font-semibold' 
                        : 'hover:bg-white/10' }}">
                    {{ $label }}
                </a>
            @endforeach
        </nav>
    </div>
</header>
