    // --- 1. Fungsi Modal Logout (Pengecekan Ganda) ---
    if (typeof toggleLogoutModal === 'undefined') {
      window.toggleLogoutModal = function(show) {
        const modal = document.getElementById('logoutModal');
        const backdrop = document.getElementById('logoutBackdrop');
        const box = document.getElementById('logoutModalBox');
        
        if(show) {
          // Tutup menu mobile jika sedang terbuka agar modal tidak tertumpuk
          if(typeof closeMobileMenu === 'function') closeMobileMenu();
          
          if(modal) {
            modal.classList.remove('hidden');
            void modal.offsetWidth; 
            
            if(backdrop) backdrop.classList.remove('opacity-0');
            if(box) {
              box.classList.remove('opacity-0', 'translate-y-4', 'sm:scale-95');
              box.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
            }
          }
        } else {
          if(backdrop) backdrop.classList.add('opacity-0');
          if(box) {
            box.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');
            box.classList.add('opacity-0', 'translate-y-4', 'sm:scale-95');
          }
          setTimeout(() => { if(modal) modal.classList.add('hidden'); }, 300);
        }
      };
    }

    // --- 2. Logika memunculkan Modal Simpan saat form disubmit ---
    const formTambah = document.getElementById('formTambahAnak');
    if (formTambah) {
      formTambah.addEventListener('submit', function(e) {
        e.preventDefault(); 
        if (typeof toggleSaveModal === 'function') {
          toggleSaveModal(true);
        }
      });
    }

    // --- 3. Fungsi Animasi Modal Simpan ---
    if (typeof toggleSaveModal === 'undefined') {
      window.toggleSaveModal = function(show) {
        const modal = document.getElementById('saveModal');
        const backdrop = document.getElementById('saveBackdrop');
        const box = document.getElementById('saveModalBox');
        
        if(show) {
          if(modal) {
            modal.classList.remove('hidden');
            void modal.offsetWidth;
            
            if(backdrop) backdrop.classList.remove('opacity-0');
            if(box) {
              box.classList.remove('opacity-0', 'translate-y-4', 'sm:scale-95');
              box.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
            }
          }
        } else {
          if(backdrop) backdrop.classList.add('opacity-0');
          if(box) {
            box.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');
            box.classList.add('opacity-0', 'translate-y-4', 'sm:scale-95');
          }
          setTimeout(() => { if(modal) modal.classList.add('hidden'); }, 300);
        }
      };
    }

    // --- 4. Fungsi Menu Mobile (Pengecekan Ganda) ---
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
        if (menuBackdrop && menuContent && mobileMenu && !mobileMenu.classList.contains('hidden')) {
          menuBackdrop.classList.add('opacity-0');
          menuContent.classList.remove('translate-y-0');
          menuContent.classList.add('-translate-y-[150%]');
          setTimeout(() => mobileMenu.classList.add('hidden'), 300);
        }
      };

      if (closeMenuBtn) closeMenuBtn.addEventListener('click', closeMobileMenu);
      if (menuBackdrop) menuBackdrop.addEventListener('click', closeMobileMenu);
    }