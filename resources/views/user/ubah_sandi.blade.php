<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Kata Sandi - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased min-h-screen flex flex-col relative overflow-x-hidden">

  <!-- ================= NAV BAR (POST-LOGIN) ================= -->
  <nav class="flex justify-between items-center px-6 py-4 max-w-6xl mx-auto w-full bg-white/80 backdrop-blur-md sticky top-0 z-40">

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

    <!-- TENGAH: Menu Desktop -->
    <div class="hidden lg:flex items-center gap-8 text-sm font-bold">
      <a href="{{ url('/dashboard') }}" class="text-slate-500 hover:text-[#10B981] transition">Beranda Orang Tua</a>
      <a href="{{ url('/halaman-anak') }}" class="text-slate-500 hover:text-[#10B981] transition">Profil Anak</a>
      <a href="{{ url('/profil-orangtua') }}" class="text-[#10B981] transition">Profil Saya</a>
    </div>

    <!-- KANAN: Tombol Keluar & Hamburger -->
    <div class="flex items-center gap-3">
      <button onclick="openLogoutModal()" type="button" class="hidden lg:flex items-center gap-2 text-slate-500 hover:text-red-500 font-bold text-sm transition cursor-pointer">
        Keluar
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
        </svg>
      </button>

      <button id="hamburgerBtn" class="lg:hidden p-2 rounded-full border border-gray-200 text-slate-600 bg-white shadow-sm hover:bg-gray-50 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
      </button>
    </div>
  </nav>

  <!-- ================= KONTEN UTAMA ================= -->
  <main class="w-full max-w-2xl mx-auto px-4 sm:px-6 py-8 flex-grow">

    <!-- Tombol Kembali -->
    <a href="{{ url('/profil-orangtua') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-[#10B981] font-bold text-sm mb-6 transition cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
      Kembali ke Profil
    </a>

    <!-- KOTAK FORM UTAMA -->
    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-6 sm:p-10 w-full overflow-hidden">

      <!-- Header Form -->
      <div class="mb-6 text-left">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-[#1F2937] mb-2 tracking-tight">Ubah Kata Sandi</h1>
        <p class="text-slate-500 text-xs sm:text-sm leading-relaxed">
          Buat kata sandi baru yang kuat untuk keamanan akun keluarga Anda.
        </p>
      </div>

      <!-- Kotak Informasi Keamanan -->
      <div class="bg-[#F0FDF4] border border-emerald-100 rounded-xl p-3.5 sm:p-5 flex gap-3.5 items-start mb-8">
        <div class="w-9 h-9 sm:w-10 sm:h-10 bg-white border border-emerald-200 rounded-lg flex flex-shrink-0 items-center justify-center text-[#10B981] shadow-sm">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 sm:w-5 sm:h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
          </svg>
        </div>
        <p class="text-[11px] sm:text-[13px] text-slate-600 leading-relaxed font-medium">
          Pastikan kata sandi minimal <span class="font-extrabold text-[#1F2937]">6 karakter</span> dengan kombinasi huruf dan angka untuk melindungi privasi data si kecil.
        </p>
      </div>

      <!-- FORM PENGISIAN -->
      <form id="formUbahSandi" class="flex flex-col gap-6">
        @csrf

        <!-- Input Kata Sandi Saat Ini -->
        <div>
          <label class="block text-[11px] font-extrabold text-[#1F2937] uppercase tracking-wider mb-2">
            Kata Sandi Saat Ini <span class="text-red-500">*</span>
          </label>
          <div class="relative flex items-center w-full border border-gray-200 rounded-xl px-4 py-3 bg-white focus-within:border-[#10B981] focus-within:ring-1 focus-within:ring-[#10B981] transition shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 mr-3">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>
            <input type="password" id="current_password" name="current_password" placeholder="Masukkan kata sandi lama" class="flex-1 min-w-0 bg-transparent focus:outline-none text-xs sm:text-sm text-slate-800 font-medium tracking-[0.2em] placeholder:text-slate-400 placeholder:text-xs sm:placeholder:text-sm">
            <button type="button" id="togglePassword1" class="text-slate-400 hover:text-[#10B981] flex-shrink-0 transition ml-2 focus:outline-none cursor-pointer">
              <svg id="eyeIcon1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </button>
          </div>
          <p id="err-current" class="error-msg hidden text-red-500 text-[11px] mt-1.5 font-medium"></p>
          <div class="text-right mt-2">
            <a href="{{ url('/lupa-sandi') }}" class="text-xs sm:text-[13px] font-bold text-[#10B981] hover:underline">Lupa kata sandi saat ini?</a>
          </div>
        </div>

        <!-- Input Kata Sandi Baru -->
        <div>
          <label class="block text-[11px] font-extrabold text-[#1F2937] uppercase tracking-wider mb-2">
            Kata Sandi Baru <span class="text-red-500">*</span>
          </label>
          <div class="relative flex items-center w-full border border-gray-200 rounded-xl px-4 py-3 bg-white focus-within:border-[#10B981] focus-within:ring-1 focus-within:ring-[#10B981] transition shadow-sm mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 mr-3 transform -rotate-45">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
            </svg>
            <input type="password" id="new_password" name="new_password" placeholder="Masukkan kata sandi baru" class="flex-1 min-w-0 bg-transparent focus:outline-none text-xs sm:text-sm text-slate-800 font-medium tracking-[0.2em] placeholder:text-slate-400 placeholder:text-xs sm:placeholder:text-sm">
            <button type="button" id="togglePassword2" class="text-slate-400 hover:text-[#10B981] flex-shrink-0 transition ml-2 focus:outline-none cursor-pointer">
              <svg id="eyeIcon2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </button>
          </div>
          <p id="err-new" class="error-msg hidden text-red-500 text-[11px] mt-1.5 font-medium"></p>

          <!-- Indikator Kekuatan Sandi -->
          <div class="flex justify-between items-center mb-1.5 mt-2">
            <span class="text-[11px] sm:text-xs font-bold text-slate-500">Kekuatan Kata Sandi</span>
            <span id="strengthText" class="text-[11px] sm:text-xs font-extrabold text-slate-400">Belum diisi</span>
          </div>
          <div class="flex gap-2">
            <div id="bar1" class="h-1.5 flex-1 bg-gray-200 rounded-full transition-all"></div>
            <div id="bar2" class="h-1.5 flex-1 bg-gray-200 rounded-full transition-all"></div>
            <div id="bar3" class="h-1.5 flex-1 bg-gray-200 rounded-full transition-all"></div>
          </div>
        </div>

        <!-- Input Konfirmasi Kata Sandi Baru -->
        <div>
          <label class="block text-[11px] font-extrabold text-[#1F2937] uppercase tracking-wider mb-2">
            Konfirmasi Kata Sandi Baru <span class="text-red-500">*</span>
          </label>
          <div class="relative flex items-center w-full border border-gray-200 rounded-xl px-4 py-3 bg-white focus-within:border-[#10B981] focus-within:ring-1 focus-within:ring-[#10B981] transition shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 mr-3">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <input type="password" id="confirm_password" name="new_password_confirmation" placeholder="Ulangi kata sandi baru" class="flex-1 min-w-0 bg-transparent focus:outline-none text-xs sm:text-sm text-slate-800 font-medium tracking-[0.2em] placeholder:text-slate-400 placeholder:text-xs sm:placeholder:text-sm">
            <button type="button" id="togglePassword3" class="text-slate-400 hover:text-[#10B981] flex-shrink-0 transition ml-2 focus:outline-none cursor-pointer">
              <svg id="eyeIcon3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </button>
          </div>
          <p id="err-confirm" class="error-msg hidden text-red-500 text-[11px] mt-1.5 font-medium"></p>
        </div>

        <!-- ================= TOMBOL AKSI ================= -->
        <div class="flex flex-col gap-3 mt-2">
          <button type="submit" class="w-full bg-[#10B981] text-white font-bold py-3.5 sm:py-4 rounded-xl flex items-center justify-center gap-2 hover:bg-[#059669] transition shadow-md cursor-pointer text-sm sm:text-base">
            Simpan Kata Sandi Baru
          </button>

          <a href="{{ url('/profil-orangtua') }}" class="w-full bg-white border border-gray-200 text-slate-700 font-bold py-3.5 sm:py-4 rounded-xl hover:bg-gray-50 transition shadow-sm flex items-center justify-center cursor-pointer text-sm sm:text-base">
            Batal
          </a>
        </div>

      </form>
    </div>
  </main>

<!-- ================= POPUP MODAL KONFIRMASI SIMPAN ================= -->
  <div id="saveModal" class="fixed inset-0 z-[70] hidden">
    <div id="saveBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <div class="flex items-center justify-center min-h-screen px-4 py-8 text-center sm:p-0 pointer-events-none">
      <div id="saveModalBox" class="relative bg-white rounded-[2rem] text-left overflow-hidden shadow-2xl transform transition-all my-8 max-w-[340px] w-full p-6 sm:p-8 opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95 duration-300 pointer-events-auto">

        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-emerald-50 mb-5">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-8 w-8 text-[#10B981]">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>

        <div class="text-center">
          <h3 class="text-xl font-extrabold text-[#1F2937] mb-2">Simpan Perubahan?</h3>
          <p class="text-sm text-slate-500 leading-relaxed mb-7">
            Apakah Anda yakin kata sandi baru Anda sudah benar?
          </p>
        </div>

        <div class="flex flex-row gap-3">
          <button id="btnBatalSimpan" type="button" onclick="toggleSaveModal(false)" class="flex-1 inline-flex justify-center items-center rounded-2xl border border-gray-200 bg-white px-4 py-3.5 text-sm font-bold text-slate-700 shadow-sm hover:bg-gray-50 transition cursor-pointer">
            Batal
          </button>

          <button id="btnYaSimpan" type="button" onclick="window.location.href='{{ url('/profil-orangtua') }}'" class="flex-1 inline-flex justify-center items-center gap-2 rounded-2xl bg-[#10B981] px-4 py-3.5 text-sm font-bold text-white shadow-sm hover:bg-[#059669] transition cursor-pointer">
            Ya, Simpan
          </button>
        </div>
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

  <!-- ================= FOOTER ================= -->
  <footer class="bg-slate-50 pt-8 pb-12 mt-auto border-t border-gray-100">
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
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo BaliHabit" class="w-full h-full rounded-full object-cover" />
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

        <a href="{{ url('/halaman-anak') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-500 font-bold hover:bg-slate-50 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm3.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75z" />
          </svg>
          Profil Anak
        </a>

        <a href="{{ url('/profil-orangtua') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-[#10B981] bg-emerald-50 font-bold transition">
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

  <script src="{{ asset('assets/js/script.js') }}"></script>
  <script src="{{ asset('assets/js/ubah_sandi.js') }}"></script>
</body>
</html>