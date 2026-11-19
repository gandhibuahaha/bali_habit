const hamburgerBtn = document.getElementById('hamburgerBtn');
const closeMenuBtn = document.getElementById('closeMenuBtn');
const mobileMenu = document.getElementById('mobileMenu');
const menuBackdrop = document.getElementById('menuBackdrop');
const menuContent = document.getElementById('menuContent');
const logoutModal = document.getElementById('logoutModal');
const logoutBackdrop = document.getElementById('logoutBackdrop');
const logoutContent = document.getElementById('logoutContent');

if (hamburgerBtn) {
  hamburgerBtn.addEventListener('click', () => {
    mobileMenu.classList.remove('hidden');
    setTimeout(() => {
      menuBackdrop.classList.remove('opacity-0');
      menuContent.classList.remove('-translate-y-[150%]');
    }, 10);
  });
}

function closeMenu() {
  menuBackdrop.classList.add('opacity-0');
  menuContent.classList.add('-translate-y-[150%]');
  setTimeout(() => {
    mobileMenu.classList.add('hidden');
  }, 300);
}

if (closeMenuBtn) closeMenuBtn.addEventListener('click', closeMenu);
if (menuBackdrop) menuBackdrop.addEventListener('click', closeMenu);

// ================= MENANDAI MENU AKTIF SECARA OTOMATIS =================
document.addEventListener("DOMContentLoaded", function() {
  const currentUrl = window.location.href;
  const navLinks = document.querySelectorAll('nav a, #mobileMenu a');

  // Daftar semua file HTML yang termasuk dalam alur aktivitas/Profil Anak
  const childPages = [
    'halaman_anak.html',
    'progress_anak.html',
    'belajar_bersama.html',
    'halaman_baca.html',
    'refleksi-cerita.html',
    'halaman_refleksi.html',
    'halaman_misi.html',
    'rekap_cerita.html',
    'rekap-cerita.html',
    'edit_anak.html',   // <--- Tambahkan nama file halaman edit anak di sini
    'tambah_anak.html'  // <--- Tambahkan juga halaman tambah anak agar konsisten
  ];

  // Cek apakah halaman yang sedang dibuka merupakan salah satu dari alur Anak
  const isChildSection = childPages.some(page => currentUrl.includes(page));

  navLinks.forEach(link => {
    const linkHref = link.getAttribute('href');

    // Abaikan link kosong atau tombol Keluar
    if (!linkHref || linkHref === '#' || linkHref === 'login.html') return;

    let isMatch = false;

    // Jika pengguna ada di sub-halaman anak dan link-nya adalah 'halaman_anak.html'
    if (isChildSection && linkHref === 'halaman_anak.html') {
      isMatch = true;
    } 
    // Untuk halaman lain (Beranda, Profil Saya, dll)
    else if (currentUrl.includes(linkHref)) {
      isMatch = true;
    }

    if (isMatch) {
      // 1. Paksa warna teks menjadi Hijau Emerald
      link.classList.remove('text-slate-400', 'text-slate-500', 'text-slate-600', 'text-[#15803D]');
      link.classList.add('text-[#10B981]');

      // 2. Beri latar belakang hijau emerald muda jika ada di dalam Popup Mobile Menu
      if (link.closest('#mobileMenu')) {
        link.classList.remove('hover:bg-slate-50', 'hover:bg-gray-50', 'bg-[#ECFDF5]', 'bg-green-50');
        link.classList.add('bg-emerald-50');
      }
    }
  });
});

// ================= FUNGSI POPUP LOGOUT =================
function openLogoutModal() {
  const modal = document.getElementById('logoutModal');
  const backdrop = document.getElementById('logoutBackdrop');
  const content = document.getElementById('logoutContent');
  
  // Tampilkan bungkus utama
  modal.classList.remove('hidden');
  
  // Berikan sedikit delay agar animasi transisi terlihat
  setTimeout(() => {
    backdrop.classList.remove('opacity-0');
    content.classList.remove('scale-95', 'opacity-0');
    content.classList.add('scale-100', 'opacity-100');
  }, 10);
}

function closeLogoutModal() {
  const modal = document.getElementById('logoutModal');
  const backdrop = document.getElementById('logoutBackdrop');
  const content = document.getElementById('logoutContent');
  
  // Kembalikan efek transisi ke awal (menghilang)
  backdrop.classList.add('opacity-0');
  content.classList.remove('scale-100', 'opacity-100');
  content.classList.add('scale-95', 'opacity-0');
  
  // Sembunyikan elemen setelah animasi selesai (300ms)
  setTimeout(() => {
    modal.classList.add('hidden');
  }, 300);
}