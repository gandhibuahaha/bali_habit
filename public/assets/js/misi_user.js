    // Misi cerita yang dibuka, dari database: [{ id, text }] (lihat halaman_misi.blade.php).
    // Bintang per misi sama untuk semua misi, jadi sudah ditulis di halaman.
    const missionData = window.BALIHABIT_MISSIONS || [];
    const missionAnswers = []; // per misi: 1 = "Sudah!", 0 = "Nanti Saja"
    let currentMission = 0;
    let missionSent = false;

    document.addEventListener("DOMContentLoaded", () => {
      // Cerita tanpa misi: halaman menampilkan pesan kosong, tidak ada yang diatur.
      if (missionData.length === 0 || !document.getElementById('mission-title')) return;
      updateMissionPage();
    });

    function updateMissionPage() {
      const data = missionData[currentMission];

      // Label & teks misi (innerText: teks dari database tidak dibaca sebagai HTML)
      document.getElementById('mission-label').innerHTML = `<div class="w-1.5 h-1.5 bg-[#10B981] rounded-full"></div> Misi ${currentMission + 1}`;
      document.getElementById('mission-title').innerText = data.text;
      document.getElementById('page-indicator-text').innerText = currentMission + 1;

      // Update Progress Bar / Indikator Bulat
      const progressContainer = document.getElementById('progress-container');
      progressContainer.innerHTML = '';
      for (let i = 0; i < missionData.length; i++) {
        if (i === currentMission) {
          progressContainer.innerHTML += `<div class="w-8 h-8 bg-[#10B981] text-white rounded-full flex items-center justify-center font-bold text-sm shadow-sm transition-all duration-300">${i + 1}</div>`;
        } else if (i < currentMission) {
          progressContainer.innerHTML += `<div class="w-3 h-3 bg-slate-300 rounded-full transition-all duration-300"></div>`;
        } else {
          progressContainer.innerHTML += `<div class="w-3 h-3 bg-slate-200 rounded-full transition-all duration-300"></div>`;
        }
        
        if (i < missionData.length - 1) {
            progressContainer.innerHTML += `<div class="w-4 h-0.5 bg-slate-200"></div>`;
        }
      }

      // Tampilkan atau Sembunyikan Tombol "Misi Sebelumnya"
      const btnPrev = document.getElementById('btn-prev');
      if (currentMission === 0) {
        btnPrev.style.display = 'none'; 
      } else {
        btnPrev.style.display = 'flex'; 
      }
    }

    // "Sudah!" (1) atau "Nanti Saja" (0): catat jawaban, lalu ke misi berikutnya.
    // Setelah misi terakhir, semua jawaban dikirim sekali ke server (saveMissions),
    // yang menyimpan percobaan ini dan kembali ke halaman ini dengan popup hasil.
    function answerMission(answer) {
      if (missionSent) return;
      missionAnswers[currentMission] = answer;

      if (currentMission < missionData.length - 1) {
        currentMission++;
        updateMissionPage();
      } else {
        sendMissionAnswers();
      }
    }

    function sendMissionAnswers() {
      missionSent = true; // ketukan ganda tidak mengirim dua kali
      document.querySelectorAll('.mission-answer-btn, #btn-prev').forEach(btn => { btn.disabled = true; });

      const form = document.getElementById('missionForm');
      missionData.forEach((mission, i) => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = `answers[${mission.id}]`;
        input.value = missionAnswers[i];
        form.appendChild(input);
      });
      form.submit();
    }

    // Fungsi Kembali ke Misi Sebelumnya (jawaban bisa diganti)
    function goPrev() {
      if (missionSent) return;
      if (currentMission > 0) {
        currentMission--;
        updateMissionPage();
      }
    }

    // ================= SCRIPT MOBILE MENU & LOGOUT =================
    // Cek apakah variabel sudah dideklarasikan oleh file eksternal (script.js) agar tidak terjadi konflik
    if (typeof openLogoutModal === 'undefined') {
      window.openLogoutModal = function() {
        const modal = document.getElementById('logoutModal');
        const backdrop = document.getElementById('logoutBackdrop');
        const content = document.getElementById('logoutContent');
        const mobileMenu = document.getElementById('mobileMenu');
        
        if(mobileMenu) mobileMenu.classList.add('hidden');
        if(modal) {
          modal.classList.remove('hidden');
          void modal.offsetWidth; // Trigger reflow
          backdrop.classList.remove('opacity-0');
          content.classList.remove('scale-95', 'opacity-0');
          content.classList.add('scale-100', 'opacity-100');
        }
      };

      window.closeLogoutModal = function() {
        const modal = document.getElementById('logoutModal');
        const backdrop = document.getElementById('logoutBackdrop');
        const content = document.getElementById('logoutContent');
        
        if(backdrop) backdrop.classList.add('opacity-0');
        if(content) {
          content.classList.remove('scale-100', 'opacity-100');
          content.classList.add('scale-95', 'opacity-0');
        }
        setTimeout(() => { if(modal) modal.classList.add('hidden'); }, 300);
      };
    }

    if (typeof hamburgerBtn === 'undefined') {
      const hamburgerBtn = document.getElementById('hamburgerBtn');
      const mobileMenu = document.getElementById('mobileMenu');
      const menuBackdrop = document.getElementById('menuBackdrop');
      const menuContent = document.getElementById('menuContent');
      const closeMenuBtn = document.getElementById('closeMenuBtn');

      if (hamburgerBtn && mobileMenu) {
        hamburgerBtn.addEventListener('click', () => {
          mobileMenu.classList.remove('hidden');
          void mobileMenu.offsetWidth;
          if(menuBackdrop) menuBackdrop.classList.remove('opacity-0');
          if(menuContent) {
            menuContent.classList.remove('-translate-y-[150%]');
            menuContent.classList.add('translate-y-0');
          }
        });
      }

      window.closeMobileMenu = function() {
        if(menuBackdrop) menuBackdrop.classList.add('opacity-0');
        if(menuContent) {
          menuContent.classList.remove('translate-y-0');
          menuContent.classList.add('-translate-y-[150%]');
        }
        setTimeout(() => { if(mobileMenu) mobileMenu.classList.add('hidden'); }, 300);
      };

      if (closeMenuBtn) closeMenuBtn.addEventListener('click', closeMobileMenu);
      if (menuBackdrop) menuBackdrop.addEventListener('click', closeMobileMenu);
    }