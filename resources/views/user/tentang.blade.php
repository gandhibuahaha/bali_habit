<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tentang Kami - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-slate-50 text-slate-800">

<!-- ================= NAV BAR ================= -->
  <nav class="flex justify-between items-center px-6 py-4 max-w-6xl mx-auto w-full bg-white/80 backdrop-blur-md sticky top-0 z-40">

    <!-- KIRI: Logo & Nama Brand -->
    <a href="{{ url('/') }}" class="flex items-center gap-2.5 z-10 hover:opacity-80 transition cursor-pointer">
      <div class="w-9 h-9 bg-emerald-50 rounded-full flex items-center justify-center border border-emerald-100 overflow-hidden p-0.5">
        <img
          src="{{ asset('assets/images/logo.png') }}"
          alt="Logo BaliHabit"
          class="w-full h-full rounded-full object-cover"
        />
      </div>
      <span class="text-xl font-extrabold tracking-tight text-[#1F2937]">Bali<span class="text-[#10B981]">Habit</span></span>
    </a>

   <!-- Bagian Tengah: Menu Navigasi Desktop -->
    <div class="hidden lg:flex items-center gap-8 text-sm font-bold text-slate-500">
      <a href="{{ url('/') }}" class="hover:text-[#10B981] transition">Beranda</a>
      <a href="{{ url('/cerita') }}" class="hover:text-[#10B981] transition">Cerita</a>
      <a href="{{ url('/tentang') }}" class="text-[#10B981] transition">Tentang Kami</a>
    </div>

    <!-- Bagian Kanan: Tombol & Menu Burger -->
    <div class="flex items-center gap-3">
     <div class="flex items-center gap-3">
      <a href="{{ url('/login') }}" class="hidden sm:block px-5 py-2 rounded-full border border-gray-200 text-sm font-semibold hover:bg-gray-50 transition bg-white cursor-pointer">
        Masuk
      </a>

      <a href="{{ url('/registrasi') }}" class="hidden sm:block px-5 py-2 rounded-full bg-[#10B981] text-white text-sm font-semibold hover:bg-[#059669] transition shadow-sm cursor-pointer">
        Daftar
      </a>

      <button id="hamburgerBtn" class="lg:hidden p-2 rounded-full border border-emerald-100 text-[#10B981] bg-emerald-50 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
      </button>
    </div>
    </div>
  </nav>

  <!-- ================= KONTEN UTAMA ================= -->
  <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 pb-12">

    <!-- Header Halaman -->
    <div class="text-center mb-8">
      <h1 class="text-3xl font-extrabold text-slate-900">Tentang BaliHabit</h1>
    </div>

