@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative">
        <img src="{{ asset('images/hero.jpg') }}" alt="Hero Citra Negara" class="w-full h-[600px] object-cover">
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4">
            <h1 class="text-5xl md:text-6xl font-extrabold drop-shadow-lg">CITRA NEGARA</h1>
            <p class="mt-3 text-xl md:text-2xl font-semibold">SMP - SMA - SMK</p>
        </div>
    </section>

    {{-- Founder --}}
    <section class="py-16 bg-white text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-green-700">Founder</h2>
        <p class="mt-2 text-lg font-semibold text-yellow-600">Yayasan AT-TAQWA Kemiri Jaya</p>
        <p class="text-gray-700 font-semibold">Drs. H. Hasan, MM & Hj. Mutia, S.Pd, M.M</p>
        <p class="text-gray-500">Penasehat Yayasan YATKJ</p>

        <div class="mt-10 flex flex-wrap justify-center gap-12">
            <div class="max-w-[220px]">
                <img src="{{ asset('images/founder1.png') }}" class="rounded-xl shadow-lg" alt="Ketua BPH">
                <p class="mt-3 font-bold text-yellow-700">Dr. M. Rizki Darmagana Hasan, S.T., M.Pd</p>
                <p class="text-gray-600">Ketua BPH</p>
            </div>
            <div class="max-w-[220px]">
                <img src="{{ asset('images/founder2.png') }}" class="rounded-xl shadow-lg" alt="Wakil BPH">
                <p class="mt-3 font-bold text-yellow-700">Agustin Wijayanti, S.H., M.M</p>
                <p class="text-gray-600">Wakil BPH</p>
            </div>
        </div>
    </section>

    {{-- Visi Misi --}}
    <section class="py-16 bg-green-50">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-8 px-6">
            <div class="bg-white shadow-md rounded-2xl p-8">
                <h3 class="text-xl font-bold text-green-700 mb-3">VISI</h3>
                <p class="text-gray-700">Terwujudnya Sekolah yang Religius, Disiplin dan Terampil dalam Menyongsong Generasi Emas di tahun 2045</p>
            </div>
            <div class="bg-white shadow-md rounded-2xl p-8">
                <h3 class="text-xl font-bold text-green-700 mb-3">MISI</h3>
                <p class="text-gray-700">Mewujudkan insan yang taat beribadah, cinta kebersihan, berdisiplin, serta unggul dalam akademik dan keterampilan...</p>
            </div>
        </div>
    </section>

    {{-- Unit Pendidikan --}}
    {{-- <section class="py-16 bg-white">
        <div class="text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-green-700">Ketahui lebih lanjut</h2>
            <p class="text-lg text-gray-600">unit pendidikan pilihanmu disini</p>
        </div>

        <div class="mt-12 max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 px-6">
            @foreach (['smp' => 'SMP', 'sma' => 'SMA', 'smk' => 'SMK'] as $img => $label)
                <div class="relative group rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500">
                    <img src="{{ asset('images/'.$img.'.jpg') }}" 
                        alt="{{ $label }}" 
                        class="w-full h-56 object-cover transform group-hover:scale-110 transition duration-500">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
                    
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
                        <h3 class="text-2xl font-bold text-white drop-shadow-md">{{ $label }}</h3>
                        <a href="#" 
                        class="mt-4 px-5 py-2 bg-yellow-400 text-black font-semibold rounded-lg shadow hover:bg-yellow-500 transition">
                            Lihat Selengkapnya
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section> --}}

    {{-- Unit Pendidikan --}}
    <section class="py-16 bg-white text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-green-700">Ketahui lebih lanjut</h2>
        <p class="text-lg text-gray-600">Pilih unit pendidikan yang sesuai untuk masa depanmu</p>

        <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-6 max-w-6xl mx-auto">
            @foreach ([
                ['key' => 'smp', 'title' => 'SMP', 'desc' => 'Jenjang Sekolah Menengah Pertama dengan kurikulum unggulan berbasis karakter.'],
                ['key' => 'sma', 'title' => 'SMA', 'desc' => 'Jenjang Sekolah Menengah Atas yang berfokus pada akademik dan persiapan kuliah.'],
                ['key' => 'smk', 'title' => 'SMK', 'desc' => 'Jenjang Sekolah Menengah Kejuruan dengan keterampilan siap kerja.'],
            ] as $unit)
                <div class="group bg-gray-50 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">
                    <div class="relative">
                        <img src="{{ asset('images/'.$unit['key'].'.jpg') }}" alt="{{ $unit['title'] }}" 
                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <h3 class="absolute bottom-3 left-4 text-white font-bold text-xl drop-shadow-lg">
                            {{ $unit['title'] }}
                        </h3>
                    </div>
                    <div class="p-6 text-left">
                        <p class="text-gray-600 mb-4">{{ $unit['desc'] }}</p>
                        <a href="#" class="inline-block px-5 py-2 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
                            Lihat Selengkapnya
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Unit Pendidikan --}}
<section class="py-16 bg-white text-center">
    <h2 class="text-2xl md:text-3xl font-bold text-green-700">Ketahui lebih lanjut</h2>
    <p class="text-lg text-gray-600">Pilih unit pendidikan yang sesuai untuk masa depanmu</p>

    {{-- Grid untuk Desktop --}}
    <div class="hidden md:grid mt-12 grid-cols-3 gap-8 px-6 max-w-6xl mx-auto">
        @foreach ([
            ['key' => 'smp', 'title' => 'SMP', 'desc' => 'Jenjang Sekolah Menengah Pertama dengan kurikulum unggulan berbasis karakter.'],
            ['key' => 'sma', 'title' => 'SMA', 'desc' => 'Jenjang Sekolah Menengah Atas yang berfokus pada akademik dan persiapan kuliah.'],
            ['key' => 'smk', 'title' => 'SMK', 'desc' => 'Jenjang Sekolah Menengah Kejuruan dengan keterampilan siap kerja.'],
        ] as $unit)
            <div class="group bg-gray-50 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">
                <div class="relative">
                    <img src="{{ asset('images/'.$unit['key'].'.jpg') }}" alt="{{ $unit['title'] }}" 
                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <h3 class="absolute bottom-3 left-4 text-white font-bold text-xl drop-shadow-lg">
                        {{ $unit['title'] }}
                    </h3>
                </div>
                <div class="p-6 text-left">
                    <p class="text-gray-600 mb-4">{{ $unit['desc'] }}</p>
                    <a href="#" class="inline-block px-5 py-2 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
                        Lihat Selengkapnya
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Carousel untuk Mobile --}}
    <div class="md:hidden mt-12 px-4">
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ([
                    ['key' => 'smp', 'title' => 'SMP', 'desc' => 'Jenjang Sekolah Menengah Pertama dengan kurikulum unggulan berbasis karakter.'],
                    ['key' => 'sma', 'title' => 'SMA', 'desc' => 'Jenjang Sekolah Menengah Atas yang berfokus pada akademik dan persiapan kuliah.'],
                    ['key' => 'smk', 'title' => 'SMK', 'desc' => 'Jenjang Sekolah Menengah Kejuruan dengan keterampilan siap kerja.'],
                ] as $unit)
                    <div class="swiper-slide">
                        <div class="group bg-gray-50 rounded-2xl shadow-lg overflow-hidden">
                            <div class="relative">
                                <img src="{{ asset('images/'.$unit['key'].'.jpg') }}" alt="{{ $unit['title'] }}" 
                                     class="w-full h-48 object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <h3 class="absolute bottom-3 left-4 text-white font-bold text-xl drop-shadow-lg">
                                    {{ $unit['title'] }}
                                </h3>
                            </div>
                            <div class="p-6 text-left">
                                <p class="text-gray-600 mb-4">{{ $unit['desc'] }}</p>
                                <a href="#" class="inline-block px-5 py-2 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
                                    Lihat Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination & Navigation -->
            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>
