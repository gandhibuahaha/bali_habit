// --- 1. LOGIKA TOGGLE PASSWORD (SPY EYE) ---
function setupTogglePassword(toggleBtnId, inputId, iconId) {
  const toggleBtn = document.getElementById(toggleBtnId);
  const passwordInput = document.getElementById(inputId);
  const eyeIcon = document.getElementById(iconId);

  if (toggleBtn && passwordInput && eyeIcon) {
    toggleBtn.addEventListener('click', function () {
      const isPassword = passwordInput.getAttribute('type') === 'password';
      passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
      
      if (isPassword) {
        // SVG Mata Dicoret (Hidden)
        eyeIcon.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
        `;
      } else {
        // SVG Mata Terbuka (Visible)
        eyeIcon.innerHTML = `
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        `;
      }
    });
  }
}

// Terapkan ke ketiga input password
setupTogglePassword('togglePassword1', 'current_password', 'eyeIcon1');
setupTogglePassword('togglePassword2', 'new_password', 'eyeIcon2');
setupTogglePassword('togglePassword3', 'confirm_password', 'eyeIcon3');


// --- 2. DINAMIS KEKUATAN SANDI ---
const newPasswordInput = document.getElementById('new_password');
const strengthText = document.getElementById('strengthText');
const bar1 = document.getElementById('bar1');
const bar2 = document.getElementById('bar2');
const bar3 = document.getElementById('bar3');

if (newPasswordInput) {
  newPasswordInput.addEventListener('input', function() {
    const val = this.value;
    if (val.length === 0) {
      strengthText.innerText = "Belum diisi";
      strengthText.className = "text-[11px] sm:text-xs font-extrabold text-slate-400";
      bar1.className = "h-1.5 flex-1 bg-gray-200 rounded-full transition-all";
      bar2.className = "h-1.5 flex-1 bg-gray-200 rounded-full transition-all";
      bar3.className = "h-1.5 flex-1 bg-gray-200 rounded-full transition-all";
    } else if (val.length < 8) {
      strengthText.innerText = "Lemah (Minimal 8 karakter)";
      strengthText.className = "text-[11px] sm:text-xs font-extrabold text-red-500";
      bar1.className = "h-1.5 flex-1 bg-red-500 rounded-full transition-all";
      bar2.className = "h-1.5 flex-1 bg-gray-200 rounded-full transition-all";
      bar3.className = "h-1.5 flex-1 bg-gray-200 rounded-full transition-all";
    } else if (val.length < 12) {
      strengthText.innerText = "Sedang";
      strengthText.className = "text-[11px] sm:text-xs font-extrabold text-amber-500";
      bar1.className = "h-1.5 flex-1 bg-amber-500 rounded-full transition-all";
      bar2.className = "h-1.5 flex-1 bg-amber-500 rounded-full transition-all";
      bar3.className = "h-1.5 flex-1 bg-gray-200 rounded-full transition-all";
    } else {
      strengthText.innerText = "Kuat";
      strengthText.className = "text-[11px] sm:text-xs font-extrabold text-[#10B981]";
      bar1.className = "h-1.5 flex-1 bg-[#10B981] rounded-full transition-all";
      bar2.className = "h-1.5 flex-1 bg-[#10B981] rounded-full transition-all";
      bar3.className = "h-1.5 flex-1 bg-[#10B981] rounded-full transition-all";
    }
  });
}


// --- 3. VALIDASI FORM UTAMA ---
const formUbahSandi = document.getElementById('formUbahSandi');
if (formUbahSandi) {
  formUbahSandi.addEventListener('submit', function(e) {
    e.preventDefault(); 
    
    let isValid = true;
    document.querySelectorAll('.error-msg').forEach(el => el.classList.add('hidden'));

    const currentPass = document.getElementById('current_password').value;
    const newPass = document.getElementById('new_password').value;
    const confirmPass = document.getElementById('confirm_password').value;

    if (currentPass === "") {
      document.getElementById('err-current').innerText = "Kata sandi saat ini tidak boleh kosong.";
      document.getElementById('err-current').classList.remove('hidden');
      isValid = false;
    }

    if (newPass === "") {
      document.getElementById('err-new').innerText = "Kata sandi baru tidak boleh kosong.";
      document.getElementById('err-new').classList.remove('hidden');
      isValid = false;
    } else if (newPass.length < 8) {
      // Sama dengan aturan registrasi dan server (minimal 8 karakter)
      document.getElementById('err-new').innerText = "Kata sandi harus minimal 8 karakter.";
      document.getElementById('err-new').classList.remove('hidden');
      isValid = false;
    }

    if (confirmPass === "") {
      document.getElementById('err-confirm').innerText = "Konfirmasi kata sandi tidak boleh kosong.";
      document.getElementById('err-confirm').classList.remove('hidden');
      isValid = false;
    } else if (newPass !== confirmPass) {
      document.getElementById('err-confirm').innerText = "Kata sandi tidak cocok.";
      document.getElementById('err-confirm').classList.remove('hidden');
      isValid = false;
    }

    if (isValid) {
      toggleSaveModal(true);
    }
  });
}

function toggleSaveModal(show) {
  const modal = document.getElementById('saveModal');
  const backdrop = document.getElementById('saveBackdrop');
  const box = document.getElementById('saveModalBox');
  
  if(show) {
    modal.classList.remove('hidden');
    void modal.offsetWidth;
    backdrop.classList.remove('opacity-0');
    box.classList.remove('opacity-0', 'translate-y-4', 'sm:scale-95');
    box.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
  } else {
    backdrop.classList.add('opacity-0');
    box.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');
    box.classList.add('opacity-0', 'translate-y-4', 'sm:scale-95');
    setTimeout(() => modal.classList.add('hidden'), 300);
  }
}

function prosesSimpanFinal() {
  window.location.href = 'profil_orangtua.html';
}