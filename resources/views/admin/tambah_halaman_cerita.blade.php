<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Halaman Cerita - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/admin/code_global.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/js/admin/global_admin.js') }}" defer></script>
</head>
<body class="bg-[#F8FAFC] text-slate-800 font-sans antialiased flex min-h-screen items-start relative overflow-x-hidden">

  <!-- ================= MOBILE OVERLAY ================= -->
  <div id="mobileOverlay" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-30 opacity-0 invisible transition-all duration-300 lg:hidden"></div>

  <!-- ================= SIDEBAR KIRI ================= -->
  <aside id="sidebar" class="w-[260px] bg-white border-r border-slate-100 flex-col flex-shrink-0 z-40 fixed inset-y-0 left-0 flex transform -translate-x-full lg:translate-x-0">
    <!-- Logo & Brand Admin -->
    <div class="pt-8 pb-6 px-6 flex flex-col gap-6">
      <a href="{{ url('/admin/dashboard') }}" class="sidebar-logo-link flex items-center gap-3 hover:opacity-80 transition">
        <div class="w-10 h-10 bg-emerald-50 rounded-full flex items-center justify-center border border-emerald-100 overflow-hidden flex-shrink-0">
          <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-full h-full rounded-full object-cover">
        </div>
        <div class="sidebar-text flex flex-col transition-opacity duration-200 whitespace-nowrap">
          <span class="text-[19px] font-extrabold tracking-tight text-[#1E293B] leading-none">
            Bali<span class="text-[#10B981]">Habit</span>
          </span>
          <span class="text-[9px] font-bold text-slate-400 tracking-[0.15em] mt-1 uppercase">
            Admin Panel
          </span>
        </div>
      </a>
      <hr class="sidebar-divider border-slate-100">
    </div>

    <!-- Menu Navigasi Admin -->
    <div class="flex-1 overflow-y-auto px-4 overflow-x-hidden">
      <p class="sidebar-text text-[10px] font-bold text-slate-500 tracking-[0.1em] mb-3 px-3 uppercase whitespace-nowrap">Menu Utama</p>
      
      <nav class="flex flex-col gap-1.5">
        <a href="{{ url('/admin/dashboard') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group" title="Beranda">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.592 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Beranda</span>
        </a>

        <a href="{{ url('/admin/user-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group" title="User Management">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">User Management</span>
        </a>

        <!-- Menu Aktif: Story Management -->
        <a href="{{ url('/admin/story-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] bg-[#10B981] text-white transition shadow-[0_2px_10px_rgba(16,185,129,0.2)]" title="Story Management">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 flex-shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-bold whitespace-nowrap">Story Management</span>
        </a>

        <a href="{{ url('/admin/refleksi-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group" title="Refleksi Management">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Refleksi Management</span>
        </a>

        <a href="{{ url('/admin/mission-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group" title="Mission Management">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Mission Management</span>
        </a>

        <a href="{{ url('/admin/lencana-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group" title="Lencana Management">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Lencana Management</span>
        </a>
      </nav>
    </div>

    <!-- Footer Sidebar -->
    <div class="pb-8 pt-4 text-center overflow-hidden">
      <span class="sidebar-text text-[10.5px] text-slate-400 font-medium whitespace-nowrap">BaliHabit © 2026</span>
    </div>
  </aside>

  <!-- ================= AREA UTAMA (KANAN) ================= -->
  <main id="mainContent" class="flex-1 flex flex-col min-w-0 bg-[#F8FAFC] min-h-screen lg:ml-[260px]">
    
    <!-- HEADER ATAS -->
    <header class="h-[72px] bg-white border-b border-slate-100 flex items-center justify-between px-8 z-30 sticky top-0 flex-shrink-0">
      <div class="flex items-center gap-4">
        <!-- Hamburger Menu Button -->
        <button id="sidebarToggleBtn" class="text-slate-500 hover:text-[#10B981] hover:bg-slate-50 transition p-2 rounded-lg focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
        <!-- Breadcrumb sesuai desain -->
        <div class="hidden sm:flex items-center text-[13px] font-bold text-slate-400">
          <span class="hover:text-[#10B981] transition">Portal Admin</span>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 mx-2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5 L15.75 12 L8.25 19.5" />
          </svg>
          <a href="{{ url('/admin/story-management') }}" class="hover:text-[#10B981] transition">Story Management</a>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 mx-2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5 L15.75 12 L8.25 19.5" />
          </svg>
          <span class="text-[#10B981]">Tambah Halaman</span>
        </div>
      </div>

      <div class="flex items-center gap-6">
        <button class="relative text-slate-400 hover:text-[#10B981] transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" /></svg>
          <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 border-2 border-white rounded-full"></span>
        </button>

        <!-- Garis Pemisah Header -->
        <div class="h-6 w-px bg-slate-200"></div>

        <!-- Profil Dropdown Container -->
        <div class="relative">
          <button id="profileDropdownBtn" class="flex items-center gap-3 cursor-pointer p-1.5 pr-3 border border-slate-100 rounded-full hover:bg-slate-50 transition focus:outline-none">
            <div class="w-8 h-8 rounded-full bg-emerald-100 text-[#10B981] font-bold flex items-center justify-center text-[12px] shadow-sm overflow-hidden">@if ($adminPhoto)<img src="{{ $adminPhoto }}" alt="Foto {{ $admin->name }}" class="w-full h-full object-cover">@else{{ $adminInitials }}@endif</div>
            <span class="text-[13px] font-bold text-[#1E293B] hidden sm:block">{{ $admin->name }}</span>
            <svg id="profileChevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 text-slate-400 hidden sm:block transition-transform duration-200"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
          </button>

          <div id="profileDropdownMenu" class="absolute right-0 mt-3 w-[270px] bg-white border border-slate-100 rounded-[20px] shadow-[0_10px_40px_-10px_rgba(0,0,0,0.08)] opacity-0 invisible transform scale-95 transition-all duration-200 z-50 overflow-hidden origin-top-right">
            <div class="p-4 bg-white border-b border-slate-50 flex items-center gap-3">
              <div class="w-11 h-11 rounded-full bg-emerald-100 text-[#10B981] font-bold flex items-center justify-center text-sm flex-shrink-0 overflow-hidden">@if ($adminPhoto)<img src="{{ $adminPhoto }}" alt="Foto {{ $admin->name }}" class="w-full h-full object-cover">@else{{ $adminInitials }}@endif</div>
              <div class="flex flex-col min-w-0">
                <div class="flex items-center gap-2 mb-0.5">
                  <span class="text-[14px] font-extrabold text-[#0F172A] truncate">{{ $admin->name }}</span>
                </div>
                <span class="text-[11.5px] font-medium text-slate-400 truncate">{{ $admin->email }}</span>
              </div>
            </div>
            
            <!-- Menu Navigasi -->
            <div class="p-2 flex flex-col gap-1">
              <a href="{{ url('/admin/profil') }}" class="flex items-center justify-between px-3.5 py-3 rounded-[14px] text-slate-500 hover:bg-emerald-50 hover:text-[#10B981] transition group">
                <div class="flex items-center gap-3">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-slate-400 group-hover:text-[#10B981] transition"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                  <span class="text-[13px] font-bold">Profil</span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 text-slate-300 group-hover:text-[#10B981] group-hover:translate-x-0.5 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
              </a>
              
              <button type="button" onclick="openLogoutModal()" class="w-full flex items-center gap-3 px-3.5 py-3 rounded-[14px] text-red-500 hover:bg-red-50 transition group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 group-hover:-translate-x-0.5 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" /></svg>
                <span class="text-[13px] font-bold">Keluar</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- KONTEN UTAMA: TAMBAH HALAMAN CERITA -->
    <div class="p-8 mb-10 flex-1">
      <div class="max-w-[1000px] mx-auto flex flex-col">
        
        <!-- Link Kembali -->
        <div class="mb-4">
          <a href="{{ url('/admin/detail-cerita') }}" class="inline-flex items-center gap-2 text-[13.5px] font-bold text-slate-500 hover:text-[#10B981] transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            Kembali ke Kelola Halaman Cerita
          </a>
        </div>

        <!-- Judul Halaman -->
        <div>
          <h1 class="text-[26px] font-extrabold text-[#0F172A] tracking-tight mb-1">Tambah Halaman Cerita</h1>
          <p class="text-slate-500 text-[13.5px]">Lengkapi konten untuk halaman cerita ini.</p>
        </div>

        <!-- Form Container -->
        <div class="bg-white border border-slate-100 rounded-[24px] shadow-sm p-8 mt-6 flex flex-col gap-8">
          
          <!-- Urutan Halaman -->
          <div>
            <label class="block text-[13.5px] font-bold text-[#0F172A] mb-2">
              Urutan Halaman <span class="text-red-500">*</span>
            </label>
            <input type="text" placeholder="Masukkan urutan halaman..." class="w-full bg-white border border-slate-200 rounded-[12px] px-4 py-3 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] transition" required>
            <p class="text-[12px] font-medium text-slate-400 mt-2">
              Masukkan urutan halaman sesuai dengan alur cerita. (Contoh: 1, 2, 3, 4, ...)
            </p>
          </div>

          <!-- Ilustrasi Halaman -->
          <div>
            <label class="block text-[13.5px] font-bold text-[#0F172A] mb-2">
              Ilustrasi Halaman <span class="text-red-500">*</span>
            </label>
            <div id="illustrationUploadArea" class="border-2 border-dashed border-[#10B981] rounded-[16px] bg-white hover:bg-emerald-50/20 transition-colors p-8 flex flex-col items-center justify-center text-center h-[240px] cursor-pointer group relative overflow-hidden">
              <div class="w-14 h-14 bg-emerald-50 rounded-[12px] flex items-center justify-center text-[#10B981] mb-4 z-10 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
              </div>
              <h4 id="illustrationText" class="text-[14px] font-bold text-[#0F172A] mb-1 group-hover:text-[#10B981] transition z-10">Klik untuk mengunggah gambar</h4>
              <p class="text-[12px] font-medium text-slate-400 mb-4 z-10">Format: JPG, PNG (Maks. 2 MB)</p>
              <button type="button" class="px-6 py-2 bg-white border border-slate-200 group-hover:border-[#10B981] group-hover:text-[#10B981] rounded-[10px] text-slate-600 text-[12.5px] font-bold transition shadow-sm z-10 pointer-events-none">
                Pilih Gambar
              </button>

              <!-- Hidden file input & Preview Image -->
              <input type="file" id="illustrationInput" class="hidden" accept="image/png, image/jpeg, image/jpg">
              <img id="illustrationPreview" src="#" alt="Preview Ilustrasi" class="absolute inset-0 w-full h-full object-cover hidden z-0 group-hover:opacity-75 transition-opacity duration-300">
            </div>
          </div>

          <!-- SECTION BAHASA BALI -->
          <div class="bg-slate-50 border border-slate-100 rounded-[16px] p-6">
            <h3 class="font-extrabold text-[15px] text-[#0F172A] mb-5">Bahasa Bali</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Teks -->
              <div>
                <label class="block text-[12.5px] font-bold text-[#0F172A] mb-2">
                  Teks Bahasa Bali <span class="text-red-500">*</span>
                </label>
                <textarea id="teksBali" rows="4" maxlength="500" placeholder="Masukkan teks dalam Bahasa Bali..." class="w-full bg-white border border-slate-200 rounded-[12px] px-4 py-3 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] transition resize-none" required></textarea>
                <div class="flex justify-end mt-1">
                  <span id="countBali" class="text-[11.5px] font-bold text-slate-400">0/500</span>
                </div>
              </div>
              <!-- Audio -->
              <div>
                <label class="block text-[12.5px] font-bold text-[#0F172A] mb-2">
                  Audio Bahasa Bali <span class="text-red-500">*</span>
                </label>
                <div id="audioBaliArea" class="border-2 border-dashed border-slate-200 hover:border-[#10B981] hover:bg-emerald-50/20 bg-white rounded-[12px] p-4 flex flex-row items-center justify-between h-[106px] cursor-pointer transition group relative overflow-hidden">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-emerald-50 rounded-[8px] flex items-center justify-center text-[#10B981] flex-shrink-0">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" />
                      </svg>
                    </div>
                    <div class="min-w-0">
                      <h4 id="audioBaliText" class="text-[12.5px] font-bold text-[#0F172A] group-hover:text-[#10B981] transition truncate max-w-[150px] sm:max-w-[200px]">Klik untuk mengunggah audio</h4>
                      <p class="text-[11px] font-medium text-slate-400">Format: MP3, WAV (Maks. 5 MB)</p>
                    </div>
                  </div>
                  <button type="button" class="px-4 py-2 bg-white border border-slate-200 group-hover:border-[#10B981] group-hover:text-[#10B981] rounded-[8px] text-slate-600 text-[12px] font-bold transition shadow-sm whitespace-nowrap pointer-events-none">
                    Pilih Audio
                  </button>
                  <input type="file" id="audioBaliInput" class="hidden" accept="audio/mpeg, audio/wav">
                </div>
              </div>
            </div>
          </div>

          <!-- SECTION BAHASA INDONESIA -->
          <div class="bg-slate-50 border border-slate-100 rounded-[16px] p-6">
            <h3 class="font-extrabold text-[15px] text-[#0F172A] mb-5">Bahasa Indonesia</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Teks -->
              <div>
                <label class="block text-[12.5px] font-bold text-[#0F172A] mb-2">
                  Teks Bahasa Indonesia <span class="text-red-500">*</span>
                </label>
                <textarea id="teksIndo" rows="4" maxlength="500" placeholder="Masukkan teks dalam Bahasa Indonesia..." class="w-full bg-white border border-slate-200 rounded-[12px] px-4 py-3 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] transition resize-none" required></textarea>
                <div class="flex justify-end mt-1">
                  <span id="countIndo" class="text-[11.5px] font-bold text-slate-400">0/500</span>
                </div>
              </div>
              <!-- Audio -->
              <div>
                <label class="block text-[12.5px] font-bold text-[#0F172A] mb-2">
                  Audio Bahasa Indonesia <span class="text-red-500">*</span>
                </label>
                <div id="audioIndoArea" class="border-2 border-dashed border-slate-200 hover:border-[#10B981] hover:bg-emerald-50/20 bg-white rounded-[12px] p-4 flex flex-row items-center justify-between h-[106px] cursor-pointer transition group relative overflow-hidden">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-emerald-50 rounded-[8px] flex items-center justify-center text-[#10B981] flex-shrink-0">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" />
                      </svg>
                    </div>
                    <div class="min-w-0">
                      <h4 id="audioIndoText" class="text-[12.5px] font-bold text-[#0F172A] group-hover:text-[#10B981] transition truncate max-w-[150px] sm:max-w-[200px]">Klik untuk mengunggah audio</h4>
                      <p class="text-[11px] font-medium text-slate-400">Format: MP3, WAV (Maks. 5 MB)</p>
                    </div>
                  </div>
                  <button type="button" class="px-4 py-2 bg-white border border-slate-200 group-hover:border-[#10B981] group-hover:text-[#10B981] rounded-[8px] text-slate-600 text-[12px] font-bold transition shadow-sm whitespace-nowrap pointer-events-none">
                    Pilih Audio
                  </button>
                  <input type="file" id="audioIndoInput" class="hidden" accept="audio/mpeg, audio/wav">
                </div>
              </div>
            </div>
          </div>

          <!-- SECTION ENGLISH -->
          <div class="bg-slate-50 border border-slate-100 rounded-[16px] p-6">
            <h3 class="font-extrabold text-[15px] text-[#0F172A] mb-5">English</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Teks -->
              <div>
                <label class="block text-[12.5px] font-bold text-[#0F172A] mb-2">
                  English Text <span class="text-red-500">*</span>
                </label>
                <textarea id="teksEn" rows="4" maxlength="500" placeholder="Enter the text in English..." class="w-full bg-white border border-slate-200 rounded-[12px] px-4 py-3 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] transition resize-none" required></textarea>
                <div class="flex justify-end mt-1">
                  <span id="countEn" class="text-[11.5px] font-bold text-slate-400">0/500</span>
                </div>
              </div>
              <!-- Audio -->
              <div>
                <label class="block text-[12.5px] font-bold text-[#0F172A] mb-2">
                  English Audio <span class="text-red-500">*</span>
                </label>
                <div id="audioEnArea" class="border-2 border-dashed border-slate-200 hover:border-[#10B981] hover:bg-emerald-50/20 bg-white rounded-[12px] p-4 flex flex-row items-center justify-between h-[106px] cursor-pointer transition group relative overflow-hidden">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-emerald-50 rounded-[8px] flex items-center justify-center text-[#10B981] flex-shrink-0">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" />
                      </svg>
                    </div>
                    <div class="min-w-0">
                      <h4 id="audioEnText" class="text-[12.5px] font-bold text-[#0F172A] group-hover:text-[#10B981] transition truncate max-w-[150px] sm:max-w-[200px]">Klik untuk mengunggah audio</h4>
                      <p class="text-[11px] font-medium text-slate-400">Format: MP3, WAV (Maks. 5 MB)</p>
                    </div>
                  </div>
                  <button type="button" class="px-4 py-2 bg-white border border-slate-200 group-hover:border-[#10B981] group-hover:text-[#10B981] rounded-[8px] text-slate-600 text-[12px] font-bold transition shadow-sm whitespace-nowrap pointer-events-none">
                    Pilih Audio
                  </button>
                  <input type="file" id="audioEnInput" class="hidden" accept="audio/mpeg, audio/wav">
                </div>
              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="flex items-center justify-between mt-4">
            <a href="{{ url('/admin/detail-cerita') }}" class="px-6 py-2.5 border border-slate-200 hover:border-[#10B981] bg-white text-slate-600 hover:text-[#10B981] hover:bg-emerald-50/20 rounded-[12px] text-[13.5px] font-bold transition shadow-sm">
              Batal
            </a>
            <!-- Memanggil JS Modal -->
            <button type="button" onclick="openSaveModal()" class="px-6 py-2.5 bg-[#10B981] hover:bg-[#059669] text-white rounded-[12px] text-[13.5px] font-bold shadow-sm transition">
              Simpan Halaman
            </button>
          </div>

        </div>

      </div>
    </div>
  </main>

  <!-- ================= POPUP KONFIRMASI KELUAR (LOGOUT) ================= -->
  <div id="logoutModal" class="fixed inset-0 z-[60] hidden">
    <div id="logoutBackdrop" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>
    <div class="fixed inset-0 z-10 flex items-center justify-center p-4 sm:p-0">
      <div id="logoutContent" class="relative bg-white rounded-[24px] shadow-xl w-full max-w-sm transform scale-95 opacity-0 transition-all duration-300 flex flex-col p-8 text-center">
        <div class="w-16 h-16 rounded-full bg-red-50 text-red-500 flex items-center justify-center mx-auto mb-5 border-[4px] border-red-100/50">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-8 h-8 ml-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
          </svg>
        </div>
        <h3 class="text-[20px] font-extrabold text-[#0F172A] tracking-tight mb-2">Keluar Akun?</h3>
        <p class="text-[13.5px] text-slate-500 font-medium mb-8 leading-relaxed">
          Apakah Anda yakin ingin keluar dari Admin Panel? Anda harus masuk kembali untuk mengakses sistem.
        </p>
        <div class="flex items-center justify-center gap-3">
          <button type="button" onclick="closeLogoutModal()" class="flex-1 px-5 py-3 rounded-[12px] border border-slate-200 text-slate-600 text-[13.5px] font-bold hover:bg-slate-50 hover:text-[#0F172A] transition shadow-sm">
            Batal
          </button>
          <button type="button" onclick="confirmLogout()" class="flex-1 px-5 py-3 rounded-[12px] bg-red-500 hover:bg-red-600 text-white text-[13.5px] font-bold transition shadow-sm shadow-red-500/20">
            Ya, Keluar
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= POPUP KONFIRMASI SIMPAN (TAMBAH HALAMAN) ================= -->
  <div id="saveModal" class="fixed inset-0 z-50 hidden">
    <div id="saveBackdrop" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>
    <div class="fixed inset-0 z-10 flex items-center justify-center p-4 sm:p-0">
      <div id="saveContent" class="relative bg-white rounded-[24px] shadow-xl w-full max-w-sm transform scale-95 opacity-0 transition-all duration-300 flex flex-col p-8 text-center">
        <div class="w-16 h-16 rounded-full bg-emerald-50 text-[#10B981] flex items-center justify-center mx-auto mb-5 border-[4px] border-emerald-100/50">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
          </svg>
        </div>
        <h3 class="text-[20px] font-extrabold text-[#0F172A] tracking-tight mb-2">Simpan Halaman?</h3>
        <p class="text-[13.5px] text-slate-500 font-medium mb-8 leading-relaxed">
          Apakah Anda yakin ingin menyimpan halaman cerita baru ini?
        </p>
        <div class="flex items-center justify-center gap-3">
          <button type="button" onclick="closeSaveModal()" class="flex-1 px-5 py-3 rounded-[12px] border border-slate-200 text-slate-600 text-[13.5px] font-bold hover:bg-slate-50 hover:text-[#0F172A] transition shadow-sm">
            Batal
          </button>
          <button type="button" onclick="confirmSave()" class="flex-1 px-5 py-3 rounded-[12px] bg-[#10B981] hover:bg-[#059669] text-white text-[13.5px] font-bold transition shadow-sm shadow-emerald-500/20">
            Ya, Simpan
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= SCRIPT JAVASCRIPT ================= -->
  <script>
    // --- Script Modal Simpan ---
    function openSaveModal() {
      const modal = document.getElementById('saveModal');
      const backdrop = document.getElementById('saveBackdrop');
      const content = document.getElementById('saveContent');
      
      modal.classList.remove('hidden');
      setTimeout(() => {
        backdrop.classList.remove('opacity-0');
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
      }, 10);
    }

    function closeSaveModal() {
      const modal = document.getElementById('saveModal');
      const backdrop = document.getElementById('saveBackdrop');
      const content = document.getElementById('saveContent');
      
      backdrop.classList.add('opacity-0');
      content.classList.remove('scale-100', 'opacity-100');
      content.classList.add('scale-95', 'opacity-0');
      
      setTimeout(() => {
        modal.classList.add('hidden');
      }, 300);
    }

    function confirmSave() {
      window.location.href = "{{ url('/admin/detail-cerita') }}";
    }

    // ==========================================
    // --- SCRIPT INTERAKSI FORM UPLOAD FILE ---
    // ==========================================

    // 1. Upload Ilustrasi Halaman
    const illustrationArea = document.getElementById('illustrationUploadArea');
    const illustrationInput = document.getElementById('illustrationInput');
    const illustrationPreview = document.getElementById('illustrationPreview');
    const illustrationText = document.getElementById('illustrationText');

    if(illustrationArea && illustrationInput) {
      illustrationArea.addEventListener('click', () => illustrationInput.click());

      illustrationInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            illustrationPreview.src = e.target.result;
            illustrationPreview.classList.remove('hidden');
            illustrationText.innerHTML = `File: <span class="font-medium text-slate-500">${file.name}</span>`;
          }
          reader.readAsDataURL(file);
        } else {
          illustrationPreview.src = "#";
          illustrationPreview.classList.add('hidden');
          illustrationText.innerHTML = `Klik untuk mengunggah gambar`;
        }
      });
    }

    // 2. Fungsi Generic Upload Audio
    function setupAudioUpload(areaId, inputId, textId) {
      const area = document.getElementById(areaId);
      const input = document.getElementById(inputId);
      const text = document.getElementById(textId);

      if(area && input && text) {
        area.addEventListener('click', () => input.click());

        input.addEventListener('change', function() {
          const file = this.files[0];
          if (file) {
            text.innerHTML = `<span class="text-[#10B981]">${file.name}</span>`;
            text.classList.remove('text-[#0F172A]');
          } else {
            text.innerHTML = `Klik untuk mengunggah audio`;
            text.classList.add('text-[#0F172A]');
          }
        });
      }
    }

    // Inisialisasi Audio Uploads
    setupAudioUpload('audioBaliArea', 'audioBaliInput', 'audioBaliText');
    setupAudioUpload('audioIndoArea', 'audioIndoInput', 'audioIndoText');
    setupAudioUpload('audioEnArea', 'audioEnInput', 'audioEnText');

    // 3. Fungsi Generic Character Counter (Textarea)
    function setupCharCounter(inputId, counterId) {
      const input = document.getElementById(inputId);
      const counter = document.getElementById(counterId);

      if(input && counter) {
        input.addEventListener('input', function() {
          const currentLength = this.value.length;
          counter.textContent = `${currentLength}/500`;
          
          if(currentLength >= 500) {
            counter.classList.add('text-red-500');
            counter.classList.remove('text-slate-400');
          } else {
            counter.classList.remove('text-red-500');
            counter.classList.add('text-slate-400');
          }
        });
      }
    }

    // Inisialisasi Character Counter
    setupCharCounter('teksBali', 'countBali');
    setupCharCounter('teksIndo', 'countIndo');
    setupCharCounter('teksEn', 'countEn');
  </script>

</body>
</html>