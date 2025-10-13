@extends('layouts.app')

@section('content')
{{-- Hero Section --}}
<section 
  id="hero"
  class="relative h-[95vh] w-full overflow-hidden flex items-center justify-center bg-black"
>
  <!-- Parallax Background -->
  <div 
    id="hero-bg"
    class="absolute inset-0 bg-[url('/images/lp-1.png')] bg-cover bg-center will-change-transform"
  ></div>

  <!-- Gradient Overlay -->
  <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-[#C3E956]/10"></div>

  <!-- Light Beam -->
  <div class="absolute inset-0 overflow-hidden">
    <div class="absolute w-[50%] h-[150%] bg-gradient-to-r from-transparent via-white/25 to-transparent blur-3xl rotate-45 animate-[shine_8s_linear_infinite]"></div>
  </div>

  <!-- Floating Particles -->
  @php
    $top = rand(5, 95);
    $left = rand(5, 95);
    $size = rand(6, 12);
    $delay = rand(0, 10) / 10;
  @endphp

  <div
    class="absolute rounded-full bg-white/20 blur-md animate-[float_10s_ease-in-out_infinite]"
    style="top: {{ $top }}%; left: {{ $left }}%; width: {{ $size }}px; height: {{ $size }}px; animation-delay: {{ $delay }}s;"
  ></div>

  <!-- Hero Content -->
  <div class="relative z-10 text-center px-6" data-aos="zoom-in" data-aos-duration="1200">
    <h1 class="text-5xl md:text-7xl text-[#C3E956] font-extrabold tracking-wider drop-shadow-[0_0_25px_rgba(195,233,86,0.5)] animate-[fadeDown_1s_ease-out_forwards]">
      CITRA NEGARA
    </h1>
    
    <p class="mt-4 text-lg md:text-2xl font-semibold text-[#C3E956] tracking-widest animate-[fadeUp_1.2s_ease-out_forwards]">
      <span class="text-white"> MUTU </span>|<span class="text-white"> AMANAH </span>|<span class="text-white"> NYAMAN </span>|<span class="text-white"> AKTIF </span>|<span class="text-white"> PROFESIONAL</span>
    </p>

    <!-- Jenjang Sekolah -->
    <div class="mt-6 flex justify-center animate-[fadeUp_1.4s_ease-out_forwards]">
      <span class="inline-flex items-center gap-2 bg-[#C3E956] text-black px-6 py-2 rounded font-semibold text-lg shadow-lg hover:scale-105 transition-all">
        SMP - SMA - SMK
      </span>
    </div>
  </div>

  <!-- Bottom Fade -->
  <div class="absolute bottom-0 left-0 w-full h-40 bg-gradient-to-t from-white/10 to-transparent"></div>
</section>

@push('styles')
<style>
@keyframes shine {
  0% { transform: translateX(-100%) rotate(45deg); }
  100% { transform: translateX(200%) rotate(45deg); }
}
@keyframes float {
  0%, 100% { transform: translateY(0); opacity: 0.8; }
  50% { transform: translateY(-25px); opacity: 1; }
}
@keyframes fadeDown {
  0% { opacity: 0; transform: translateY(-50px); }
  100% { opacity: 1; transform: translateY(0); }
}
@keyframes fadeUp {
  0% { opacity: 0; transform: translateY(50px); }
  100% { opacity: 1; transform: translateY(0); }
}
</style>
@endpush

@push('scripts')
<script>
window.addEventListener('scroll', () => {
  const bg = document.getElementById('hero-bg');
  const scrollY = window.scrollY;
  const speed = 0.4;
  bg.style.transform = `translateY(${scrollY * speed}px) scale(1.1)`;
});
</script>
@endpush

<!-- HISTORY SECTION -->
<section class="relative h-[90vh] py-24 px-6 bg-gradient-to-b from-[#6BAE18] to-[#5C8F14] overflow-hidden" id="sejarah" data-aos="fade-up" data-aos-duration="1000">
  <!-- Dekorasi latar -->
  <div class="absolute inset-0 opacity-20 bg-[url('/images/pattern-light.svg')] bg-repeat"></div>
  <div class="absolute top-0 left-0 w-80 h-80 bg-[#E9DC00]/20 rounded-full blur-3xl"></div>
  <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>

  <div class="max-w-5xl mx-auto relative z-10 flex flex-col md:flex-row items-center gap-10">
    <!-- Image -->
    <div class="flex-shrink-0 w-full md:w-1/2">
      <img src="/images/history-image.jpg" alt="Sejarah Yayasan" class="rounded-3xl shadow-lg w-full h-auto object-cover transition-transform duration-500 hover:scale-105">
    </div>

    <!-- Text -->
    <div class="w-full md:w-1/2 text-white">
      <h3 class="text-3xl md:text-4xl font-extrabold mb-6 drop-shadow-[0_2px_6px_rgba(0,0,0,0.5)]">
        Sejarah Yayasan AT-TAQWA KEMIRI JAYA
      </h3>
      <p class="text-base md:text-lg leading-relaxed mb-4">
        Yayasan AT-TAQWA Kemiri Jaya dibangun pada tahun 2004 di Jl. Raya Tanah Baru No.99 Kemiri Jaya, Beji, Depok 16421. Yayasan ini diprakarsai serta dimiliki oleh Bpk. <span class="font-semibold">H. Drs. Nasan, M.M</span>, kemudian di tahun yang sama sekolah SMK Citra Negara dibuka.
      </p>
      <p class="text-base md:text-lg leading-relaxed">
        Sekolah SMK Citra Negara berdiri pada tahun 2004 dengan awal hanya memiliki 1 program keahlian yaitu Tata Niaga (TN). Pada tahun 2007 dibuka program keahlian Teknik Komputer Jaringan (TKJ), jurusan Multimedia (MM) pada tahun 2011, Administrasi Perkantoran (AP) pada tahun 2015, dan jurusan Rekayasa Perangkat Lunak (RPL) juga pada tahun 2015. Saat ini, SMK Citra Negara memiliki total 5 program keahlian.
      </p>
    </div>
  </div>
</section>

<section class="py-16 px-4 bg-white" id="yayasan" data-aos="fade-up">
  <div class="max-w-7xl mx-auto text-center">
    <h2 class="text-3xl md:text-4xl font-extrabold text-[#699D15] drop-shadow-[0_2px_6px_rgba(106,152,18,0.5)] mb-2">Founder</h2>
    <p class="text-xl md:text-2xl font-semibold text-[#699D15] mb-10">Yayasan AT–TAQWA Kemiri Jaya</p>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 items-end justify-items-center">

      <!-- Ketua BPH -->
      <div class="flex flex-col items-center relative lg:pt-12 w-56 sm:w-64 order-2 lg:order-1">
        <img src="{{ asset('images/ketuabph.png') }}" class="object-contain w-full h-auto max-h-80" alt="Ketua BPH">
        <span class="inline-block bg-[#E9DC00] font-bold text-base md:text-lg rounded-full px-6 py-2 shadow whitespace-nowrap">
          Dr. M. Rizki Darmaguna Hasan, S.Tr., M.Pd
        </span>
        <p class="text-gray-700 mt-1 text-sm md:text-base">Ketua BPH</p>
      </div>

      <!-- Penasehat -->
      <div class="flex flex-col items-center relative lg:mb-12 w-64 sm:w-72 order-1 lg:order-2">
        <img src="{{ asset('images/penasehat.png') }}" class="object-contain w-full h-auto max-h-96" alt="Penasehat Yayasan YATKJ">
        <span class="inline-block bg-[#E9DC00] font-bold text-base md:text-lg rounded-full px-6 py-2 shadow whitespace-nowrap">
          Drs. H. Nasan, M.M &amp; Hj. Mutia, S.Pd., M.M
        </span>
        <p class="text-gray-700 mt-1 text-sm md:text-base">Penasehat Yayasan YATKJ</p>
      </div>

      <!-- Wakil BPH -->
      <div class="flex flex-col items-center relative lg:pt-12 w-48 sm:w-60 order-3 lg:order-3">
        <img src="{{ asset('images/wakilbph.png') }}" class="object-contain w-full h-auto max-h-80" alt="Wakil Ketua BPH">
        <span class="inline-block bg-[#E9DC00] font-bold text-base md:text-lg rounded-full px-6 py-2 shadow whitespace-nowrap">
          Agustin Wijayanti, S.H., M.M
        </span>
        <p class="text-gray-700 mt-1 text-sm md:text-base">Wakil Ketua BPH</p>
      </div>

    </div>
  </div>
</section>

<section id="visi-misi" class="relative py-24 px-6 bg-gradient-to-b from-[#6BAE18] to-[#5C8F14] overflow-hidden scroll-mt-24" data-aos="fade-up" data-aos-duration="1000">
  <!-- Dekorasi latar -->
  <div class="absolute inset-0 opacity-20 bg-[url('/images/pattern-light.svg')] bg-repeat"></div>
  <div class="absolute top-0 left-0 w-80 h-80 bg-[#E9DC00]/20 rounded-full blur-3xl"></div>
  <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>

  <div class="max-w-7xl mx-auto relative z-10">
    <!-- Judul -->
    <div class="text-center mb-14">
      <h3 class="text-3xl md:text-4xl font-extrabold text-white leading-snug">
        Visi & Misi <br />
        <span class="text-[#E9DC00] drop-shadow-[0_2px_6px_rgba(233,220,0,0.6)]">Citra Negara</span>
      </h3>
      <p class="text-white/90 text-base md:text-lg mt-5 max-w-4xl mx-auto leading-relaxed">
        Menjadi lembaga pendidikan kejuruan unggul, berlandaskan nilai religius dan karakter bangsa, serta siap menghadapi era digital.
      </p>
    </div>

    <!-- Kartu Visi & Misi -->
    <div class="grid md:grid-cols-2 gap-10">
      <!-- VISI -->
      <div class="relative group bg-white rounded-3xl p-8 shadow-lg transition-all duration-500 hover:shadow-2xl hover:-translate-y-3" data-aos="zoom-in" data-aos-delay="100">
        <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-[#7CB518]/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
        
        <div class="flex items-center mb-6 relative">
          <div class="flex items-center justify-center h-14 w-14 mr-4 rounded-full bg-[#699D15] shadow-[0_0_15px_rgba(105,157,21,0.4)] transition-transform duration-500 group-hover:scale-110">
            <img src="/images/sparkles.png" alt="ikon visi" class="h-8 w-8" />
          </div>
          <h4 class="text-2xl md:text-3xl font-extrabold text-[#699D15] uppercase tracking-wide">VISI</h4>
        </div>

        <p class="text-gray-700 text-base md:text-lg leading-relaxed relative z-10">
          Terwujudnya sekolah yang religius, disiplin, dan terampil dalam menyongsong generasi emas di tahun 2045.
        </p>
      </div>

      <!-- MISI -->
      <div class="relative group bg-white rounded-3xl p-8 shadow-lg transition-all duration-500 hover:shadow-2xl hover:-translate-y-3" data-aos="zoom-in" data-aos-delay="200">
        <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-[#E9DC00]/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

        <div class="flex items-center mb-6 relative">
          <div class="flex items-center justify-center h-14 w-14 mr-4 rounded-full bg-[#E9DC00] shadow-[0_0_15px_rgba(233,220,0,0.5)] transition-transform duration-500 group-hover:scale-110">
            <img src="/images/vector.png" alt="ikon misi" class="h-8 w-8" />
          </div>
          <h4 class="text-2xl md:text-3xl font-extrabold text-[#E9DC00] uppercase tracking-wide">MISI</h4>
        </div>

        <ul class="text-gray-700 text-base md:text-lg space-y-2 leading-relaxed relative z-10 list-disc pl-6">
          <li>Mewujudkan insan yang taat beribadah, cinta kitab suci, dan pandai dalam dakwah keagamaan.</li>
          <li>Membangun peserta didik berperilaku baik, patuh, dan berjiwa kepemimpinan.</li>
          <li>Mengembangkan keahlian kejuruan dengan sinkronisasi kurikulum dan kerja sama dunia industri.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<<<<<<< HEAD
{{-- <section class="relative py-24 px-6 bg-gradient-to-b from-[#6BAE18] to-[#5C8F14] overflow-hidden" id="vision-mission" data-aos="fade-up" data-aos-duration="1000">
  <!-- Dekorasi latar -->
  <div class="absolute inset-0 opacity-20 bg-[url('/images/pattern-light.svg')] bg-repeat"></div>
  <div class="absolute top-0 left-0 w-80 h-80 bg-[#E9DC00]/20 rounded-full blur-3xl"></div>
  <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>

  <div class="max-w-7xl mx-auto relative z-10">
    <!-- Judul -->
    <div class="text-center mb-14">
      <h3 class="text-3xl md:text-4xl font-extrabold text-white leading-snug">
        Pilihan yang Tepat, <br />
        <span class="text-[#E9DC00] drop-shadow-[0_2px_6px_rgba(233,220,0,0.6)]">Di Sekolah yang Mantap</span>
      </h3>
      <p class="text-white/90 text-base md:text-lg mt-5 max-w-4xl mx-auto leading-relaxed">
        Yayasan AT–TAQWA Kemiri Jaya dibangun pada tahun 2004 di Jl. Raya Tanah Baru No.99 Kemiri Jaya, Beji, Depok. 
        Yayasan ini diprakarsai oleh Bpk. <span class="font-semibold">H. Drs. Nasan, M.M</span>. 
        Kini, SMK Citra Negara memiliki enam jurusan unggulan: Tata Niaga, Teknik Komputer Jaringan, Multimedia, Administrasi Perkantoran, 
        Rekayasa Perangkat Lunak, dan Perhotelan.
      </p>
    </div>

    <!-- Kartu Visi & Misi -->
    <div class="grid md:grid-cols-2 gap-10">
      <!-- VISI -->
      <div class="relative group bg-white rounded-3xl p-8 shadow-lg transition-all duration-500 hover:shadow-2xl hover:-translate-y-3">
        <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-[#7CB518]/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
        
        <div class="flex items-center mb-6 relative">
          <div class="flex items-center justify-center h-14 w-14 mr-4 rounded-full bg-[#699D15] shadow-[0_0_15px_rgba(105,157,21,0.4)] transition-transform duration-500 group-hover:scale-110">
            <img src="/images/sparkles.png" alt="ikon visi" class="h-8 w-8" />
          </div>
          <h4 class="text-2xl md:text-3xl font-extrabold text-[#699D15] uppercase tracking-wide">VISI</h4>
        </div>

        <p class="text-gray-700 text-base md:text-lg leading-relaxed relative z-10">
          Terwujudnya sekolah yang religius, disiplin, dan terampil dalam menyongsong generasi emas di tahun 2045.
        </p>
      </div>

      <!-- MISI -->
      <div class="relative group bg-white rounded-3xl p-8 shadow-lg transition-all duration-500 hover:shadow-2xl hover:-translate-y-3">
        <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-[#E9DC00]/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

        <div class="flex items-center mb-6 relative">
          <div class="flex items-center justify-center h-14 w-14 mr-4 rounded-full bg-[#E9DC00] shadow-[0_0_15px_rgba(233,220,0,0.5)] transition-transform duration-500 group-hover:scale-110">
            <img src="/images/vector.png" alt="ikon misi" class="h-8 w-8" />
          </div>
          <h4 class="text-2xl md:text-3xl font-extrabold text-[#E9DC00] uppercase tracking-wide">MISI</h4>
        </div>

        <ul class="text-gray-700 text-base md:text-lg space-y-2 leading-relaxed relative z-10 list-disc pl-6">
          <li>Mewujudkan insan yang taat beribadah, cinta kitab suci, dan pandai dalam dakwah keagamaan.</li>
          <li>Membangun peserta didik berperilaku baik, patuh, dan berjiwa kepemimpinan.</li>
          <li>Mengembangkan keahlian kejuruan dengan sinkronisasi kurikulum dan kerja sama dunia industri.</li>
        </ul>
      </div>
    </div>
  </div>
</section> --}}

<section class="relative py-20 px-6 bg-gradient-to-b from-[#F5F6F7] to-white overflow-hidden" id="school" data-aos="fade-up" data-aos-duration="1000">
=======
<section class="relative py-20 px-6 bg-gradient-to-b from-[#F5F6F7] to-white overflow-hidden" id="sekolah" data-aos="fade-up" data-aos-duration="1000">
>>>>>>> d3ceb9504ea8b65c025fcf54ba44f612504003b5
  <!-- Dekorasi -->
  <div class="absolute -top-10 -right-10 w-64 h-64 bg-[#8DC63F]/10 rounded-full blur-3xl"></div>
  <div class="absolute bottom-0 left-0 w-72 h-72 bg-[#7CB518]/10 rounded-full blur-3xl"></div>

  <div class="max-w-7xl mx-auto text-center relative z-10">
    <h2 class="text-3xl md:text-4xl font-extrabold text-[#7CB518] mb-3">Unit Pendidikan</h2>
    <p class="text-xl md:text-2xl font-semibold text-[#8DC63F] mb-14">Pilih unit pendidikan terbaik untuk masa depanmu</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 justify-items-center">
      @foreach ([
        ['title' => 'SMP', 'img' => '/images/u-smp.png', 'desc' => 'Bangun pondasi akademik yang kuat dengan lingkungan yang mendukung dan inovatif.', 'link' => '/smp'],
        ['title' => 'SMA', 'img' => '/images/u-sma.png', 'desc' => 'Kembangkan potensi akademik dan karakter untuk melangkah ke jenjang berikutnya. ', 'link' => '/sma'],
        ['title' => 'SMK', 'img' => '/images/u-smk.png', 'desc' => 'Siap kerja, siap wirausaha, dan siap kuliah dengan keahlian yang terarah.', 'link' => '/smk'],
      ] as $unit)
      <div class="relative group w-80 perspective" data-aos="zoom-in">
        <!-- Bungkus tetap -->
        <div class="tilt-card bg-white rounded-3xl shadow-lg overflow-hidden transition-all duration-500 hover:shadow-2xl">
          
          <!-- Yang bergerak hanya bagian dalam -->
          <div class="tilt-inner relative will-change-transform">
            <!-- Gambar -->
            <div class="relative overflow-hidden rounded-t-3xl">
              <img src="{{ $unit['img'] }}" alt="{{ $unit['title'] }}" class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-110">
              <div class="absolute inset-0 bg-gradient-to-t from-[#7CB518]/70 via-transparent opacity-0 group-hover:opacity-100 transition-all duration-700"></div>
            </div>

            <!-- Shine -->
            <div class="shine absolute inset-0 rounded-3xl pointer-events-none opacity-0 group-hover:opacity-30 transition-opacity duration-500"></div>

            <!-- Konten -->
            <div class="p-6 flex flex-col items-center space-y-3 bg-white rounded-b-3xl">
              <h3 class="text-2xl font-extrabold text-gray-700">{{ $unit['title'] }}</h3>
              <p class="text-gray-600 text-sm text-center">{{ $unit['desc'] }}</p>
              <a href="{{ $unit['link'] }}" class="mt-4 text-white font-semibold px-8 py-2 rounded-full shadow-md hover:shadow-lg transition hover:opacity-90 bg-[#7CB518]">
                Lihat Selengkapnya
            </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const cards = document.querySelectorAll('.tilt-card');
  cards.forEach(card => {
    const inner = card.querySelector('.tilt-inner');
    const shine = card.querySelector('.shine');

    card.addEventListener('mousemove', e => {
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;

      // Hanya bagian dalam yang miring
      const rotateX = ((y - centerY) / 20).toFixed(2);
      const rotateY = ((centerX - x) / 20).toFixed(2);
      inner.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;

      // Efek shine lembut
      const shineX = (x / rect.width) * 100;
      const shineY = (y / rect.height) * 100;
      shine.style.background = `radial-gradient(circle at ${shineX}% ${shineY}%, rgba(255,255,255,0.7), transparent 70%)`;
      shine.style.opacity = 0.3;
    });

    card.addEventListener('mouseleave', () => {
      inner.style.transform = 'rotateX(0deg) rotateY(0deg)';
      shine.style.opacity = 0;
    });
  });
});
</script>

<style>
    .perspective {
        perspective: 800px;
    }
    .tilt-card {
        transform-style: preserve-3d;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    .tilt-inner {
        transform-origin: center;
        transition: transform 0.25s ease;
        will-change: transform;
    }
    .shine {
        position: absolute;
        inset: 0;
        border-radius: 1.5rem;
        mix-blend-mode: overlay;
        transition: opacity 0.3s ease;
    }
</style>
@endpush

<section 
  id="news-section"
  class="relative py-24 px-6 bg-gradient-to-b bg-[#f7f7f7] overflow-hidden"
>
<div class="absolute inset-0 opacity-20 bg-[url('/images/pattern-light.svg')] bg-repeat"></div>
  <div class="absolute top-0 left-0 w-80 h-80 bg-[#E9DC00]/20 rounded-full blur-3xl"></div>
  <div class="absolute bottom-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
  <div class="max-w-7xl mx-auto relative z-10">

    {{-- <!-- 🔥 Running Ticker -->
    <div class="overflow-hidden mb-8 rounded-full bg-[#EFFBE3] border border-[#C8E6A1] shadow-sm" data-aos="fade-down">
      <div class="whitespace-nowrap animate-[ticker_25s_linear_infinite] py-2">
        @foreach ([
          '🌟 Pendaftaran siswa baru tahun ajaran 2025/2026 telah dibuka!',
          '🏆 Tim RPL SMK Citra Negara raih Juara 1 LKS Provinsi!',
          '💡 Simak kegiatan Prakerin 2025 di berbagai perusahaan besar!'
        ] as $item)
          <span class="mx-6 text-[#699D15] font-semibold">{{ $item }}</span>
        @endforeach
      </div>
    </div> --}}

    <!-- Judul -->
    <div class="text-center mb-14">
      <h3 class="text-3xl md:text-4xl font-extrabold text-[#7CB518] leading-snug">
        Informasi Terkini
      </h3>
      <p class="text-gray-800 text-base md:text-lg mt-5 max-w-4xl mx-auto leading-relaxed">
        Menjadi lembaga pendidikan kejuruan unggul, berlandaskan nilai religius dan karakter bangsa, serta siap menghadapi era digital.
      </p>
    </div>

    <!-- Layout baru: 1 berita besar + 2 kecil -->
    @php
      $news = [
        ['img' => '/images/berita1.png', 'title' => 'Grand Opening SMK Citra Negara 2025', 'date' => '25 Agustus 2025', 'desc' => 'Acara peresmian gedung baru SMK Citra Negara berlangsung meriah dengan berbagai penampilan siswa.', 'link' => '/berita/grand-opening'],
        ['img' => '/images/berita1.png', 'title' => 'Kegiatan Prakerin 2025 Dimulai', 'date' => '12 Juli 2025', 'desc' => 'Siswa kelas XI mulai melaksanakan Prakerin di berbagai perusahaan besar dan startup nasional.', 'link' => '/berita/prakerin-2025'],
        ['img' => '/images/berita1.png', 'title' => 'Prestasi di Ajang LKS Provinsi', 'date' => '2 Juni 2025', 'desc' => 'Tim RPL berhasil membawa pulang juara 1 lomba LKS tingkat provinsi tahun 2025.', 'link' => '/berita/lks-provinsi'],
      ];
    @endphp

    <div class="grid md:grid-cols-3 gap-10 items-stretch" data-aos="fade-up" data-aos-delay="200">
      <!-- Berita utama -->
      <div class="md:col-span-2 group relative rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-700">
        <img src="{{ $news[0]['img'] }}" alt="{{ $news[0]['title'] }}" class="w-full h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>
        <div class="absolute bottom-0 p-8 text-left text-white">
          <p class="text-sm opacity-80 mb-1">{{ $news[0]['date'] }}</p>
          <h3 class="text-2xl md:text-3xl font-extrabold mb-3">{{ $news[0]['title'] }}</h3>
          <p class="hidden md:block text-gray-200 mb-5">{{ $news[0]['desc'] }}</p>
          <a href="{{ $news[0]['link'] }}" class="inline-block bg-[#7CB518] hover:bg-[#699D15] text-white px-6 py-2 rounded-full font-semibold shadow-md transition-all duration-300">
            Baca Selengkapnya
          </a>
        </div>
      </div>

      <!-- Dua berita kecil -->
      <div class="flex flex-col gap-8">
        @foreach (array_slice($news, 1) as $item)
          <div class="group relative rounded-2xl overflow-hidden bg-white shadow-lg hover:shadow-2xl transition-all duration-700">
            <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent opacity-70 group-hover:opacity-90 transition"></div>
            <div class="absolute bottom-0 p-5 text-white">
              <p class="text-sm opacity-80">{{ $item['date'] }}</p>
              <h4 class="font-bold text-lg mb-2">{{ $item['title'] }}</h4>
              <a href="{{ $item['link'] }}" class="inline-block bg-[#699D15] hover:bg-[#7CB518] text-white px-4 py-1.5 rounded-full text-sm font-semibold shadow transition-all duration-300">
                Selengkapnya
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <!-- Tombol Semua Berita -->
    <div class="text-center mt-16" data-aos="fade-up" data-aos-delay="400">
      <a href="/berita" class="inline-block bg-[#699D15] text-white font-semibold text-lg px-8 py-3 rounded-full shadow-lg transition-all duration-300 hover:bg-[#7CB518] hover:shadow-[0_0_25px_rgba(124,181,24,0.5)] active:scale-95">
        Lihat Semua Berita
      </a>
    </div>
  </div>

  <!-- Dekorasi -->
  <div class="absolute top-0 left-0 w-[400px] h-[400px] bg-[#8DC63F]/10 rounded-full blur-3xl animate-[float_10s_ease-in-out_infinite]"></div>
  <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-[#699D15]/10 rounded-full blur-3xl animate-[float_12s_ease-in-out_infinite]"></div>
</section>

@push('scripts')
<style>
@keyframes ticker {
  0% { transform: translateX(100%); }
  100% { transform: translateX(-100%); }
}

@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-20px); }
}

.animate-[shine_5s_linear_infinite] { background-size: 200% auto; }
</style>
@endpush

    {{-- CTA --}}
<section class="pt-20 px-6 bg-white text-center" data-aos="zoom-in" data-aos-duration="1000" id="contact">        
  <h2 class="text-xl md:text-3xl font-extrabold text-[#699D15]">Kami selalu terbuka untukmu</h2>
        <p class="rounded-full mt-2 text-xl md:text-2xl font-bold text-yellow-400">Yuk, mulai langkah menuju masa depan cerah bersama sekolah mantap</p>
        <div class="mt-6 flex flex-wrap justify-center gap-4">
            <a href="#kontak" class="px-6 py-3 bg-[#699D15] rounded-full font-semibold text-white">Hubungi Kami</a>
            <a href="/ppdb" class="px-6 py-3 bg-[#699D15] rounded-full font-semibold text-white">Daftar SPMB</a>
        </div>

        <div class="mt-10 flex justify-center">
            <img src="/images/Desain tanpa judul 1.png" alt="" srcset="">
        </div>
    </section>

    <div id="chat-robibtn-wrapper" 
        class="fixed bottom-10 right-10 flex flex-col items-end space-y-2 z-50">
        <!-- Tooltip -->
        <div id="robi-tooltip" 
            class="bg-white text-gray-800 text-sm px-3 py-1 rounded-full shadow-md opacity-0 translate-y-2 transition-all duration-700">
            Hai! Chat dengan Robi 👋
        </div>

        <a href="/chat" id="chat-robibtn" aria-label="Buka chat Robi"
            class="relative bg-[#699D15] hover:bg-[#558512] text-white shadow-xl rounded-full w-14 h-14 sm:w-16 sm:h-16 flex items-center justify-center transition-all duration-300 opacity-0 scale-75 translate-y-4"
            style="overflow:visible;">
            <img src="/images/robi.png" alt="Chat Robi" class="w-[85%] h-[85%] object-contain object-bottom -mb-0.5" />
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

            window.addEventListener('DOMContentLoaded', () => {
                const btn = document.getElementById('chat-robibtn');
                setTimeout(() => btn.classList.remove('opacity-0','scale-75','translate-y-4'), 300);
            });
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
