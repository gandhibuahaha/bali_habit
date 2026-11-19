    // 1. Logika Tab Perkembangan
    function changeTab(tabName) {
      const btnHari = document.getElementById('btn-hari-ini');
      const btnMinggu = document.getElementById('btn-minggu-ini');
      const btnKeseluruhan = document.getElementById('btn-keseluruhan');
      const contentHari = document.getElementById('content-hari-ini');
      const contentMinggu = document.getElementById('content-minggu-ini');
      const contentKeseluruhan = document.getElementById('content-keseluruhan');

      const inactiveClasses = ['text-slate-500', 'hover:text-slate-700', 'bg-transparent'];
      const activeClasses = ['bg-[#10B981]', 'text-white', 'shadow-sm'];

      [btnHari, btnMinggu, btnKeseluruhan].forEach(btn => {
        btn.classList.remove(...activeClasses); btn.classList.add(...inactiveClasses);
      });
      [contentHari, contentMinggu, contentKeseluruhan].forEach(content => {
        content.classList.add('hidden'); content.classList.remove('block');
      });

      if (tabName === 'hari-ini') {
        btnHari.classList.remove(...inactiveClasses); btnHari.classList.add(...activeClasses);
        contentHari.classList.remove('hidden'); contentHari.classList.add('block');
      } else if (tabName === 'minggu-ini') {
        btnMinggu.classList.remove(...inactiveClasses); btnMinggu.classList.add(...activeClasses);
        contentMinggu.classList.remove('hidden'); contentMinggu.classList.add('block');
      } else if (tabName === 'keseluruhan') {
        btnKeseluruhan.classList.remove(...inactiveClasses); btnKeseluruhan.classList.add(...activeClasses);
        contentKeseluruhan.classList.remove('hidden'); contentKeseluruhan.classList.add('block');
      }
    }

    // 2. Logika Modal Lencana
    function openBadgeModal() {
      const modal = document.getElementById('badgeModal');
      const backdrop = document.getElementById('badgeBackdrop');
      const content = document.getElementById('badgeContent');
      modal.classList.remove('hidden'); modal.classList.add('flex');
      setTimeout(() => {
        backdrop.classList.remove('opacity-0'); backdrop.classList.add('opacity-100');
        content.classList.remove('scale-95', 'opacity-0'); content.classList.add('scale-100', 'opacity-100');
      }, 10);
    }
    function closeBadgeModal() {
      const modal = document.getElementById('badgeModal');
      const backdrop = document.getElementById('badgeBackdrop');
      const content = document.getElementById('badgeContent');
      backdrop.classList.remove('opacity-100'); backdrop.classList.add('opacity-0');
      content.classList.remove('scale-100', 'opacity-100'); content.classList.add('scale-95', 'opacity-0');
      setTimeout(() => {
        modal.classList.add('hidden'); modal.classList.remove('flex');
      }, 300);
    }

    // 3. Drag to Scroll pakai Mouse untuk Lencana di Desktop
    const slider = document.getElementById('badgeSlider');
    let isDown = false;
    let startX;
    let scrollLeft;

    if (slider) {
      slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.style.scrollSnapType = 'none'; 
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
      });
      slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.style.scrollSnapType = 'x mandatory';
      });
      slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.style.scrollSnapType = 'x mandatory';
      });
      slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 1.5;
        slider.scrollLeft = scrollLeft - walk;
      });
    }

    // 4. Modal Logout & Mobile Menu Handler
    function openLogoutModal() {
      const modal = document.getElementById('logoutModal');
      const backdrop = document.getElementById('logoutBackdrop');
      const content = document.getElementById('logoutContent');
      document.getElementById('mobileMenu').classList.add('hidden');
      modal.classList.remove('hidden');
      void modal.offsetWidth;
      backdrop.classList.remove('opacity-0');
      content.classList.remove('scale-95', 'opacity-0');
      content.classList.add('scale-100', 'opacity-100');
    }

    function closeLogoutModal() {
      const modal = document.getElementById('logoutModal');
      const backdrop = document.getElementById('logoutBackdrop');
      const content = document.getElementById('logoutContent');
      backdrop.classList.add('opacity-0');
      content.classList.remove('scale-100', 'opacity-100');
      content.classList.add('scale-95', 'opacity-0');
      setTimeout(() => modal.classList.add('hidden'), 300);
    }

    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuBackdrop = document.getElementById('menuBackdrop');
    const menuContent = document.getElementById('menuContent');
    const closeMenuBtn = document.getElementById('closeMenuBtn');

    if (hamburgerBtn) {
      hamburgerBtn.addEventListener('click', () => {
        mobileMenu.classList.remove('hidden');
        void mobileMenu.offsetWidth;
        menuBackdrop.classList.remove('opacity-0');
        menuContent.classList.remove('-translate-y-[150%]');
        menuContent.classList.add('translate-y-0');
      });
    }

    function closeMobileMenu() {
      menuBackdrop.classList.add('opacity-0');
      menuContent.classList.remove('translate-y-0');
      menuContent.classList.add('-translate-y-[150%]');
      setTimeout(() => mobileMenu.classList.add('hidden'), 300);
    }

    if (closeMenuBtn) closeMenuBtn.addEventListener('click', closeMobileMenu);
    if (menuBackdrop) menuBackdrop.addEventListener('click', closeMobileMenu);