</section>

    {{-- Informasi Terkini --}}
    <section class="py-16 bg-gray-50">
        <h2 class="text-center text-2xl md:text-3xl font-bold text-green-700">Informasi terkini Citra Negara</h2>
        <div class="mt-8 max-w-6xl mx-auto flex items-center gap-4 overflow-x-auto px-6">
            {{-- Dummy Cards (nanti bisa pake carousel JS) --}}
            <div class="bg-white rounded-xl shadow-md w-80 shrink-0">
                <img src="{{ asset('images/news1.jpg') }}" class="w-full h-40 object-cover rounded-t-xl">
                <div class="p-4">
                    <p class="text-gray-700">Grand Opening PPDB 2026/2027 dihadiri Wali Kota Depok</p>
                    <span class="text-sm text-gray-500">25 Agustus 2025</span>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md w-80 shrink-0">
                <img src="{{ asset('images/news2.jpg') }}" class="w-full h-40 object-cover rounded-t-xl">
                <div class="p-4">
                    <p class="text-gray-700">SMK-SMA Citra Negara mengadakan doorprize PPDB</p>
                    <span class="text-sm text-gray-500">29 Agustus 2025</span>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-white text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-green-700">Kami selalu terbuka untukmu</h2>
        <p class="mt-2 text-lg text-gray-600">Yuk, mulai langkah menuju masa depan cerah bersama sekolah mantap</p>
        <div class="mt-6 flex flex-wrap justify-center gap-4">
            <a href="#kontak" class="px-6 py-3 bg-yellow-400 text-black rounded-xl font-bold">Hubungi Kami</a>
            <a href="#ppdb" class="px-6 py-3 bg-green-600 text-white rounded-xl font-bold">Daftar PPDB</a>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            new Swiper('.swiper', {
            slidesPerView: 1,
            spaceBetween: 16,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 3000, // jeda 3 detik
                disableOnInteraction: false, // tetap jalan meski user swipe manual
            },
            loop: true, // biar muter terus
            });
        });
    </script>


@endsection
