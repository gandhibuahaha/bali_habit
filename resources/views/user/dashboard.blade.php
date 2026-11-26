<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda Orang Tua - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-slate-50 text-[#1F2937] min-h-screen">

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

    <!-- TENGAH: Menu Utama Desktop -->
    <div class="hidden lg:flex absolute left-1/2 -translate-x-1/2 items-center gap-8 text-sm font-bold text-slate-500 w-max">
      <a href="{{ url('/dashboard') }}" class="text-[#10B981] transition">Beranda Orang Tua</a>
      <a href="{{ url('/halaman-anak') }}" class="hover:text-[#10B981] transition">Profil Anak</a>
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

  <!-- ================= KONTEN UTAMA (GRID LAYOUT UNTUK DESKTOP) ================= -->
  <main class="max-w-6xl mx-auto px-4 sm:px-6 pt-4 pb-16">

    <!-- HEADER SAPAAN -->
    <header class="mb-8 md:mb-10">
      <h1 class="text-3xl md:text-4xl font-extrabold text-[#1F2937] mb-2 tracking-tight">Halo, Ayah/Ibu!</h1>
      <p class="text-slate-500 text-sm md:text-base">Mari dampingi perjalanan kebiasaan baik anak.</p>
    </header>

    <!-- PEMBAGIAN LAYAR (GRID: 1 Kolom di Mobile, 3 Kolom di Desktop) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

      <!-- ================= KIRI: SECTION ANAK SAYA (Ambil 2/3 layar Desktop) ================= -->
      <div class="lg:col-span-2 space-y-5">

        <!-- Judul Bagian Kiri -->
        <div class="flex justify-between items-center">
          <h2 class="text-lg md:text-xl font-bold text-[#1F2937]">Anak Saya</h2>
          <a href="{{ url('/halaman-anak') }}" class="text-sm font-bold text-[#10B981] flex items-center gap-1 hover:underline">
            Lihat semua
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
          </a>
        </div>

        <!-- DAFTAR KARTU ANAK (Grid: 1 Kolom HP, 2 Kolom Tablet/Desktop) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-5">

          @forelse ($children as $child)
          @php $isGirl = $child->gender === "female"; @endphp
          <!-- Kartu Anak -->
          <div class="bg-white border border-gray-100 rounded-[2rem] p-5 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start gap-3 mb-6">
              <div class="flex items-center gap-3 min-w-0">
                <div class="w-14 h-14 {{ $isGirl ? "bg-orange-50" : "bg-cyan-50" }} rounded-full flex items-center justify-center text-3xl overflow-hidden flex-shrink-0">
                  @if ($child->profile_picture)
                    <img src="{{ asset("storage/" . $child->profile_picture) }}" alt="Foto {{ $child->name }}" class="w-full h-full object-cover">
                  @else
                    {{ $isGirl ? "👧🏼" : "👦🏽" }}
                  @endif
                </div>
                <!-- Nama panjang dipotong dengan "…"; nama lengkap muncul saat kursor diarahkan -->
                <div class="min-w-0">
                  <h3 class="font-extrabold text-base text-[#1F2937] truncate" title="{{ $child->name }}">{{ $child->name }}</h3>
                  <p class="text-xs text-slate-500 font-medium">{{ $child->birth_date->age }} tahun</p>
                </div>
              </div>
              <!-- Bintang: belum ada data, diisi oleh fitur progress -->
              <div class="bg-yellow-100 text-yellow-800 px-3 py-1.5 rounded-full text-xs font-extrabold flex items-center gap-1.5 whitespace-nowrap flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-yellow-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" /></svg>
                0
              </div>
            </div>
            <div class="flex gap-2.5">
              <a href="{{ url("/progress-anak") }}?from=dashboard&anak={{ $child->child_id }}" class="flex-1 border border-[#10B981] text-[#10B981] font-bold py-2.5 rounded-xl text-xs hover:bg-emerald-50 transition flex items-center justify-center">
                Lihat Progress
              </a>
              <a href="{{ url("/belajar-bersama") }}?from=dashboard&anak={{ $child->child_id }}" class="flex-1 bg-[#10B981] text-white font-bold py-2.5 rounded-xl text-[11px] md:text-xs hover:bg-[#059669] transition shadow-sm flex items-center justify-center">
                Belajar Bersama
              </a>
            </div>
          </div>
          @empty
          <!-- Belum ada anak: tampilkan kartu Tambah Anak -->
          <a href="{{ url('/tambah-anak') }}" class="border-2 border-dashed border-[#10B981]/30 bg-emerald-50/30 rounded-[2rem] p-6 hover:bg-emerald-50/80 transition-colors flex flex-col items-center justify-center text-center h-full min-h-[200px] group cursor-pointer">
            <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center text-[#10B981] group-hover:scale-110 transition-transform duration-300 shadow-sm mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
            </div>
            <h3 class="font-bold text-base text-[#10B981] mb-1.5">+ Tambah Anak</h3>
            <p class="text-xs text-slate-500 leading-relaxed px-4">Tambahkan profil anak untuk memulai perjalanan belajar bersama.</p>
          </a>
          @endforelse
        </div>
      </div>

      <!-- ================= KANAN: SECTION AKTIVITAS (Ambil 1/3 layar Desktop) ================= -->
      <div class="lg:col-span-1 space-y-5">

        <h2 class="text-lg md:text-xl font-bold text-[#1F2937]">Aktivitas Terbaru</h2>

        <div class="bg-white border border-gray-100 rounded-[2rem] p-3 shadow-sm">

          @forelse ($activities as $activity)
          <div class="flex items-start gap-4 p-4 {{ $loop->last ? '' : 'border-b border-gray-50' }} hover:bg-slate-50 transition rounded-2xl">
            <div class="w-10 h-10 rounded-full {{ $activity['type'] === 'badge' ? 'bg-yellow-50' : 'bg-emerald-50' }} flex items-center justify-center flex-shrink-0">
              @if ($activity['type'] === 'story')
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-[#10B981]"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
              @elseif ($activity['type'] === 'badge')
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-yellow-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" /></svg>
              @else
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-[#10B981]"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
              @endif
            </div>
            @php
              $verb = [
                'story' => 'menyelesaikan cerita',
                'mission' => 'menyelesaikan misi cerita',
                'reflection' => 'mengisi refleksi cerita',
                'badge' => 'mendapatkan lencana',
              ][$activity['type']];
            @endphp
            {{-- Satu baris saja; kalimat panjang dipotong dengan "…", lengkapnya saat kursor diarahkan --}}
            <div class="min-w-0 flex-1">
              <p class="text-[13px] md:text-sm text-[#1F2937] leading-relaxed truncate" title="{{ $activity['child'] }} {{ $verb }} &quot;{{ $activity['subject'] }}&quot;">
                <span class="font-extrabold">{{ $activity['child'] }}</span> {{ $verb }} "{{ $activity['subject'] }}"
              </p>
              <p class="text-[11px] text-slate-400 mt-1 font-medium">{{ $activity['time_label'] }}</p>
            </div>
          </div>
          @empty
          <p class="text-[13px] text-slate-400 p-4 leading-relaxed">Belum ada aktivitas. Ajak anak membaca cerita di Belajar Bersama!</p>
          @endforelse

        </div>
      </div>

    </div>
  </main>

<!-- ================= FOOTER UTAMA (KONSISTEN) ================= -->
  <footer class="bg-slate-50 pt-10 pb-16 mt-auto border-t border-gray-100">
    <div class="max-w-md mx-auto px-4 text-center flex flex-col items-center gap-3">

      <!-- Baris 1: Nama Brand & Tahun -->
      <p class="text-[#1F2937] font-bold text-sm tracking-tight">
        BaliHabit <span class="text-slate-300 font-normal mx-1.5">•</span> <span class="font-semibold text-slate-500">© 2026</span>
      </p>

      <!-- Baris 2: Tautan Menu (Baris Pertama) -->
      <div class="flex flex-wrap justify-center items-center gap-2 text-xs font-bold text-[#10B981]">
        <a href="#" class="hover:underline transition">Kebijakan Privasi</a>
        <span class="text-slate-300">•</span>
        <a href="#" class="hover:underline transition">Ketentuan Layanan</a>
      </div>

      <!-- Baris 3: Tautan Menu (Baris Kedua) -->
      <div class="flex flex-wrap justify-center items-center gap-2 text-xs font-bold text-[#10B981]">
        <a href="{{ url('/halaman-bantuan') }}" class="hover:underline transition">Bantuan Ayah & Bunda</a>
      </div>

    </div>
  </footer>

  <!-- ================= POPUP MENU NAVIGASI (Hanya muncul di Mobile) ================= -->
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
        <!-- Beranda Orang Tua (Aktif) -->
        <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-[#10B981] bg-emerald-50 font-bold transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
          Beranda Orang Tua
        </a>

        <!-- Profil Anak -->
        <a href="{{ url('/halaman-anak') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-500 font-bold hover:bg-slate-50 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm3.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75z" />
          </svg>
          Profil Anak
        </a>

        <!-- Profil Saya -->
        <a href="{{ url('/profil-orangtua') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-500 font-bold hover:bg-slate-50 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
          Profil Saya
        </a>

        <!-- Tombol Keluar Akun (Mobile) memicu Modal -->
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
  <div id="logoutModal" class="fixed inset-0 z-[60] hidden flex items-center justify-center p-4">
    <!-- Latar Belakang Gelap -->
    <div id="logoutBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <!-- Kotak Popup -->
    <div id="logoutContent" class="bg-white rounded-[2rem] p-6 w-full max-w-[320px] relative z-10 transform scale-95 opacity-0 transition-all duration-300 flex flex-col items-center text-center shadow-2xl">

      <!-- Ikon Peringatan -->
      <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center text-red-500 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
        </svg>
      </div>

      <h3 class="text-xl font-extrabold text-[#1F2937] mb-2 tracking-tight">Keluar Akun?</h3>
      <p class="text-sm text-slate-500 mb-7 leading-relaxed">Apakah Anda yakin ingin keluar dari aplikasi BaliHabit?</p>

      <div class="flex gap-3 w-full">
        <!-- Tombol Batal -->
        <button onclick="closeLogoutModal()" class="flex-1 bg-slate-50 text-slate-500 font-bold py-3.5 rounded-2xl hover:bg-slate-100 transition border border-slate-100 cursor-pointer">
          Batal
        </button>
        <!-- Tombol Ya, Keluar -->
        <button onclick="document.getElementById('logoutForm').submit()" class="flex-1 bg-red-500 text-white font-extrabold py-3.5 rounded-2xl hover:bg-red-600 transition shadow-sm shadow-red-200 cursor-pointer">
          Ya, Keluar
        </button>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/js/script.js') }}"></script>
  <!-- Form logout (POST + CSRF): dipakai tombol "Ya, Keluar" -->
  <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
</body>
</html>