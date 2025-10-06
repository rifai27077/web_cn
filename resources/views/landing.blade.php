@extends('layouts.app')

@section('content')
{{-- Hero Section --}}
<section class="relative flex items-center justify-center w-full overflow-hidden px-4 md:px-12 lg:px-5 top-6">
  <!-- Hero Image -->
  <img 
    src="/images/lp-1.png" 
    alt="Hero Citra Negara" 
    class="w-full h-[60vh] md:h-[80vh] object-cover rounded-3xl md:rounded-[2rem] shadow-lg"
  >

  <!-- Overlay Content -->
  <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4">
    <h1 class="text-4xl md:text-6xl font-extrabold drop-shadow-lg tracking-wide">
      CITRA NEGARA
    </h1>
    <p class="mt-4 text-lg md:text-2xl font-semibold text-black bg-[#C3E956] px-4 py-2 rounded-lg">
      SMP - SMA - SMK
    </p>
  </div>
</section>

{{-- Founder --}}
<section class="pt-12">
  <section class="pt-12">
  <h2 class="text-3xl md:text-4xl font-extrabold text-[#699D15] mb-2 text-center">Founder</h2>
  <p class="text-3xl md:text-5xl font-extrabold text-[#699D15] mb-10 text-center">Yayasan AT–TAQWA Kemiri Jaya</p>

  <div class="flex flex-col md:flex-row items-start md:items-end justify-center gap-6 md:gap-12 max-w-[1200px] mx-auto">
    
    <!-- Ketua BPH -->
    <div class="flex flex-col items-center relative pt-12 w-64">
      <img src="{{ asset('images/ketuabph.png') }}" class="object-contain" alt="Ketua BPH">
      <span class="inline-block bg-[#E9DC00] font-bold text-base md:text-lg rounded-full px-6 py-2 shadow whitespace-nowrap">
        Dr. M. Rizki Darmaguna Hasan, S.Tr., M.Pd
      </span>
      <p class="text-gray-700 mt-1">Ketua BPH</p>
    </div>

    <!-- Penasehat -->
    <div class="flex flex-col items-center mb-20 relative w-72">
      <img src="{{ asset('images/penasehat.png') }}" class="object-contain" alt="Penasehat Yayasan YATKJ">
      <span class="inline-block bg-[#E9DC00] font-bold text-base md:text-lg rounded-full px-6 py-2 shadow whitespace-nowrap">
        Drs. H. Nasan, M.M &amp; Hj. Mutia, S.Pd., M.M
      </span>
      <p class="text-gray-700 mt-1">Penasehat Yayasan YATKJ</p>
    </div>

    <!-- Wakil BPH -->
    <div class="flex flex-col items-center pt-12 relative w-48">
      <img src="{{ asset('images/wakilbph.png') }}" class="object-contain" alt="Wakil Ketua BPH">
      <span class="inline-block bg-[#E9DC00] font-bold text-base md:text-lg rounded-full px-6 py-2 shadow whitespace-nowrap">
        Agustin Wijayanti, S.H., M.M
      </span>
      <p class="text-gray-700 mt-1">Wakil Ketua BPH</p>
    </div>

  </div>
</section>

