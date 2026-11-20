<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Anak - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased min-h-screen flex flex-col relative">

  <!-- ================= NAV BAR (POST-LOGIN) ================= -->
  <nav class="flex justify-between items-center px-4 sm:px-6 py-4 max-w-6xl mx-auto w-full sticky top-0 z-40 bg-slate-50/90 backdrop-blur-md relative">

    <!-- KIRI: Logo & Nama Brand -->
    <a href="{{ url('/dashboard') }}" class="flex items-center gap-2.5 z-10 hover:opacity-80 transition cursor-pointer">
      <div class="w-9 h-9 bg-emerald-50 rounded-full flex items-center justify-center border border-emerald-100 overflow-hidden p-0.5">
        <img
          src="{{ asset('assets/images/logo.png') }}"
          alt="Logo BaliHabit"
          class="w-full h-full rounded-full object-cover"
        />
      </div>
      <span class="text-xl font-extrabold tracking-tight text-[#1F2937]">Bali<span class="text-[#10B981]">Habit</span></span>
    </a>

    <!-- TENGAH: Menu Desktop -->
    <div class="hidden lg:flex items-center gap-8 text-sm font-bold text-slate-500">
      <a href="{{ url('/dashboard') }}" class="hover:text-[#10B981] transition">Beranda Orang Tua</a>
      <a href="{{ url('/halaman-anak') }}" class="text-[#10B981] transition">Profil Anak</a>
      <a href="{{ url('/profil-orangtua') }}" class="hover:text-[#10B981] transition">Profil Saya</a>
    </div>

    <!-- KANAN: Tombol Keluar (Desktop) & Tombol Burger (Mobile) -->
    <div class="flex items-center gap-3">
      <button onclick="toggleLogoutModal(true)" class="hidden lg:flex items-center gap-2 text-slate-500 hover:text-red-500 font-bold text-sm transition cursor-pointer">
        Keluar
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
        </svg>
      </button>

      <button id="hamburgerBtn" class="lg:hidden p-2 rounded-full border border-gray-200 text-slate-600 bg-white shadow-sm hover:bg-gray-50 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
      </button>
    </div>
  </nav>

  <!-- ================= KONTEN UTAMA ================= -->
  <main class="w-full max-w-2xl mx-auto px-4 sm:px-6 py-8 flex-grow">

    <!-- Tombol Kembali -->
    <a href="{{ url('/halaman-anak') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-[#10B981] font-bold text-sm mb-6 transition cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
      Kembali
    </a>

    <!-- KOTAK FORM UTAMA -->
    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-6 sm:p-10">

      <!-- Header Form -->
      <div class="mb-8 text-center sm:text-left">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-[#1F2937] mb-2 tracking-tight">Tambah Anak</h1>
        <p class="text-slate-500 text-sm leading-relaxed">
          Tambahkan profil anak untuk memulai perjalanan belajar bersama.
        </p>
      </div>

      <!-- Area Unggah Foto -->
      <div class="flex flex-col items-center justify-center mb-8">

        <!-- Input File Tersembunyi -->
        <input type="file" id="fotoInput" accept="image/*" class="hidden" onchange="previewImage(event)">

        <div class="w-24 h-24 sm:w-28 sm:h-28 bg-[#F8FAFC] rounded-full flex items-center justify-center border-2 border-dashed border-gray-300 mb-4 cursor-pointer hover:bg-gray-50 transition group overflow-hidden" onclick="document.getElementById('fotoInput').click();">

          <!-- SVG Placeholder (muncul jika belum ada foto) -->
          <svg id="fotoIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 sm:w-10 sm:h-10 text-slate-400 group-hover:text-[#10B981] transition">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
          </svg>

          <!-- Image Preview (tersembunyi secara default) -->
          <img id="fotoPreview" class="hidden w-full h-full object-cover">
        </div>

        <button type="button" onclick="document.getElementById('fotoInput').click();" class="border border-gray-200 text-slate-700 text-xs font-bold px-5 py-2.5 rounded-full hover:bg-gray-100 transition shadow-sm mb-1.5 cursor-pointer">
          Tambah Foto
        </button>
        <p class="text-[11px] text-slate-400">Foto profil anak (opsional)</p>
      </div>

      <!-- FORM PENGISIAN -->
      <form id="formTambahAnak" class="flex flex-col gap-5">

        <!-- Input Nama Anak -->
        <div>
          <label class="block text-sm font-bold text-[#1F2937] mb-2">
            Nama Anak <span class="text-red-500">*</span>
          </label>
          <input type="text" required placeholder="Masukkan nama anak" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3.5 text-sm text-slate-800 placeholder:text-slate-400 focus:outline-none focus:border-[#10B981] focus:ring-1 focus:ring-[#10B981] transition shadow-sm">
        </div>

        <!-- Input Tanggal Lahir -->
        <div>
          <label class="block text-sm font-bold text-[#1F2937] mb-2">
            Tanggal Lahir <span class="text-red-500">*</span>
          </label>
          <div class="relative">
            <input type="date" required class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3.5 text-sm text-slate-800 focus:outline-none focus:border-[#10B981] focus:ring-1 focus:ring-[#10B981] transition shadow-sm appearance-none cursor-pointer">
          </div>
        </div>

        <!-- Input Jenis Kelamin -->
        <div>
          <label class="block text-sm font-bold text-[#1F2937] mb-2">
            Jenis Kelamin <span class="text-red-500">*</span>
          </label>
          <div class="flex gap-3">

            <label class="flex-1 relative cursor-pointer group">
              <input type="radio" name="gender" value="laki-laki" required class="peer sr-only" id="laki">
              <div class="border border-gray-200 bg-white rounded-xl p-3.5 flex items-center justify-center gap-2.5 transition hover:bg-gray-50 shadow-sm peer-checked:border-[#10B981] peer-checked:bg-emerald-50 peer-checked:[&_.bulatan]:border-[#10B981] peer-checked:[&_.bulatan]:bg-[#10B981] peer-checked:[&_svg]:block peer-checked:[&_span]:text-[#10B981]">
                <div class="bulatan w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center transition-all bg-white">
                  <svg class="w-3 h-3 text-white hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                  </svg>
                </div>
                <span class="text-sm font-semibold text-slate-700 transition-colors">Laki-laki</span>
              </div>
            </label>

            <label class="flex-1 relative cursor-pointer group">
              <input type="radio" name="gender" value="perempuan" class="peer sr-only" id="perempuan">
              <div class="border border-gray-200 bg-white rounded-xl p-3.5 flex items-center justify-center gap-2.5 transition hover:bg-gray-50 shadow-sm peer-checked:border-[#10B981] peer-checked:bg-emerald-50 peer-checked:[&_.bulatan]:border-[#10B981] peer-checked:[&_.bulatan]:bg-[#10B981] peer-checked:[&_svg]:block peer-checked:[&_span]:text-[#10B981]">
                <div class="bulatan w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center transition-all bg-white">
                  <svg class="w-3 h-3 text-white hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                  </svg>
                </div>
                <span class="text-sm font-semibold text-slate-700 transition-colors">Perempuan</span>
              </div>
            </label>

          </div>
        </div>

        <!-- Kotak Informasi -->
        <div class="bg-[#F0FDF4] border border-emerald-100 rounded-xl p-4 flex gap-3 items-start mt-2">
          <div class="w-5 h-5 bg-[#10B981] rounded-full flex flex-shrink-0 items-center justify-center text-white font-serif italic text-xs font-bold mt-0.5">
            i
          </div>
          <p class="text-xs text-slate-600 leading-relaxed font-medium">
            Profil anak digunakan untuk mencatat perkembangan belajar dan kebiasaan baik mereka.
          </p>
        </div>

        <!-- ================= TOMBOL AKSI ================= -->
        <div class="flex flex-col sm:flex-row gap-4 mt-6">
          <button type="submit" class="w-full sm:w-1/2 bg-[#10B981] text-white font-bold py-3.5 rounded-xl flex items-center justify-center hover:bg-[#059669] transition shadow-md cursor-pointer order-1 sm:order-2">
            Simpan Anak
          </button>

          <a href="{{ url('/halaman-anak') }}" class="w-full sm:w-1/2 bg-white border border-gray-200 text-slate-700 font-bold py-3.5 rounded-xl hover:bg-gray-50 transition shadow-sm cursor-pointer order-2 sm:order-1 flex items-center justify-center">
            Batal
          </a>
        </div>

      </form>
    </div>
  </main>

  <!-- ================= POPUP MODAL KONFIRMASI SIMPAN ================= -->
  <div id="saveModal" class="fixed inset-0 z-[70] hidden">
    <div id="saveBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <div class="flex items-center justify-center min-h-screen px-4 py-8 text-center sm:p-0 pointer-events-none">
      <div id="saveModalBox" class="relative bg-white rounded-[2rem] text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-sm w-full p-6 sm:p-8 opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95 duration-300 pointer-events-auto">

        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-emerald-50 mb-5">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-8 w-8 text-[#10B981]">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>

        <div class="text-center">
          <h3 class="text-xl font-extrabold text-[#1F2937] mb-2">Simpan Profil Anak?</h3>
          <p class="text-sm text-slate-500 leading-relaxed mb-8">
            Apakah Anda yakin data nama dan tanggal lahir anak sudah benar?
          </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-3">
          <button id="btnYaSimpan" type="button" onclick="window.location.href='{{ url('/halaman-anak') }}'" class="w-full sm:w-1/2 inline-flex justify-center items-center gap-2 rounded-xl bg-[#10B981] px-4 py-3.5 text-sm font-bold text-white shadow-sm hover:bg-[#059669] transition cursor-pointer order-1 sm:order-2">
            Ya, Simpan
          </button>

          <button id="btnBatalSimpan" type="button" onclick="toggleSaveModal(false)" class="w-full sm:w-1/2 inline-flex justify-center rounded-xl border border-gray-200 bg-white px-4 py-3.5 text-sm font-bold text-slate-700 shadow-sm hover:bg-gray-50 transition cursor-pointer order-2 sm:order-1">
            Batal
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= POPUP MODAL KELUAR ================= -->
  <div id="logoutModal" class="fixed inset-0 z-[70] hidden">
    <div id="logoutBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <div class="flex items-center justify-center min-h-screen px-4 py-8 text-center sm:p-0 pointer-events-none">
      <div id="logoutModalBox" class="relative bg-white rounded-[2rem] text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-sm w-full p-6 sm:p-8 opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95 duration-300 pointer-events-auto">

        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-50 mb-5">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-8 w-8 text-red-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
          </svg>
        </div>

        <div class="text-center">
          <h3 class="text-xl font-extrabold text-[#1F2937] mb-2">Keluar dari Akun?</h3>
          <p class="text-sm text-slate-500 leading-relaxed mb-8">
            Apakah Anda yakin ingin keluar? Anda harus masuk kembali untuk melihat cerita dan progres belajar anak.
          </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-3">
          <button type="button" onclick="window.location.href='{{ url('/login') }}'" class="w-full sm:w-1/2 inline-flex justify-center rounded-xl bg-red-500 px-4 py-3.5 text-sm font-bold text-white shadow-sm hover:bg-red-600 transition cursor-pointer order-1 sm:order-2">
            Ya, Keluar
          </button>
          <button type="button" onclick="toggleLogoutModal(false)" class="w-full sm:w-1/2 inline-flex justify-center rounded-xl border border-gray-200 bg-white px-4 py-3.5 text-sm font-bold text-slate-700 shadow-sm hover:bg-gray-50 transition cursor-pointer order-2 sm:order-1">
            Batal
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= FOOTER UTAMA ================= -->
  <footer class="bg-slate-50 pt-10 pb-16 mt-auto border-t border-gray-100">
    <div class="max-w-md mx-auto px-4 text-center flex flex-col items-center gap-3">
      <p class="text-[#1F2937] font-bold text-sm tracking-tight">
        BaliHabit <span class="text-slate-300 font-normal mx-1.5">•</span> <span class="font-semibold text-slate-500">© 2026</span>
      </p>

      <div class="flex flex-wrap justify-center items-center gap-2 text-xs font-bold text-[#10B981]">
        <a href="#" class="hover:underline transition">Kebijakan Privasi</a>
        <span class="text-slate-300">•</span>
        <a href="#" class="hover:underline transition">Ketentuan Layanan</a>
      </div>

      <div class="flex flex-wrap justify-center items-center gap-2 text-xs font-bold text-[#10B981]">
        <a href="{{ url('/halaman-bantuan') }}" class="hover:underline transition">Bantuan Ayah & Bunda</a>
        <span class="text-slate-300">•</span>
        <a href="{{ url('/admin/login') }}" class="hover:underline transition">Masuk sebagai Admin</a>
      </div>
    </div>
  </footer>

  <!-- ================= POPUP MENU NAVIGASI (Mobile) ================= -->
  <div id="mobileMenu" class="fixed inset-0 z-50 hidden lg:hidden">
    <div id="menuBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <div id="menuContent" class="absolute top-4 left-4 right-4 bg-white rounded-3xl p-5 shadow-2xl transform -translate-y-[150%] transition-transform duration-300 flex flex-col gap-5">
      <div class="flex justify-between items-center border-b border-gray-100 pb-4">
        <a href="{{ url('/dashboard') }}" class="flex items-center gap-3">
          <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center text-xl overflow-hidden">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo BaliHabit" class="w-full h-full rounded-full object-cover">
          </div>
          <div>
            <h2 class="text-lg font-extrabold text-[#1F2937] tracking-tight">Bali<span class="text-[#10B981]">Habit</span></h2>
            <p class="text-[10px] text-slate-500 font-medium">Menu Navigasi</p>
          </div>
        </a>
        <button id="closeMenuBtn" class="w-8 h-8 bg-gray-50 rounded-full flex items-center justify-center text-slate-500 hover:bg-gray-200 transition cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>

      <div class="flex flex-col gap-2">
        <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-500 font-bold hover:bg-slate-50 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
          Beranda Orang Tua
        </a>

        <a href="{{ url('/halaman-anak') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-[#10B981] bg-emerald-50 font-bold transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm3.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75z" />
          </svg>
          Profil Anak
        </a>

        <a href="{{ url('/profil-orangtua') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-500 font-bold hover:bg-slate-50 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
          Profil Saya
        </a>

        <div class="mt-6 pt-2">
          <button onclick="toggleLogoutModal(true)" class="w-full flex justify-center items-center gap-3 px-4 py-3.5 rounded-2xl text-red-500 font-bold border border-red-100 hover:bg-red-50 transition cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>
            Keluar Akun
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Script Menu Navbar Mobile, Animasi Simpan, dan Modal Logout -->
  <script src="{{ asset('assets/js/script.js') }}"></script>
  <script src="{{ asset('assets/js/tambah_anak.js') }}"></script>

  <!-- Script Pratinjau Unggah Foto -->
  <script>
    function previewImage(event) {
      const input = event.target;
      const preview = document.getElementById('fotoPreview');
      const icon = document.getElementById('fotoIcon');

      if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
          preview.src = e.target.result;
          preview.classList.remove('hidden');
          icon.classList.add('hidden');
        }

        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
</body>
</html>