let currentStep = 1;
let countdownInterval;

const step1 = document.getElementById('step1');
const step2 = document.getElementById('step2');
const step3 = document.getElementById('step3');
const sentEmailTarget = document.getElementById('sentEmailTarget');
const desktopBackBtn = document.getElementById('desktopBackBtn');
const mobileBackBtn = document.getElementById('mobileBackBtn');

// --- FUNGSI KEMBALI DINAMIS (SUDAH DISESUAIKAN DENGAN RUTE LARAVEL) ---
function kembaliKeHalamanAsal(e) {
  if (e) e.preventDefault(); // Mencegah href="#" scroll ke atas

  const referrer = document.referrer;
  if (referrer && referrer.includes('/ubah-sandi')) {
    window.location.href = '/ubah-sandi';
  } else if (referrer && referrer.includes('/login')) {
    window.location.href = '/login';
  } else if (window.history.length > 1) {
    window.history.back();
  } else {
    window.location.href = '/login'; // Default jika asal tidak diketahui
  }
}

// Fungsi Pengatur Tombol Kembali (Berdasarkan Step)
function updateBackButton() {
  if (currentStep > 1) {
    // Jika sedang di step 2 atau 3, tombol kembali akan mundur 1 step
    desktopBackBtn.onclick = (e) => { e.preventDefault(); goToStep(currentStep - 1); };
    mobileBackBtn.onclick = (e) => { e.preventDefault(); goToStep(currentStep - 1); };
  } else {
    // Jika di step 1, tombol kembali akan kembali ke halaman sebelumnya (dinamis)
    desktopBackBtn.onclick = kembaliKeHalamanAsal;
    mobileBackBtn.onclick = kembaliKeHalamanAsal;
  }
}

// Panggil sekali di awal agar tombol memiliki fungsi klik saat halaman pertama dimuat
updateBackButton();

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

// --- STEP 1: SUBMIT EMAIL ---
document.getElementById('emailForm').addEventListener('submit', function(e) {
  e.preventDefault();
  const emailVal = document.getElementById('emailInput').value.trim();
  const errEmail = document.getElementById('err-email');
  errEmail.classList.add('hidden');

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (emailVal === "") {
    errEmail.innerText = "Email tidak boleh kosong.";
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

// --- STEP 2: OTOMATIS PINDAH FOKUS KOTAK OTP ---
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

// Timer Hitung Mundur OTP (60 Detik)
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
    alert("Kode OTP baru telah dikirim ulang!");
  }
});

// Submit OTP
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

// --- TOGGLE TAMPIL/SEMBUNYI KATA SANDI (STEP 3) ---
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

// --- STEP 3: SUBMIT PASSWORD BARU ---
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
  // Sama dengan Registrasi, Ubah Sandi dan server: minimal 8 karakter
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

  alert("Kata sandi berhasil diubah! Silakan masuk kembali.");
  window.location.href = "/login";
});