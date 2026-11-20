// --- Fungsi Global Modal & Dropdown (langsung terdaftar sebelum DOMContentLoaded) ---
window.closeProfileMenu = function() {
  const profileMenu = document.getElementById('profileDropdownMenu');
  const profileChevron = document.getElementById('profileChevron');
  if (profileMenu && profileChevron) {
    profileMenu.classList.add('opacity-0', 'scale-95');
    profileMenu.classList.remove('opacity-100', 'scale-100');
    profileChevron.classList.remove('rotate-180');

    setTimeout(() => {
      if (profileMenu.classList.contains('opacity-0')) {
        profileMenu.classList.add('invisible');
      }
    }, 200);
  }
};

window.openLogoutModal = function() {
  window.closeProfileMenu();
  const modal = document.getElementById('logoutModal');
  const backdrop = document.getElementById('logoutBackdrop');
  const content = document.getElementById('logoutContent');

  if (modal) {
    modal.classList.remove('hidden');
    requestAnimationFrame(() => {
      if (backdrop) backdrop.classList.remove('opacity-0');
      if (content) {
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
      }
    });
  }
};

window.closeLogoutModal = function() {
  const modal = document.getElementById('logoutModal');
  const backdrop = document.getElementById('logoutBackdrop');
  const content = document.getElementById('logoutContent');

  if (backdrop) backdrop.classList.add('opacity-0');
  if (content) {
    content.classList.remove('scale-100', 'opacity-100');
    content.classList.add('scale-95', 'opacity-0');
  }

  setTimeout(() => {
    if (modal) modal.classList.add('hidden');
  }, 300);
};

window.confirmLogout = function() {
  // Sesuaikan dengan route login admin di routes/web.php (misal: '/admin/login' atau '/login')
  window.location.href = '/admin/login';
};

document.addEventListener('DOMContentLoaded', () => {
  // --- 1. Script Toggle Sidebar (Desktop & Mobile) ---
  const sidebarToggleBtn = document.getElementById('sidebarToggleBtn');
  const mobileOverlay = document.getElementById('mobileOverlay');

  if (sidebarToggleBtn) {
    sidebarToggleBtn.addEventListener('click', () => {
      if (window.innerWidth >= 1024) {
        document.body.classList.toggle('sidebar-collapsed');
      } else {
        document.body.classList.toggle('sidebar-mobile-open');
      }
    });
  }

  if (mobileOverlay) {
    mobileOverlay.addEventListener('click', () => {
      document.body.classList.remove('sidebar-mobile-open');
    });
  }

  // --- 2. Script Profil Dropdown ---
  const profileBtn = document.getElementById('profileDropdownBtn');
  const profileMenu = document.getElementById('profileDropdownMenu');
  const profileChevron = document.getElementById('profileChevron');

  if (profileBtn && profileMenu && profileChevron) {
    profileBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      if (typeof closeNotifDropdown === 'function') closeNotifDropdown();
      const isHidden = profileMenu.classList.contains('invisible');

      if (isHidden) {
        profileMenu.classList.remove('invisible', 'opacity-0', 'scale-95');
        profileMenu.classList.add('opacity-100', 'scale-100');
        profileChevron.classList.add('rotate-180');
      } else {
        window.closeProfileMenu();
      }
    });

    document.addEventListener('click', (e) => {
      if (!profileMenu.contains(e.target) && !profileBtn.contains(e.target)) {
        window.closeProfileMenu();
      }
    });
  }

  // Tutup modal logout saat klik backdrop atau tekan Escape
  const logoutModal = document.getElementById('logoutModal');
  const logoutContent = document.getElementById('logoutContent');
  if (logoutModal && logoutContent) {
    logoutModal.addEventListener('click', (e) => {
      if (!logoutContent.contains(e.target)) {
        window.closeLogoutModal();
      }
    });
  }

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      window.closeLogoutModal();
      window.closeProfileMenu();
    }
  });

  // --- 3. INISIALISASI NOTIFIKASI LONCENG (OTOMATIS DI SEMUA HALAMAN ADMIN) ---
  initAdminNotifications();

  // --- 4. SMOOTH TAB LINK ---
  const tabLinks = document.querySelectorAll('.smooth-tab-link');
  const tabContent = document.getElementById('smoothTabContent');

  tabLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      const targetUrl = this.getAttribute('href');

      if (!targetUrl || targetUrl === '#' || this.classList.contains('active-tab')) {
        return;
      }

      e.preventDefault();

      tabLinks.forEach(t => {
        t.classList.remove('bg-white', 'text-[#10B981]', 'shadow-[0_2px_8px_rgba(0,0,0,0.05)]');
        t.classList.add('text-slate-500');
        const badge = t.querySelector('span');
        if (badge) {
          badge.classList.remove('bg-emerald-50', 'text-[#10B981]');
          badge.classList.add('bg-slate-200', 'text-slate-500');
        }
      });

      this.classList.remove('text-slate-500');
      this.classList.add('bg-white', 'text-[#10B981]', 'shadow-[0_2px_8px_rgba(0,0,0,0.05)]');
      const activeBadge = this.querySelector('span');
      if (activeBadge) {
        activeBadge.classList.remove('bg-slate-200', 'text-slate-500');
        activeBadge.classList.add('bg-emerald-50', 'text-[#10B981]');
      }

      if (tabContent) {
        tabContent.classList.remove('animate-tab-enter');
        tabContent.classList.add('animate-tab-exit');
        setTimeout(() => {
          window.location.href = targetUrl;
        }, 170);
      } else {
        window.location.href = targetUrl;
      }
    });
  });
});


