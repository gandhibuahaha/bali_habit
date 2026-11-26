<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pemulihan Sandi Admin - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-[#F8FAFC] text-slate-800 font-sans antialiased min-h-screen flex flex-col justify-between relative selection:bg-emerald-100 selection:text-[#10B981]">

  <!-- ================= HEADER ATAS ================= -->
  <header class="w-full py-5 px-8 bg-white border-b border-slate-100 flex items-center justify-between">
    <!-- Kiri: Logo & Admin Portal -->
    <a href="{{ url('/') }}" class="flex items-center gap-2.5 hover:opacity-80 transition">
      <div class="w-8 h-8 bg-emerald-50 rounded-full flex items-center justify-center border border-emerald-100 overflow-hidden p-0.5">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo BaliHabit" class="w-full h-full rounded-full object-cover" onerror="this.src='https://ui-avatars.com/api/?name=B+H&color=10B981&background=ecfdf5'"/>
      </div>
      <div class="flex flex-col">
        <span class="text-base font-extrabold tracking-tight text-[#0F172A] leading-none">Bali<span class="text-[#10B981]">Habit</span></span>
        <span class="text-[9px] font-bold text-slate-400 tracking-wider mt-0.5 uppercase">Admin Portal</span>
      </div>
    </a>
  </header>

  <!-- ================= TOMBOL KEMBALI (DI BAWAH NAVBAR, KIRI) ================= -->
  <div class="w-full px-8 pt-5 z-20 relative">
    <a href="{{ url('/admin/login') }}" id="topBackBtn" class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-[#10B981] transition cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
      </svg>
      Kembali ke Masuk Admin
    </a>
  </div>

  <!-- ================= CONTAINER UTAMA KARTU TENGAH ADMIN ================= -->
  <main class="flex-1 w-full max-w-[480px] mx-auto bg-white border border-slate-100 rounded-[2.5rem] shadow-[0_10px_40px_-10px_rgba(0,0,0,0.06)] p-6 sm:p-10 my-10 flex flex-col justify-center relative">
    
    <div class="w-full max-w-sm mx-auto">
      
      <!-- ================= STEP 1: INPUT EMAIL ADMIN ================= -->
      <div id="step1" class="block">
        
        <div class="flex flex-col items-center justify-center mb-6 text-center">
          <div class="w-14 h-14 bg-emerald-50 text-[#10B981] rounded-full flex items-center justify-center mx-auto mb-3 border border-emerald-100 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>
          </div>
          <h1 class="text-2xl font-extrabold text-[#1E293B] tracking-tight mb-1">Pemulihan Sandi Admin</h1>
          <p class="text-[13px] text-slate-500 font-medium px-2 leading-relaxed">
            Masukkan email resmi administrator Anda untuk menerima kode verifikasi OTP.
          </p>
        </div>

        <div class="bg-amber-50 border border-amber-200/60 rounded-2xl p-3.5 mb-5 flex items-start gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
          </svg>
          <p class="text-[11.5px] text-amber-800 font-medium leading-normal">
            Demi keamanan panel, kode OTP pemulihan admin hanya berlaku selama <span class="font-bold">10 menit</span>.
          </p>
        </div>
        
        <form id="emailForm">
          @csrf
          <div class="mb-4">
            <label class="block text-[11px] font-bold text-[#1E293B] mb-1">Email Administrator</label>
            <div class="flex items-center bg-slate-50 rounded-xl px-3.5 py-2.5 border border-slate-200 focus-within:border-[#10B981] focus-within:bg-white transition">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-slate-400 flex-shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
              </svg>
              <input type="email" id="emailInput" name="email" placeholder="admin@balihabit.id" class="bg-transparent w-full outline-none text-xs md:text-sm text-[#1E293B] ml-2.5 placeholder:text-slate-400">
            </div>
            <p id="err-email" class="error-msg hidden text-red-500 text-[10px] mt-1 font-medium"></p>
          </div>

          <button type="submit" class="w-full bg-[#10B981] text-white font-bold py-3.5 rounded-xl hover:bg-[#059669] transition shadow-sm text-sm cursor-pointer">
            Kirim Kode OTP Admin
          </button>
        </form>
      </div>

      <!-- ================= STEP 2: MASUKKAN KODE OTP ================= -->
      <div id="step2" class="hidden flex-col">
        <div class="flex flex-col items-center justify-center mb-6 text-center">
          <div class="w-14 h-14 bg-emerald-50 text-[#10B981] rounded-full flex items-center justify-center mx-auto mb-3 border border-emerald-100 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
            </svg>
          </div>
          <h2 class="text-2xl font-extrabold text-[#1E293B] tracking-tight mb-1">Verifikasi OTP Admin</h2>
          <p class="text-[13px] text-slate-500 font-medium px-2 leading-relaxed">
            Masukkan 6 digit kode pengamanan yang dikirim ke <span id="sentEmailTarget" class="font-bold text-[#1E293B]"></span>
          </p>
        </div>

        <form id="otpForm">
          @csrf
          <div class="flex justify-between gap-2 mb-6">
            <input type="text" name="otp[]" maxlength="1" class="otp-input w-12 h-12 text-center text-lg font-bold bg-slate-50 border border-slate-200 rounded-xl focus:border-[#10B981] focus:bg-white outline-none transition" />
            <input type="text" name="otp[]" maxlength="1" class="otp-input w-12 h-12 text-center text-lg font-bold bg-slate-50 border border-slate-200 rounded-xl focus:border-[#10B981] focus:bg-white outline-none transition" />
            <input type="text" name="otp[]" maxlength="1" class="otp-input w-12 h-12 text-center text-lg font-bold bg-slate-50 border border-slate-200 rounded-xl focus:border-[#10B981] focus:bg-white outline-none transition" />
            <input type="text" name="otp[]" maxlength="1" class="otp-input w-12 h-12 text-center text-lg font-bold bg-slate-50 border border-slate-200 rounded-xl focus:border-[#10B981] focus:bg-white outline-none transition" />
            <input type="text" name="otp[]" maxlength="1" class="otp-input w-12 h-12 text-center text-lg font-bold bg-slate-50 border border-slate-200 rounded-xl focus:border-[#10B981] focus:bg-white outline-none transition" />
            <input type="text" name="otp[]" maxlength="1" class="otp-input w-12 h-12 text-center text-lg font-bold bg-slate-50 border border-slate-200 rounded-xl focus:border-[#10B981] focus:bg-white outline-none transition" />
          </div>
          <p id="err-otp" class="error-msg hidden text-red-500 text-[10px] text-center mb-4 font-medium"></p>

          <button type="submit" class="w-full bg-[#10B981] text-white font-bold py-3.5 rounded-xl hover:bg-[#059669] transition shadow-sm text-sm cursor-pointer mb-4">
            Verifikasi Kode
          </button>
        </form>

        <div class="text-center">
          <p class="text-xs text-slate-500 mb-1">Belum menerima kode?</p>
          <button type="button" id="resendOtpBtn" disabled class="text-xs font-bold text-slate-400 cursor-not-allowed transition">
            Kirim Ulang OTP (<span id="timerCountdown">60</span>s)
          </button>
        </div>
      </div>

      <!-- ================= STEP 3: BUAT KATA SANDI BARU ================= -->
      <div id="step3" class="hidden flex-col">
        <div class="flex flex-col items-center justify-center mb-6 text-center">
          <div class="w-14 h-14 bg-emerald-50 text-[#10B981] rounded-full flex items-center justify-center mx-auto mb-3 border border-emerald-100 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
            </svg>
          </div>
          <h2 class="text-2xl font-extrabold text-[#1E293B] tracking-tight mb-1">Sandi Baru Admin</h2>
          <p class="text-[13px] text-slate-500 font-medium px-2 leading-relaxed">
            Buat kata sandi pengamanan baru yang kuat untuk akses panel administrator
          </p>
        </div>

        <form id="newPasswordForm">
          @csrf
          <!-- Password Baru -->
          <div class="mb-4">
            <label class="block text-[11px] font-bold text-[#1E293B] mb-1">Kata Sandi Baru</label>
            <div class="flex items-center justify-between bg-slate-50 rounded-xl px-3.5 py-2.5 border border-slate-200 focus-within:border-[#10B981] focus-within:bg-white transition">
              <div class="flex items-center w-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-slate-400 flex-shrink-0">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
                <input type="password" id="newPass" name="password" placeholder="••••••••" class="bg-transparent w-full outline-none text-xs md:text-sm text-[#1E293B] ml-2.5 tracking-widest placeholder:text-slate-400 pr-2">
              </div>
              <button type="button" id="toggleNewPass" class="text-slate-400 hover:text-[#10B981] transition focus:outline-none flex-shrink-0 cursor-pointer">
                <svg id="eyeIconNew" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              </button>
            </div>
          </div>

          <!-- Konfirmasi Password Baru -->
          <div class="mb-5">
            <label class="block text-[11px] font-bold text-[#1E293B] mb-1">Konfirmasi Kata Sandi Baru</label>
            <div class="flex items-center justify-between bg-slate-50 rounded-xl px-3.5 py-2.5 border border-slate-200 focus-within:border-[#10B981] focus-within:bg-white transition">
              <div class="flex items-center w-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-slate-400 flex-shrink-0">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                </svg>
                <input type="password" id="confirmPass" name="password_confirmation" placeholder="••••••••" class="bg-transparent w-full outline-none text-xs md:text-sm text-[#1E293B] ml-2.5 tracking-widest placeholder:text-slate-400 pr-2">
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
            Simpan Kata Sandi Admin
          </button>
        </form>
      </div>

    </div>

  </main>

  <!-- ================= FOOTER BAWAH ================= -->
  <footer class="w-full py-6 px-8 bg-white border-t border-slate-100 flex items-center justify-center text-[13px] text-slate-500">
    <p>© 2026 <strong>BaliHabit</strong></p>
  </footer>

  <!-- ================= SCRIPT JAVASCRIPT ================= -->
  <script>
    let currentStep = 1;
    let countdownInterval;
    const adminLoginUrl = "{{ url('/admin/login') }}";

    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const step3 = document.getElementById('step3');
    const sentEmailTarget = document.getElementById('sentEmailTarget');
    const topBackBtn = document.getElementById('topBackBtn');

    // Menyesuaikan tombol kembali berdasarkan step
    function updateBackButton() {
      if (currentStep > 1) {
        topBackBtn.onclick = (e) => {
          e.preventDefault();
          goToStep(currentStep - 1);
        };
        topBackBtn.innerHTML = `
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
          </svg>
          Kembali
        `;
      } else {
        topBackBtn.href = adminLoginUrl;
        topBackBtn.onclick = null;
        topBackBtn.innerHTML = `
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
          </svg>
          Kembali ke Masuk Admin
        `;
      }
    }

    function goToStep(step) {
      currentStep = step;
      step1.classList.add('hidden');
      step1.classList.remove('flex');
      step2.classList.add('hidden');
      step2.classList.remove('flex');
      step3.classList.add('hidden');
      step3.classList.remove('flex');

      if (step === 1) {
        step1.classList.remove('hidden');
        step1.classList.add('flex');
      } else if (step === 2) {
        step2.classList.remove('hidden');
        step2.classList.add('flex');
        startOtpTimer();
      } else if (step === 3) {
        step3.classList.remove('hidden');
        step3.classList.add('flex');
      }
      updateBackButton();
    }

    // STEP 1: SUBMIT EMAIL
    document.getElementById('emailForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const emailVal = document.getElementById('emailInput').value.trim();
      const errEmail = document.getElementById('err-email');
      errEmail.classList.add('hidden');

      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (emailVal === "") {
        errEmail.innerText = "Email admin tidak boleh kosong.";
        errEmail.classList.remove('hidden');
        return;
      } else if (!emailRegex.test(emailVal)) {
        errEmail.innerText = "Format email tidak valid.";
        errEmail.classList.remove('hidden');
        return;
      }

      sentEmailTarget.innerText = emailVal;
      goToStep(2);
    });

    // STEP 2: OTP FOCUS HANDLER
    const otpInputs = document.querySelectorAll('.otp-input');
    otpInputs.forEach((input, index) => {
      input.addEventListener('input', (e) => {
        const val = e.target.value;
        if (val && index < otpInputs.length - 1) {
          otpInputs[index + 1].focus();
        }
      });
      input.addEventListener('keydown', (e) => {
        if (e.key === 'Backspace' && !input.value && index > 0) {
          otpInputs[index - 1].focus();
        }
      });
    });

    function startOtpTimer() {
      let timeLeft = 60;
      const resendBtn = document.getElementById('resendOtpBtn');
      const timerSpan = document.getElementById('timerCountdown');
      
      resendBtn.disabled = true;
      resendBtn.classList.add('text-slate-400', 'cursor-not-allowed');
      resendBtn.classList.remove('text-[#10B981]', 'hover:underline', 'cursor-pointer');

      clearInterval(countdownInterval);
      countdownInterval = setInterval(() => {
        timeLeft--;
        timerSpan.innerText = timeLeft;
        if (timeLeft <= 0) {
          clearInterval(countdownInterval);
          resendBtn.disabled = false;
          resendBtn.classList.remove('text-slate-400', 'cursor-not-allowed');
          resendBtn.classList.add('text-[#10B981]', 'hover:underline', 'cursor-pointer');
          resendBtn.innerHTML = "Kirim Ulang OTP";
        }
      }, 1000);
    }

    document.getElementById('resendOtpBtn').addEventListener('click', function() {
      if(!this.disabled) {
        startOtpTimer();
        alert("Kode OTP admin baru telah dikirim ulang!");
      }
    });

    document.getElementById('otpForm').addEventListener('submit', function(e) {
      e.preventDefault();
      let otpCode = "";
      otpInputs.forEach(input => otpCode += input.value);

      const errOtp = document.getElementById('err-otp');
      if (otpCode.length < 6) {
        errOtp.innerText = "Masukkan 6 digit kode OTP secara lengkap.";
        errOtp.classList.remove('hidden');
        return;
      }

      errOtp.classList.add('hidden');
      goToStep(3);
    });

    // STEP 3: TOGGLE PASSWORD
    const toggleNewPass = document.getElementById('toggleNewPass');
    const newPassInput = document.getElementById('newPass');
    const eyeIconNew = document.getElementById('eyeIconNew');

    toggleNewPass.addEventListener('click', function () {
      const isPassword = newPassInput.getAttribute('type') === 'password';
      newPassInput.setAttribute('type', isPassword ? 'text' : 'password');
      
      if (isPassword) {
        eyeIconNew.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
        `;
      } else {
        eyeIconNew.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        `;
      }
    });

    const toggleConfirmPass = document.getElementById('toggleConfirmPass');
    const confirmPassInput = document.getElementById('confirmPass');
    const eyeIconConfirm = document.getElementById('eyeIconConfirm');

    toggleConfirmPass.addEventListener('click', function () {
      const isPassword = confirmPassInput.getAttribute('type') === 'password';
      confirmPassInput.setAttribute('type', isPassword ? 'text' : 'password');
      
      if (isPassword) {
        eyeIconConfirm.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
        `;
      } else {
        eyeIconConfirm.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        `;
      }
    });

    document.getElementById('newPasswordForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const newPass = newPassInput.value;
      const confirmPass = confirmPassInput.value;
      const errPass = document.getElementById('err-pass');
      
      errPass.classList.add('hidden');

      if (newPass === "" || confirmPass === "") {
        errPass.innerText = "Kata sandi tidak boleh kosong.";
        errPass.classList.remove('hidden');
        return;
      }
      // Sama dengan Profil Admin dan server: minimal 8 karakter
      if (newPass.length < 8) {
        errPass.innerText = "Kata sandi minimal harus 8 karakter.";
        errPass.classList.remove('hidden');
        return;
      }
      if (newPass !== confirmPass) {
        errPass.innerText = "Konfirmasi kata sandi tidak cocok.";
        errPass.classList.remove('hidden');
        return;
      }

      alert("Kata sandi admin berhasil diubah! Silakan masuk kembali ke Portal Admin.");
      window.location.href = adminLoginUrl;
    });
  </script>

</body>
</html>