// ================= KEAMANAN SETELAH LOGOUT (D-32) =================
// Halaman orang tua yang sudah login (punya form logout): jika browser menampilkan salinan
// lamanya (tombol Back / back-forward cache), muat ulang dari server yang memeriksa login.
window.addEventListener('pageshow', (event) => {
  if (event.persisted && document.getElementById('logoutForm')) {
    window.location.reload();
  }
});

const hamburgerBtn = document.getElementById('hamburgerBtn');
const closeMenuBtn = document.getElementById('closeMenuBtn');
const mobileMenu = document.getElementById('mobileMenu');
const menuBackdrop = document.getElementById('menuBackdrop');
const menuContent = document.getElementById('menuContent');

// ================= FUNGSI POPUP MOBILE MENU =================
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
  if (!mobileMenu) return;
  menuBackdrop.classList.add('opacity-0');
  menuContent.classList.add('-translate-y-[150%]');
  setTimeout(() => {
    mobileMenu.classList.add('hidden');
  }, 300);
}

if (closeMenuBtn) closeMenuBtn.addEventListener('click', closeMenu);
if (menuBackdrop) menuBackdrop.addEventListener('click', closeMenu);

// ================= FUNGSI POPUP LOGOUT =================
function openLogoutModal() {
  const modal = document.getElementById('logoutModal');
  const backdrop = document.getElementById('logoutBackdrop');
  const content = document.getElementById('logoutContent');

  if (!modal) return;
  modal.classList.remove('hidden');

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

  if (!modal) return;
  backdrop.classList.add('opacity-0');
  content.classList.remove('scale-100', 'opacity-100');
  content.classList.add('scale-95', 'opacity-0');

  setTimeout(() => {
    modal.classList.add('hidden');
  }, 300);
}