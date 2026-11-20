<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Anak - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-slate-50 text-[#1F2937] min-h-screen flex flex-col relative">

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
    <!-- Menu Aktif di Halaman Ini -->
    <a href="{{ url('/halaman-anak') }}" class="text-[#10B981] transition">Profil Anak</a>
    <a href="{{ url('/profil-orangtua') }}" class="hover:text-[#10B981] transition">Profil Saya</a>
  </div>

  <!-- KANAN: Tombol Keluar & Hamburger -->
  <div class="flex items-center gap-4 z-10">
    <!-- Tombol Keluar (Desktop) memicu Modal -->
    <button onclick="toggleLogoutModal(true)" class="hidden lg:flex items-center gap-1.5 text-slate-400 hover:text-red-500 transition group cursor-pointer" title="Keluar">
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
  <main class="max-w-6xl mx-auto px-4 sm:px-6 pt-4 pb-16 w-full flex-grow">

    <!-- HEADER -->
    <header class="mb-8 md:mb-10 max-w-2xl">
      <h1 class="text-3xl md:text-4xl font-extrabold text-[#1F2937] mb-2 tracking-tight">Anak Saya</h1>
      <p class="text-slate-500 text-sm md:text-base leading-relaxed">Kelola profil anak dan dampingi perkembangan kebiasaan baik mereka.</p>
    </header>

    <!-- GRID KARTU ANAK (1 Kolom HP, 2 Kolom Tablet, 3 Kolom Desktop) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6">

      <!-- KARTU ANAK 1 (Ayu) -->
      <div class="bg-white border border-gray-100 rounded-[2rem] p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col h-full">
        <div class="flex justify-between items-start mb-6">
          <div class="flex items-center gap-3">
            <div class="w-14 h-14 bg-orange-50 rounded-full flex items-center justify-center text-3xl">👧🏼</div>
            <div>
              <h3 class="font-extrabold text-lg text-[#1F2937]">Ayu</h3>
              <p class="text-xs text-slate-500 font-medium mt-0.5">7 tahun</p>
            </div>
          </div>
          <!-- Label Bintang -->
          <div class="bg-yellow-50/50 border border-yellow-100 text-yellow-700 px-3 py-1.5 rounded-full text-[11px] font-extrabold flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5 text-yellow-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" /></svg>
            12 Bintang
          </div>
        </div>
        <!-- Tombol Aksi -->
        <div class="flex gap-2.5 mt-auto pt-2">
          <a href="{{ url('/progress-anak') }}" class="flex-1 border border-[#10B981] text-[#10B981] font-bold py-2.5 rounded-xl text-xs hover:bg-emerald-50 transition flex items-center justify-center cursor-pointer">
            Lihat Progress
          </a>
          <a href="{{ url('/belajar-bersama') }}" class="flex-1 bg-[#10B981] text-white font-bold py-2.5 rounded-xl text-[11px] md:text-xs hover:bg-[#059669] transition shadow-sm flex items-center justify-center cursor-pointer">
            Belajar Bersama
          </a>
        </div>
      </div>

      <!-- KARTU ANAK 2 (Made) -->
      <div class="bg-white border border-gray-100 rounded-[2rem] p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col h-full">
        <div class="flex justify-between items-start mb-6">
          <div class="flex items-center gap-3">
            <div class="w-14 h-14 bg-cyan-50 rounded-full flex items-center justify-center text-3xl">👦🏽</div>
            <div>
              <h3 class="font-extrabold text-lg text-[#1F2937]">Made</h3>
              <p class="text-xs text-slate-500 font-medium mt-0.5">5 tahun</p>
            </div>
          </div>
          <div class="bg-yellow-50/50 border border-yellow-100 text-yellow-700 px-3 py-1.5 rounded-full text-[11px] font-extrabold flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5 text-yellow-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" /></svg>
            7 Bintang
          </div>
        </div>
        <div class="flex gap-2.5 mt-auto pt-2">
          <a href="{{ url('/progress-anak') }}" class="flex-1 border border-[#10B981] text-[#10B981] font-bold py-2.5 rounded-xl text-xs hover:bg-emerald-50 transition flex items-center justify-center cursor-pointer">
            Lihat Progress
          </a>
          <a href="{{ url('/belajar-bersama') }}" class="flex-1 bg-[#10B981] text-white font-bold py-2.5 rounded-xl text-[11px] md:text-xs hover:bg-[#059669] transition shadow-sm flex items-center justify-center cursor-pointer">
            Belajar Bersama
          </a>
        </div>
      </div>

      <!-- KARTU TAMBAH ANAK -->
      <a href="{{ url('/tambah-anak') }}" class="border-2 border-dashed border-[#10B981]/30 bg-emerald-50/30 rounded-[2rem] p-6 hover:bg-emerald-50/80 transition-colors flex flex-col items-center justify-center text-center h-full min-h-[200px] group cursor-pointer">
        <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center text-[#10B981] group-hover:scale-110 transition-transform duration-300 shadow-sm mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
        </div>
        <h3 class="font-bold text-base text-[#10B981] mb-1.5">+ Tambah Anak</h3>
        <p class="text-xs text-slate-500 leading-relaxed px-4">Tambahkan profil anak untuk memulai perjalanan belajar bersama.</p>
      </a>

    </div>
  </main>

  <!-- ================= FOOTER UTAMA (KONSISTEN) ================= -->
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

<!-- ================= POPUP MENU NAVIGASI (MOBILE) ================= -->
  <div id="mobileMenu" class="fixed inset-0 z-[60] hidden lg:hidden">
    <div id="menuBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>
    <div id="menuContent" class="absolute top-4 left-4 right-4 bg-white rounded-3xl p-5 shadow-2xl transform -translate-y-[150%] transition-transform duration-300 flex flex-col gap-5">

      <!-- Header Logo -->
      <div class="flex justify-between items-center border-b border-gray-100 pb-4">
        <a href="{{ url('/dashboard') }}" class="flex items-center gap-3">
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

      <!-- Menu Utama -->
      <div class="flex flex-col gap-2">
        <!-- Beranda Orang Tua -->
        <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-500 font-bold hover:bg-slate-50 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
          Beranda Orang Tua
        </a>

        <!-- Profil Anak (Aktif) -->
        <a href="{{ url('/halaman-anak') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-[#10B981] bg-emerald-50 font-bold transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm3.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75z" />
          </svg>
          Profil Anak
        </a>

        <!-- Profil Saya -->
        <a href="{{ url('/profil-orangtua') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-500 font-bold hover:bg-slate-50 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
          Profil Saya
        </a>
      </div>

      <!-- Tombol Keluar Akun (Posisi center) -->
      <div class="mt-4 pt-2">
        <button onclick="toggleLogoutModal(true)" type="button" class="w-full flex justify-center items-center gap-3 px-4 py-3.5 rounded-2xl text-red-500 font-bold border border-red-100 hover:bg-red-50 transition cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>
          Keluar Akun
        </button>
      </div>

    </div>
  </div>

  <!-- ================= POPUP KONFIRMASI KELUAR ================= -->
  <div id="logoutModal" class="fixed inset-0 z-[60] hidden flex items-center justify-center p-4">
    <!-- Latar Belakang Gelap -->
    <div id="logoutBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <!-- Kotak Popup -->
    <div id="logoutContent" class="bg-white rounded-[2rem] p-6 w-full max-w-[320px] relative z-10 transform scale-95 opacity-0 transition-all duration-300 flex flex-col items-center text-center shadow-2xl">

      <!-- Ikon Peringatan -->
      <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center text-red-500 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
        </svg>
      </div>

      <h3 class="text-xl font-extrabold text-[#1F2937] mb-2 tracking-tight">Keluar Akun?</h3>
      <p class="text-sm text-slate-500 mb-7 leading-relaxed">Apakah Anda yakin ingin keluar dari aplikasi BaliHabit?</p>

      <div class="flex gap-3 w-full">
        <!-- Tombol Batal -->
        <button onclick="closeLogoutModal()" class="flex-1 bg-slate-50 text-slate-500 font-bold py-3.5 rounded-2xl hover:bg-slate-100 transition border border-slate-100 cursor-pointer">
          Batal
        </button>
        <!-- Tombol Ya, Keluar -->
        <button onclick="window.location.replace('{{ url('/login') }}')" class="flex-1 bg-red-500 text-white font-extrabold py-3.5 rounded-2xl hover:bg-red-600 transition shadow-sm shadow-red-200 cursor-pointer">
          Ya, Keluar
        </button>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/js/script.js') }}"></script>
  <script>
    function toggleLogoutModal(show) {
      const modal = document.getElementById('logoutModal');
      const backdrop = document.getElementById('logoutBackdrop');
      const box = document.getElementById('logoutContent');

      if(show) {
        document.getElementById('mobileMenu').classList.add('hidden');
        modal.classList.remove('hidden');
        void modal.offsetWidth;

        backdrop.classList.remove('opacity-0');
        box.classList.remove('opacity-0', 'scale-95');
        box.classList.add('opacity-100', 'scale-100');
      } else {
        backdrop.classList.add('opacity-0');
        box.classList.remove('opacity-100', 'scale-100');
        box.classList.add('opacity-0', 'scale-95');
        setTimeout(() => modal.classList.add('hidden'), 300);
      }
    }

    function closeLogoutModal() {
      toggleLogoutModal(false);
    }
  </script>
</body>
</html>