<header 
    x-data="{ open: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 10)"
    @keydown.escape="open = false"
    class="fixed w-full top-0 z-50 transition-all duration-500"
    :class="scrolled ? 'bg-white/70 backdrop-blur-md shadow-md' : 'bg-transparent'"
>

    <div
        :class="scrolled
            ? 'w-full px-6 py-3 max-w-full flex flex-col items-start justify-center'
            : 'max-w-5xl mx-auto flex flex-col items-center justify-center px-2 py-4'">
        {{-- Navbar pill style --}}
        <nav :class="scrolled ? 'w-full' : 'w-full flex justify-center'">
            <ul
                :class="scrolled
                    ? 'flex w-full shadow-none gap-2 md:gap-6 text-base font-semibold items-center'
                    : 'flex bg-white rounded-full shadow-lg px-4 py-4 gap-2 md:gap-6 text-base font-semibold items-center'"
            >
                {{-- Logo only when scrolled --}}
                <template x-if="scrolled">
                    <li class="mr-4 flex items-center">
                        <a href="/" class="flex items-center gap-2">
                            <img src="{{ asset('images/logo-cn.png') }}" alt="Logo" class="w-9 h-9 object-contain">
                            <span class="font-bold text-[#699D15] text-lg tracking-wide whitespace-nowrap">SMK Citra Negara</span>
                        </a>
                    </li>
                </template>
                @php
                    $menus = [
                        '/' => 'Beranda',
                        'akademik' => 'Akademik',
                        'berita' => 'Berita',
                        'kontak' => 'Kontak',
                        'kolaborasi' => 'Kolaborasi',
                    ];
                @endphp
                @foreach ($menus as $route => $label)
                    <li @if ($loop->first) :class="scrolled ? 'ml-auto' : ''" @endif>
                        <a href="{{ $route == '/' ? '/' : '/' . $route }}"
                           class="px-6 py-2 rounded-full transition font-semibold focus:outline-none
                           {{ Request::is($route == '/' ? '/' : $route.'*') ? 'bg-[#699D15] text-white' : 'text-black hover:bg-lime-100' }}">
                            {{ $label }}
                        </a>
                    </li>
                @endforeach
            </ul>
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
        class="absolute top-full inset-x-0 md:hidden bg-[#699D15] text-white px-6 py-5 space-y-3 font-medium shadow-md rounded-b-lg"
    >
        @foreach ($menus as $route => $label)
            <a href="{{ $route == '/' ? '/' : '/' . rtrim($route, '*') }}"
               class="block transition-opacity duration-300 {{ Request::is($route) ? 'underline font-semibold' : 'hover:underline' }}">
               {{ $label }}
            </a>
        @endforeach
    </nav>
</header>
