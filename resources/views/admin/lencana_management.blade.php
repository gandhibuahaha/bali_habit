<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lencana Management - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/admin/code_global.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/js/admin/global_admin.js') }}" defer></script>
</head>
<body class="bg-[#F8FAFC] text-slate-800 font-sans antialiased flex min-h-screen items-start relative overflow-x-hidden">

  <!-- ================= MOBILE OVERLAY ================= -->
  <div id="mobileOverlay" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-30 opacity-0 invisible transition-all duration-300 lg:hidden"></div>

  <!-- ================= SIDEBAR KIRI ================= -->
  <aside id="sidebar" class="w-[260px] bg-white border-r border-slate-100 flex-col flex-shrink-0 z-40 fixed inset-y-0 left-0 flex transform -translate-x-full lg:translate-x-0">
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

    <div class="flex-1 overflow-y-auto px-4 overflow-x-hidden">
      <p class="sidebar-text text-[10px] font-bold text-slate-500 tracking-[0.1em] mb-3 px-3 uppercase whitespace-nowrap">Menu Utama</p>
      <nav class="flex flex-col gap-1.5">
        <a href="{{ url('/admin/dashboard') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group" title="Beranda">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.592 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Beranda</span>
        </a>
        <a href="{{ url('/admin/user-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group" title="User Management">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">User Management</span>
        </a>
        <a href="{{ url('/admin/story-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group" title="Story Management">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Story Management</span>
        </a>
        <a href="{{ url('/admin/refleksi-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group" title="Refleksi Management">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" /></svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Refleksi Management</span>
        </a>
        <a href="{{ url('/admin/mission-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group" title="Mission Management">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Mission Management</span>
        </a>
        <a href="{{ url('/admin/lencana-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] bg-[#10B981] text-white transition shadow-[0_2px_10px_rgba(16,185,129,0.2)]" title="Lencana Management">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" /></svg>
          <span class="sidebar-text text-[13.5px] font-bold whitespace-nowrap">Lencana Management</span>
        </a>
      </nav>
    </div>

    <div class="pb-8 pt-4 text-center overflow-hidden">
      <span class="sidebar-text text-[10.5px] text-slate-400 font-medium whitespace-nowrap">BaliHabit © 2026</span>
    </div>
  </aside>

  <!-- ================= AREA UTAMA ================= -->
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
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 mx-2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
          <span class="text-[#10B981]">Lencana Management</span>
        </div>
      </div>
      
      <div class="flex items-center gap-6">
        <button class="relative text-slate-400 hover:text-slate-600 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" /></svg>
          <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 border-2 border-white rounded-full"></span>
        </button>

        <div class="h-6 w-px bg-slate-200"></div>

        <div class="relative">
          <button id="profileDropdownBtn" class="flex items-center gap-3 cursor-pointer p-1.5 pr-3 border border-slate-100 rounded-full hover:bg-slate-50 transition focus:outline-none">
            <div class="relative flex-shrink-0"><div class="w-8 h-8 rounded-full bg-emerald-100 text-[#10B981] font-bold flex items-center justify-center text-[12px] shadow-sm overflow-hidden">@if ($adminPhoto)<img src="{{ $adminPhoto }}" alt="Foto {{ $admin->name }}" class="w-full h-full object-cover">@else{{ $adminInitials }}@endif</div>@if ($admin->no_tlp)<span class="absolute -bottom-1.5 -right-1.5 bg-[#10B981] rounded-full w-3.5 h-3.5 flex items-center justify-center border-2 border-white" title="Nomor telepon sudah diisi"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-2 h-2 text-white"><path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z" clip-rule="evenodd" /></svg></span>@endif</div>
            <span class="text-[13px] font-bold text-[#1E293B] hidden sm:block truncate max-w-[150px]" title="{{ $admin->name }}">{{ $admin->name }}</span>
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

    <div class="p-8 mb-10 flex-1">
      <div class="max-w-[1400px] mx-auto flex flex-col gap-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
          <div>
            <h1 class="text-[28px] font-extrabold text-[#0F172A] tracking-tight mb-1">Lencana Management</h1>
            <p class="text-slate-500 text-[13.5px]">Kelola lencana penghargaan berdasarkan akumulasi bintang yang diperoleh anak.</p>
          </div>
          <a href="{{ url('/admin/tambah-lencana') }}" class="inline-flex items-center gap-2 bg-[#10B981] hover:bg-[#059669] text-white px-5 py-2.5 rounded-[12px] text-[13px] font-bold shadow-sm transition whitespace-nowrap">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
            Tambah Lencana
          </a>
        </div>

        <div class="bg-white border border-slate-100 rounded-[24px] shadow-sm p-7 flex flex-col gap-6 mt-2">
          <!-- Search Bar -->
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="relative w-full sm:w-[320px]">
              <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
              </span>
              <input id="searchInput" type="text" placeholder="Cari nama lencana atau deskripsi..." class="w-full bg-slate-50 border border-slate-200 rounded-[12px] pl-10 pr-4 py-2.5 text-[13px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] focus:bg-white transition">
            </div>
          </div>

          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[800px]">
              <thead>
                <tr class="border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-[0.05em] bg-slate-50/50">
                  <th class="py-4 px-4 w-12 whitespace-nowrap text-center">NO</th>
                  <th class="py-4 px-4 w-24 whitespace-nowrap text-center">IKON</th>
                  <th class="py-4 px-4 whitespace-nowrap">NAMA LENCANA</th>
                  <th class="py-4 px-4 whitespace-nowrap text-center">RENTANG BINTANG</th>
                  <th class="py-4 px-4 w-full">DESKRIPSI</th>
                  <th class="py-4 px-4 whitespace-nowrap text-center w-40">AKSI</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-50 text-[13.5px] font-medium text-[#0F172A]">
                
                <!-- Baris 1 (ID: 1) -->
                <tr class="hover:bg-slate-50/50 transition">
                  <td class="py-4 px-4 text-slate-400 font-bold text-[12px] whitespace-nowrap text-center">1</td>
                  <td class="py-4 px-4 whitespace-nowrap text-center">
                    <div class="w-10 h-10 rounded-full mx-auto bg-green-100 text-green-600 flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm.53 5.47a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.72-1.72v5.69a.75.75 0 001.5 0v-5.69l1.72 1.72a.75.75 0 101.06-1.06l-3-3z" clip-rule="evenodd" /></svg>
                    </div>
                  </td>
                  <td class="py-4 px-4 whitespace-nowrap">
                    <span class="font-extrabold text-[#0F172A]">Benih Kebaikan</span>
                  </td>
                  <td class="py-4 px-4 whitespace-nowrap text-center">
                    <span class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-[8px] bg-amber-50 text-[#0F172A] border border-amber-100/50 text-[12.5px] font-bold whitespace-nowrap">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-amber-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" /></svg>
                      5 - 10
                    </span>
                  </td>
                  <td class="py-4 px-4 text-slate-500 leading-relaxed min-w-[200px]">
                    Kebaikanmu mulai tumbuh! Yuk, terus berkembang.
                  </td>
                  <td class="py-4 px-4 text-center whitespace-nowrap">
                    <div class="flex items-center justify-center gap-1.5">
                      <a href="{{ url('/admin/edit-lencana?id=1') }}" class="inline-flex items-center justify-center w-8 h-8 rounded-[10px] border border-slate-200 hover:border-[#10B981] hover:text-[#10B981] text-slate-500 transition shadow-sm bg-white" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/></svg>
                      </a>
                      <button type="button" onclick="openDetailModal(this)" class="inline-flex items-center justify-center w-8 h-8 rounded-[10px] border border-slate-200 hover:border-[#10B981] hover:text-[#10B981] text-slate-500 transition shadow-sm bg-white" title="Lihat">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                      </button>
                      <button type="button" onclick="openDeleteModal()" class="inline-flex items-center justify-center w-8 h-8 rounded-[10px] border border-slate-200 hover:border-red-500 hover:text-red-500 hover:bg-red-50 text-slate-500 transition shadow-sm bg-white" title="Hapus">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                      </button>
                    </div>
                  </td>
                </tr>

                <!-- Baris 2 (ID: 2) -->
                <tr class="hover:bg-slate-50/50 transition">
                  <td class="py-4 px-4 text-slate-400 font-bold text-[12px] whitespace-nowrap text-center">2</td>
                  <td class="py-4 px-4 whitespace-nowrap text-center">
                    <div class="w-10 h-10 rounded-full mx-auto bg-orange-100 text-orange-600 flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm0 8.625a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM15.375 12a1.125 1.125 0 11-2.25 0 1.125 1.125 0 012.25 0zM8.625 12a1.125 1.125 0 11-2.25 0 1.125 1.125 0 012.25 0z" clip-rule="evenodd" /></svg>
                    </div>
                  </td>
                  <td class="py-4 px-4 whitespace-nowrap">
                    <span class="font-extrabold text-[#0F172A]">Tumbuh Bersama</span>
                  </td>
                  <td class="py-4 px-4 whitespace-nowrap text-center">
                    <span class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-[8px] bg-amber-50 text-[#0F172A] border border-amber-100/50 text-[12.5px] font-bold whitespace-nowrap">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-amber-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" /></svg>
                      11 - 20
                    </span>
                  </td>
                  <td class="py-4 px-4 text-slate-500 leading-relaxed min-w-[200px]">
                    Kamu makin rajin! Terus lakukan kebiasaan baik.
                  </td>
                  <td class="py-4 px-4 text-center whitespace-nowrap">
                    <div class="flex items-center justify-center gap-1.5">
                      <a href="{{ url('/admin/edit-lencana?id=2') }}" class="inline-flex items-center justify-center w-8 h-8 rounded-[10px] border border-slate-200 hover:border-[#10B981] hover:text-[#10B981] text-slate-500 transition shadow-sm bg-white" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/></svg>
                      </a>
                      <button type="button" onclick="openDetailModal(this)" class="inline-flex items-center justify-center w-8 h-8 rounded-[10px] border border-slate-200 hover:border-[#10B981] hover:text-[#10B981] text-slate-500 transition shadow-sm bg-white" title="Lihat">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                      </button>
                      <button type="button" onclick="openDeleteModal()" class="inline-flex items-center justify-center w-8 h-8 rounded-[10px] border border-slate-200 hover:border-red-500 hover:text-red-500 hover:bg-red-50 text-slate-500 transition shadow-sm bg-white" title="Hapus">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                      </button>
                    </div>
                  </td>
                </tr>

                <!-- Baris 3 (ID: 3) -->
                <tr class="hover:bg-slate-50/50 transition">
                  <td class="py-4 px-4 text-slate-400 font-bold text-[12px] whitespace-nowrap text-center">3</td>
                  <td class="py-4 px-4 whitespace-nowrap text-center">
                    <div class="w-10 h-10 rounded-full mx-auto bg-teal-100 text-teal-600 flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M12 2.25a.75.75 0 01.673.418l7.5 15A.75.75 0 0119.5 18.75h-15a.75.75 0 01-.673-1.082l7.5-15A.75.75 0 0112 2.25z" /></svg>
                    </div>
                  </td>
                  <td class="py-4 px-4 whitespace-nowrap">
                    <span class="font-extrabold text-[#0F172A]">Pohon Kebaikan</span>
                  </td>
                  <td class="py-4 px-4 whitespace-nowrap text-center">
                    <span class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-[8px] bg-amber-50 text-[#0F172A] border border-amber-100/50 text-[12.5px] font-bold whitespace-nowrap">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-amber-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" /></svg>
                      21 - 30
                    </span>
                  </td>
                  <td class="py-4 px-4 text-slate-500 leading-relaxed min-w-[200px]">
                    Keren! Kebiasaan baikmu semakin kuat.
                  </td>
                  <td class="py-4 px-4 text-center whitespace-nowrap">
                    <div class="flex items-center justify-center gap-1.5">
                      <a href="{{ url('/admin/edit-lencana?id=3') }}" class="inline-flex items-center justify-center w-8 h-8 rounded-[10px] border border-slate-200 hover:border-[#10B981] hover:text-[#10B981] text-slate-500 transition shadow-sm bg-white" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/></svg>
                      </a>
                      <button type="button" onclick="openDetailModal(this)" class="inline-flex items-center justify-center w-8 h-8 rounded-[10px] border border-slate-200 hover:border-[#10B981] hover:text-[#10B981] text-slate-500 transition shadow-sm bg-white" title="Lihat">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                      </button>
                      <button type="button" onclick="openDeleteModal()" class="inline-flex items-center justify-center w-8 h-8 rounded-[10px] border border-slate-200 hover:border-red-500 hover:text-red-500 hover:bg-red-50 text-slate-500 transition shadow-sm bg-white" title="Hapus">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                      </button>
                    </div>
                  </td>
                </tr>

                <!-- Baris 4 (ID: 4) -->
                <tr class="hover:bg-slate-50/50 transition">
                  <td class="py-4 px-4 text-slate-400 font-bold text-[12px] whitespace-nowrap text-center">4</td>
                  <td class="py-4 px-4 whitespace-nowrap text-center">
                    <div class="w-10 h-10 rounded-full mx-auto bg-red-100 text-red-600 flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" /></svg>
                    </div>
                  </td>
                  <td class="py-4 px-4 whitespace-nowrap">
                    <span class="font-extrabold text-[#0F172A]">Bintang Kebaikan</span>
                  </td>
                  <td class="py-4 px-4 whitespace-nowrap text-center">
                    <span class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-[8px] bg-amber-50 text-[#0F172A] border border-amber-100/50 text-[12.5px] font-bold whitespace-nowrap">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-amber-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" /></svg>
                      31 - 40
                    </span>
                  </td>
                  <td class="py-4 px-4 text-slate-500 leading-relaxed min-w-[200px]">
                    Hebat! Kebaikanmu semakin bersinar.
                  </td>
                  <td class="py-4 px-4 text-center whitespace-nowrap">
                    <div class="flex items-center justify-center gap-1.5">
                      <a href="{{ url('/admin/edit-lencana?id=4') }}" class="inline-flex items-center justify-center w-8 h-8 rounded-[10px] border border-slate-200 hover:border-[#10B981] hover:text-[#10B981] text-slate-500 transition shadow-sm bg-white" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/></svg>
                      </a>
                      <button type="button" onclick="openDetailModal(this)" class="inline-flex items-center justify-center w-8 h-8 rounded-[10px] border border-slate-200 hover:border-[#10B981] hover:text-[#10B981] text-slate-500 transition shadow-sm bg-white" title="Lihat">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                      </button>
                      <button type="button" onclick="openDeleteModal()" class="inline-flex items-center justify-center w-8 h-8 rounded-[10px] border border-slate-200 hover:border-red-500 hover:text-red-500 hover:bg-red-50 text-slate-500 transition shadow-sm bg-white" title="Hapus">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                      </button>
                    </div>
                  </td>
                </tr>

                <!-- Baris 5 (ID: 5) -->
                <tr class="hover:bg-slate-50/50 transition">
                  <td class="py-4 px-4 text-slate-400 font-bold text-[12px] whitespace-nowrap text-center">5</td>
                  <td class="py-4 px-4 whitespace-nowrap text-center">
                    <div class="w-10 h-10 rounded-full mx-auto bg-blue-100 text-blue-600 flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12 15a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z" clip-rule="evenodd" /><path d="M10.22 17.016l-1.399 4.195a.75.75 0 001.077.925l2.102-1.261 2.102 1.26a.75.75 0 001.077-.924l-1.4-4.196a6.711 6.711 0 01-3.56 0z" /></svg>
                    </div>
                  </td>
                  <td class="py-4 px-4 whitespace-nowrap">
                    <span class="font-extrabold text-[#0F172A]">Teladan Kebaikan</span>
                  </td>
                  <td class="py-4 px-4 whitespace-nowrap text-center">
                    <span class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-[8px] bg-amber-50 text-[#0F172A] border border-amber-100/50 text-[12.5px] font-bold whitespace-nowrap">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-amber-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" /></svg>
                      41 - 50
                    </span>
                  </td>
                  <td class="py-4 px-4 text-slate-500 leading-relaxed min-w-[200px]">
                    Luar biasa! Kamu jadi inspirasi dalam kebaikan.
                  </td>
                  <td class="py-4 px-4 text-center whitespace-nowrap">
                    <div class="flex items-center justify-center gap-1.5">
                      <a href="{{ url('/admin/edit-lencana?id=5') }}" class="inline-flex items-center justify-center w-8 h-8 rounded-[10px] border border-slate-200 hover:border-[#10B981] hover:text-[#10B981] text-slate-500 transition shadow-sm bg-white" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/></svg>
                      </a>
                      <button type="button" onclick="openDetailModal(this)" class="inline-flex items-center justify-center w-8 h-8 rounded-[10px] border border-slate-200 hover:border-[#10B981] hover:text-[#10B981] text-slate-500 transition shadow-sm bg-white" title="Lihat">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                      </button>
                      <button type="button" onclick="openDeleteModal()" class="inline-flex items-center justify-center w-8 h-8 rounded-[10px] border border-slate-200 hover:border-red-500 hover:text-red-500 hover:bg-red-50 text-slate-500 transition shadow-sm bg-white" title="Hapus">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-5 border-t border-slate-100 mt-2">
            <span class="text-[12px] font-medium text-slate-400">
              Menampilkan <span class="font-extrabold text-[#0F172A]">1 – 5</span> dari <span class="font-extrabold text-[#0F172A]">5</span> lencana
            </span>

            <div class="flex items-center gap-1.5">
              <button class="w-8 h-8 rounded-lg border border-slate-100 flex items-center justify-center text-slate-300 cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
              </button>
              <button class="w-8 h-8 rounded-lg bg-[#10B981] text-white text-[12px] font-extrabold flex items-center justify-center shadow-sm">1</button>
              <button class="w-8 h-8 rounded-lg border border-slate-100 flex items-center justify-center text-slate-300 cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
              </button>
            </div>
          </div>
        </div>

        <div class="bg-[#F0F7FA] border border-blue-100/60 rounded-[16px] p-5 flex items-start gap-4 shadow-sm">
          <div class="w-7 h-7 rounded-full bg-white text-[#059669] flex items-center justify-center flex-shrink-0 border border-[#10B981]/20 mt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" /></svg>
          </div>
          <div>
            <h4 class="text-[14px] font-extrabold text-[#0F172A]">Informasi Penugasan Otomatis</h4>
            <p class="text-[13px] text-slate-500 font-medium mt-1">Lencana diberikan otomatis oleh engine sistem BaliHabit sesaat setelah anak menyelesaikan tugas harian dan mencapai batas bintang minimum.</p>
          </div>
        </div>

      </div>
    </div>
  </main>

  <!-- ================= POPUP DETAIL LENCANA ================= -->
  <div id="detailLencanaModal" class="fixed inset-0 z-50 hidden">
    <div id="detailLencanaBackdrop" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>
    <div class="fixed inset-0 z-10 flex items-center justify-center p-4 sm:p-0">
      <div id="detailLencanaContent" class="relative bg-white rounded-[24px] shadow-xl w-full max-w-lg transform scale-95 opacity-0 transition-all duration-300 flex flex-col overflow-hidden">
        <div class="px-8 pt-8 pb-6 flex items-start justify-between border-b border-slate-100">
          <div>
            <h3 class="text-[20px] font-extrabold text-[#0F172A] tracking-tight">Detail Lencana</h3>
            <p class="text-[13px] text-slate-500 font-medium mt-1">Informasi lengkap mengenai lencana ini.</p>
          </div>
          <button onclick="closeDetailModal()" class="text-slate-400 hover:text-slate-600 transition bg-slate-50 hover:bg-slate-100 rounded-full p-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
          </button>
        </div>
        <div class="p-8 flex flex-col gap-6 bg-[#F8FAFC]">
          <div class="bg-white border border-slate-100 rounded-[16px] p-6 flex items-center gap-5 shadow-sm">
            <div id="modalIconContainer" class="w-[60px] h-[60px] rounded-full bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8"><path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm.53 5.47a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l1.72-1.72v5.69a.75.75 0 001.5 0v-5.69l1.72 1.72a.75.75 0 101.06-1.06l-3-3z" clip-rule="evenodd" /></svg>
            </div>
            <div>
              <h4 id="modalTitle" class="text-[18px] font-extrabold text-[#0F172A]">Benih Kebaikan</h4>
              <span id="modalSubtitleRange" class="inline-flex items-center px-2.5 py-1 rounded-[6px] bg-slate-100 text-slate-600 text-[11px] font-bold mt-2">5 - 10 Bintang</span>
            </div>
          </div>
          <div class="bg-white border border-slate-100 rounded-[16px] overflow-hidden shadow-sm">
            <div class="grid grid-cols-[130px_auto] border-b border-slate-50">
              <div class="px-5 py-4 bg-slate-50/50 text-[13px] font-semibold text-slate-500">Nama Lencana</div>
              <div id="modalDetailName" class="px-5 py-4 text-[13.5px] font-bold text-[#0F172A] flex items-center gap-2"><span class="text-slate-400">:</span> Benih Kebaikan</div>
            </div>
            <div class="grid grid-cols-[130px_auto] border-b border-slate-50">
              <div class="px-5 py-4 bg-slate-50/50 text-[13px] font-semibold text-slate-500">Deskripsi</div>
              <div class="px-5 py-4 text-[13.5px] font-medium text-slate-600 leading-relaxed flex items-start gap-2">
                <span class="text-slate-400 font-bold">:</span> 
                <span id="modalDetailDescText">Kebaikanmu mulai tumbuh! Yuk, terus berkembang lewat tindakan santun dan kepedulian setiap hari.</span>
              </div>
            </div>
            <div class="grid grid-cols-[130px_auto]">
              <div class="px-5 py-4 bg-slate-50/50 text-[13px] font-semibold text-slate-500">Rentang Bintang</div>
              <div class="px-5 py-4 text-[14px] font-extrabold text-[#10B981] flex items-center gap-2">
                <span class="text-slate-400 font-bold text-[13.5px]">:</span> 
                <span id="modalDetailRangeText">5 - 10</span>
              </div>
            </div>
          </div>
        </div>
        <div class="px-8 py-5 border-t border-slate-100 bg-white flex justify-end">
          <button onclick="closeDetailModal()" class="px-6 py-2.5 rounded-[12px] border border-slate-200 text-slate-600 text-[13px] font-bold hover:bg-slate-50 hover:text-slate-800 transition shadow-sm">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= POPUP KONFIRMASI HAPUS ================= -->
  <div id="deleteModal" class="fixed inset-0 z-50 hidden">
    <div id="deleteBackdrop" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>
    <div class="fixed inset-0 z-10 flex items-center justify-center p-4 sm:p-0">
      <div id="deleteContent" class="relative bg-white rounded-[24px] shadow-xl w-full max-w-sm transform scale-95 opacity-0 transition-all duration-300 flex flex-col p-8 text-center">
        <div class="w-16 h-16 rounded-full bg-red-50 text-red-500 flex items-center justify-center mx-auto mb-5 border-[4px] border-red-100/50">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
          </svg>
        </div>
        <h3 class="text-[20px] font-extrabold text-[#0F172A] tracking-tight mb-2">Hapus Lencana?</h3>
        <p class="text-[13.5px] text-slate-500 font-medium mb-8 leading-relaxed">
          Apakah Anda yakin ingin menghapus lencana ini? Data yang dihapus tidak dapat dikembalikan lagi.
        </p>
        <div class="flex items-center justify-center gap-3">
          <button type="button" onclick="closeDeleteModal()" class="flex-1 px-5 py-3 rounded-[12px] border border-slate-200 text-slate-600 text-[13.5px] font-bold hover:bg-slate-50 hover:text-[#0F172A] transition shadow-sm">
            Batal
          </button>
          <button type="button" onclick="confirmDelete()" class="flex-1 px-5 py-3 rounded-[12px] bg-red-500 hover:bg-red-600 text-white text-[13.5px] font-bold transition shadow-sm shadow-red-500/20">
            Hapus
          </button>
        </div>
      </div>
    </div>
  </div>

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

  <!-- ================= SCRIPT ================= -->
  <script>

    // --- SCRIPT MODAL DETAIL LENCANA DINAMIS ---
    function openDetailModal(buttonElement) {
      if (buttonElement) {
        const row = buttonElement.closest('tr');
        const iconDiv = row.querySelector('td:nth-child(2) div');
        const iconSvgHTML = iconDiv.innerHTML;
        const bgClass = Array.from(iconDiv.classList).find(c => c.startsWith('bg-') && c !== 'bg-white');
        const textClass = Array.from(iconDiv.classList).find(c => c.startsWith('text-'));
        
        const badgeName = row.querySelector('td:nth-child(3) span').innerText.trim();
        const badgeRange = row.querySelector('td:nth-child(4)').innerText.trim(); 
        const badgeDesc = row.querySelector('td:nth-child(5)').innerText.trim();

        const modalIconContainer = document.getElementById('modalIconContainer');
        modalIconContainer.className = `w-[60px] h-[60px] rounded-full flex items-center justify-center flex-shrink-0 ${bgClass} ${textClass}`;
        modalIconContainer.innerHTML = iconSvgHTML.replace(/w-5 h-5/g, 'w-8 h-8');

        document.getElementById('modalTitle').innerText = badgeName;
        document.getElementById('modalSubtitleRange').innerText = badgeRange + ' Bintang';
        
        document.getElementById('modalDetailName').innerHTML = `<span class="text-slate-400">:</span> ${badgeName}`;
        document.getElementById('modalDetailDescText').innerText = badgeDesc;
        document.getElementById('modalDetailRangeText').innerText = badgeRange;
      }

      const modal = document.getElementById('detailLencanaModal');
      const backdrop = document.getElementById('detailLencanaBackdrop');
      const content = document.getElementById('detailLencanaContent');
      
      modal.classList.remove('hidden');
      setTimeout(() => {
        backdrop.classList.remove('opacity-0');
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
      }, 10);
    }

    function closeDetailModal() {
      const modal = document.getElementById('detailLencanaModal');
      const backdrop = document.getElementById('detailLencanaBackdrop');
      const content = document.getElementById('detailLencanaContent');
      
      backdrop.classList.add('opacity-0');
      content.classList.remove('scale-100', 'opacity-100');
      content.classList.add('scale-95', 'opacity-0');
      
      setTimeout(() => {
        modal.classList.add('hidden');
      }, 300);
    }

    // --- SCRIPT MODAL HAPUS LENCANA ---
    function openDeleteModal() {
      const modal = document.getElementById('deleteModal');
      const backdrop = document.getElementById('deleteBackdrop');
      const content = document.getElementById('deleteContent');
      
      modal.classList.remove('hidden');
      setTimeout(() => {
        backdrop.classList.remove('opacity-0');
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
      }, 10);
    }

    function closeDeleteModal() {
      const modal = document.getElementById('deleteModal');
      const backdrop = document.getElementById('deleteBackdrop');
      const content = document.getElementById('deleteContent');
      
      backdrop.classList.add('opacity-0');
      content.classList.remove('scale-100', 'opacity-100');
      content.classList.add('scale-95', 'opacity-0');
      
      setTimeout(() => {
        modal.classList.add('hidden');
      }, 300);
    }

    function confirmDelete() {
      closeDeleteModal();
    }

    // --- SCRIPT LIVE SEARCH ---
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
      searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase().trim();
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
          const text = row.innerText.toLowerCase();
          if (text.includes(query)) {
            row.style.display = '';
          } else {
            row.style.display = 'none';
          }
        });
      });
    }
  </script>

  <!-- Form logout Admin (POST + CSRF): dikirim oleh tombol "Ya, Keluar" lewat confirmLogout() -->
  <form id="adminLogoutForm" action="{{ route('admin.logout') }}" method="POST" class="hidden">@csrf</form>
</body>
</html>