// =========================================================================
// --- 5. SISTEM NOTIFIKASI PUSAT BANTUAN ADMIN ---
// =========================================================================
function initAdminNotifications() {
  const header = document.querySelector('header');
  if (!header) return;

  const headerButtons = header.querySelectorAll('button');
  let bellBtn = null;

  headerButtons.forEach(btn => {
    const svgHTML = btn.innerHTML || '';
    if (svgHTML.includes('14.857 17.082')) {
      bellBtn = btn;
    }
  });

  if (!bellBtn) return;

  bellBtn.classList.add('relative', 'cursor-pointer');

  let badge = bellBtn.querySelector('span');
  if (!badge) {
    badge = document.createElement('span');
    badge.className = 'absolute top-0 right-0 w-2 h-2 bg-red-500 border-2 border-white rounded-full';
    bellBtn.appendChild(badge);
  }
  badge.id = 'adminNotifBadge';

  const wrapper = document.createElement('div');
  wrapper.className = 'relative';
  wrapper.id = 'adminNotifWrapper';
  bellBtn.parentNode.insertBefore(wrapper, bellBtn);
  wrapper.appendChild(bellBtn);

  const dropdownHTML = `
    <div id="adminNotifMenu" style="display: none; width: 350px; max-width: 90vw; position: absolute; right: 0; top: 100%; margin-top: 12px; z-index: 999;" class="bg-white rounded-[20px] shadow-xl border border-slate-100 overflow-hidden">
      <div class="flex justify-between items-center px-4 py-3.5 border-b border-slate-100 bg-slate-50">
        <div class="flex items-center gap-2">
          <span class="font-extrabold text-[13.5px] text-[#0F172A]">Pesan Bantuan</span>
          <span id="adminNotifCount" class="bg-emerald-50 text-[#10B981] text-[10px] font-extrabold px-2 py-0.5 rounded-full">0 Baru</span>
        </div>
        <button type="button" onclick="tandaiSemuaNotifDibaca()" class="text-[11px] font-bold text-[#10B981] hover:underline cursor-pointer">
          Tandai dibaca
        </button>
      </div>
      <div id="adminNotifList" style="max-height: 320px; overflow-y: auto;" class="divide-y divide-slate-100"></div>
    </div>
  `;
  wrapper.insertAdjacentHTML('beforeend', dropdownHTML);

  if (!document.getElementById('adminHelpDetailModal')) {
    const modalHTML = `
      <div id="adminHelpDetailModal" style="display: none; z-index: 9999;" class="fixed inset-0 items-center justify-center p-4">
        <div onclick="tutupModalDetailBantuan()" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm"></div>
        <div class="bg-white rounded-[24px] p-6 sm:p-8 w-full max-w-md relative z-10 shadow-2xl border border-slate-100">
          <div class="flex justify-between items-start mb-4">
            <div>
              <div class="flex items-center gap-2 flex-wrap">
                <span id="helpModalCategory" class="bg-emerald-50 text-[#10B981] text-[10px] font-extrabold px-2.5 py-1 rounded-full uppercase">Kategori</span>
                <span id="helpModalStatusBadge" class="bg-amber-50 text-amber-600 text-[10px] font-extrabold px-2.5 py-1 rounded-full">Menunggu Balasan</span>
              </div>
              <h3 id="helpModalName" class="text-[18px] font-extrabold text-[#0F172A] mt-2">Nama Pengirim</h3>
              <p id="helpModalEmail" class="text-xs text-slate-400 font-medium">email@example.com</p>
            </div>
            <button type="button" onclick="tutupModalDetailBantuan()" class="w-8 h-8 rounded-full bg-slate-50 text-slate-400 hover:bg-slate-100 hover:text-slate-600 flex items-center justify-center transition cursor-pointer">
              ✕
            </button>
          </div>
          <div class="bg-slate-50 rounded-2xl p-4 text-[13px] text-slate-600 leading-relaxed mb-6 border border-slate-100 max-h-60 overflow-y-auto">
            <p id="helpModalMessage" class="whitespace-pre-line"></p>
          </div>
          <div class="flex gap-2.5">
            <button type="button" id="helpModalDeleteBtn" style="display: none;" class="px-4 py-3 rounded-[12px] border border-red-200 text-red-500 font-bold text-[13px] hover:bg-red-50 transition cursor-pointer items-center justify-center">
              Hapus
            </button>
            <button type="button" onclick="tutupModalDetailBantuan()" class="flex-1 py-3 rounded-[12px] border border-slate-200 text-slate-600 font-bold text-[13px] hover:bg-slate-50 transition cursor-pointer">
              Tutup
            </button>
            <a id="helpModalReplyBtn" href="#" class="flex-1 py-3 rounded-[12px] bg-[#10B981] text-white font-bold text-[13px] text-center hover:bg-[#059669] transition shadow-sm flex items-center justify-center">
              Balas Email
            </a>
          </div>
        </div>
      </div>
    `;
    document.body.insertAdjacentHTML('beforeend', modalHTML);
  }

  bellBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    if (typeof closeProfileMenu === 'function') closeProfileMenu();

    const menu = document.getElementById('adminNotifMenu');
    if (menu) {
      menu.style.display = (menu.style.display === 'none' || menu.style.display === '') ? 'block' : 'none';
    }
  });

  document.addEventListener('click', (e) => {
    const menu = document.getElementById('adminNotifMenu');
    const modal = document.getElementById('adminHelpDetailModal');
    if (menu && !wrapper.contains(e.target) && (!modal || !modal.contains(e.target))) {
      closeNotifDropdown();
    }
  });

  window.addEventListener('storage', (e) => {
    if (e.key === 'balihabit_help_messages') {
      renderAdminNotifications();
    }
  });

  renderAdminNotifications();
}

