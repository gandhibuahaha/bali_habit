<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pemulihan Kata Sandi - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-[#F8F7F4] text-[#1F2937] min-h-screen flex items-center justify-center p-4 md:p-8 relative">

  <!-- ================= TOMBOL KEMBALI (KHUSUS MOBILE) ================= -->
  <a href="{{ url('/login') }}" id="mobileBackBtn" class="md:hidden absolute top-6 left-4 flex items-center gap-2 text-slate-500 hover:text-[#10B981] transition font-semibold text-sm cursor-pointer bg-white px-4 py-2 rounded-full shadow-sm border border-gray-100 z-50">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
      <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
    </svg>
    Kembali
  </a>

  <!-- ================= CONTAINER UTAMA ================= -->
  <main class="w-full max-w-5xl flex flex-col md:flex-row bg-transparent md:bg-white rounded-none md:rounded-[2.5rem] shadow-none md:shadow-2xl overflow-hidden mt-16 md:mt-0 z-10 md:max-h-[92vh]">
    
    <!-- ================= BAGIAN KIRI: ILUSTRASI (DESKTOP SAJA) ================= -->
    <div class="hidden md:flex w-1/2 bg-gradient-to-br from-[#10B981] to-[#059669] p-10 lg:p-14 flex-col justify-center relative">
      <div class="w-16 h-16 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center text-3xl mb-10 border border-white/20 shadow-inner">
        🔒
      </div>
      <h2 class="text-4xl lg:text-5xl font-extrabold text-white mb-6 leading-tight tracking-tight">Pemulihan<br>Akun</h2>
      <p class="text-white/90 text-sm lg:text-base leading-relaxed max-w-sm">
        Keamanan akun Anda adalah prioritas kami. Ikuti langkah-langkah verifikasi untuk mengatur ulang kata sandi Anda.
      </p>
    </div>

    <!-- ================= BAGIAN KANAN: KONTEN DINAMIS (STEP 1, 2, 3) ================= -->
    <div class="w-full md:w-1/2 flex flex-col bg-white rounded-[2.5rem] md:rounded-none shadow-sm md:shadow-none p-6 md:p-8 lg:p-12 border border-gray-100 md:border-none md:overflow-y-auto custom-scrollbar">
      
      <!-- ================= TOMBOL KEMBALI (KHUSUS DESKTOP) ================= -->
      <a href="{{ url('/login') }}" id="desktopBackBtn" class="hidden md:flex items-center gap-2 text-slate-500 hover:text-[#10B981] transition font-semibold text-sm cursor-pointer mb-8 w-fit">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
        Kembali ke sebelumnya
      </a>

      <!-- KOTAK TENGAH -->
      <div class="w-full max-w-sm mx-auto my-auto">
        
        <!-- Logo Mobile -->
        <div class="md:hidden flex flex-col items-center justify-center mb-6">
          <div class="w-14 h-14 bg-emerald-50 rounded-full flex items-center justify-center mx-auto mb-3 shadow-inner border border-emerald-100 overflow-hidden p-0.5">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo BaliHabit" class="w-full h-full rounded-full object-cover" onerror="this.src='https://ui-avatars.com/api/?name=B+H&color=10B981&background=ecfdf5'"/>
          </div>
          <h1 class="text-2xl font-extrabold text-[#1F2937] tracking-tight mb-1">
            Bali<span class="text-[#10B981]">Habit</span>
          </h1>
        </div>

        <!-- ================= STEP 1: INPUT EMAIL ================= -->
        <div id="step1" class="block">
          <div class="flex flex-col items-center justify-center mb-6 md:mb-8 text-center">
            <div class="w-14 h-14 bg-orange-50 text-[#F97316] rounded-full flex items-center justify-center mx-auto mb-4 border border-orange-100">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 13.5v-1m0 0h-1m1 0h1m-1-2.5a2.5 2.5 0 100 5 2.5 2.5 0 000-5z" />
              </svg>
            </div>
            <h2 class="text-2xl font-extrabold text-[#1F2937] tracking-tight mb-2">Lupa Kata Sandi</h2>
            <p class="text-[13px] text-slate-500 font-medium px-2 leading-relaxed">
              Masukkan email Anda, kami akan mengirimkan kode OTP untuk verifikasi
            </p>
          </div>
          
          <form id="emailForm" method="POST">
            @csrf
            <div class="mb-5">
              <label class="block text-[11px] font-bold text-[#1F2937] mb-1">Email</label>
              <div class="flex items-center bg-[#F6F5F2] rounded-xl px-3.5 py-2.5 border border-transparent focus-within:border-[#10B981] focus-within:bg-white transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-slate-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>
                <input type="email" id="emailInput" name="email" placeholder="email@example.com" class="bg-transparent w-full outline-none text-xs md:text-sm text-[#1F2937] ml-2.5 placeholder:text-slate-400">
              </div>
              <p id="err-email" class="error-msg hidden text-red-500 text-[10px] mt-1 font-medium"></p>
            </div>

            <button type="submit" class="w-full bg-[#10B981] text-white font-bold py-3.5 rounded-xl hover:bg-[#059669] transition shadow-sm text-sm cursor-pointer">
              Kirim Kode OTP
            </button>
          </form>
        </div>

        <!-- ================= STEP 2: MASUKKAN KODE OTP ================= -->
        <div id="step2" class="hidden flex-col">
          <div class="flex flex-col items-center justify-center mb-6 text-center">
            <div class="w-14 h-14 bg-emerald-50 text-[#10B981] rounded-full flex items-center justify-center mx-auto mb-4 border border-emerald-100">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
              </svg>
            </div>
            <h2 class="text-2xl font-extrabold text-[#1F2937] tracking-tight mb-2">Verifikasi OTP</h2>
            <p class="text-[13px] text-slate-500 font-medium px-2 leading-relaxed">
              Masukkan 6 digit kode yang telah dikirimkan ke <span id="sentEmailTarget" class="font-bold text-[#1F2937]"></span>
            </p>
          </div>

          <form id="otpForm" method="POST">
            @csrf
            <!-- Kotak Input OTP -->
            <div class="flex justify-between gap-2 mb-6">
              <input type="text" maxlength="1" class="otp-input w-12 h-12 text-center text-lg font-bold bg-[#F6F5F2] border border-transparent rounded-xl focus:border-[#10B981] focus:bg-white outline-none transition" />
              <input type="text" maxlength="1" class="otp-input w-12 h-12 text-center text-lg font-bold bg-[#F6F5F2] border border-transparent rounded-xl focus:border-[#10B981] focus:bg-white outline-none transition" />
              <input type="text" maxlength="1" class="otp-input w-12 h-12 text-center text-lg font-bold bg-[#F6F5F2] border border-transparent rounded-xl focus:border-[#10B981] focus:bg-white outline-none transition" />
              <input type="text" maxlength="1" class="otp-input w-12 h-12 text-center text-lg font-bold bg-[#F6F5F2] border border-transparent rounded-xl focus:border-[#10B981] focus:bg-white outline-none transition" />
              <input type="text" maxlength="1" class="otp-input w-12 h-12 text-center text-lg font-bold bg-[#F6F5F2] border border-transparent rounded-xl focus:border-[#10B981] focus:bg-white outline-none transition" />
              <input type="text" maxlength="1" class="otp-input w-12 h-12 text-center text-lg font-bold bg-[#F6F5F2] border border-transparent rounded-xl focus:border-[#10B981] focus:bg-white outline-none transition" />
            </div>
            <p id="err-otp" class="error-msg hidden text-red-500 text-[10px] text-center mb-4 font-medium"></p>

            <button type="submit" class="w-full bg-[#10B981] text-white font-bold py-3.5 rounded-xl hover:bg-[#059669] transition shadow-sm text-sm cursor-pointer mb-4">
              Verifikasi Kode
            </button>
          </form>

          <!-- Kirim Ulang OTP dengan Timer -->
          <div class="text-center">
            <p class="text-xs text-slate-500 mb-1">Tidak menerima kode?</p>
            <button type="button" id="resendOtpBtn" disabled class="text-xs font-bold text-slate-400 cursor-not-allowed transition">
              Kirim Ulang OTP (<span id="timerCountdown">60</span>s)
            </button>
          </div>
        </div>

        <!-- ================= STEP 3: BUAT KATA SANDI BARU ================= -->
        <div id="step3" class="hidden flex-col">
          <div class="flex flex-col items-center justify-center mb-6 text-center">
            <div class="w-14 h-14 bg-emerald-50 text-[#10B981] rounded-full flex items-center justify-center mx-auto mb-4 border border-emerald-100">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
              </svg>
            </div>
            <h2 class="text-2xl font-extrabold text-[#1F2937] tracking-tight mb-2">Kata Sandi Baru</h2>
            <p class="text-[13px] text-slate-500 font-medium px-2 leading-relaxed">
              Buat kata sandi baru yang kuat untuk akun BaliHabit Anda
            </p>
          </div>

          <form id="newPasswordForm" method="POST">
            @csrf
            <!-- Password Baru dengan Toggle Mata -->
            <div class="mb-4">
              <label class="block text-[11px] font-bold text-[#1F2937] mb-1">Kata Sandi Baru</label>
              <div class="flex items-center justify-between bg-[#F6F5F2] rounded-xl px-3.5 py-2.5 border border-transparent focus-within:border-[#10B981] focus-within:bg-white transition group-new">
                <div class="flex items-center w-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-slate-400 flex-shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                  </svg>
                  <input type="password" id="newPass" name="password" placeholder="••••••••" class="bg-transparent w-full outline-none text-xs md:text-sm text-[#1F2937] ml-2.5 tracking-widest placeholder:text-slate-400 pr-2">
                </div>
                <button type="button" id="toggleNewPass" class="text-slate-400 hover:text-[#10B981] transition focus:outline-none flex-shrink-0 cursor-pointer">
                  <svg id="eyeIconNew" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </button>
              </div>
            </div>

            <!-- Konfirmasi Password Baru dengan Toggle Mata -->
            <div class="mb-5">
              <label class="block text-[11px] font-bold text-[#1F2937] mb-1">Konfirmasi Kata Sandi Baru</label>
              <div class="flex items-center justify-between bg-[#F6F5F2] rounded-xl px-3.5 py-2.5 border border-transparent focus-within:border-[#10B981] focus-within:bg-white transition group-confirm">
                <div class="flex items-center w-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-slate-400 flex-shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                  </svg>
                  <input type="password" id="confirmPass" name="password_confirmation" placeholder="••••••••" class="bg-transparent w-full outline-none text-xs md:text-sm text-[#1F2937] ml-2.5 tracking-widest placeholder:text-slate-400 pr-2">
                </div>
                <button type="button" id="toggleConfirmPass" class="text-slate-400 hover:text-[#10B981] transition focus:outline-none flex-shrink-0 cursor-pointer">
                  <svg id="eyeIconConfirm" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </button>
              </div>
              <p id="err-pass" class="error-msg hidden text-red-500 text-[10px] mt-1 font-medium"></p>
            </div>

            <button type="submit" class="w-full bg-[#10B981] text-white font-bold py-3.5 rounded-xl hover:bg-[#059669] transition shadow-sm text-sm cursor-pointer">
              Simpan Kata Sandi Baru
            </button>
          </form>
        </div>

      </div>

       <!-- ================= FOOTER UTAMA ================= -->
      <footer class="bg-gray-50/50 pt-10 pb-16 mt-auto border-t border-gray-100">
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

    </div>
  </main>

  <script src="{{ asset('assets/js/lupa_sandi.js') }}"></script>
</body>
</html>