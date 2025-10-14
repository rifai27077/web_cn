<!-- HEADER -->
<header
  x-data="{ open:false, scrolled:false }"
  x-init="
    const onScroll = () => scrolled = window.scrollY > 10;
    window.addEventListener('scroll', onScroll);
    onScroll();
  "
  @keydown.escape.window="open = false"
  class="fixed top-0 left-0 w-full z-50 transition-all duration-300 ease-out"
  :class="scrolled ? 'bg-white/90 backdrop-blur-md shadow-sm' : 'bg-transparent'"
>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">

      <!-- Logo -->
      <a href="/" class="flex items-center gap-3 shrink-0">
        <img
          src="{{ asset('images/logo-cn.png') }}"
          alt="Citra Negara"
          class="w-11 h-11 object-contain transition-transform duration-300"
        />
        <div class="hidden sm:flex flex-col leading-tight">
          <span class="font-extrabold text-[#699D15] text-sm lg:text-base">
            Citra Negara
          </span>
          <span class="text-xs text-gray-600">SMP · SMK · SMA Citra Negara</span>
        </div>
      </a>

      <!-- Navigation + CTA Wrapper -->
      <div class="flex items-center gap-10">
        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center gap-6">
          @php
            $menus = [
                'sejarah' => 'Sejarah',
                'yayasan' => 'Yayasan',
                'visi-misi' => 'Visi & Misi',
                'sekolah' => 'Sekolah',
                'kontak' => 'Kontak Kami',
            ];
          @endphp

          <ul class="flex items-center gap-6">
            @foreach ($menus as $route => $label)
              <li>
                <a href="#{{ $route }}"
                  class="relative px-3 py-2 font-medium text-sm text-gray-800 transition-all duration-200 group hover:text-[#699D15]">
                  <span>{{ $label }}</span>
                  <span class="absolute left-1/2 -translate-x-1/2 bottom-0 block h-[2px] w-0 bg-[#699D15] group-hover:w-6 transition-all duration-300"></span>
                </a>
              </li>
            @endforeach
          </ul>
        </nav>

        <!-- CTA + Hamburger -->
        <div class="flex items-center gap-4">
          <a href="/ppdb"
            class="hidden md:inline-block bg-[#699D15] text-white font-semibold px-6 py-2.5 rounded-full 
                   shadow-md hover:shadow-lg hover:bg-[#7FBF1D] active:scale-95 transition-all duration-300 text-sm">
            DAFTAR SPMB
          </a>

          <!-- Mobile Button -->
          <button
            @click="open = !open"
            aria-label="Toggle menu"
            :aria-expanded="open.toString()"
            class="md:hidden p-2 rounded-md bg-white/30 hover:bg-white/40 transition"
          >
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div
    x-show="open"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-3"
    class="md:hidden bg-white/95 backdrop-blur-sm shadow-lg border-t border-gray-100 px-6 py-5"
  >
    <nav class="flex flex-col gap-2">
      @foreach ($menus as $route => $label)
        <a href="#{{ $route }}" @click="open = false"
           class="block rounded-lg px-4 py-3 font-medium text-gray-800 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#699D15]">
          {{ $label }}
        </a>
      @endforeach

      <a href="/ppdb"
        @click="open = false"
        class="mt-3 text-center bg-[#699D15] text-white font-semibold px-5 py-2 rounded-full shadow-md hover:bg-[#7FBF1D] hover:shadow-lg transition-all duration-300">
        DAFTAR SPMB
      </a>
    </nav>
  </div>
</header>