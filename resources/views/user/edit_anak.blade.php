<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Anak - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-slate-50 text-[#1F2937] min-h-screen flex flex-col">

<!-- ================= NAV BAR ================= -->
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

    <!-- TENGAH: Menu Utama -->
    <div class="hidden lg:flex absolute left-1/2 -translate-x-1/2 items-center gap-8 text-sm font-bold text-slate-500 w-max">
      <a href="{{ url('/dashboard') }}" class="hover:text-[#10B981] transition">Beranda Orang Tua</a>
      <a href="{{ url('/halaman-anak') }}" class="text-[#10B981] transition">Profil Anak</a>
      <a href="{{ url('/profil-orangtua') }}" class="hover:text-[#10B981] transition">Profil Saya</a>
    </div>

    <!-- KANAN: Tombol Keluar & Hamburger -->
    <div class="flex items-center gap-4 z-10">
      <!-- Tombol Keluar (Desktop) memicu Modal -->
      <button onclick="openLogoutModal()" class="hidden lg:flex items-center gap-1.5 text-slate-400 hover:text-red-500 transition group cursor-pointer" title="Keluar">
        <span class="hidden xl:block group-hover:text-red-500">Keluar</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
        </svg>
      </button>

      <!-- Tombol Hamburger (Mobile) -->
      <button id="hamburgerBtn" class="lg:hidden w-10 h-10 flex items-center justify-center rounded-full border border-gray-200 bg-white text-slate-600 hover:bg-gray-50 transition cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
      </button>
    </div>
  </nav>

  <!-- ================= KONTEN UTAMA ================= -->
  <main class="w-full max-w-2xl mx-auto px-4 sm:px-6 py-8 flex-grow">

    <!-- Tombol Kembali -->
    <a href="{{ url('/progress-anak') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-[#10B981] font-bold text-sm mb-6 transition cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
      Kembali ke Progress Anak
    </a>

    <!-- KOTAK FORM UTAMA -->
    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-6 sm:p-10">

      <!-- Header Form -->
      <div class="mb-8 text-center sm:text-left">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-[#1F2937] mb-2 tracking-tight">Edit Anak</h1>
        <p class="text-slate-500 text-sm leading-relaxed">
          Perbarui informasi profil anak.
        </p>
      </div>

      <!-- Area Ubah Foto -->
      <div class="flex flex-col items-center justify-center mb-8">

        <!-- Input File Tersembunyi -->
        <input type="file" id="fotoInput" accept="image/*" class="hidden" onchange="previewImage(event)">

        <div class="relative mb-4 cursor-pointer hover:opacity-90 transition group" onclick="document.getElementById('fotoInput').click();">
          <!-- Area Lingkaran Foto -->
          <div class="w-24 h-24 sm:w-28 sm:h-28 bg-[#FFFBEB] rounded-full flex items-center justify-center border-2 border-[#FDE68A] overflow-hidden">
            <!-- Icon Awal (Sebelum Diganti) -->
            <span id="fotoIcon" class="text-5xl sm:text-6xl pb-2">👧🏼</span>

            <!-- Image Preview (Disembunyikan secara default) -->
            <img id="fotoPreview" class="hidden w-full h-full object-cover">
          </div>

          <div class="absolute bottom-0 right-0 bg-[#10B981] rounded-full p-2 border-[3px] border-white text-white shadow-sm transition-transform group-hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
              <path d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z" />
              <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
            </svg>
          </div>
        </div>

        <button type="button" onclick="document.getElementById('fotoInput').click();" class="border border-gray-200 text-slate-700 text-xs font-bold px-5 py-2.5 rounded-full hover:bg-gray-100 transition shadow-sm mb-1.5 cursor-pointer">
          Ubah Foto
        </button>
        <p class="text-[11px] text-slate-400">Foto profil anak</p>
      </div>

      <!-- FORM PENGISIAN -->
      <form class="flex flex-col gap-5" id="formEditAnak">
        <div>
          <label class="block text-sm font-bold text-[#1F2937] mb-2">Nama Anak <span class="text-red-500">*</span></label>
          <input type="text" value="Ayu" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3.5 text-sm text-slate-800 font-medium focus:outline-none focus:border-[#10B981] focus:ring-1 focus:ring-[#10B981] transition shadow-sm">
        </div>

        <div>
          <label class="block text-sm font-bold text-[#1F2937] mb-2">Tanggal Lahir <span class="text-red-500">*</span></label>
          <input type="date" value="2018-08-12" class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3.5 text-sm text-slate-800 font-medium focus:outline-none focus:border-[#10B981] focus:ring-1 focus:ring-[#10B981] transition shadow-sm cursor-pointer">
        </div>

        <div>
          <label class="block text-sm font-bold text-[#1F2937] mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
          <div class="flex gap-3">

            <!-- Pilihan Laki-laki -->
            <label class="flex-1 relative cursor-pointer group">
              <input type="radio" name="gender" value="laki-laki" class="peer sr-only" id="laki">
              <div class="border border-gray-200 bg-white rounded-xl p-3.5 flex items-center justify-center gap-2.5 transition hover:bg-gray-50 shadow-sm peer-checked:border-[#10B981] peer-checked:bg-emerald-50 peer-checked:[&_.bulatan]:border-[#10B981] peer-checked:[&_.bulatan]:bg-[#10B981] peer-checked:[&_svg]:block peer-checked:[&_span]:text-[#10B981]">
                <div class="bulatan w-5 h-5 rounded-full border-2 border-gray-300 flex items-center justify-center transition-all bg-white">
                  <svg class="w-3 h-3 text-white hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                  </svg>
                </div>
                <span class="text-sm font-semibold text-slate-700 transition-colors">Laki-laki</span>
              </div>
            </label>

            <!-- Pilihan Perempuan -->
            <label class="flex-1 relative cursor-pointer group">
              <input type="radio" name="gender" value="perempuan" class="peer sr-only" id="perempuan" checked>
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

        <div class="bg-[#F8FAFC] border border-gray-100 rounded-xl p-4 flex gap-3 items-start mt-2">
          <div class="w-5 h-5 bg-slate-500 rounded-full flex flex-shrink-0 items-center justify-center text-white font-serif italic text-xs font-bold mt-0.5">i</div>
          <p class="text-xs text-slate-600 leading-relaxed font-medium">Perubahan profil anak akan digunakan pada seluruh catatan progress belajar.</p>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 mt-4">
          <button type="button" onclick="toggleSaveModal(true)" class="w-full sm:w-1/2 bg-[#10B981] text-white font-bold py-3.5 rounded-xl hover:bg-[#059669] transition shadow-md cursor-pointer order-1 sm:order-2">
            Simpan Perubahan
          </button>
          <a href="{{ url('/progress-anak') }}" class="w-full sm:w-1/2 bg-white border border-gray-200 text-slate-700 font-bold py-3.5 rounded-xl hover:bg-gray-50 transition shadow-sm cursor-pointer order-2 sm:order-1 flex items-center justify-center">
            Batal
          </a>
        </div>
      </form>

      <!-- ================= BAGIAN KELOLA PROFIL (HAPUS ANAK) ================= -->
      <div class="mt-10 pt-8 border-t border-gray-100">
        <h3 class="text-sm font-extrabold text-[#1F2937] tracking-wider mb-1 uppercase">Kelola Profil Anak</h3>
        <p class="text-[13px] text-slate-500 mb-5">Hapus profil anak jika sudah tidak digunakan.</p>

        <button onclick="toggleDeleteModal(true)" type="button" class="w-full bg-white border border-gray-200 text-slate-600 font-bold py-3.5 rounded-xl flex items-center justify-center gap-2.5 hover:bg-red-50 hover:text-red-600 hover:border-red-200 transition shadow-sm cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
          </svg>
          Hapus Profil Anak
        </button>
      </div>

    </div>
  </main>

  <!-- ================= POPUP MODAL SIMPAN PERUBAHAN ================= -->
  <div id="saveModal" class="fixed inset-0 z-[70] hidden">
    <div id="saveBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <div class="flex items-center justify-center min-h-screen px-4 py-8 text-center sm:p-0 pointer-events-none">
      <div id="saveModalBox" class="relative bg-white rounded-[2rem] text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-md w-full p-6 sm:p-8 opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95 duration-300 pointer-events-auto">

        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-emerald-50 mb-5 border border-emerald-100">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-8 w-8 text-[#10B981]">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>

        <div class="text-center">
          <h3 class="text-xl sm:text-2xl font-extrabold text-[#1F2937] mb-3">Simpan Profil Anak?</h3>
          <p class="text-sm text-slate-500 leading-relaxed mb-8 px-2 sm:px-6">
            Apakah Anda yakin data nama dan tanggal lahir anak sudah benar?
          </p>
        </div>

        <div class="flex gap-4 w-full">
          <button type="button" onclick="toggleSaveModal(false)" class="flex-1 inline-flex justify-center rounded-2xl border border-gray-200 bg-white px-4 py-3.5 text-sm font-bold text-slate-700 shadow-sm hover:bg-gray-50 focus:outline-none transition cursor-pointer">
            Batal
          </button>
          <button type="button" onclick="window.location.href='{{ url('/halaman-anak') }}'" class="flex-1 inline-flex justify-center rounded-2xl border border-transparent bg-[#10B981] px-4 py-3.5 text-sm font-bold text-white shadow-sm hover:bg-[#059669] focus:outline-none transition cursor-pointer">
            Ya, Simpan
          </button>
        </div>

      </div>
    </div>
  </div>

  <!-- ================= POPUP MODAL HAPUS ANAK ================= -->
  <div id="deleteModal" class="fixed inset-0 z-[70] hidden">
    <div id="deleteBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <div class="flex items-center justify-center min-h-screen px-4 py-8 text-center sm:p-0 pointer-events-none">
      <div id="deleteModalBox" class="relative bg-white rounded-[2rem] text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-sm w-full p-6 sm:p-8 opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95 duration-300 pointer-events-auto">

        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100 mb-5">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-8 w-8 text-red-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
        </div>

        <div class="text-center">
          <h3 class="text-xl font-extrabold text-[#1F2937] mb-2">Hapus Profil Ayu?</h3>
          <p class="text-sm text-slate-500 leading-relaxed mb-8">
            Tindakan ini tidak dapat dibatalkan. Seluruh riwayat cerita dan <i>progress</i> belajar anak akan terhapus secara permanen.
          </p>
        </div>

        <div class="flex flex-col gap-3">
          <button type="button" onclick="window.location.href='{{ url('/halaman-anak') }}'" class="w-full inline-flex justify-center rounded-xl border border-transparent bg-red-600 px-4 py-3.5 text-sm font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none transition cursor-pointer">
            Ya, Hapus Profil
          </button>
          <button type="button" onclick="toggleDeleteModal(false)" class="w-full inline-flex justify-center rounded-xl border border-gray-200 bg-white px-4 py-3.5 text-sm font-bold text-slate-700 shadow-sm hover:bg-gray-50 focus:outline-none transition cursor-pointer">
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
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo BaliHabit" class="w-7 h-7 rounded-full object-cover">
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
          <button onclick="openLogoutModal()" class="w-full flex justify-center items-center gap-3 px-4 py-3.5 rounded-2xl text-red-500 font-bold border border-red-100 hover:bg-red-50 transition cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>
            Keluar Akun
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= POPUP KONFIRMASI KELUAR ================= -->
  <div id="logoutModal" class="fixed inset-0 z-[80] hidden flex items-center justify-center p-4">
    <div id="logoutBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <div id="logoutContent" class="bg-white rounded-[2rem] p-6 w-full max-w-[320px] relative z-10 transform scale-95 opacity-0 transition-all duration-300 flex flex-col items-center text-center shadow-2xl">
      <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center text-red-500 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
        </svg>
      </div>

      <h3 class="text-xl font-extrabold text-[#1F2937] mb-2 tracking-tight">Keluar Akun?</h3>
      <p class="text-sm text-slate-500 mb-7 leading-relaxed">Apakah Anda yakin ingin keluar dari aplikasi BaliHabit?</p>

      <div class="flex gap-3 w-full">
        <button onclick="closeLogoutModal()" class="flex-1 bg-slate-50 text-slate-500 font-bold py-3.5 rounded-2xl hover:bg-slate-100 transition border border-slate-100 cursor-pointer">
          Batal
        </button>
        <button onclick="window.location.replace('{{ url('/login') }}')" class="flex-1 bg-red-500 text-white font-extrabold py-3.5 rounded-2xl hover:bg-red-600 transition shadow-sm shadow-red-200 cursor-pointer">
          Ya, Keluar
        </button>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/js/script.js') }}"></script>
  <script>
    function toggleDeleteModal(show) {
      const modal = document.getElementById('deleteModal');
      const backdrop = document.getElementById('deleteBackdrop');
      const box = document.getElementById('deleteModalBox');

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

        setTimeout(() => {
          modal.classList.add('hidden');
        }, 300);
      }
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

        setTimeout(() => {
          modal.classList.add('hidden');
        }, 300);
      }
    }

    // Fungsi untuk pratinjau foto yang dipilih
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