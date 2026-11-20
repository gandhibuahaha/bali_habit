<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Misi Hari Ini - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
  <style>
    /* Animasi Kedut (Twitch / Heartbeat) untuk Bintang */
    @keyframes heartbeat {
      0% { transform: scale(1); }
      14% { transform: scale(1.15); }
      28% { transform: scale(1); }
      42% { transform: scale(1.15); }
      70% { transform: scale(1); }
      100% { transform: scale(1); }
    }
    .animasi-kedut {
      animation: heartbeat 2s infinite ease-in-out;
    }

    /* Animasi Popup Muncul (Pop In) */
    @keyframes popIn {
      0% { opacity: 0; transform: scale(0.9); }
      100% { opacity: 1; transform: scale(1); }
    }
    .popup-muncul {
      animation: popIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
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

  <!-- TENGAH: Menu Utama (Desktop) -->
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

    <!-- Tombol Hamburger (Mobile) -->
    <button id="hamburgerBtn" class="lg:hidden w-10 h-10 flex items-center justify-center rounded-full border border-gray-200 bg-white text-slate-600 hover:bg-gray-50 transition cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
    </button>
  </div>
</nav>

  <!-- ================= KONTEN UTAMA ================= -->
  <main class="max-w-2xl mx-auto px-4 sm:px-6 pt-2 pb-16 w-full flex-grow relative">

    <!-- Tombol Kembali -->
    <a href="{{ url('/halaman-refleksi') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-[#10B981] font-bold text-sm mb-6 transition cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
      Kembali ke Refleksi
    </a>

    <div class="flex justify-between items-start mb-6">
      <div>
        <h1 class="text-3xl md:text-4xl font-extrabold text-[#1F2937] mb-1 tracking-tight">Misi Hari Ini</h1>
        <p class="text-slate-500 text-sm md:text-base">Yuk, lakukan misi ini bersama Ayu!</p>
      </div>
      <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center text-orange-700 font-bold shadow-sm text-xl flex-shrink-0">
        👧🏼
      </div>
    </div>

    <div class="flex items-center justify-between mb-8">
      <div id="progress-container" class="flex items-center gap-3">
        <!-- JS Generate -->
      </div>
      <div class="text-slate-400 font-bold text-sm">
        <span id="page-indicator-text">1</span> / <span id="total-mission-text">3</span>
      </div>
    </div>

    <div class="bg-white border-2 border-emerald-50 rounded-[2rem] p-5 sm:p-8 shadow-sm mb-6 flex flex-col items-center text-center transition-all duration-300">

      <!-- AREA GAMBAR ILUSTRASI -->
      <div class="relative w-48 h-48 sm:w-56 sm:h-56 bg-orange-50 rounded-3xl mb-6 flex items-center justify-center border-2 border-orange-100 overflow-hidden group shadow-sm transition-transform duration-300">

        <!-- Elemen Bintang (Badge) di sudut -->
        <div class="absolute -top-1 -right-1 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center shadow-md border-2 border-white text-white z-10">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" /></svg>
        </div>

        <!-- Gambar Dinamis dari JavaScript -->
        <img id="mission-image" src="" alt="Ilustrasi Misi" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 hidden" />

        <!-- Placeholder -->
        <div id="mission-image-placeholder" class="absolute inset-0 flex items-center justify-center text-orange-300 font-medium text-sm px-4 bg-orange-50 z-0">
          Belum ada <br> gambar ilustrasi
        </div>
      </div>

      <div id="mission-label" class="bg-emerald-100 text-[#10B981] font-extrabold text-[10px] sm:text-xs px-3 py-1.5 rounded-full flex items-center gap-1.5 mb-4 uppercase tracking-wide">
        <div class="w-1.5 h-1.5 bg-[#10B981] rounded-full"></div>
        Misi 1
      </div>

      <h2 id="mission-title" class="text-xl sm:text-2xl font-extrabold text-[#1F2937] leading-snug mb-6">
        Sudahkah mencium ibumu hari ini?
      </h2>

      <div class="w-full bg-yellow-50/50 rounded-2xl p-4 border border-yellow-100 flex flex-col items-center">
        <div id="stars-container" class="flex gap-1 mb-2 text-yellow-400">
          <!-- JS Generate -->
        </div>
        <p id="mission-reward" class="text-yellow-700 text-xs sm:text-sm font-medium">
          Dapatkan 2 Bintang dengan menyelesaikan misi ini.
        </p>
      </div>
    </div>

    <!-- TOMBOL AKSI -->
    <div class="space-y-3">
      <button onclick="goNext()" class="w-full bg-[#10B981] text-white font-extrabold py-4 rounded-2xl shadow-md hover:bg-[#059669] transition flex justify-center items-center gap-2 text-base cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-yellow-300"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" /></svg>
        Sudah!
      </button>

      <button onclick="goNext()" class="w-full bg-white border border-gray-200 text-slate-500 font-extrabold py-4 rounded-2xl shadow-sm hover:bg-gray-50 transition flex justify-center items-center text-sm sm:text-base cursor-pointer">
        Nanti Saja
      </button>

      <button id="btn-prev" onclick="goPrev()" class="w-full bg-emerald-50 text-[#10B981] font-extrabold py-3.5 rounded-2xl hover:bg-emerald-100 transition flex justify-center items-center gap-2 text-sm sm:text-base mt-2 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
        Misi Sebelumnya
      </button>
    </div>
  </main>

  <!-- ================= POPUP BERHASIL MISI ================= -->
  <div id="success-popup" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm px-4 items-center justify-center">
    <div class="bg-white rounded-[2rem] px-6 py-8 w-full max-w-[320px] flex flex-col items-center text-center shadow-2xl popup-muncul">

      <div class="relative flex flex-col items-center justify-center mb-6 mt-2">
        <div class="relative w-32 h-32 flex items-center justify-center">
          <div class="absolute w-28 h-28 bg-yellow-100/80 rounded-full blur-[2px]"></div>

          <svg class="absolute w-32 h-32 text-orange-400 drop-shadow-sm" viewBox="0 0 100 100">
            <line x1="50" y1="6" x2="50" y2="14" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            <line x1="50" y1="94" x2="50" y2="86" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            <line x1="6" y1="50" x2="14" y2="50" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            <line x1="94" y1="50" x2="86" y2="50" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            <line x1="81" y1="19" x2="75" y2="25" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            <line x1="19" y1="19" x2="25" y2="25" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            <line x1="81" y1="81" x2="75" y2="75" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
            <line x1="19" y1="81" x2="25" y2="75" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
          </svg>

          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[72px] h-[72px] text-yellow-400 drop-shadow-md animasi-kedut z-10">
            <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
          </svg>
        </div>

        <div class="bg-yellow-50 text-orange-400 font-extrabold text-[11px] px-3.5 py-1.5 rounded-full flex items-center gap-1 z-20 border border-yellow-100 shadow-sm -mt-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5">
            <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
          </svg>
          Misi Selesai!
        </div>
      </div>

      <h2 class="text-[28px] font-extrabold text-[#F97316] leading-[1.1] mb-3">
        +6 Bintang<br>Diperoleh!
      </h2>

      <p class="text-[#1F2937] text-[13px] sm:text-sm font-bold mb-7 px-1 leading-relaxed">
        Hebat, Ayu! Semua Misi Hari Ini<br>Berhasil Diselesaikan! 🎉
      </p>

      <button onclick="window.location.href='{{ url('/rekap-cerita') }}'" class="w-full bg-[#10B981] text-white font-extrabold py-3.5 rounded-2xl shadow-md hover:bg-[#059669] transition text-sm sm:text-base cursor-pointer">
        Selesai
      </button>
    </div>
  </div>

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
        <span class="text-slate-300">•</span>
        <a href="{{ url('/admin/login') }}" class="hover:underline transition">Masuk sebagai Admin</a>
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
            <img
              src="{{ asset('assets/images/logo.png') }}"
              alt="Logo BaliHabit"
              class="w-full h-full rounded-full object-cover"
            />
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
        <a href="{{ url('/halaman-anak') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-[#10B981] bg-emerald-50 font-bold transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm3.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75z" />
          </svg>
          Profil Anak
        </a>
        <a href="{{ url('/profil-orangtua') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-500 font-bold hover:bg-slate-50 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
          Profil Saya
        </a>
      </div>
      <div class="mt-2 pt-2 border-t border-gray-100">
        <button onclick="openLogoutModal()" class="w-full flex justify-center items-center gap-3 px-4 py-3.5 rounded-2xl text-red-500 font-bold border border-red-100 hover:bg-red-50 transition cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>
          Keluar Akun
        </button>
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
        <button onclick="closeLogoutModal()" class="flex-1 bg-slate-50 text-slate-500 font-bold py-3.5 rounded-2xl hover:bg-gray-100 transition border border-slate-100 cursor-pointer">
          Batal
        </button>
        <button onclick="window.location.replace('{{ url('/login') }}')" class="flex-1 bg-red-500 text-white font-extrabold py-3.5 rounded-2xl hover:bg-red-600 transition shadow-sm shadow-red-200 cursor-pointer">
          Ya, Keluar
        </button>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/js/script.js') }}"></script>
  <script src="{{ asset('assets/js/misi_user.js') }}"></script>

</body>
</html>