window.closeNotifDropdown = function() {
  const menu = document.getElementById('adminNotifMenu');
  if (menu) menu.style.display = 'none';
};

window.renderAdminNotifications = function() {
  const daftarPesan = JSON.parse(localStorage.getItem('balihabit_help_messages')) || [];
  const badge = document.getElementById('adminNotifBadge');
  const countBadge = document.getElementById('adminNotifCount');
  const listEl = document.getElementById('adminNotifList');

  if (!listEl) return;

  const jumlahBaru = daftarPesan.filter(item => !item.dibaca).length;

  if (badge) {
    badge.style.display = jumlahBaru > 0 ? 'block' : 'none';
  }

  if (countBadge) {
    countBadge.innerText = `${jumlahBaru} Baru`;
  }

  if (daftarPesan.length === 0) {
    listEl.innerHTML = `
      <div class="p-6 text-center text-xs text-slate-400 font-medium">
        Belum ada pesan bantuan masuk dari orang tua.
      </div>
    `;
    return;
  }

  listEl.innerHTML = daftarPesan.map(item => `
    <div onclick="bukaDetailBantuan(${item.id})" class="p-4 hover:bg-slate-50 transition cursor-pointer flex items-start gap-3 ${!item.dibaca ? 'bg-emerald-50/40' : ''}">
      <div class="w-2 h-2 rounded-full mt-1.5 flex-shrink-0" style="background-color: ${!item.dibaca ? '#10B981' : 'transparent'};"></div>
      <div class="flex-grow min-w-0">
        <div class="flex justify-between items-center gap-2 mb-0.5">
          <p class="text-xs font-extrabold text-[#0F172A] truncate">${item.nama}</p>
          <span class="text-[10px] text-slate-400 flex-shrink-0">${item.waktu}</span>
        </div>
        <div class="flex items-center gap-1.5 mb-0.5">
          <p class="text-[11px] font-bold text-[#10B981] truncate">${item.kategori}</p>
          ${item.dibalas
            ? '<span class="text-[9px] font-extrabold bg-emerald-50 text-emerald-600 px-1.5 py-0.2 rounded">Dibalas</span>'
            : '<span class="text-[9px] font-extrabold bg-amber-50 text-amber-600 px-1.5 py-0.2 rounded">Belum dibalas</span>'}
        </div>
        <p class="text-xs text-slate-500 truncate">${item.pesan}</p>
      </div>
      ${item.dibalas ? `
        <button type="button" onclick="hapusPesanBantuan(event, ${item.id})" class="p-1.5 text-slate-300 hover:text-red-500 hover:bg-red-50 rounded-lg transition flex-shrink-0 cursor-pointer" title="Hapus pesan yang sudah dibalas">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
        </button>
      ` : ''}
    </div>
  `).join('');
};

