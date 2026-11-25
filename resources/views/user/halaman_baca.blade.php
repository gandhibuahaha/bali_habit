<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Membaca Cerita - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
  <style>
    /* Styling scrollbar tipis khusus untuk teks agar tetap rapi dan ramah anak */
    .custom-scroll::-webkit-scrollbar {
      width: 5px;
    }
    .custom-scroll::-webkit-scrollbar-track {
      background: #f1f5f9;
      border-radius: 10px;
    }
    .custom-scroll::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 10px;
    }
    .custom-scroll::-webkit-scrollbar-thumb:hover {
      background: #94a3b8;
    }
  </style>
</head>
<body class="bg-slate-50 text-[#1F2937] min-h-screen flex flex-col">

  <!-- ================= NAV BAR ================= -->
  <nav class="flex justify-between items-center px-4 sm:px-6 py-4 max-w-6xl mx-auto w-full sticky top-0 z-40 bg-slate-50/90 backdrop-blur-md relative">

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

  <!-- ================= KONTEN UTAMA (AREA BACA) ================= -->
  <main class="max-w-3xl mx-auto px-4 sm:px-6 pt-2 pb-16 w-full flex-grow">

    <!-- HEADER NAVIGASI CERITA -->
    <div class="flex justify-between items-center mb-5 bg-white/50 py-2 rounded-2xl">
      <a href="{{ url('/belajar-bersama') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-[#10B981] font-bold text-[13px] md:text-sm transition cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
        I Alu Teken I Kedis Puuh
      </a>
      <div class="bg-emerald-50 text-[#10B981] font-extrabold text-xs px-3 py-1.5 rounded-full flex items-center gap-1.5 border border-emerald-100">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5"><path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c1.68 0 3.282.466 4.75 1.293a.75.75 0 001-.707V5.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" /></svg>
        <span id="page-indicator-text">1/10</span>
      </div>
    </div>

    <!-- AREA GAMBAR ILUSTRASI -->
    <div id="illustration-container" class="relative w-full aspect-[4/3] md:aspect-[16/9] bg-emerald-50 bg-cover bg-center rounded-[2rem] mb-6 overflow-hidden border-2 border-dashed border-emerald-200 shadow-sm flex items-center justify-center transition-all duration-500">

      <svg id="default-svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-emerald-300"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>

      <div id="scene-label" class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm text-[#1F2937] text-[11px] md:text-xs font-bold px-3 py-1.5 rounded-full flex items-center gap-1.5 shadow-sm transition-all">
        <div class="w-2 h-2 bg-[#10B981] rounded-full"></div>
        Adegan 1: Tegalan Yang Asri
      </div>

      <button class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-sm text-[#1F2937] text-[11px] md:text-xs font-bold px-3 py-2 rounded-full flex items-center gap-1.5 shadow-md hover:bg-gray-50 transition cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6" /></svg>
        Perbesar
      </button>
    </div>

    <!-- AREA KARTU TEKS TERJEMAHAN -->
    <div class="space-y-4 mb-8">

      <!-- Kartu 1: Bahasa Bali -->
      <div class="bg-white border border-gray-100 rounded-[1.5rem] p-5 shadow-sm transition-opacity duration-300">
        <div class="flex justify-between items-center mb-3">
          <div class="flex items-center gap-2">
            <h3 class="font-bold text-[#1F2937] text-sm">Bahasa Bali</h3>
            <span class="text-slate-300 text-[10px]">●</span>
            <span class="text-slate-500 text-[11px]">Basa Asli</span>
          </div>
          <span class="text-[#10B981] text-[10px] font-bold flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.24.035 3.315.119m-3.315-.119L11.25 15c4.221 3.849 8.25 6 8.25 6m-13.5-9c0 0 3.849-2.151 8.25-6" /></svg>
            Basa Bali Alus
          </span>
        </div>

        <div class="max-h-28 overflow-y-auto pr-2 mb-4 custom-scroll">
          <p id="text-bali" class="text-[17px] md:text-lg text-[#1F2937] leading-relaxed font-medium transition-all duration-300"></p>
        </div>

        <div class="bg-slate-50/80 rounded-2xl p-2.5 flex items-center gap-3 border border-slate-100">
          <button onclick="toggleAudio('bali')" class="w-10 h-10 bg-emerald-100 text-[#10B981] rounded-full flex items-center justify-center flex-shrink-0 cursor-pointer hover:bg-emerald-200 transition">
            <svg id="icon-play-bali" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 ml-0.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L8.029 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z" /></svg>
            <svg id="icon-pause-bali" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 hidden"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5" /></svg>
          </button>

          <div class="flex-grow flex items-center gap-2 cursor-pointer py-2" onclick="seekAudio(event, 'bali')">
            <div class="flex-grow h-1.5 bg-gray-200 rounded-full overflow-hidden relative pointer-events-none">
              <div id="progress-bar-bali" class="absolute top-0 left-0 h-full bg-[#10B981] w-0 transition-all duration-[50ms]"></div>
            </div>
          </div>

          <span id="time-bali" class="text-[10px] font-medium text-slate-400 w-16 text-center">0:00 / 0:00</span>
          <div class="flex items-center gap-1.5 text-[#10B981] text-[10px] font-bold px-2 border-l border-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" /></svg>
            Suara Guru
          </div>
        </div>
      </div>

      <!-- Kartu 2: Bahasa Indonesia -->
      <div class="bg-white border border-gray-100 rounded-[1.5rem] p-5 shadow-sm transition-opacity duration-300">
        <div class="flex justify-between items-center mb-3">
          <div class="flex items-center gap-2">
            <h3 class="font-bold text-[#1F2937] text-sm">Bahasa Indonesia</h3>
            <span class="text-slate-300 text-[10px]">●</span>
            <span class="text-slate-500 text-[11px]">Nasional</span>
          </div>
          <span class="text-slate-500 text-[10px] font-medium">Terjemahan Resmi</span>
        </div>

        <div class="max-h-28 overflow-y-auto pr-2 mb-4 custom-scroll">
          <p id="text-indo" class="text-[17px] md:text-lg text-[#1F2937] leading-relaxed font-medium transition-all duration-300"></p>
        </div>

        <div class="bg-slate-50/80 rounded-2xl p-2.5 flex items-center gap-3 border border-slate-100">
          <button onclick="toggleAudio('indo')" class="w-10 h-10 bg-emerald-100 text-[#10B981] rounded-full flex items-center justify-center flex-shrink-0 cursor-pointer hover:bg-emerald-200 transition">
            <svg id="icon-play-indo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 ml-0.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L8.029 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z" /></svg>
            <svg id="icon-pause-indo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 hidden"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5" /></svg>
          </button>

          <div class="flex-grow flex items-center gap-2 cursor-pointer py-2" onclick="seekAudio(event, 'indo')">
            <div class="flex-grow h-1.5 bg-gray-200 rounded-full overflow-hidden relative pointer-events-none">
              <div id="progress-bar-indo" class="absolute top-0 left-0 h-full bg-[#10B981] w-0 transition-all duration-[50ms]"></div>
            </div>
          </div>

          <span id="time-indo" class="text-[10px] font-medium text-slate-400 w-16 text-center">0:00 / 0:00</span>
          <div class="flex items-center gap-1.5 text-[#10B981] text-[10px] font-bold px-2 border-l border-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" /></svg>
            Audio Edukasi
          </div>
        </div>
      </div>

      <!-- Kartu 3: English -->
      <div class="bg-white border border-gray-100 rounded-[1.5rem] p-5 shadow-sm transition-opacity duration-300">
        <div class="flex justify-between items-center mb-3">
          <div class="flex items-center gap-2">
            <h3 class="font-bold text-[#1F2937] text-sm">English</h3>
            <span class="text-slate-300 text-[10px]">●</span>
            <span class="text-slate-500 text-[11px]">Global</span>
          </div>
          <span class="text-slate-500 text-[10px] font-medium">Kids English</span>
        </div>

        <div class="max-h-28 overflow-y-auto pr-2 mb-4 custom-scroll">
          <p id="text-eng" class="text-[17px] md:text-lg text-[#1F2937] leading-relaxed font-medium italic transition-all duration-300"></p>
        </div>

        <div class="bg-slate-50/80 rounded-2xl p-2.5 flex items-center gap-3 border border-slate-100">
          <button onclick="toggleAudio('eng')" class="w-10 h-10 bg-emerald-100 text-[#10B981] rounded-full flex items-center justify-center flex-shrink-0 cursor-pointer hover:bg-emerald-200 transition">
            <svg id="icon-play-eng" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 ml-0.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L8.029 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z" /></svg>
            <svg id="icon-pause-eng" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 hidden"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5" /></svg>
          </button>

          <div class="flex-grow flex items-center gap-2 cursor-pointer py-2" onclick="seekAudio(event, 'eng')">
            <div class="flex-grow h-1.5 bg-gray-200 rounded-full overflow-hidden relative pointer-events-none">
              <div id="progress-bar-eng" class="absolute top-0 left-0 h-full bg-[#10B981] w-0 transition-all duration-[50ms]"></div>
            </div>
          </div>

          <span id="time-eng" class="text-[10px] font-medium text-slate-400 w-16 text-center">0:00 / 0:00</span>
          <div class="flex items-center gap-1.5 text-[#10B981] text-[10px] font-bold px-2 border-l border-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" /></svg>
            Native Audio
          </div>
        </div>
      </div>

    </div>

    <!-- AREA NAVIGASI BAWAH (PAGINATION) -->
    <div class="mt-8">
      <div id="dots-container" class="flex flex-wrap justify-center items-center gap-2 mb-6 px-4"></div>

      <div class="grid grid-cols-2 gap-4">
        <button id="btn-prev" onclick="goPrev()" disabled class="bg-emerald-50/50 border border-emerald-50 text-emerald-400 font-extrabold py-3.5 rounded-2xl flex items-center justify-center gap-2 text-sm cursor-not-allowed">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
          Sebelumnya
        </button>

        <button id="btn-next" onclick="goNext()" class="bg-[#10B981] text-white font-extrabold py-3.5 rounded-2xl flex items-center justify-center gap-2 text-sm shadow-sm hover:bg-[#059669] transition cursor-pointer">
          Selanjutnya
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>
        </button>
      </div>
    </div>
  </main>

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
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg> Beranda Orang Tua
        </a>
        <a href="{{ url('/halaman-anak') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-[#10B981] bg-emerald-50 font-bold transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm3.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75z" /></svg> Profil Anak
        </a>
        <a href="{{ url('/profil-orangtua') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-500 font-bold hover:bg-slate-50 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg> Profil Saya
        </a>
        <div class="mt-6 pt-2">
          <button onclick="openLogoutModal()" class="w-full flex justify-center items-center gap-3 px-4 py-3.5 rounded-2xl text-red-500 font-bold border border-red-100 hover:bg-red-50 transition cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg> Keluar Akun
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
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>
      </div>
      <h3 class="text-xl font-extrabold text-[#1F2937] mb-2 tracking-tight">Keluar Akun?</h3>
      <p class="text-sm text-slate-500 mb-7 leading-relaxed">Apakah Anda yakin ingin keluar dari aplikasi BaliHabit?</p>
      <div class="flex gap-3 w-full">
        <button onclick="closeLogoutModal()" class="flex-1 bg-slate-50 text-slate-500 font-bold py-3.5 rounded-2xl hover:bg-slate-100 transition border border-slate-100 cursor-pointer">Batal</button>
        <button onclick="document.getElementById('logoutForm').submit()" class="flex-1 bg-red-500 text-white font-extrabold py-3.5 rounded-2xl hover:bg-red-600 transition shadow-sm shadow-red-200 cursor-pointer">Ya, Keluar</button>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/js/script.js') }}"></script>
  <script src="{{ asset('assets/js/halaman_baca.js') }}"></script>
  <!-- Form logout (POST + CSRF): dipakai tombol "Ya, Keluar" -->
  <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
</body>
</html>