<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rekap Cerita - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
  <style>
    /* Animasi mengambang untuk confetti */
    @keyframes float {
      0% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-10px) rotate(10deg); }
      100% { transform: translateY(0px) rotate(0deg); }
    }
    .confetti-float {
      animation: float 4s ease-in-out infinite;
    }
  </style>
</head>
<body class="bg-slate-50 text-[#1F2937] min-h-screen flex flex-col relative">

  <!-- ================= NAV BAR ================= -->
  <nav class="flex justify-between items-center px-4 sm:px-6 py-4 max-w-6xl mx-auto w-full sticky top-0 z-40 bg-slate-50/90 backdrop-blur-md">

    <!-- KIRI: Logo & Nama Brand -->
    <a href="{{ url('/dashboard') }}" class="flex items-center gap-2.5 z-10 hover:opacity-80 transition cursor-pointer">
      <div class="w-9 h-9 bg-emerald-50 rounded-full flex items-center justify-center border border-emerald-100 overflow-hidden p-0.5">
        <img
          src="{{ asset('assets/images/logo.png') }}"
          alt="Logo BaliHabit"
          class="w-full h-full rounded-full object-cover"
        />
      </div>
      <span class="text-xl font-extrabold tracking-tight text-[#1F2937]">Bali<span class="text-[#10B981]">Habit</span></span>
    </a>

    <!-- TENGAH: Menu Utama -->
    <div class="hidden lg:flex absolute left-1/2 -translate-x-1/2 items-center gap-8 text-sm font-bold text-slate-500 w-max">
      <a href="{{ url('/dashboard') }}" class="hover:text-[#10B981] transition">Beranda Orang Tua</a>
      <!-- Menu Aktif: Profil Anak -->
      <a href="{{ url('/halaman-anak') }}" class="text-[#10B981] transition">Profil Anak</a>
      <a href="{{ url('/profil-orangtua') }}" class="hover:text-[#10B981] transition">Profil Saya</a>
    </div>

    <!-- KANAN: Tombol Keluar & Hamburger -->
    <div class="flex items-center gap-4 z-10">
      <button onclick="openLogoutModal()" class="hidden lg:flex items-center gap-1.5 text-slate-400 hover:text-red-500 transition group cursor-pointer" title="Keluar">
        <span class="hidden xl:block group-hover:text-red-500">Keluar</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
        </svg>
      </button>

      <button id="hamburgerBtn" class="lg:hidden w-10 h-10 flex items-center justify-center rounded-full border border-gray-200 bg-white text-slate-600 hover:bg-gray-50 transition cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
      </button>
    </div>
  </nav>

  <!-- ================= KONTEN UTAMA ================= -->
  <main class="max-w-2xl mx-auto px-4 sm:px-6 pt-8 pb-16 w-full flex-grow flex flex-col">

    <!-- HEADER ILUSTRASI (Bintang & Confetti) -->
    <div class="relative w-full flex justify-center mb-6 h-40">
      <div class="absolute w-3 h-3 bg-teal-400 rounded-full top-4 left-[15%] confetti-float" style="animation-delay: 0s;"></div>
      <div class="absolute w-4 h-8 bg-yellow-400 rounded-md top-10 left-[25%] -rotate-45 confetti-float" style="animation-delay: 0.5s;"></div>
      <div class="absolute w-4 h-4 bg-emerald-400 rounded-full top-20 left-[10%] confetti-float" style="animation-delay: 1s;"></div>

      <div class="absolute w-4 h-2 bg-teal-400 rounded-sm top-6 right-[25%] rotate-45 confetti-float" style="animation-delay: 0.2s;"></div>
      <div class="absolute w-4 h-5 bg-orange-400 rounded-sm top-8 right-[15%] rotate-12 confetti-float" style="animation-delay: 0.7s;"></div>
      <div class="absolute w-3 h-3 bg-yellow-400 rounded-full top-16 right-[12%] confetti-float" style="animation-delay: 1.2s;"></div>
      <div class="absolute w-5 h-2 bg-teal-400 rounded-full top-28 right-[18%] -rotate-45 confetti-float" style="animation-delay: 0.4s;"></div>

      <div class="relative w-32 h-32 flex items-center justify-center mt-4">
        <div class="absolute w-32 h-32 bg-yellow-100 rounded-full blur-xl"></div>
        <div class="relative w-28 h-28 bg-yellow-100/80 border-[6px] border-white rounded-full flex items-center justify-center shadow-md">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-14 h-14 text-orange-400 drop-shadow-sm">
            <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
          </svg>
        </div>
      </div>
    </div>

    <!-- TEKS UCAPAN SELAMAT -->
    <div class="text-center mb-8 px-2">
      {{-- "Cerita Selesai!" hanya kalau Halaman Misi cerita ini sudah pernah diselesaikan --}}
      @if ($storyFinished)
        <h1 class="text-2xl md:text-3xl font-extrabold text-[#1F2937] mb-3 tracking-tight">Cerita Selesai!</h1>
        <p class="text-slate-500 text-sm md:text-base leading-relaxed">
          Hebat, <span class="font-bold text-slate-700">{{ $child->short_name }}</span>! Kamu sudah menyelesaikan semua refleksi dan misi pada cerita "<span class="font-bold text-[#10B981]">{{ $storyTitle }}</span>".
        </p>
      @else
        <h1 class="text-2xl md:text-3xl font-extrabold text-[#1F2937] mb-3 tracking-tight">Yuk, Selesaikan Ceritanya!</h1>
        <p class="text-slate-500 text-sm md:text-base leading-relaxed">
          <span class="font-bold text-slate-700">{{ $child->short_name }}</span> belum menyelesaikan misi pada cerita "<span class="font-bold text-[#10B981]">{{ $storyTitle }}</span>". Yuk, kerjakan refleksi dan misinya bersama!
        </p>
      @endif
    </div>

    <!-- KARTU 1: TOTAL BINTANG dari cerita ini = percobaan Misi terbaik x 2 (Child::starTotals) -->
    <div class="bg-[#FFFBEB] border border-yellow-200 rounded-[1.5rem] p-5 shadow-sm mb-6 flex justify-between items-center">
      <div>
        <h2 class="font-bold text-xs sm:text-sm text-yellow-900 mb-1 uppercase tracking-wider">Total Bintang Diperoleh</h2>
        <p class="text-[11px] sm:text-xs text-yellow-700">Dari Misi di Cerita Ini</p>
      </div>
      <div class="bg-white border border-yellow-100 rounded-2xl px-5 py-2.5 flex items-center gap-2 shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-yellow-400">
          <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
        </svg>
        <span class="font-extrabold text-2xl text-[#1F2937]">{{ $storyStars }}</span>
      </div>
    </div>

    <!-- KARTU 2: RINGKASAN BELAJAR, dari percobaan terbaik (Misi: paling banyak "Sudah";
         Refleksi: paling banyak benar; sama banyak = yang terbaru) -->
    <div class="bg-white border border-gray-100 rounded-[1.5rem] p-5 shadow-sm mb-6">
      <div class="flex justify-between items-center mb-5">
        <div class="flex items-center gap-2">
          <div class="w-2 h-2 bg-[#10B981] rounded-full"></div>
          <h2 class="font-bold text-xs sm:text-sm text-slate-600 uppercase tracking-wider">Ringkasan Belajar</h2>
        </div>
        <span class="bg-emerald-50 text-[#10B981] font-extrabold text-[10px] px-3 py-1 rounded-full">Hebat!</span>
      </div>

      <!-- Misi Selesai: misi yang ditandai "Sudah" di percobaan terbaik -->
      <div class="mb-5">
        <div class="flex justify-between items-center mb-3">
          <div class="flex items-center gap-2">
            <span class="text-lg">🎯</span>
            <h3 class="font-bold text-sm text-[#1F2937]">{{ $missionsDone->isEmpty() ? 'Belum ada misi selesai' : $missionsDone->count().' Misi Kebaikan Selesai' }}</h3>
          </div>
          <span class="text-yellow-600 font-extrabold text-xs flex items-center gap-1">
            +{{ $storyStars }} <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" /></svg>
          </span>
        </div>
        @foreach ($missionsDone as $missionText)
        <div class="bg-[#F0FDF4] text-slate-600 text-[11px] sm:text-xs py-2 px-3.5 rounded-xl {{ $loop->last ? '' : 'mb-2' }} flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-3.5 h-3.5 text-[#10B981] flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
          {{ $missionText }}
        </div>
        @endforeach
      </div>

      <!-- Grid Refleksi & Frekuensi -->
      <div class="grid grid-cols-2 gap-3">
        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4">
          <div class="flex items-center gap-1.5 mb-2">
            <span class="text-sm">💡</span>
            <span class="font-bold text-[11px] text-slate-600">Refleksi Benar</span>
          </div>
          <div class="flex items-baseline gap-1.5">
            <span class="font-extrabold text-2xl text-[#10B981]">{{ $reflection['correct'] }}/{{ $reflection['total'] }}</span>
            <span class="text-[10px] text-slate-400 font-medium">({{ $reflection['done'] ? $reflection['percent'].'% tepat' : 'belum dijawab' }})</span>
          </div>
        </div>
        <!-- Frekuensi Baca: berapa kali cerita ini selesai dibaca (story_progress.read_count) -->
        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4">
          <div class="flex items-center gap-1.5 mb-2">
            <span class="text-sm">📖</span>
            <span class="font-bold text-[11px] text-slate-600">Frekuensi Baca</span>
          </div>
          <div class="flex items-baseline gap-1.5">
            <span class="font-extrabold text-2xl text-[#1F2937]">{{ $readCount }} Kali</span>
          </div>
          <p class="text-[10px] text-slate-400 font-medium mt-0.5">Dibaca bersama {{ $child->short_name }}</p>
        </div>
      </div>
    </div>

    <!-- KARTU 3: LENCANA BERIKUTNYA: total bintang anak (semua cerita) menuju lencana berikutnya
         (minimum_stars terkecil di atas total). Tidak ada lencana di database = kartu tidak tampil. -->
    @if ($hasBadges)
    <div class="bg-white border border-emerald-100 rounded-[1.5rem] p-5 shadow-sm mb-8 flex items-start gap-4">
      <div class="w-14 h-14 bg-[#ECFDF5] rounded-2xl flex items-center justify-center flex-shrink-0 text-[#10B981] border border-emerald-50 shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043A3.745 3.745 0 011.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043A3.746 3.746 0 0121 12z" />
        </svg>
      </div>
      <div class="flex-1 min-w-0">
        @if ($nextBadge)
          <div class="bg-[#ECFDF5] text-[#10B981] font-extrabold text-[9px] px-2.5 py-1 rounded-md inline-block mb-1.5 uppercase tracking-wide">Lencana Berikutnya</div>
          <h3 class="font-extrabold text-sm md:text-base text-[#1F2937] mb-1">{{ $nextBadge->name }}</h3>
          @if ($nextBadge->description)
            <p class="text-[11px] sm:text-xs text-slate-500 leading-relaxed">{{ $nextBadge->description }}</p>
          @endif
          <div class="w-full h-2.5 bg-emerald-100 rounded-full overflow-hidden mt-3">
            <div class="h-full bg-[#10B981] rounded-full" style="width: {{ min(100, (int) floor($totalStars / max(1, $nextBadge->minimum_stars) * 100)) }}%"></div>
          </div>
          <div class="flex justify-between items-center mt-2 text-[11px] sm:text-xs">
            <span class="font-extrabold text-[#1F2937]">{{ $totalStars }} / {{ $nextBadge->minimum_stars }} Bintang</span>
            <span class="text-slate-500">{{ $nextBadge->minimum_stars - $totalStars }} bintang lagi untuk lencana {{ $nextBadge->name }}!</span>
          </div>
        @else
          <div class="bg-[#ECFDF5] text-[#10B981] font-extrabold text-[9px] px-2.5 py-1 rounded-md inline-block mb-1.5 uppercase tracking-wide">Lencana</div>
          <h3 class="font-extrabold text-sm md:text-base text-[#1F2937] mb-1">Semua lencana sudah terkumpul! 🏆</h3>
          <div class="w-full h-2.5 bg-emerald-100 rounded-full overflow-hidden mt-3">
            <div class="h-full bg-[#10B981] rounded-full" style="width: 100%"></div>
          </div>
          <p class="mt-2 text-[11px] sm:text-xs font-extrabold text-[#1F2937]">{{ $totalStars }} Bintang</p>
        @endif
      </div>
    </div>
    @endif

    <!-- TOMBOL AKSI BAWAH -->
    <div class="space-y-3 mt-auto">
      <a href="{{ url('/belajar-bersama') }}" class="w-full bg-[#10B981] text-white font-extrabold py-4 rounded-2xl shadow-md hover:bg-[#059669] transition flex justify-center items-center gap-2 text-sm sm:text-base cursor-pointer">
        Yuk, Pilih Cerita Lain
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>
      </a>
      <a href="{{ route('children.progress') }}" class="w-full bg-white border border-gray-200 text-slate-600 font-extrabold py-4 rounded-2xl shadow-sm hover:bg-gray-50 transition flex justify-center items-center text-sm sm:text-base cursor-pointer">
        Lihat Progress
      </a>
      {{-- Coba Lagi: cerita yang sama dari awal (Halaman Baca), lewat jalur "Mulai Baca" yang biasa (D-31) --}}
      <a href="{{ url('/halaman-baca') }}?cerita={{ urlencode($storyId) }}" class="w-full bg-white border border-gray-200 text-slate-600 font-extrabold py-4 rounded-2xl shadow-sm hover:bg-gray-50 transition flex justify-center items-center gap-2 text-sm sm:text-base cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" /></svg>
        Coba Lagi
      </a>
    </div>

  </main>

  <!-- ================= POPUP BINTANG SUDAH PENUH (D-29) =================
       Muncul sekali, tepat setelah Halaman Misi disimpan tanpa bintang baru karena
       bintang cerita ini sudah penuh. Tombol hanya menutup popup; rekap tetap terlihat. -->
  @if ($showFullPopup)
  <x-mission-popup id="full-stars-popup" role="dialog" aria-modal="true" aria-labelledby="full-stars-title">
      <h2 id="full-stars-title" class="text-[28px] font-extrabold text-[#F97316] leading-[1.1] mb-3">
        Bintang Sudah<br>Penuh! 🌟
      </h2>
      <p class="text-[#1F2937] text-[13px] sm:text-sm font-bold mb-7 px-1 leading-relaxed" style="text-wrap: balance">
        <span class="block">Hebat, {{ $child->short_name }}!</span>
        Kamu sudah mendapat semua bintang dari cerita ini. Yuk, pilih cerita baru untuk mengumpulkan bintang lagi!
      </p>
      <button type="button" onclick="document.getElementById('full-stars-popup').remove()" class="w-full bg-[#10B981] text-white font-extrabold py-3.5 rounded-2xl shadow-md hover:bg-[#059669] transition text-sm sm:text-base cursor-pointer">
        Lihat Rekap
      </button>
  </x-mission-popup>
  @endif

  <!-- ================= FOOTER UTAMA ================= -->
  <footer class="bg-slate-50 pt-10 pb-16 mt-auto border-t border-gray-100">
    <div class="max-w-md mx-auto px-4 text-center flex flex-col items-center gap-3">
      <p class="text-[#1F2937] font-bold text-sm tracking-tight">
        BaliHabit <span class="text-slate-300 font-normal mx-1.5">•</span> <span class="font-semibold text-slate-500">© 2026</span>
      </p>

      <div class="flex flex-wrap justify-center items-center gap-2 text-xs font-bold text-[#10B981]">
        <a href="#" class="hover:underline transition">Kebijakan Privasi</a>
        <span class="text-slate-300">•</span>
        <a href="#" class="hover:underline transition">Ketentuan Layanan</a>
      </div>

      <div class="flex flex-wrap justify-center items-center gap-2 text-xs font-bold text-[#10B981]">
        <a href="{{ url('/halaman-bantuan') }}" class="hover:underline transition">Bantuan Ayah & Bunda</a>
      </div>
    </div>
  </footer>

  <!-- ================= POPUP MENU NAVIGASI (Mobile) ================= -->
  <div id="mobileMenu" class="fixed inset-0 z-50 hidden lg:hidden">
    <div id="menuBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <div id="menuContent" class="absolute top-4 left-4 right-4 bg-white rounded-3xl p-5 shadow-2xl transform -translate-y-[150%] transition-transform duration-300 flex flex-col gap-5">
      <div class="flex justify-between items-center border-b border-gray-100 pb-4">
        <a href="{{ url('/dashboard') }}" class="flex items-center gap-3">
          <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center text-xl overflow-hidden">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo BaliHabit" class="w-full h-full rounded-full object-cover">
          </div>
          <div>
            <h2 class="text-lg font-extrabold text-[#1F2937] tracking-tight">Bali<span class="text-[#10B981]">Habit</span></h2>
            <p class="text-[10px] text-slate-500 font-medium">Menu Navigasi</p>
          </div>
        </a>
        <button id="closeMenuBtn" class="w-8 h-8 bg-gray-50 rounded-full flex items-center justify-center text-slate-500 hover:bg-gray-200 transition cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>

      <div class="flex flex-col gap-2">
        <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-500 font-bold hover:bg-slate-50 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
          Beranda Orang Tua
        </a>
        <!-- Menu Aktif Mobile: Profil Anak -->
        <a href="{{ url('/halaman-anak') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-emerald-50 text-[#10B981] font-bold transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm3.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75z" />
          </svg>
          Profil Anak
        </a>
        <a href="{{ url('/profil-orangtua') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-500 font-bold hover:bg-slate-50 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
          Profil Saya
        </a>
        <div class="mt-6 pt-2">
          <button onclick="openLogoutModal()" class="w-full flex justify-center items-center gap-3 px-4 py-3.5 rounded-2xl text-red-500 font-bold border border-red-100 hover:bg-red-50 transition cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>
            Keluar Akun
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= POPUP KONFIRMASI KELUAR ================= -->
  <div id="logoutModal" class="fixed inset-0 z-[60] hidden flex items-center justify-center p-4">
    <div id="logoutBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <div id="logoutContent" class="bg-white rounded-[2rem] p-6 w-full max-w-[320px] relative z-10 transform scale-95 opacity-0 transition-all duration-300 flex flex-col items-center text-center shadow-2xl">
      <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center text-red-500 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
        </svg>
      </div>

      <h3 class="text-xl font-extrabold text-[#1F2937] mb-2 tracking-tight">Keluar Akun?</h3>
      <p class="text-sm text-slate-500 mb-7 leading-relaxed">Apakah Anda yakin ingin keluar dari aplikasi BaliHabit?</p>

      <div class="flex gap-3 w-full">
        <button onclick="closeLogoutModal()" class="flex-1 bg-slate-50 text-slate-500 font-bold py-3.5 rounded-2xl hover:bg-slate-100 transition border border-slate-100 cursor-pointer">
          Batal
        </button>
        <button onclick="document.getElementById('logoutForm').submit()" class="flex-1 bg-red-500 text-white font-extrabold py-3.5 rounded-2xl hover:bg-red-600 transition shadow-sm shadow-red-200 cursor-pointer">
          Ya, Keluar
        </button>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/js/script.js') }}"></script>
  <!-- Form logout (POST + CSRF): dipakai tombol "Ya, Keluar" -->
  <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
</body>
</html>