{{-- Visi Misi --}}
    <div class="bg-[#699D15] text-center rounded-3xl w-full px-4 py-10 md:py-14">
            <h3 class="text-2xl md:text-3xl font-extrabold text-white mb-2">Pilihan yang tepat,<br><span class="text-[#E9DC00]">Disekolah yang mantap</span></h3>
            <p class="text-white text-base md:text-lg mb-8">Yayasan AT–TAQWA Kemiri Jaya dibangun pada tahun 2004 di Jl. Raya Tanah Baru No.99 Kemiri Jaya, Beji, Depok 16421, Yayasan ini di perakarsai serta di miliki oleh Bpk. H. Drs. Nasan, M.M, kemudian di tahun sama sekolah SMK Citra Negara dibuka. Sekolah SMK Citra Negara berdiri pada tahun 2004, pada awal berdirinya SMK Citra Negara yang berada di bawah yayasan AT–TAQWA hanya memiliki 1 program keahlian yaitu Tata Niaga (TN). Kemudian pada tahun 2007 SMK Citra Negara kembali membuka program keahlian baru yaitu Teknik Komputer Jaringan (TKJ), lalu jurusan Multimedia (MM) pada tahun 2011, jurusan Administrasi Perkantoran (AP) dan Rekayasa Perangkat Lunak (RPL) pada tahun 2015, terakhir jurusan Perhotelan pada tahun 2025. Sehingga total Program keahlian yang dimiliki SMK Citra Negara pada saat ini berjumlah 6 jurusan.</p>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl p-8 flex flex-col h-full">
                    <div class="flex items-center mb-6">
                        <span class="flex items-center justify-center bg-[#699D15] rounded-full h-14 w-14 mr-4" style="box-shadow: inset 0 8px 32px 0 rgba(0,0,0,0.12);">
                            <img src="/images/sparkles.png" class="h-8 w-8">
                        </span>
                        <span class="text-2xl md:text-3xl font-extrabold text-[#699D15] uppercase tracking-wide text-left">VISI</span>
                    </div>
                    <p class="text-gray-700 text-left text-base md:text-lg">Terwujudnya Sekolah yang Religius, Disiplin dan Terampil Dalam Menyongsong Generasi Emas di tahun 2045</p>
                </div>
                <div class="bg-white rounded-2xl p-8 flex flex-col h-full">
                    <div class="flex items-center mb-6">
                        <span class="flex items-center justify-center bg-[#E9DC00] rounded-full h-14 w-14 mr-4" style="box-shadow: inset 0 8px 32px 0 rgba(0,0,0,0.12);">
                            <img src="/images/vector.png" class="h-8 w-8">
                        </span>
                        <span class="text-2xl md:text-3xl font-extrabold text-[#E9DC00] uppercase tracking-wide text-left">MISI</span>
                    </div>
                    <p class="text-gray-700 text-left text-base md:text-lg">Mewujudkan Insan yang taat beribadah, cinta kepada kitab suci dan pandai dalam dakwah keagamaan. Mewujudkan peserta didik yang berperilaku baik, patuh, dan memiliki jiwa kepemimpinan. Mewujudkan peserta didik yang ahli sesuai dengan kejuruan, sinkronasi kurikulum intrakurikuler dengan ekstrakurikuler, dan pengembangan kerjasama dengan dunia industri.</p>
                </div>
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
    <section class="py-16 bg-[#F5F6F7] text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-[#7CB518] mb-2">Ketahui lebih lanjut</h2>
        <p class="text-2xl md:text-3xl font-extrabold text-[#8DC63F] mb-10">unit pendidikan pilihanmu disini</p>
        <div class="flex flex-col md:flex-row items-center justify-center gap-8 max-w-6xl mx-auto">
            <!-- SMP Card -->
            <div class="flex flex-col items-center w-80">
                <img src="/images/u-smp.png" alt="SMP" class="aspect-square w-full h-auto object-cover rounded-tl-[40px] rounded-br-[40px] shadow-lg]">
                <div class="bg-[#8DC63F] w-full rounded-tl-[48px] rounded-br-[48px] flex flex-col items-center py-8 -mt-20 shadow-lg">
                    <span class="text-white font-extrabold text-2xl">SMP</span>
                    <a href="#" class="bg-white text-[#5B8C24] font-extrabold text-lg rounded-full px-10 py-3 mt-2 transition-all" style="box-shadow:0 2px 8px 0 rgba(0,0,0,0.04);">Lihat Selengkapnya</a>
                </div>
            </div>
            <!-- SMA Card -->
            <div class="flex flex-col items-center w-80">
                <img src="/images/u-sma.png" alt="SMA" class="aspect-square w-full h-auto object-cover rounded-tl-[40px] rounded-br-[40px] shadow-lg]">
                <div class="bg-[#8DC63F] w-full  rounded-tl-[48px] rounded-br-[48px] flex flex-col items-center py-8 -mt-20 shadow-lg">
                    <span class="text-white font-extrabold text-2xl">SMA</span>
                    <a href="#" class="bg-white text-[#5B8C24] font-extrabold text-lg rounded-full px-10 py-3 mt-2 transition-all" style="box-shadow:0 2px 8px 0 rgba(0,0,0,0.04);">Lihat Selengkapnya</a>
                </div>
            </div>
            <!-- SMK Card -->
            <div class="flex flex-col items-center w-80">
                <img src="/images/u-smk.png" alt="SMK" class="aspect-square w-full h-auto object-cover rounded-tl-[40px] rounded-br-[40px] shadow-lg]">
                <div class="bg-[#8DC63F] w-full rounded-tl-[48px] rounded-br-[48px] flex flex-col items-center py-8 -mt-20 shadow-lg">
                    <span class="text-white font-extrabold text-2xl">SMK</span>
                    <a href="#" class="bg-white text-[#5B8C24] font-extrabold text-lg rounded-full px-10 py-3 mt-2 transition-all" style="box-shadow:0 2px 8px 0 rgba(0,0,0,0.04);">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Informasi Terkini --}}
    <section class="py-16 bg-white">
        <h2 class="text-center text-2xl md:text-3xl font-extrabold text-[#7CB518] mb-8">Informasi terkini Citra Negara</h2>
        <div class="flex justify-center items-center">
            <!-- Left Arrow -->
            <button class="flex items-center justify-center w-10 h-10 bg-[#FFE14D] rounded-full shadow mr-4 text-2xl font-bold text-[#7CB518] hover:bg-[#FFEB7A] transition">
                <span>&lt;</span>
            </button>
            <!-- News Cards -->
            <div class="flex gap-8">
                <!-- News 1 -->
                <div class="bg-white rounded-2xl shadow-lg w-[340px] flex flex-col items-start">
                    <img src="/images/berita1.png" alt="News 1" class="w-full h-48 object-cover rounded-t-2xl">
                    <div class="p-5 w-full">
                        <p class="font-semibold text-base text-[#222] leading-snug mb-2">GRAND OPENING SPMB CITRA NEGARA 2026/2027<br> dihadiri langsung oleh Walikota Depok,<br> Dr. Drs. H. Supian Suri, M.M</p>
                        <span class="text-[#699D15] text-sm font-semibold">25 Agustus 2025</span>
                    </div>
                </div>
                <!-- News 2 -->
                <div class="bg-white rounded-2xl shadow-lg w-[340px] flex flex-col items-start">
                    <img src="/images/berita2.png" alt="News 2" class="w-full h-48 object-cover rounded-t-2xl">
                    <div class="p-5 w-full">
                        <p class="font-semibold text-base text-[#222] leading-snug mb-2">Hari ini di SMK-SMA Citra Negara kita sudah melakukan pengundian DOORPRIZE untuk 5 pendaftar yang sudah LUNAS</p>
                        <span class="text-[#699D15] text-sm font-semibold">29 Agustus 2025</span>
                    </div>
                </div>
                <!-- News 3 -->
                <div class="bg-white rounded-2xl shadow-lg w-[340px] flex flex-col items-start">
                    <img src="/images/berita1.png" alt="News 3" class="w-full h-48 object-cover rounded-t-2xl">
                    <div class="p-5 w-full">
                        <p class="font-semibold text-base text-[#222] leading-snug mb-2">Kegiatan bakti sosial siswa Citra Negara dalam rangka Hari Kemerdekaan RI ke-80</p>
                        <span class="text-[#699D15] text-sm font-semibold">17 Agustus 2025</span>
                    </div>
                </div>
            </div>
            <!-- Right Arrow -->
            <button class="flex items-center justify-center w-10 h-10 bg-[#FFE14D] rounded-full shadow ml-4 text-2xl font-bold hover:bg-[#FFEB7A] transition">
                <span>&gt;</span>
            </button>
        </div>
    </section>

    {{-- CTA --}}
    <section class="pt-16 pb-0 bg-white text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-[#699D15]">Kami selalu terbuka untukmu</h2>
        <p class="mt-2 text-2xl font-bold text-[#699D15]">Yuk, mulai langkah menuju masa depan cerah bersama sekolah mantap</p>
        <div class="mt-6 flex flex-wrap justify-center gap-4">
            <a href="#kontak" class="px-6 py-3 bg-[#E9DC00] rounded-xl font-semibold">Hubungi Kami</a>
            <a href="#ppdb" class="px-6 py-3 bg-[#E9DC00] rounded-xl font-semibold">Daftar PPDB</a>
        </div>

        <div class="mt-10 flex justify-center">
            <img src="/images/Desain tanpa judul 1.png" alt="" srcset="">
        </div>
    </section>

    <div id="chat-robibtn-wrapper" class="fixed bottom-6 right-6 flex flex-col items-end space-y-2 z-50">
      <!-- Tooltip -->
      <div id="robi-tooltip" 
           class="bg-white text-gray-800 text-sm px-3 py-1 rounded-full shadow-md opacity-0 translate-y-2 transition-all duration-700">
        Hai! Chat dengan Robi 👋
      </div>

      <!-- Tombol -->
      <a href="/chat" 
         id="chat-robibtn"
         class="bg-[#699D15] hover:bg-[#558512] text-white shadow-xl rounded-full w-16 h-16 flex items-center justify-center transition-all duration-300 opacity-0 scale-75">
          <img src="/img/robi.png" alt="Chat Robi" class="w-12 h-12 rounded-full">
      </a>
    </div>

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

            const btn = document.getElementById("chat-robibtn");
            const tooltip = document.getElementById("robi-tooltip");

            // Animasi tombol muncul
            setTimeout(() => {
            btn.style.transition = "all 0.6s cubic-bezier(0.22, 1, 0.36, 1)";
            btn.style.opacity = "1";
            btn.style.transform = "scale(1) translateY(-5px)";
            }, 300);

            // Munculkan tooltip
            setTimeout(() => {
            tooltip.classList.remove("opacity-0", "translate-y-2");
            }, 800);

            // Sembunyikan tooltip otomatis
            setTimeout(() => {
            tooltip.classList.add("opacity-0", "translate-y-2");
            }, 3500);
        });
    </script>


@endsection