window.tutupModalDetailBantuan = function() {
  const modal = document.getElementById('adminHelpDetailModal');
  if (modal) modal.style.display = 'none';
};

window.bukaDetailBantuan = function(id) {
  let daftarPesan = JSON.parse(localStorage.getItem('balihabit_help_messages')) || [];
  const target = daftarPesan.find(item => item.id === id);
  if (!target) return;

  target.dibaca = true;
  localStorage.setItem('balihabit_help_messages', JSON.stringify(daftarPesan));
  renderAdminNotifications();

  document.getElementById('helpModalCategory').innerText = target.kategori;
  document.getElementById('helpModalName').innerText = target.nama;
  document.getElementById('helpModalEmail').innerText = target.email;
  document.getElementById('helpModalMessage').innerText = target.pesan;

  const statusBadge = document.getElementById('helpModalStatusBadge');
  const deleteBtn = document.getElementById('helpModalDeleteBtn');
  const replyBtn = document.getElementById('helpModalReplyBtn');

  if (target.dibalas) {
    if (statusBadge) {
      statusBadge.innerText = '✓ Sudah Dibalas';
      statusBadge.className = 'bg-emerald-50 text-emerald-600 text-[10px] font-extrabold px-2.5 py-1 rounded-full';
    }
    if (deleteBtn) {
      deleteBtn.style.display = 'flex';
      deleteBtn.onclick = function(e) {
        hapusPesanBantuan(e, target.id);
      };
    }
  } else {
    if (statusBadge) {
      statusBadge.innerText = 'Menunggu Balasan';
      statusBadge.className = 'bg-amber-50 text-amber-600 text-[10px] font-extrabold px-2.5 py-1 rounded-full';
    }
    if (deleteBtn) {
      deleteBtn.style.display = 'none';
    }
  }

  replyBtn.href = `mailto:${target.email}?subject=Balasan Pusat Bantuan BaliHabit - ${encodeURIComponent(target.kategori)}`;
  replyBtn.onclick = function() {
    tandaiPesanDibalas(target.id);
  };

  closeNotifDropdown();
  const modal = document.getElementById('adminHelpDetailModal');
  if (modal) modal.style.display = 'flex';
};

window.tandaiPesanDibalas = function(id) {
  let daftarPesan = JSON.parse(localStorage.getItem('balihabit_help_messages')) || [];
  const target = daftarPesan.find(item => item.id === id);
  if (!target) return;

  target.dibaca = true;
  target.dibalas = true;
  localStorage.setItem('balihabit_help_messages', JSON.stringify(daftarPesan));
  renderAdminNotifications();

  const statusBadge = document.getElementById('helpModalStatusBadge');
  const deleteBtn = document.getElementById('helpModalDeleteBtn');
  if (statusBadge) {
    statusBadge.innerText = '✓ Sudah Dibalas';
    statusBadge.className = 'bg-emerald-50 text-emerald-600 text-[10px] font-extrabold px-2.5 py-1 rounded-full';
  }
  if (deleteBtn) {
    deleteBtn.style.display = 'flex';
    deleteBtn.onclick = function(e) {
      hapusPesanBantuan(e, id);
    };
  }
};

window.hapusPesanBantuan = function(event, id) {
  if (event) event.stopPropagation();

  let daftarPesan = JSON.parse(localStorage.getItem('balihabit_help_messages')) || [];
  const target = daftarPesan.find(item => item.id === id);

  if (!target || !target.dibalas) return;

  daftarPesan = daftarPesan.filter(item => item.id !== id);
  localStorage.setItem('balihabit_help_messages', JSON.stringify(daftarPesan));

  tutupModalDetailBantuan();
  renderAdminNotifications();

  const menu = document.getElementById('adminNotifMenu');
  if (menu) menu.style.display = 'block';
};

window.tandaiSemuaNotifDibaca = function() {
  let daftarPesan = JSON.parse(localStorage.getItem('balihabit_help_messages')) || [];
  daftarPesan = daftarPesan.map(item => ({ ...item, dibaca: true }));
  localStorage.setItem('balihabit_help_messages', JSON.stringify(daftarPesan));
  renderAdminNotifications();
};