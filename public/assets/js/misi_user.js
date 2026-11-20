    // Data Misi
    const missionData = [
      { 
        label: "Misi 1", 
        title: "Sudahkah mencium ibumu hari ini?", 
        stars: 2,
        image: "./assets/images/cium_ibu.png"
      },
      { 
        label: "Misi 2", 
        title: "Apakah kamu sudah merapikan tempat tidurmu?", 
        stars: 3,
        image: "./assets/images/merapikan.png"
      },
      { 
        label: "Misi 3", 
        title: "Sudahkah kamu menyiram tanaman di rumah?", 
        stars: 1,
        image: "./assets/images/menyiram_tanaman.png"
      }
    ];

    let currentMission = 0;
    
    // Inisialisasi total misi pada indikator
    document.addEventListener("DOMContentLoaded", () => {
      document.getElementById('total-mission-text').innerText = missionData.length;
      updateMissionPage();
    });

    function updateMissionPage() {
      const data = missionData[currentMission];

      // Update Label & Judul Misi
      document.getElementById('mission-label').innerHTML = `<div class="w-1.5 h-1.5 bg-[#10B981] rounded-full"></div> ${data.label}`;
      document.getElementById('mission-title').innerText = data.title;
      document.getElementById('page-indicator-text').innerText = currentMission + 1;

      // Update Gambar Ilustrasi
      const imgElement = document.getElementById('mission-image');
      const placeholderElement = document.getElementById('mission-image-placeholder');
      
      if(data.image && data.image !== "") {
        imgElement.src = data.image;
        imgElement.classList.remove('hidden');
        placeholderElement.classList.add('hidden');
      } else {
        imgElement.src = "";
        imgElement.classList.add('hidden');
        placeholderElement.classList.remove('hidden');
      }

      // Update Jumlah Bintang
      const starsContainer = document.getElementById('stars-container');
      starsContainer.innerHTML = '';
      for (let i = 0; i < data.stars; i++) {
        starsContainer.innerHTML += `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" /></svg>`;
      }
      document.getElementById('mission-reward').innerText = `Dapatkan ${data.stars} Bintang dengan menyelesaikan misi ini.`;

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

    // Fungsi Lanjut ke Misi Berikutnya
    function goNext() {
      if (currentMission < missionData.length - 1) {
        currentMission++;
        updateMissionPage();
      } else {
        // Jika sudah misi terakhir, tampilkan popup sukses
        const popup = document.getElementById('success-popup');
        popup.classList.remove('hidden');
        popup.classList.add('flex'); 
      }
    }

    // Fungsi Kembali ke Misi Sebelumnya
    function goPrev() {
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