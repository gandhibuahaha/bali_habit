<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-[#F8F7F4] text-[#1F2937] min-h-screen flex items-center justify-center p-4 md:p-8 relative">

  <!-- ================= TOMBOL KEMBALI (KHUSUS MOBILE) ================= -->
  <button onclick="kembaliKeLuar()" class="md:hidden absolute top-6 left-4 flex items-center gap-2 text-slate-500 hover:text-[#10B981] transition font-semibold text-sm cursor-pointer bg-white px-4 py-2 rounded-full shadow-sm border border-gray-100 z-50">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
      <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
    </svg>
    Kembali
  </button>

  <!-- ================= CONTAINER UTAMA ================= -->
  <main class="w-full max-w-5xl flex flex-col md:flex-row bg-transparent md:bg-white rounded-none md:rounded-[2.5rem] shadow-none md:shadow-2xl overflow-hidden mt-16 md:mt-0 z-10 md:max-h-[92vh]">

    <!-- ================= BAGIAN KIRI: UCAPAN SELAMAT DATANG (DESKTOP SAJA) ================= -->
    <div class="hidden md:flex w-1/2 bg-gradient-to-br from-[#10B981] to-[#059669] p-10 lg:p-14 flex-col justify-center relative">
      <div class="w-16 h-16 bg-emerald-50 rounded-full flex items-center justify-center mb-10 shadow-inner border border-emerald-100 overflow-hidden p-0.5">
        <img
          src="{{ asset('assets/images/logo.png') }}"
          alt="Foto Logo BaliHabit"
          class="w-full h-full rounded-full object-cover"
        />
      </div>
      <h2 class="text-4xl lg:text-5xl font-extrabold text-white mb-6 leading-tight tracking-tight">Selamat Datang<br>Kembali</h2>
      <p class="text-white/90 text-sm lg:text-base leading-relaxed max-w-sm">
        Lanjutkan perjalanan menanam cerita dan menumbuhkan kebiasaan baik bersama BaliHabit.
      </p>
    </div>

    <!-- ================= BAGIAN KANAN: FORM LOGIN ================= -->
    <div class="w-full md:w-1/2 flex flex-col bg-white rounded-[2.5rem] md:rounded-none shadow-sm md:shadow-none p-6 md:p-8 lg:p-12 border border-gray-100 md:border-none md:overflow-y-auto custom-scrollbar">

      <!-- ================= TOMBOL KEMBALI (KHUSUS DESKTOP) ================= -->
      <button onclick="kembaliKeLuar()" class="hidden md:flex items-center gap-2 text-slate-500 hover:text-[#10B981] transition font-semibold text-sm cursor-pointer mb-8 w-fit">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
        Kembali
      </button>

      <!-- KOTAK FORM TENGAH -->
      <div class="w-full max-w-sm mx-auto my-auto">

        <!-- Logo & Judul -->
        <div class="flex flex-col items-center justify-center mb-6 md:mb-8">
          <h1 class="text-2xl font-extrabold text-[#1F2937] tracking-tight mb-1">
            Bali<span class="text-[#10B981]">Habit</span>
          </h1>
          <p class="text-sm text-slate-500 font-medium">Masuk ke Akun Anda</p>
        </div>

        <!-- Form Utama -->
        <form id="loginForm" action="{{ url('/dashboard') }}" method="POST">
          @csrf

          <!-- Input Email -->
          <div class="mb-3">
            <label class="block text-[11px] font-bold text-[#1F2937] mb-1">Email</label>
            <div class="flex items-center bg-[#F6F5F2] rounded-xl px-3.5 py-2.5 border border-transparent focus-within:border-[#10B981] focus-within:bg-white transition">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-slate-400"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>
              <input type="email" id="email" name="email" placeholder="email@example.com" class="bg-transparent w-full outline-none text-xs md:text-sm text-[#1F2937] ml-2.5 placeholder:text-slate-400">
            </div>
            <p id="err-email" class="error-msg hidden text-red-500 text-[10px] mt-1 font-medium"></p>
          </div>

          <!-- Input Password -->
          <div class="mb-3 relative">
            <label class="block text-[11px] font-bold text-[#1F2937] mb-1">Kata Sandi</label>
            <div class="flex items-center justify-between bg-[#F6F5F2] rounded-xl px-3.5 py-2.5 border border-transparent focus-within:border-[#10B981] focus-within:bg-white transition">
              <div class="flex items-center w-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-slate-400 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" /></svg>
                <input type="password" id="password" name="password" placeholder="••••••••" class="bg-transparent w-full outline-none text-xs md:text-sm text-[#1F2937] ml-2.5 placeholder:text-slate-400 tracking-widest pr-2">
              </div>
              <button type="button" id="togglePassword" class="text-slate-400 hover:text-[#10B981] transition focus:outline-none flex-shrink-0 cursor-pointer">
                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              </button>
            </div>
            <p id="err-pass" class="error-msg hidden text-red-500 text-[10px] mt-1 font-medium"></p>
          </div>

          <!-- Simpan Password & Lupa Password -->
          <div class="flex items-center justify-between mb-6 mt-4">
            <label class="flex items-center gap-2 cursor-pointer group">
              <div class="relative flex items-center justify-center">
                <input type="checkbox" id="remember" name="remember" class="peer sr-only">
                <div class="w-4 h-4 rounded-full bg-[#F6F5F2] border border-gray-200 group-hover:border-[#10B981] peer-checked:bg-[#10B981] peer-checked:border-[#10B981] transition"></div>
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute w-2.5 h-2.5 text-white opacity-0 peer-checked:opacity-100 pointer-events-none transition-opacity" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
              </div>
              <span class="text-[11px] font-bold text-[#1F2937]">Simpan Sandi</span>
            </label>
            <a href="{{ url('/lupa-sandi') }}" class="text-[11px] font-bold text-[#10B981] hover:underline">Lupa Sandi?</a>
          </div>

          <!-- Tombol Masuk -->
          <button type="submit" class="w-full bg-[#10B981] text-white font-bold py-3 rounded-xl hover:bg-[#059669] transition shadow-sm text-sm cursor-pointer">
            Masuk
          </button>
        </form>

        <!-- Divider -->
        <div class="flex items-center justify-center my-3.5 gap-3">
          <div class="h-px bg-gray-200 flex-grow"></div>
          <span class="text-[10px] font-bold text-slate-400 tracking-wider">ATAU MASUK DENGAN</span>
          <div class="h-px bg-gray-200 flex-grow"></div>
        </div>

        <!-- Tombol Sosial Login -->
        <div class="grid grid-cols-2 gap-2.5">
          <button type="button" class="border border-gray-200 bg-white rounded-xl py-2.5 flex items-center justify-center gap-2 hover:bg-gray-50 transition shadow-sm cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-4 h-4"><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/></svg>
            <span class="text-xs font-bold text-[#1F2937]">Google</span>
          </button>

          <button type="button" class="border border-gray-200 bg-white rounded-xl py-2.5 flex items-center justify-center gap-2 hover:bg-gray-50 transition shadow-sm cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="currentColor" class="w-4 h-4 text-black"><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.3 48.6-.7 90.4-82.5 102.7-119.3-65.2-30.7-61.7-90-61.8-91.3zM244 84.6c24.6-29.2 23.6-72.3 23.6-72.3-25.1 1.2-55.4 17.1-73.6 39.6-14.4 17.5-26.1 48-20.7 74.3 27.2 2 53.6-13.1 70.7-41.6z"/></svg>
            <span class="text-xs font-bold text-[#1F2937]">Apple</span>
          </button>
        </div>

        <!-- Tautan Daftar -->
        <div class="text-center mt-4">
          <p class="text-xs text-[#1F2937]">
            Belum punya akun? <a href="{{ url('/registrasi') }}" class="font-bold text-[#10B981] hover:underline">Daftar di sini</a>
          </p>
        </div>

      </div>

      <!-- Teks Footer (Hanya muncul di Mobile) -->
      <div class="mt-8 pt-6 border-t border-gray-100 text-center md:hidden">
        <p class="text-[10px] font-bold text-slate-800 mb-1">
          BaliHabit <span class="text-slate-400 font-normal mx-1">•</span> <span class="font-normal text-slate-500">© 2026</span>
        </p>
        <p class="text-[10px] text-slate-500 mb-3">Misi Kebaikan & Karakter Baik <span class="mx-1">•</span> Pulau Dewata</p>
        <div class="flex flex-wrap justify-center gap-x-3 gap-y-1 text-[10px] text-[#10B981] font-semibold">
          <a href="#" class="hover:underline">Kebijakan Privasi</a>
          <span class="text-slate-300">•</span>
          <a href="#" class="hover:underline">Ketentuan Layanan</a>
        </div>
        <div class="flex flex-wrap justify-center gap-x-3 gap-y-1 text-[10px] text-[#10B981] font-semibold mt-1">
          <a href="{{ url('/halaman-bantuan') }}" class="hover:underline">Bantuan Ayah & Bunda</a>
          <span class="text-slate-300">•</span>
          <a href="{{ url('/admin/login') }}" class="hover:underline">Masuk sebagai Admin</a>
        </div>
      </div>

    </div>
  </main>

  <!-- ================= SCRIPT VALIDASI FORM, TOGGLE PASSWORD & LOGIKA ORIGIN ================= -->
  <script>
    // --- 1. LOGIKA MENCEGAH HISTORY LOOP (TRUE ORIGIN) ---
    window.addEventListener('DOMContentLoaded', () => {
      const halamanAsal = document.referrer;

      // Daftar rute internal user & auth yang TIDAK BOLEH disimpan sebagai halaman kembali
      const halamanTerlarang = [
        '/login',
        '/registrasi',
        '/lupa-sandi',
        '/dashboard',
        '/halaman-anak',
        '/profil-orangtua',
        '/belajar-bersama',
        '/rekap-cerita',
        '/halaman-baca',
        '/halaman-refleksi',
        '/halaman-misi',
        '/edit-profil',
        '/ubah-sandi',
        '/progress-anak',
        '/bantuan',
        '/edit-anak',
        '/tambah-anak'
      ];

      const isHalamanInternal = halamanTerlarang.some(route => halamanAsal.includes(route));

      if (halamanAsal && !isHalamanInternal) {
        // Jika datang dari halaman publik (misal: /, /cerita, /tentang), simpan sebagai tujuan kembali
        sessionStorage.setItem('authReturnUrl', halamanAsal);
      } else if (isHalamanInternal && !halamanAsal.includes('/registrasi') && !halamanAsal.includes('/lupa-sandi')) {
        // Jika datang karena baru saja LOGOUT dari halaman dashboard user, hapus riwayat origin lama
        sessionStorage.removeItem('authReturnUrl');
      }
    });

    // Fungsi custom untuk tombol kembali memutus loop
    function kembaliKeLuar() {
      const returnUrl = sessionStorage.getItem('authReturnUrl');

      if (returnUrl) {
        window.location.href = returnUrl;
      } else {
        window.location.href = "{{ url('/') }}";
      }
    }

    // --- 2. LOGIKA TOGGLE PASS & VALIDASI ---
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', function () {
      const isPassword = passwordInput.getAttribute('type') === 'password';
      passwordInput.setAttribute('type', isPassword ? 'text' : 'password');

      if (isPassword) {
        eyeIcon.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
        `;
      } else {
        eyeIcon.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        `;
      }
    });

    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault();
      let isValid = true;

      document.querySelectorAll('.error-msg').forEach(function(el) {
        el.classList.add('hidden');
      });

      const email = document.getElementById('email').value.trim();
      const password = passwordInput.value;

      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (email === "") {
        document.getElementById('err-email').innerText = "Email tidak boleh kosong.";
        document.getElementById('err-email').classList.remove('hidden');
        isValid = false;
      } else if (!emailRegex.test(email)) {
        document.getElementById('err-email').innerText = "Format email tidak valid.";
        document.getElementById('err-email').classList.remove('hidden');
        isValid = false;
      }

      if (password === "") {
        document.getElementById('err-pass').innerText = "Kata sandi tidak boleh kosong.";
        document.getElementById('err-pass').classList.remove('hidden');
        isValid = false;
      }

      if (isValid) {
        window.location.href = this.action;
      }
    });
  </script>

</body>
</html>