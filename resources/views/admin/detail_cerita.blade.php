<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Cerita - BaliHabit</title>
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
        <!-- Menu: Beranda -->
        <a href="{{ url('/admin/dashboard') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group" title="Beranda">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.592 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Beranda</span>
        </a>

        <!-- Menu: User Management -->
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

        <!-- Menu: Refleksi Management -->
        <a href="{{ url('/admin/refleksi-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group" title="Refleksi Management">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Refleksi Management</span>
        </a>

        <!-- Menu: Mission Management -->
        <a href="{{ url('/admin/mission-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group" title="Mission Management">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Mission Management</span>
        </a>

        <!-- Menu: Lencana Management -->
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
        <div class="hidden sm:flex items-center text-[13px] font-bold text-slate-400">
          <a href="{{ route('admin.dashboard') }}" class="hover:text-[#10B981] transition">Portal Admin</a>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 mx-2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5 L15.75 12 L8.25 19.5" />
          </svg>
          <a href="{{ url('/admin/story-management') }}" class="hover:text-[#10B981] transition">Story Management</a>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 mx-2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5 L15.75 12 L8.25 19.5" />
          </svg>
          <span class="text-[#10B981]">Detail Cerita</span>
        </div>
      </div>

      <div class="flex items-center gap-6">
        <!-- Notifikasi -->
        <button class="relative text-slate-400 hover:text-slate-600 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" /></svg>
          <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 border-2 border-white rounded-full"></span>
        </button>

        <!-- Garis Pemisah Header -->
        <div class="h-6 w-px bg-slate-200"></div>

        <!-- Profil Dropdown Container -->
        <div class="relative">
          <!-- Trigger Button -->
          <button id="profileDropdownBtn" class="flex items-center gap-3 cursor-pointer p-1.5 pr-3 border border-slate-100 rounded-full hover:bg-slate-50 transition focus:outline-none">
            <div class="relative flex-shrink-0"><div class="w-8 h-8 rounded-full bg-emerald-100 text-[#10B981] font-bold flex items-center justify-center text-[12px] overflow-hidden">@if ($adminPhoto)<img src="{{ $adminPhoto }}" alt="Foto {{ $admin->name }}" class="w-full h-full object-cover">@else{{ $adminInitials }}@endif</div>@if ($admin->no_tlp)<span class="absolute -bottom-1.5 -right-1.5 bg-[#10B981] rounded-full w-3.5 h-3.5 flex items-center justify-center border-2 border-white" title="Nomor telepon sudah diisi"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-2 h-2 text-white"><path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z" clip-rule="evenodd" /></svg></span>@endif</div>
            <span class="text-[13px] font-bold text-[#1E293B] hidden sm:block truncate max-w-[150px]" title="{{ $admin->name }}">{{ $admin->name }}</span>
            <svg id="profileChevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 text-slate-400 hidden sm:block transition-transform duration-200">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25 L12 15.75 L4.5 8.25" />
            </svg>
          </button>

          <!-- Dropdown Menu Box -->
          <div id="profileDropdownMenu" class="absolute right-0 mt-3 w-[270px] bg-white border border-slate-100 rounded-[20px] shadow-[0_10px_40px_-10px_rgba(0,0,0,0.08)] opacity-0 invisible transform scale-95 transition-all duration-200 z-50 overflow-hidden origin-top-right">
            
            <!-- User Info Header -->
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
              
              <!-- Tombol Keluar: Memanggil Popup -->
              <button type="button" onclick="openLogoutModal()" class="w-full flex items-center gap-3 px-3.5 py-3 rounded-[14px] text-red-500 hover:bg-red-50 transition group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 group-hover:-translate-x-0.5 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" /></svg>
                <span class="text-[13px] font-bold">Keluar</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- KONTEN DETAIL CERITA -->
    <div class="p-8 mb-10 flex-1">
      <div class="max-w-[1400px] mx-auto flex flex-col gap-6">
        
        <!-- Link Kembali -->
        <div>
          <a href="{{ url('/admin/story-management') }}" class="inline-flex items-center gap-2 text-[13.5px] font-bold text-slate-500 hover:text-[#10B981] transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Kembali ke Daftar Cerita
          </a>
        </div>

        <!-- Kartu Informasi Cerita (Atas) -->
        <div class="bg-white border border-slate-100 rounded-[24px] shadow-sm p-7 flex flex-col md:flex-row gap-8 mt-1">
          <!-- Gambar Cover Placeholder -->
          <div class="w-full md:w-56 h-56 bg-emerald-50/50 rounded-[20px] border border-emerald-100 flex flex-col items-center justify-center text-emerald-600 flex-shrink-0 shadow-sm relative overflow-hidden group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mb-2 group-hover:scale-110 transition">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
            <span class="text-[11px] font-extrabold tracking-[0.1em] uppercase text-emerald-600/80">Cover</span>
          </div>

          <!-- Detail Informasi Cerita -->
          <div class="flex-1 flex flex-col items-start gap-4">
            <div class="flex flex-col sm:flex-row sm:items-center gap-3">
              <h1 id="detailJudul" class="text-[26px] font-extrabold text-[#0F172A] tracking-tight leading-none">Judul Cerita</h1>
              <span id="detailStatus" class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[12px] font-bold border border-emerald-100">
                <div class="w-1.5 h-1.5 rounded-full bg-emerald-500"></div> Published
              </span>
            </div>
            
            <p id="detailDeskripsi" class="text-slate-500 text-[13.5px] leading-relaxed max-w-3xl">
              Memuat deskripsi cerita...
            </p>

            <!-- Badges Statistik (Buku, Bahasa, Refleksi) -->
            <div class="flex flex-wrap items-center gap-2.5 mt-1">
              <span id="detailHalaman" class="px-3.5 py-1.5 bg-slate-50 border border-slate-200 rounded-[10px] text-slate-600 text-[12.5px] font-bold flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-slate-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
                0 Halaman
              </span>
              <span class="px-3.5 py-1.5 bg-slate-50 border border-slate-200 rounded-[10px] text-slate-600 text-[12.5px] font-bold flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-slate-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.246.036 3.371.116m-3.371-.116V15.25m0-10.629c2.426.025 4.85.12 7.25.282m-7.25-.282L15 2.25M3 11.25h1.5m1.5 0h1.5m1.5 0h1.5m1.5 0h1.5m1.5 0h1.5" />
                </svg>
                3 Bahasa (Bali, ID, EN)
              </span>
              <span class="px-3.5 py-1.5 bg-emerald-50 border border-emerald-100 rounded-[10px] text-emerald-600 text-[12.5px] font-bold flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Refleksi Terisi
              </span>
            </div>

            <!-- Tombol Edit Info -->
            <a href="{{ url('/admin/edit-cerita') }}" class="mt-auto px-4 py-2.5 bg-white border border-slate-200 rounded-[12px] text-slate-600 text-[13px] font-bold flex items-center gap-2 hover:border-[#10B981] hover:text-[#10B981] transition shadow-sm w-fit">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
              </svg>
              Edit Informasi Cerita
            </a>
          </div>
        </div>

        <!-- Section List Halaman Cerita -->
        <div class="mt-4">
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
              <h3 class="text-[20px] font-extrabold text-[#0F172A] tracking-tight">Halaman Cerita</h3>
              <p class="text-slate-500 text-[13.5px] mt-0.5">Kelola halaman cerita. Minimal 5, maksimal 8 halaman.</p>
            </div>
            <!-- Tombol Tambah Halaman -->
            <a href="{{ url('/admin/tambah-halaman-cerita') }}" class="px-5 py-2.5 border-2 border-[#10B981] text-[#10B981] bg-white rounded-[12px] text-[13px] font-bold flex items-center justify-center gap-2 hover:bg-emerald-50 transition shadow-sm w-fit">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
              Tambah Halaman
            </a>
          </div>

          <!-- Grid Halaman -->
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5 mt-5">
            <!-- Card Halaman 1 -->
            <div class="bg-white border border-slate-100 rounded-[20px] p-4 flex flex-col gap-4 shadow-sm relative group hover:border-[#10B981]/50 transition cursor-pointer">
              <div class="w-full aspect-[4/3] bg-slate-50 rounded-[12px] border border-slate-100 flex items-center justify-center text-slate-300 group-hover:bg-emerald-50/40 transition relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 group-hover:scale-105 transition">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                <div class="absolute top-2 right-2 bg-slate-500/80 backdrop-blur-sm text-white text-[10.5px] font-extrabold px-2.5 py-1 rounded-[6px] shadow-sm tracking-wider">#1</div>
              </div>
              <div class="flex items-center justify-between px-1">
                <span class="font-extrabold text-[13.5px] text-[#0F172A]">Halaman 1</span>
                <span class="text-[#10B981] text-[12px] font-bold flex items-center gap-1">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> Lengkap
                </span>
              </div>
              <a href="{{ url('/admin/edit-halaman-cerita') }}" class="w-full py-2 bg-white border border-slate-200 rounded-[10px] text-slate-600 text-[12.5px] font-bold flex items-center justify-center gap-2 hover:border-[#10B981] hover:text-[#10B981] hover:bg-emerald-50/50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg> Edit
              </a>
            </div>
            <!-- Card Halaman 2 -->
            <div class="bg-white border border-slate-100 rounded-[20px] p-4 flex flex-col gap-4 shadow-sm relative group hover:border-[#10B981]/50 transition cursor-pointer">
              <div class="w-full aspect-[4/3] bg-slate-50 rounded-[12px] border border-slate-100 flex items-center justify-center text-slate-300 group-hover:bg-emerald-50/40 transition relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 group-hover:scale-105 transition"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                <div class="absolute top-2 right-2 bg-slate-500/80 backdrop-blur-sm text-white text-[10.5px] font-extrabold px-2.5 py-1 rounded-[6px] shadow-sm tracking-wider">#2</div>
              </div>
              <div class="flex items-center justify-between px-1">
                <span class="font-extrabold text-[13.5px] text-[#0F172A]">Halaman 2</span>
                <span class="text-[#10B981] text-[12px] font-bold flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> Lengkap</span>
              </div>
              <a href="{{ url('/admin/edit-halaman-cerita') }}" class="w-full py-2 bg-white border border-slate-200 rounded-[10px] text-slate-600 text-[12.5px] font-bold flex items-center justify-center gap-2 hover:border-[#10B981] hover:text-[#10B981] hover:bg-emerald-50/50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg> Edit
              </a>
            </div>
            <!-- Card Halaman 3 -->
            <div class="bg-white border border-slate-100 rounded-[20px] p-4 flex flex-col gap-4 shadow-sm relative group hover:border-[#10B981]/50 transition cursor-pointer">
              <div class="w-full aspect-[4/3] bg-slate-50 rounded-[12px] border border-slate-100 flex items-center justify-center text-slate-300 group-hover:bg-emerald-50/40 transition relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 group-hover:scale-105 transition"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                <div class="absolute top-2 right-2 bg-slate-500/80 backdrop-blur-sm text-white text-[10.5px] font-extrabold px-2.5 py-1 rounded-[6px] shadow-sm tracking-wider">#3</div>
              </div>
              <div class="flex items-center justify-between px-1">
                <span class="font-extrabold text-[13.5px] text-[#0F172A]">Halaman 3</span>
                <span class="text-[#10B981] text-[12px] font-bold flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> Lengkap</span>
              </div>
              <a href="{{ url('/admin/edit-halaman-cerita') }}" class="w-full py-2 bg-white border border-slate-200 rounded-[10px] text-slate-600 text-[12.5px] font-bold flex items-center justify-center gap-2 hover:border-[#10B981] hover:text-[#10B981] hover:bg-emerald-50/50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg> Edit
              </a>
            </div>
            <!-- Card Halaman 4 -->
            <div class="bg-white border border-slate-100 rounded-[20px] p-4 flex flex-col gap-4 shadow-sm relative group hover:border-[#10B981]/50 transition cursor-pointer">
              <div class="w-full aspect-[4/3] bg-slate-50 rounded-[12px] border border-slate-100 flex items-center justify-center text-slate-300 group-hover:bg-emerald-50/40 transition relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 group-hover:scale-105 transition"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                <div class="absolute top-2 right-2 bg-slate-500/80 backdrop-blur-sm text-white text-[10.5px] font-extrabold px-2.5 py-1 rounded-[6px] shadow-sm tracking-wider">#4</div>
              </div>
              <div class="flex items-center justify-between px-1">
                <span class="font-extrabold text-[13.5px] text-[#0F172A]">Halaman 4</span>
                <span class="text-[#10B981] text-[12px] font-bold flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> Lengkap</span>
              </div>
              <a href="{{ url('/admin/edit-halaman-cerita') }}" class="w-full py-2 bg-white border border-slate-200 rounded-[10px] text-slate-600 text-[12.5px] font-bold flex items-center justify-center gap-2 hover:border-[#10B981] hover:text-[#10B981] hover:bg-emerald-50/50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg> Edit
              </a>
            </div>
            <!-- Card Halaman 5 -->
            <div class="bg-white border border-slate-100 rounded-[20px] p-4 flex flex-col gap-4 shadow-sm relative group hover:border-[#10B981]/50 transition cursor-pointer">
              <div class="w-full aspect-[4/3] bg-slate-50 rounded-[12px] border border-slate-100 flex items-center justify-center text-slate-300 group-hover:bg-emerald-50/40 transition relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 group-hover:scale-105 transition"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                <div class="absolute top-2 right-2 bg-slate-500/80 backdrop-blur-sm text-white text-[10.5px] font-extrabold px-2.5 py-1 rounded-[6px] shadow-sm tracking-wider">#5</div>
              </div>
              <div class="flex items-center justify-between px-1">
                <span class="font-extrabold text-[13.5px] text-[#0F172A]">Halaman 5</span>
                <span class="text-[#10B981] text-[12px] font-bold flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> Lengkap</span>
              </div>
              <a href="{{ url('/admin/edit-halaman-cerita') }}" class="w-full py-2 bg-white border border-slate-200 rounded-[10px] text-slate-600 text-[12.5px] font-bold flex items-center justify-center gap-2 hover:border-[#10B981] hover:text-[#10B981] hover:bg-emerald-50/50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg> Edit
              </a>
            </div>
            <!-- Card Halaman 6 -->
            <div class="bg-white border border-slate-100 rounded-[20px] p-4 flex flex-col gap-4 shadow-sm relative group hover:border-[#10B981]/50 transition cursor-pointer">
              <div class="w-full aspect-[4/3] bg-slate-50 rounded-[12px] border border-slate-100 flex items-center justify-center text-slate-300 group-hover:bg-emerald-50/40 transition relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 group-hover:scale-105 transition"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                <div class="absolute top-2 right-2 bg-slate-500/80 backdrop-blur-sm text-white text-[10.5px] font-extrabold px-2.5 py-1 rounded-[6px] shadow-sm tracking-wider">#6</div>
              </div>
              <div class="flex items-center justify-between px-1">
                <span class="font-extrabold text-[13.5px] text-[#0F172A]">Halaman 6</span>
                <span class="text-[#10B981] text-[12px] font-bold flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> Lengkap</span>
              </div>
              <a href="{{ url('/admin/edit-halaman-cerita') }}" class="w-full py-2 bg-white border border-slate-200 rounded-[10px] text-slate-600 text-[12.5px] font-bold flex items-center justify-center gap-2 hover:border-[#10B981] hover:text-[#10B981] hover:bg-emerald-50/50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg> Edit
              </a>
            </div>
            <!-- Card Halaman 7 -->
            <div class="bg-white border border-slate-100 rounded-[20px] p-4 flex flex-col gap-4 shadow-sm relative group hover:border-[#10B981]/50 transition cursor-pointer">
              <div class="w-full aspect-[4/3] bg-slate-50 rounded-[12px] border border-slate-100 flex items-center justify-center text-slate-300 group-hover:bg-emerald-50/40 transition relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 group-hover:scale-105 transition"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                <div class="absolute top-2 right-2 bg-slate-500/80 backdrop-blur-sm text-white text-[10.5px] font-extrabold px-2.5 py-1 rounded-[6px] shadow-sm tracking-wider">#7</div>
              </div>
              <div class="flex items-center justify-between px-1">
                <span class="font-extrabold text-[13.5px] text-[#0F172A]">Halaman 7</span>
                <span class="text-[#10B981] text-[12px] font-bold flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> Lengkap</span>
              </div>
              <a href="{{ url('/admin/edit-halaman-cerita') }}" class="w-full py-2 bg-white border border-slate-200 rounded-[10px] text-slate-600 text-[12.5px] font-bold flex items-center justify-center gap-2 hover:border-[#10B981] hover:text-[#10B981] hover:bg-emerald-50/50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg> Edit
              </a>
            </div>
            <!-- Card Halaman 8 -->
            <div class="bg-white border border-slate-100 rounded-[20px] p-4 flex flex-col gap-4 shadow-sm relative group hover:border-[#10B981]/50 transition cursor-pointer">
              <div class="w-full aspect-[4/3] bg-slate-50 rounded-[12px] border border-slate-100 flex items-center justify-center text-slate-300 group-hover:bg-emerald-50/40 transition relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 group-hover:scale-105 transition"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                <div class="absolute top-2 right-2 bg-slate-500/80 backdrop-blur-sm text-white text-[10.5px] font-extrabold px-2.5 py-1 rounded-[6px] shadow-sm tracking-wider">#8</div>
              </div>
              <div class="flex items-center justify-between px-1">
                <span class="font-extrabold text-[13.5px] text-[#0F172A]">Halaman 8</span>
                <span class="text-[#10B981] text-[12px] font-bold flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> Lengkap</span>
              </div>
              <a href="{{ url('/admin/edit-halaman-cerita') }}" class="w-full py-2 bg-white border border-slate-200 rounded-[10px] text-slate-600 text-[12.5px] font-bold flex items-center justify-center gap-2 hover:border-[#10B981] hover:text-[#10B981] hover:bg-emerald-50/50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg> Edit
              </a>
            </div>
            
          </div>
        </div>

        <!-- Alert Informasi (Bawah) -->
        <div class="bg-emerald-50/50 border border-emerald-100 rounded-[16px] p-5 flex items-start sm:items-center gap-4 mt-2 shadow-sm">
          <div class="w-7 h-7 rounded-full bg-[#10B981] text-white flex items-center justify-center flex-shrink-0 mt-0.5 sm:mt-0 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
            </svg>
          </div>
          <p class="text-[13px] text-emerald-900 leading-relaxed font-medium">
            <strong class="font-extrabold">Cerita ini sudah lengkap dan dipublikasikan.</strong> Anda tetap dapat menambah atau mengedit halaman serta teks cerita jika diperlukan pembaruan.
          </p>
        </div>

      </div>
    </div>
  </main>

  <!-- ================= POPUP KONFIRMASI KELUAR ================= -->
  <div id="logoutModal" class="fixed inset-0 z-[60] hidden">
    <!-- Backdrop -->
    <div id="logoutBackdrop" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <div class="fixed inset-0 z-10 flex items-center justify-center p-4 sm:p-0">
      <!-- Modal Box -->
      <div id="logoutContent" class="relative bg-white rounded-[24px] shadow-xl w-full max-w-sm transform scale-95 opacity-0 transition-all duration-300 flex flex-col p-8 text-center">
        
        <!-- Icon Peringatan Keluar (Merah) -->
        <div class="w-16 h-16 rounded-full bg-red-50 text-red-500 flex items-center justify-center mx-auto mb-5 border-[4px] border-red-100/50">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-8 h-8 ml-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
          </svg>
        </div>

        <!-- Teks Konfirmasi -->
        <h3 class="text-[20px] font-extrabold text-[#0F172A] tracking-tight mb-2">Keluar Akun?</h3>
        <p class="text-[13.5px] text-slate-500 font-medium mb-8 leading-relaxed">
          Apakah Anda yakin ingin keluar dari Admin Panel? Anda harus masuk kembali untuk mengakses sistem.
        </p>

        <!-- Tombol Aksi Modal -->
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

  <!-- ================= SCRIPT ================= -->
  <script>
    // ================= SCRIPT DATA DINAMIS =================
    document.addEventListener('DOMContentLoaded', () => {
      const savedData = localStorage.getItem('editCeritaData');
      
      if (savedData) {
        const cerita = JSON.parse(savedData);
        
        const judulEl = document.getElementById('detailJudul');
        const deskripsiEl = document.getElementById('detailDeskripsi');
        const statusEl = document.getElementById('detailStatus');
        const halamanEl = document.getElementById('detailHalaman');
        
        if (judulEl) judulEl.textContent = cerita.judul;
        if (deskripsiEl) deskripsiEl.textContent = cerita.deskripsi;
        
        if (halamanEl) {
          halamanEl.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-slate-400">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
            </svg>
            ${cerita.halaman} Halaman
          `;
        }

        if (statusEl) {
          if (cerita.status.toLowerCase() === 'published') {
            statusEl.className = 'inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-[12px] font-bold border border-emerald-100';
            statusEl.innerHTML = '<div class="w-1.5 h-1.5 rounded-full bg-emerald-500"></div> Published';
          } else {
            statusEl.className = 'inline-flex items-center gap-1.5 px-3 py-1 bg-amber-50 text-amber-600 rounded-full text-[12px] font-bold border border-amber-100';
            statusEl.innerHTML = '<div class="w-1.5 h-1.5 rounded-full bg-amber-500"></div> Draft';
          }
        }
      }
    });
  </script>

  <!-- Form logout Admin (POST + CSRF): dikirim oleh tombol "Ya, Keluar" lewat confirmLogout() -->
  <form id="adminLogoutForm" action="{{ route('admin.logout') }}" method="POST" class="hidden">@csrf</form>
</body>
</html>