<!-- Kotak Ilustrasi Besar -->
    <div class="w-full h-56 md:h-96 bg-white rounded-3xl shadow-sm border border-emerald-50 mb-8 overflow-hidden flex items-center justify-center">
      <img
        src="{{ asset('assets/images/pasangan.png') }}"
        alt="Ilustrasi Cerita BaliHabit"
        class="w-full h-full object-cover"
      >
    </div>

    <!-- Paragraf Penjelasan -->
    <div class="max-w-3xl mx-auto text-center mb-16">
      <p class="text-slate-600 md:text-lg leading-relaxed">
        <span class="font-bold text-[#10B981]">BaliHabit</span> adalah platform pembelajaran anak berbasis cerita bali yang membantu anak mengenal nilai-nilai kebaikan dan budaya Bali melalui pengalaman belajar bersama orang tua.
      </p>
    </div>

    <!-- Section: Untuk Siapa? -->
    <div class="mb-12">
      <div class="text-center md:text-left mb-6">
        <h2 class="text-2xl font-extrabold text-slate-900 mb-1">Untuk Siapa?</h2>
        <p class="text-slate-500 text-sm">BaliHabit dirancang untuk:</p>
      </div>

      <!-- Grid 3 Kartu -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">

        <!-- Kartu 1: Anak -->
        <div class="bg-white border border-emerald-50 rounded-3xl p-6 md:p-8 flex flex-col items-center text-center shadow-sm hover:shadow-md transition">
          <div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-2xl mb-4 border border-orange-100">
            😃
          </div>
          <h3 class="font-bold text-slate-900 text-sm md:text-base mb-3 leading-tight">Anak Usia<br>2-9 tahun</h3>
          <p class="text-xs md:text-sm text-slate-500 leading-relaxed">Mengenal nilai-nilai kebaikan budaya Bali, dan membangun kebiasaan positif sejak dini.</p>
        </div>

        <!-- Kartu 2: Orang Tua -->
        <div class="bg-white border border-emerald-50 rounded-3xl p-6 md:p-8 flex flex-col items-center text-center shadow-sm hover:shadow-md transition">
          <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-2xl mb-4 border border-emerald-100">
            👥
          </div>
          <h3 class="font-bold text-slate-900 text-sm md:text-base mb-3 leading-tight">Orang Tua</h3>
          <p class="text-xs md:text-sm text-slate-500 leading-relaxed mt-4">Mendampingi anak dalam proses belajar melalui cerita dan aktivitas sederhana di kehidupan sehari hari.</p>
        </div>

        <!-- Kartu 3: Sekolah -->
        <div class="bg-white border border-emerald-50 rounded-3xl p-6 md:p-8 flex flex-col items-center text-center shadow-sm hover:shadow-md transition">
          <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-2xl mb-4 border border-blue-100">
            🎓
          </div>
          <h3 class="font-bold text-slate-900 text-sm md:text-base mb-3 leading-tight">Sekolah</h3>
          <p class="text-xs md:text-sm text-slate-500 leading-relaxed mt-4">Mendukung pembentukan karakter anak melalui cerita lokal yang relevan dan bermakna.</p>
        </div>

      </div>
    </div>

    <!-- Kotak CTA (Bersama Mendampingi) -->
    <div class="bg-[#FFFDF4] border border-amber-100 rounded-3xl p-5 md:p-8 shadow-sm flex flex-col sm:flex-row items-center sm:items-start gap-4 sm:gap-6 mt-16">
      <div class="w-full sm:w-1/3 h-32 md:h-40 bg-gray-200 rounded-2xl flex-shrink-0 overflow-hidden">
        <div class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('assets/images/ibuanak.png') }}')"></div>
      </div>
      <div class="text-center sm:text-left flex flex-col items-center sm:items-start w-full sm:w-2/3 mt-2 sm:mt-0">
        <h2 class="text-lg md:text-xl font-bold text-slate-900 mb-2">Bersama Mendampingi Kebiasaan Baik Anak</h2>
        <p class="text-slate-600 text-xs md:text-sm leading-relaxed mb-4">Orang tua dapat melihat perkembangan aktivitas anak, pencapaian bintang, dan lencana yang diperoleh.</p>
        <a href="{{ url('/registrasi') }}" class="px-6 py-2 md:py-3 rounded-full bg-[#10B981] text-white font-semibold text-sm hover:bg-[#059669] transition shadow-sm cursor-pointer">
          Masuk sebagai Orang Tua
        </a>
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
        <span class="text-slate-300">•</span>
        <a href="{{ url('/admin/login') }}" class="hover:underline transition">Masuk sebagai Admin</a>
      </div>

    </div>
  </footer>

<!-- ================= POPUP MENU NAVIGASI (Mobile) ================= -->
  <div id="mobileMenu" class="fixed inset-0 z-[60] hidden lg:hidden">
    <div id="menuBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <div id="menuContent" class="absolute top-4 left-4 right-4 bg-white rounded-[2rem] p-5 shadow-2xl transform -translate-y-[150%] transition-transform duration-300 flex flex-col">

      <!-- Header (Logo Clickable + Tombol Close) -->
      <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4">
        <a href="{{ url('/') }}" class="flex items-center gap-3 !bg-transparent hover:opacity-80 transition cursor-pointer">
          <div class="w-10 h-10 rounded-full flex items-center justify-center overflow-hidden">
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
        <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-2xl text-slate-500 font-bold hover:bg-slate-50 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
          Beranda
        </a>

        <a href="{{ url('/cerita') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-2xl text-slate-500 font-bold hover:bg-slate-50 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
          Cerita
        </a>

        <a href="{{ url('/tentang') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-2xl text-[#10B981] bg-emerald-50 font-bold transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" /></svg>
          Tentang Kami
        </a>
      </div>

      <div class="h-px bg-gray-100 my-5"></div>

      <div class="flex flex-col gap-3">
        <a href="{{ url('/login') }}" class="w-full text-center border-2 border-[#10B981] text-[#10B981] font-bold py-3.5 rounded-xl hover:bg-emerald-50 transition cursor-pointer">
          Masuk
        </a>
        <a href="{{ url('/registrasi') }}" class="w-full text-center bg-[#10B981] text-white font-bold py-3.5 rounded-xl hover:bg-[#059669] transition shadow-md cursor-pointer">
          Daftar
        </a>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>