<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Portal Admin - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-[#F8FAFC] text-slate-800 font-sans antialiased min-h-screen flex flex-col justify-between selection:bg-emerald-100 selection:text-[#10B981] relative">

  <!-- ================= DEKORASI LATAR BELAKANG (SOFT LIGHT) ================= -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
    <div class="absolute top-[-10%] right-[-5%] w-[500px] h-[500px] bg-emerald-200/30 rounded-full mix-blend-multiply filter blur-[100px]"></div>
    <div class="absolute bottom-[-10%] left-[-10%] w-[600px] h-[600px] bg-slate-200/50 rounded-full mix-blend-multiply filter blur-[120px]"></div>
  </div>

  <!-- ================= HEADER ATAS ================= -->
  <header class="w-full py-5 px-8 bg-white/80 backdrop-blur-md border-b border-slate-100 flex items-center justify-between z-10 relative">
    <!-- Kiri: Logo & Admin Portal -->
    <a href="{{ url('/') }}" class="flex items-center gap-2.5 hover:opacity-80 transition">
      <div class="w-8 h-8 bg-emerald-50 rounded-full flex items-center justify-center border border-emerald-100 overflow-hidden p-0.5">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo BaliHabit" class="w-full h-full rounded-full object-cover">
      </div>
      <div class="flex flex-col">
        <span class="text-base font-extrabold tracking-tight text-[#0F172A] leading-none">Bali<span class="text-[#10B981]">Habit</span></span>
        <span class="text-[9px] font-bold text-slate-400 tracking-wider mt-0.5 uppercase">Admin Portal</span>
      </div>
    </a>
  </header>

  <!-- ================= TOMBOL KEMBALI (DI BAWAH NAVBAR, KIRI) ================= -->
  <div class="w-full px-8 pt-5 z-20 relative">
    <a href="{{ url('/') }}" id="btnKembaliDinamis" class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-[#10B981] transition cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
      </svg>
      <span id="textKembaliDinamis">Kembali ke Halaman Sebelumnya</span>
    </a>
  </div>

  <!-- ================= KONTEN UTAMA (KARTU LOGIN SPLIT) ================= -->
  <main class="flex-1 flex flex-col items-center justify-center px-4 py-6 md:py-10 z-10 relative">
    
    <!-- Container Split Layout -->
    <div class="w-full max-w-[900px] bg-white rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] flex flex-col md:flex-row overflow-hidden border border-slate-100">
      
      <!-- Kolom Kiri: Branding Emerald -->
      <div class="hidden md:flex md:w-[45%] bg-gradient-to-br from-[#10B981] to-[#047857] p-10 flex-col justify-between relative overflow-hidden text-white">
        <!-- Ornamen SVG Latar -->
        <svg class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none" viewBox="0 0 100 100" preserveAspectRatio="none">
          <path d="M0,100 C30,80 70,120 100,60 L100,0 L0,0 Z" fill="currentColor"></path>
        </svg>
        <div class="absolute -bottom-20 -right-20 w-64 h-64 border-[30px] border-white/10 rounded-full"></div>

        <div class="relative z-10">
          <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center border border-white/30 overflow-hidden p-1.5 mb-8 shadow-lg">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-full h-full rounded-xl object-cover">
          </div>
          <h2 class="text-[28px] font-extrabold tracking-tight leading-[1.2] mb-4">
            Kelola Ekosistem <br>
            BaliHabit.
          </h2>
          <p class="text-emerald-100 text-[13.5px] leading-relaxed font-medium">
            Portal otentikasi eksklusif bagi administrator untuk mengelola data, memantau aktivitas, dan memperbarui konten cerita anak secara terpusat.
          </p>
        </div>

        <div class="relative z-10 mt-12 flex items-center gap-3 bg-black/10 backdrop-blur-md px-4 py-3 rounded-xl border border-white/10 w-max">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-emerald-200">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
          </svg>
          <span class="text-[11px] font-bold text-emerald-100 uppercase tracking-widest">Koneksi Terenkripsi</span>
        </div>
      </div>

      <!-- Kolom Kanan: Form Login -->
      <div class="w-full md:w-[55%] p-8 sm:p-12 flex flex-col justify-center bg-white relative">
        
        <!-- Logo Muncul di Mobile Saja -->
        <div class="md:hidden w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center border border-emerald-100 overflow-hidden p-1.5 mb-6 shadow-sm">
          <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-full h-full rounded-xl object-cover">
        </div>

        <h1 class="text-2xl font-extrabold text-[#0F172A] tracking-tight mb-2">Selamat Datang</h1>
        <p class="text-[13.5px] text-slate-500 mb-8 font-medium">Otentikasi kredensial administrator Anda.</p>

        <!-- Form Login -->
        <form id="loginAdminForm" action="{{ url('/admin/dashboard') }}" method="GET" class="w-full flex flex-col gap-5">
          @csrf
          
          <!-- Input Email Administrator -->
          <div>
            <label class="block text-[12px] font-bold text-[#1E293B] mb-2">
              Email Administrator <span class="text-red-500">*</span>
            </label>
            <div class="flex items-center bg-slate-50 rounded-xl px-4 py-3.5 border border-slate-200 focus-within:border-[#10B981] focus-within:bg-white focus-within:ring-4 focus-within:ring-[#10B981]/10 transition-all shadow-sm">
              <span class="text-slate-400 font-medium text-sm flex-shrink-0">@</span>
              <input 
                type="email" 
                id="email"
                name="email"
                placeholder="admin@balihabit.id"
                class="bg-transparent w-full outline-none text-[13.5px] text-[#0F172A] ml-3 placeholder:text-slate-400 font-medium"
              >
            </div>
            <!-- Pesan Error Email -->
            <p id="err-email" class="error-msg hidden text-red-500 text-[11px] font-bold mt-1.5"></p>
          </div>

          <!-- Input Kata Sandi -->
          <div>
            <label class="block text-[12px] font-bold text-[#1E293B] mb-2">
              Kata Sandi <span class="text-red-500">*</span>
            </label>
            <div class="flex items-center bg-slate-50 rounded-xl px-4 py-3.5 border border-slate-200 focus-within:border-[#10B981] focus-within:bg-white focus-within:ring-4 focus-within:ring-[#10B981]/10 transition-all shadow-sm">
              <!-- Ikon Gembok -->
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-slate-400 flex-shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
              </svg>
              
              <input 
                type="password" 
                id="password"
                name="password"
                placeholder="••••••••"
                class="bg-transparent w-full outline-none text-[13.5px] text-[#0F172A] ml-3 placeholder:text-slate-400 tracking-widest font-medium"
              >
              
              <!-- Ikon Mata (Tombol Toggle) -->
              <button type="button" id="togglePassword" class="text-slate-400 hover:text-[#10B981] transition focus:outline-none ml-2 cursor-pointer flex-shrink-0">
                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              </button>
            </div>
            <!-- Pesan Error Password -->
            <p id="err-pass" class="error-msg hidden text-red-500 text-[11px] font-bold mt-1.5"></p>
          </div>

          <!-- Ingat Sesi Saya & Lupa Sandi -->
          <div class="flex items-center justify-between mt-1 mb-3">
            <label class="flex items-center gap-2.5 cursor-pointer group">
              <div class="relative flex items-center justify-center">
                <input type="checkbox" id="remember" name="remember" class="peer sr-only" checked>
                <div class="w-4 h-4 rounded-[5px] bg-white border border-slate-300 group-hover:border-[#10B981] peer-checked:bg-[#10B981] peer-checked:border-[#10B981] transition-all"></div>
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute w-3 h-3 text-white opacity-0 peer-checked:opacity-100 pointer-events-none transition-opacity" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
              </div>
              <span class="text-[12.5px] font-medium text-slate-600">Ingat sesi saya</span>
            </label>
            <a href="{{ url('/admin/lupa-sandi') }}" class="text-[12.5px] font-bold text-[#10B981] hover:text-[#059669] hover:underline transition">Lupa Sandi?</a>
          </div>

          <!-- Tombol Aksi (Masuk ke Dashboard) -->
          <button type="submit" class="mt-1 w-full bg-[#10B981] hover:bg-[#059669] text-white py-3.5 px-4 rounded-xl font-bold text-[13.5px] shadow-[0_8px_20px_-8px_rgba(16,185,129,0.5)] transition-all flex items-center justify-center gap-2 cursor-pointer group">
            Masuk ke Portal Admin
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 group-hover:translate-x-1 transition-transform">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
            </svg>
          </button>

        </form>
      </div>

    </div>
  </main>

  <!-- ================= FOOTER BAWAH ================= -->
  <footer class="w-full py-6 px-8 bg-white border-t border-slate-100 flex items-center justify-center text-[13px] text-slate-500 z-10 relative mt-auto">
    <p>© 2026 <strong>BaliHabit</strong></p>
  </footer>

  <!-- ================= SCRIPT VALIDASI FORM & TOGGLE PASSWORD ================= -->
  <script>
    // LOGIKA TOMBOL KEMBALI DINAMIS
    (function () {
      const btnKembali = document.getElementById('btnKembaliDinamis');
      const textKembali = document.getElementById('textKembaliDinamis');
      const referrer = document.referrer;
      const homeUrl = "{{ url('/') }}";

      // Daftar halaman internal admin yang tidak dijadikan tujuan "kembali" setelah logout/lupa sandi
      const isFromAdminInternal = referrer && (
        referrer.includes('/admin/dashboard') ||
        referrer.includes('/admin/lupa-sandi') ||
        referrer.includes('/admin/login')
      );

      // Jika datang dari halaman publik/user
      if (referrer && !isFromAdminInternal) {
        btnKembali.href = referrer;

        // Sesuaikan label teks tombol secara dinamis sesuai halaman asal
        if (referrer === homeUrl || referrer === homeUrl + '/') {
          textKembali.textContent = 'Kembali ke Beranda Publik';
        } else if (referrer.includes('/dashboard')) {
          textKembali.textContent = 'Kembali ke Beranda Orang Tua';
        } else if (referrer.includes('/profil-orangtua')) {
          textKembali.textContent = 'Kembali ke Profil Saya';
        } else if (referrer.includes('/edit-profil')) {
          textKembali.textContent = 'Kembali ke Edit Profil';
        } else if (referrer.includes('/bantuan')) {
          textKembali.textContent = 'Kembali ke Pusat Bantuan';
        } else if (referrer.includes('/halaman-anak')) {
          textKembali.textContent = 'Kembali ke Profil Anak';
        } else {
          textKembali.textContent = 'Kembali ke Halaman Sebelumnya';
        }
      } else {
        // Fallback jika dibuka langsung di tab baru atau setelah logout dari dashboard admin
        btnKembali.href = homeUrl;
        textKembali.textContent = 'Kembali ke Beranda Publik';
      }

      btnKembali.addEventListener('click', function (e) {
        if (referrer && !isFromAdminInternal && window.history.length > 1) {
          e.preventDefault();
          window.history.back();
        }
      });
    })();

    // FUNGSI LIHAT/SEMBUNYIKAN PASSWORD DAN UBAH IKON
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

    // FUNGSI VALIDASI FORM
    document.getElementById('loginAdminForm').addEventListener('submit', function(e) {
      e.preventDefault();
      let isValid = true;

      document.querySelectorAll('.error-msg').forEach(function(el) {
        el.classList.add('hidden');
      });

      const email = document.getElementById('email').value.trim();
      const password = passwordInput.value;

      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (email === "") {
        document.getElementById('err-email').innerText = "Email administrator wajib diisi.";
        document.getElementById('err-email').classList.remove('hidden');
        isValid = false;
      } else if (!emailRegex.test(email)) {
        document.getElementById('err-email').innerText = "Format email tidak valid.";
        document.getElementById('err-email').classList.remove('hidden');
        isValid = false;
      }

      if (password === "") {
        document.getElementById('err-pass').innerText = "Kata sandi wajib diisi.";
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