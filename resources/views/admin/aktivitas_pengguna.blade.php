<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aktivitas Pengguna - Admin BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/admin/code_global.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/js/admin/global_admin.js') }}" defer></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
    body { font-family: 'Plus Jakarta Sans', sans-serif; }
    
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: #f1f5f9; }
    ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
  </style>
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
          <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="w-full h-full rounded-full object-cover" onerror="this.src='https://ui-avatars.com/api/?name=B+H&color=10B981&background=ecfdf5'">
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
        <!-- MENU BERANDA -->
        <a href="{{ url('/admin/dashboard') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group" title="Beranda">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.592 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Beranda</span>
        </a>

        <!-- MENU USER MANAGEMENT (AKTIF / HIJAU) -->
        <a href="{{ url('/admin/user-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] bg-[#10B981] text-white transition shadow-[0_2px_10px_rgba(16,185,129,0.2)]" title="User Management">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 flex-shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-bold whitespace-nowrap">User Management</span>
        </a>

        <!-- Menu: Story Management -->
        <a href="{{ url('/admin/story-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group" title="Story Management">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Story Management</span>
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

        <!-- Breadcrumb Header -->
        <div class="hidden sm:flex items-center text-[13px] font-bold text-slate-400">
          <a href="{{ route('admin.dashboard') }}" class="hover:text-[#10B981] transition">Portal Admin</a>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 mx-2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
          </svg>
          <a href="{{ url('/admin/user-management') }}" class="hover:text-[#10B981] transition cursor-pointer">User Management</a>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 mx-2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
          </svg>
          <span class="text-[#10B981]">Aktivitas Pengguna</span>
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
          <button id="profileDropdownBtn" class="flex items-center gap-3 cursor-pointer p-1.5 pr-3 border border-slate-100 rounded-full hover:bg-slate-50 transition focus:outline-none">
            <div class="relative flex-shrink-0"><div class="w-8 h-8 rounded-full bg-emerald-100 text-[#10B981] font-bold flex items-center justify-center text-[12px] overflow-hidden">@if ($adminPhoto)<img src="{{ $adminPhoto }}" alt="Foto {{ $admin->name }}" class="w-full h-full object-cover">@else{{ $adminInitials }}@endif</div>@if ($admin->no_tlp)<span class="absolute -bottom-1.5 -right-1.5 bg-[#10B981] rounded-full w-3.5 h-3.5 flex items-center justify-center border-2 border-white" title="Nomor telepon sudah diisi"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-2 h-2 text-white"><path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z" clip-rule="evenodd" /></svg></span>@endif</div>
            <span class="text-[13px] font-bold text-[#1E293B] hidden sm:block truncate max-w-[150px]" title="{{ $admin->name }}">{{ $admin->name }}</span>
            <svg id="profileChevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 text-slate-400 hidden sm:block transition-transform duration-200">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25 L12 15.75 L4.5 8.25" />
            </svg>
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

    <!-- ================= KONTEN AKTIVITAS PENGGUNA ================= -->
    <div class="p-8 mb-10 flex-1">
      <div class="max-w-[1400px] mx-auto flex flex-col gap-6">
        
        <!-- Judul Halaman -->
        <div>
          <h1 class="text-[28px] font-extrabold text-[#0F172A] tracking-tight mb-1">User Management</h1>
          <p class="text-slate-500 text-[13.5px]">Kelola data orang tua, anak, dan pantau aktivitas pengguna di BaliHabit.</p>
        </div>

        <!-- Tombol Tab (Orang Tua / Anak / Aktivitas Pengguna) -->
        <div class="inline-flex flex-wrap bg-slate-100 p-1.5 rounded-[16px] w-fit gap-1 mt-2">
          <!-- Tab Tidak Aktif (Orang Tua) -->
          <a href="{{ url('/admin/user-management') }}" class="px-5 py-2.5 rounded-[12px] text-[13px] font-bold text-slate-500 hover:text-slate-700 transition flex items-center gap-2">
            Orang Tua 
            <span class="px-2 py-0.5 rounded-md bg-slate-200 text-slate-500 text-[10px] font-extrabold">{{ number_format($totalOrangTua, 0, ',', '.') }}</span>
          </a>
          <!-- Tab Tidak Aktif (Anak) -->
          <a href="{{ url('/admin/user-management-anak') }}" class="px-5 py-2.5 rounded-[12px] text-[13px] font-bold text-slate-500 hover:text-slate-700 transition flex items-center gap-2">
            Anak
            <span class="px-2 py-0.5 rounded-md bg-slate-200 text-slate-500 text-[10px] font-extrabold">{{ number_format($totalAnak, 0, ',', '.') }}</span>
          </a>
          <!-- Tab Aktif (Aktivitas Pengguna) -->
          <a href="{{ url('/admin/aktivitas-pengguna') }}" class="px-5 py-2.5 rounded-[12px] text-[13px] font-bold text-[#10B981] bg-white shadow-[0_2px_8px_rgba(0,0,0,0.05)] transition flex items-center gap-2">
            Aktivitas Pengguna
          </a>
        </div>

        <!-- ================= KOTAK TABEL & FILTER ================= -->
        <div id="smoothTabContent" class="animate-tab-enter bg-white border border-slate-100 rounded-[24px] shadow-sm p-7 flex flex-col gap-6">
          
          <!-- Header Tabel: Keterangan, Search Bar & Filter -->
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
              <h2 class="text-[17px] font-extrabold text-[#0F172A]">Log Aktivitas Pengguna</h2>
              <p class="text-[12.5px] font-medium text-slate-400 mt-0.5">Pantau {{ $activityLimit }} aktivitas terbaru dari Orang Tua dan Anak di aplikasi.</p>
            </div>
            
            <div class="flex flex-col sm:flex-row items-center gap-3 w-full sm:w-auto">
              <!-- Search Bar -->
              <div class="relative w-full sm:w-[280px]">
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                  </svg>
                </span>
                <input 
                  id="searchInput" 
                  type="text" 
                  placeholder="Cari nama atau aktivitas..." 
                  class="w-full bg-slate-50 border border-slate-200 rounded-[12px] pl-10 pr-4 py-2.5 text-[13px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] focus:bg-white transition"
                >
              </div>

              <!-- Filter Dropdown -->
              <div class="relative w-full sm:w-auto">
                <select id="roleFilter" class="w-full sm:w-auto appearance-none bg-white border border-slate-200 rounded-[12px] pl-4 pr-10 py-2.5 text-[13px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] transition cursor-pointer hover:bg-slate-50">
                  <option value="Semua">Semua Peran</option>
                  <option value="Orang Tua">Orang Tua</option>
                  <option value="Anak">Anak</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25 L12 15.75 L4.5 8.25" />
                  </svg>
                </div>
              </div>
            </div>
          </div>

          <!-- Tabel List Aktivitas -->
          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[700px]" style="table-layout: fixed">
              <thead>
                <tr class="border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-[0.05em]">
                  <th class="py-4 px-4 whitespace-nowrap" style="width: 32%">Pengguna</th>
                  <th class="py-4 px-4">Detail Aktivitas</th>
                  <th class="py-4 px-4 text-right whitespace-nowrap w-40">Waktu</th>
                </tr>
              </thead>
              <tbody id="activityTableBody" class="divide-y divide-slate-50 text-[13.5px] font-medium text-[#0F172A]">
                <!-- Baris tabel akan di-render menggunakan JavaScript -->
              </tbody>
            </table>

            <!-- Pesan Kosong -->
            <div id="emptyState" class="hidden flex flex-col items-center justify-center py-12 px-4">
              <div class="w-14 h-14 bg-slate-50 rounded-full flex items-center justify-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-slate-300"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
              </div>
              <h3 class="text-[15px] font-bold text-[#0F172A] mb-1">Aktivitas Tidak Ditemukan</h3>
              <p class="text-[13px] text-slate-400 text-center">Coba gunakan kata kunci atau filter lain.</p>
            </div>
          </div>

          <!-- Footer Tabel: Informasi Data & Paginasi -->
          <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-5 border-t border-slate-100 mt-2">
            <p id="paginationInfo" class="text-[12px] font-medium text-slate-400">Menampilkan 0 aktivitas</p>
            <div class="flex items-center gap-1.5">
              <!-- Icon Prev < -->
              <button id="btnPrev" class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-500 hover:bg-slate-50 transition disabled:opacity-50 disabled:cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
              </button>
              
              <div id="pageNumbers" class="flex items-center gap-1.5">
                <!-- Angka halaman by JS -->
              </div>
              
              <!-- Icon Next > -->
              <button id="btnNext" class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-500 hover:bg-slate-50 transition disabled:opacity-50 disabled:cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
              </button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </main>

  <!-- ================= POPUP KONFIRMASI KELUAR ================= -->
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

  <!-- ================= JAVASCRIPT ================= -->
  <script>
    // Aktivitas terbaru dari database (App\Support\ActivityLog), urut dari yang terbaru.
    const activities = @json($activities);

    // Teks dari database selalu di-escape sebelum masuk ke innerHTML,
    // supaya nama berisi kode HTML tampil sebagai teks biasa.
    function escapeHtml(value) {
      return String(value ?? '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
    }

    let currentPage = 1;
    const itemsPerPage = 10;
    let filteredData = [...activities];

    const tbody = document.getElementById('activityTableBody');
    const searchInput = document.getElementById('searchInput');
    const roleFilter = document.getElementById('roleFilter');
    const emptyState = document.getElementById('emptyState');
    const btnPrev = document.getElementById('btnPrev');
    const btnNext = document.getElementById('btnNext');
    const pageNumbers = document.getElementById('pageNumbers');
    const paginationInfo = document.getElementById('paginationInfo');

    function renderTable() {
      tbody.innerHTML = '';
      
      if (filteredData.length === 0) {
        tbody.classList.add('hidden');
        emptyState.classList.remove('hidden');
        paginationInfo.innerHTML = `Menampilkan <span class="font-extrabold text-[#0F172A]">0</span> aktivitas`;
        updatePaginationButtons();
        return;
      }

      tbody.classList.remove('hidden');
      emptyState.classList.add('hidden');

      const start = (currentPage - 1) * itemsPerPage;
      const end = start + itemsPerPage;
      const paginatedData = filteredData.slice(start, end);

      paginatedData.forEach(item => {
        const tr = document.createElement('tr');
        tr.className = "hover:bg-slate-50/50 transition";
        tr.innerHTML = `
          <td class="py-4 px-4">
            <div class="flex items-center gap-3">
              <div class="w-[34px] h-[34px] rounded-full flex items-center justify-center font-extrabold text-[12px] border flex-shrink-0 ${item.colorClass}">
                ${escapeHtml(item.initial)}
              </div>
              <!-- Nama panjang dipotong dengan "…"; nama lengkap muncul saat kursor diarahkan -->
              <div class="min-w-0">
                <p class="font-extrabold text-[#0F172A] truncate" title="${escapeHtml(item.name)}">${escapeHtml(item.name)} <span class="font-medium text-slate-500">(${escapeHtml(item.role)})</span></p>
              </div>
            </div>
          </td>
          <td class="py-4 px-4 text-slate-500">
            <!-- Satu baris saja; kalimat panjang dipotong dengan "…", lengkapnya saat kursor diarahkan -->
            <span class="block truncate" title="${escapeHtml(item.action)}">${escapeHtml(item.action)}</span>
          </td>
          <td class="py-4 px-4 text-right">
            <span class="text-[12px] font-bold text-slate-400 whitespace-nowrap">${escapeHtml(item.time)}</span>
          </td>
        `;
        tbody.appendChild(tr);
      });

      const showingEnd = Math.min(end, filteredData.length);
      paginationInfo.innerHTML = `Menampilkan <span class="font-extrabold text-[#0F172A]">${start + 1} – ${showingEnd}</span> dari <span class="font-extrabold text-[#0F172A]">${filteredData.length}</span> aktivitas`;
      updatePaginationButtons();
    }

    function updatePaginationButtons() {
      const totalPages = Math.ceil(filteredData.length / itemsPerPage);
      btnPrev.disabled = currentPage === 1 || totalPages === 0;
      btnNext.disabled = currentPage === totalPages || totalPages === 0;

      pageNumbers.innerHTML = '';

      // Paling banyak 5 nomor halaman di sekitar halaman aktif (sama seperti tab Orang Tua)
      let startPage = Math.max(1, currentPage - 2);
      let endPage = Math.min(totalPages, currentPage + 2);
      if (endPage - startPage < 4) {
        if (startPage === 1) endPage = Math.min(totalPages, 5);
        else if (endPage === totalPages) startPage = Math.max(1, totalPages - 4);
      }

      for (let i = startPage; i <= endPage; i++) {
        const btn = document.createElement('button');
        btn.innerText = i;
        btn.className = `w-8 h-8 rounded-lg text-[12px] font-extrabold transition flex items-center justify-center ${
          currentPage === i 
          ? 'bg-[#10B981] text-white shadow-sm' 
          : 'border border-slate-200 text-slate-500 hover:bg-slate-50'
        }`;
        btn.onclick = () => {
          currentPage = i;
          renderTable();
        };
        pageNumbers.appendChild(btn);
      }
    }

    function applyFilters() {
      const searchTerm = searchInput.value.toLowerCase();
      const roleTerm = roleFilter.value;

      filteredData = activities.filter(item => {
        const matchSearch = item.name.toLowerCase().includes(searchTerm) || item.action.toLowerCase().includes(searchTerm);
        const matchRole = roleTerm === "Semua" || item.role === roleTerm;
        return matchSearch && matchRole;
      });

      currentPage = 1; 
      renderTable();
    }

    searchInput.addEventListener('input', applyFilters);
    roleFilter.addEventListener('change', applyFilters);

    btnPrev.addEventListener('click', () => {
      if (currentPage > 1) {
        currentPage--;
        renderTable();
      }
    });

    btnNext.addEventListener('click', () => {
      const totalPages = Math.ceil(filteredData.length / itemsPerPage);
      if (currentPage < totalPages) {
        currentPage++;
        renderTable();
      }
    });

    renderTable();
  </script>
  <!-- Form logout Admin (POST + CSRF): dikirim oleh tombol "Ya, Keluar" lewat confirmLogout() -->
  <form id="adminLogoutForm" action="{{ route('admin.logout') }}" method="POST" class="hidden">@csrf</form>
</body>
</html>