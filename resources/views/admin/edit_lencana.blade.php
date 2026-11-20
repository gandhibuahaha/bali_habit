<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Lencana - BaliHabit</title>
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
        <a href="{{ url('/admin/story-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group" title="Story Management">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Story Management</span>
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
        <!-- Menu Aktif: Lencana Management -->
        <a href="{{ url('/admin/lencana-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] bg-[#10B981] text-white transition shadow-[0_2px_10px_rgba(16,185,129,0.2)]" title="Lencana Management">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-bold whitespace-nowrap">Lencana Management</span>
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
        <!-- Breadcrumb -->
        <div class="hidden sm:flex items-center text-[13px] font-bold text-slate-400">
          <span>Portal Admin</span>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 mx-2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
          <a href="{{ url('/admin/lencana-management') }}" class="hover:text-[#10B981] transition">Lencana Management</a>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 mx-2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
          <span class="text-[#10B981]">Edit Lencana</span>
        </div>
      </div>

      <!-- Profil & Notifikasi -->
      <div class="flex items-center gap-6">
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
            <div class="w-8 h-8 rounded-full bg-emerald-100 text-[#10B981] font-bold flex items-center justify-center text-[12px] shadow-sm">PG</div>
            <span class="text-[13px] font-bold text-[#1E293B] hidden sm:block">Ni Putu Gayatri</span>
            <svg id="profileChevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 text-slate-400 hidden sm:block transition-transform duration-200"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
          </button>

          <!-- Dropdown Menu Box -->
          <div id="profileDropdownMenu" class="absolute right-0 mt-3 w-[270px] bg-white border border-slate-100 rounded-[20px] shadow-[0_10px_40px_-10px_rgba(0,0,0,0.08)] opacity-0 invisible transform scale-95 transition-all duration-200 z-50 overflow-hidden origin-top-right">
            
            <!-- User Info Header -->
            <div class="p-4 bg-white border-b border-slate-50 flex items-center gap-3">
              <div class="w-11 h-11 rounded-full bg-emerald-100 text-[#10B981] font-bold flex items-center justify-center text-sm flex-shrink-0">PG</div>
              <div class="flex flex-col min-w-0">
                <div class="flex items-center gap-2 mb-0.5">
                  <span class="text-[14px] font-extrabold text-[#0F172A] truncate">Ni Putu Gayatri</span>
                </div>
                <span class="text-[11.5px] font-medium text-slate-400 truncate">putu.gayatri@balihabit.id</span>
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

    <!-- KONTEN UTAMA: EDIT LENCANA -->
    <div class="p-8 mb-10 flex-1">
      <div class="max-w-[1000px] mx-auto flex flex-col">
        
        <!-- Link Kembali & Judul -->
        <div class="mb-6">
          <div class="mb-3">
            <a href="{{ url('/admin/lencana-management') }}" class="inline-flex items-center gap-2 text-[13.5px] font-bold text-slate-400 hover:text-[#10B981] transition group">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 group-hover:-translate-x-0.5 transition-transform">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
              </svg>
              Kembali ke Lencana
            </a>
          </div>
          <h1 class="text-[28px] font-extrabold text-[#0F172A] tracking-tight mb-1">Edit Lencana</h1>
          <p class="text-slate-500 text-[13.5px]">Perbarui informasi lencana penghargaan dan rentang target bintang untuk anak.</p>
        </div>

        <form action="#" method="POST" class="flex flex-col gap-6" id="editLencanaForm">
          @csrf
          @method('PUT')
          <!-- CARD 1: Informasi Lencana -->
          <div class="bg-white border border-slate-100 rounded-[24px] shadow-sm p-8">
            <h2 class="text-[18px] font-extrabold text-[#0F172A] mb-6">Informasi Lencana</h2>
            <div class="flex flex-col gap-5">
              <div>
                <label class="block text-[13.5px] font-bold text-[#0F172A] mb-2">Nama Lencana *</label>
                <input type="text" id="namaLencanaInput" placeholder="Masukkan nama lencana baru..." class="w-full bg-slate-50 border border-slate-200 rounded-[12px] px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] transition" required>
              </div>
              <div>
                <label class="block text-[13.5px] font-bold text-[#0F172A] mb-2">Deskripsi Lencana *</label>
                <textarea id="deskripsiLencanaInput" rows="4" placeholder="Tuliskan deskripsi..." class="w-full bg-slate-50 border border-slate-200 rounded-[12px] px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] transition resize-none" required></textarea>
              </div>
            </div>
          </div>

          <!-- CARD 2: Pilihan Ikon Lencana -->
          <div class="bg-white border border-slate-100 rounded-[24px] shadow-sm p-8">
            <div class="flex items-center justify-between mb-6">
              <h2 class="text-[16px] font-extrabold text-[#0F172A]">Pilihan Ikon Lencana <span class="text-red-500">*</span></h2>
              <span class="text-[12px] font-medium text-slate-400">Pilih salah satu ikon visual untuk lencana</span>
            </div>

            <!-- Wadah Background Ikon -->
            <div class="bg-[#F3F6F9] rounded-[16px] py-8 px-6">
              <div class="grid grid-cols-4 sm:grid-cols-5 md:grid-cols-7 gap-y-10 gap-x-4 justify-items-center">
                
                <!-- Ikon 1 -->
                <label class="cursor-pointer flex flex-col items-center relative group">
                  <input type="radio" name="icon_lencana" value="1" class="sr-only peer" required>
                  <div class="w-12 h-12 rounded-[12px] flex items-center justify-center transition-all border-2 border-transparent peer-checked:border-[#10B981]" style="background-color: #86EFAC; color: #064E3B;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
                  </div>
                  <div class="absolute -bottom-6 w-3.5 h-3.5 rounded-full bg-slate-200 transition-all peer-checked:bg-[#10B981] peer-checked:scale-110 shadow-sm"></div>
                </label>

                <!-- Ikon 2 -->
                <label class="cursor-pointer flex flex-col items-center relative group">
                  <input type="radio" name="icon_lencana" value="2" class="sr-only peer">
                  <div class="w-12 h-12 rounded-[12px] flex items-center justify-center transition-all border-2 border-transparent peer-checked:border-[#10B981]" style="background-color: #FDE047; color: #713F12;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" /></svg>
                  </div>
                  <div class="absolute -bottom-6 w-3.5 h-3.5 rounded-full bg-slate-200 transition-all peer-checked:bg-[#10B981] peer-checked:scale-110 shadow-sm"></div>
                </label>

                <!-- Ikon 3 -->
                <label class="cursor-pointer flex flex-col items-center relative group">
                  <input type="radio" name="icon_lencana" value="3" class="sr-only peer">
                  <div class="w-12 h-12 rounded-[12px] flex items-center justify-center transition-all border-2 border-transparent peer-checked:border-[#10B981]" style="background-color: #DBEAFE; color: #1E3A8A;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" /></svg>
                  </div>
                  <div class="absolute -bottom-6 w-3.5 h-3.5 rounded-full bg-slate-200 transition-all peer-checked:bg-[#10B981] peer-checked:scale-110 shadow-sm"></div>
                </label>

                <!-- Ikon 4 -->
                <label class="cursor-pointer flex flex-col items-center relative group">
                  <input type="radio" name="icon_lencana" value="4" class="sr-only peer">
                  <div class="w-12 h-12 rounded-[12px] flex items-center justify-center transition-all border-2 border-transparent peer-checked:border-[#10B981]" style="background-color: #FECDD3; color: #881337;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z"/></svg>
                  </div>
                  <div class="absolute -bottom-6 w-3.5 h-3.5 rounded-full bg-slate-200 transition-all peer-checked:bg-[#10B981] peer-checked:scale-110 shadow-sm"></div>
                </label>

                <!-- Ikon 5 -->
                <label class="cursor-pointer flex flex-col items-center relative group">
                  <input type="radio" name="icon_lencana" value="5" class="sr-only peer">
                  <div class="w-12 h-12 rounded-[12px] flex items-center justify-center transition-all border-2 border-transparent peer-checked:border-[#10B981]" style="background-color: #A7F3D0; color: #064E3B;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5Z" clip-rule="evenodd" /></svg>
                  </div>
                  <div class="absolute -bottom-6 w-3.5 h-3.5 rounded-full bg-slate-200 transition-all peer-checked:bg-[#10B981] peer-checked:scale-110 shadow-sm"></div>
                </label>

                <!-- Ikon 6 -->
                <label class="cursor-pointer flex flex-col items-center relative group">
                  <input type="radio" name="icon_lencana" value="6" class="sr-only peer">
                  <div class="w-12 h-12 rounded-[12px] flex items-center justify-center transition-all border-2 border-transparent peer-checked:border-[#10B981]" style="background-color: #E2E8F0; color: #1E293B;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M12 1.5c-1.921 0-3.816.111-5.68.327-1.117.13-1.97 1.04-1.97 2.158 0 3.017 1.157 5.928 3.25 8.103.882.916 1.341 2.148 1.341 3.42v1.5H7.5A2.25 2.25 0 0 0 5.25 19v1.5c0 .414.336.75.75.75h12a.75.75 0 0 0 .75-.75V19a2.25 2.25 0 0 0-2.25-2.25h-2.161v-1.5c0-1.272.459-2.504 1.34-3.42 2.094-2.175 3.251-5.086 3.251-8.103 0-1.118-.853-2.028-1.97-2.158A46.732 46.732 0 0 0 12 1.5Zm0 12a4.5 4.5 0 0 0-3.32-4.341c-.722-.204-1.18-.944-1.04-1.688C8.03 5.467 9.88 4.5 12 4.5s3.97.967 4.36 1.971c.14.744-.318 1.484-1.04 1.688A4.5 4.5 0 0 0 12 13.5Z" clip-rule="evenodd" /></svg>
                  </div>
                  <div class="absolute -bottom-6 w-3.5 h-3.5 rounded-full bg-slate-200 transition-all peer-checked:bg-[#10B981] peer-checked:scale-110 shadow-sm"></div>
                </label>

                <!-- Ikon 7 -->
                <label class="cursor-pointer flex flex-col items-center relative group">
                  <input type="radio" name="icon_lencana" value="7" class="sr-only peer">
                  <div class="w-12 h-12 rounded-[12px] flex items-center justify-center transition-all border-2 border-transparent peer-checked:border-[#10B981]" style="background-color: #E0E7FF; color: #312E81;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307 4.491 4.491 0 0 1 1.307 3.497A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-1.307 3.498 4.491 4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1 12 21.75a4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-3.498-1.307 4.491 4.491 0 0 1-1.307-3.497A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 1.307-3.498 4.49 4.49 0 0 1 3.497-1.307Zm7.007 6.387a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" /></svg>
                  </div>
                  <div class="absolute -bottom-6 w-3.5 h-3.5 rounded-full bg-slate-200 transition-all peer-checked:bg-[#10B981] peer-checked:scale-110 shadow-sm"></div>
                </label>

                <!-- Ikon 8 -->
                <label class="cursor-pointer flex flex-col items-center relative group">
                  <input type="radio" name="icon_lencana" value="8" class="sr-only peer">
                  <div class="w-12 h-12 rounded-[12px] flex items-center justify-center transition-all border-2 border-transparent peer-checked:border-[#10B981]" style="background-color: #FDBA74; color: #7C2D12;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path d="M11.584 2.376a.75.75 0 0 1 .832 0l9 6a.75.75 0 1 1-.832 1.248L12 3.901 3.416 9.624a.75.75 0 0 1-.832-1.248l9-6Z" /><path fill-rule="evenodd" d="M20.25 10.332v9.918H21a.75.75 0 0 1 0 1.5H3a.75.75 0 0 1 0-1.5h.75v-9.918a.75.75 0 0 1 .634-.74A49.109 49.109 0 0 1 12 9c2.59 0 5.134.202 7.616.592a.75.75 0 0 1 .634.74Zm-7.5 2.418a.75.75 0 0 0-1.5 0v6.75a.75.75 0 0 0 1.5 0v-6.75Zm3-.75a.75.75 0 0 1 .75.75v6.75a.75.75 0 0 1-1.5 0v-6.75a.75.75 0 0 1 .75-.75ZM9 12a.75.75 0 0 0-.75.75v6.75a.75.75 0 0 0 1.5 0v-6.75A.75.75 0 0 0 9 12Z" clip-rule="evenodd" /></svg>
                  </div>
                  <div class="absolute -bottom-6 w-3.5 h-3.5 rounded-full bg-slate-200 transition-all peer-checked:bg-[#10B981] peer-checked:scale-110 shadow-sm"></div>
                </label>

                <!-- Ikon 9 -->
                <label class="cursor-pointer flex flex-col items-center relative group">
                  <input type="radio" name="icon_lencana" value="9" class="sr-only peer">
                  <div class="w-12 h-12 rounded-[12px] flex items-center justify-center transition-all border-2 border-transparent peer-checked:border-[#10B981]" style="background-color: #D9F99D; color: #365314;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm0 13.5a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd" /></svg>
                  </div>
                  <div class="absolute -bottom-6 w-3.5 h-3.5 rounded-full bg-slate-200 transition-all peer-checked:bg-[#10B981] peer-checked:scale-110 shadow-sm"></div>
                </label>

                <!-- Ikon 10 -->
                <label class="cursor-pointer flex flex-col items-center relative group">
                  <input type="radio" name="icon_lencana" value="10" class="sr-only peer">
                  <div class="w-12 h-12 rounded-[12px] flex items-center justify-center transition-all border-2 border-transparent peer-checked:border-[#10B981]" style="background-color: #99F6E4; color: #134E4A;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path d="M4.5 12a7.5 7.5 0 1 1 15 0 7.5 7.5 0 0 1-15 0Z" /></svg>
                  </div>
                  <div class="absolute -bottom-6 w-3.5 h-3.5 rounded-full bg-slate-200 transition-all peer-checked:bg-[#10B981] peer-checked:scale-110 shadow-sm"></div>
                </label>

                <!-- Ikon 11 -->
                <label class="cursor-pointer flex flex-col items-center relative group">
                  <input type="radio" name="icon_lencana" value="11" class="sr-only peer">
                  <div class="w-12 h-12 rounded-[12px] flex items-center justify-center transition-all border-2 border-transparent peer-checked:border-[#10B981]" style="background-color: #FEF3C7; color: #78350F;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V3.375c0-1.036-.84-1.875-1.875-1.875h-12.75ZM12 17.25a3.375 3.375 0 1 0 0-6.75 3.375 3.375 0 0 0 0 6.75Z" clip-rule="evenodd" /></svg>
                  </div>
                  <div class="absolute -bottom-6 w-3.5 h-3.5 rounded-full bg-slate-200 transition-all peer-checked:bg-[#10B981] peer-checked:scale-110 shadow-sm"></div>
                </label>

                <!-- Ikon 12 -->
                <label class="cursor-pointer flex flex-col items-center relative group">
                  <input type="radio" name="icon_lencana" value="12" class="sr-only peer">
                  <div class="w-12 h-12 rounded-[12px] flex items-center justify-center transition-all border-2 border-transparent peer-checked:border-[#10B981]" style="background-color: #CBD5E1; color: #0F172A;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M12 2.25c-2.429 0-4.817.178-7.152.521C2.87 3.061 1.5 4.795 1.5 6.741v6.018c0 1.946 1.37 3.68 3.348 3.97.877.129 1.761.234 2.652.316V21a.75.75 0 0 0 1.28.53l4.184-4.183a.39.39 0 0 1 .266-.112c2.006-.05 3.982-.22 5.922-.506 1.978-.29 3.348-2.024 3.348-3.97V6.741c0-1.946-1.37-3.68-3.348-3.97A49.145 49.145 0 0 0 12 2.25ZM8.25 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Zm2.625 1.125a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z" clip-rule="evenodd" /></svg>
                  </div>
                  <div class="absolute -bottom-6 w-3.5 h-3.5 rounded-full bg-slate-200 transition-all peer-checked:bg-[#10B981] peer-checked:scale-110 shadow-sm"></div>
                </label>

                <!-- Ikon 13 -->
                <label class="cursor-pointer flex flex-col items-center relative group">
                  <input type="radio" name="icon_lencana" value="13" class="sr-only peer">
                  <div class="w-12 h-12 rounded-[12px] flex items-center justify-center transition-all border-2 border-transparent peer-checked:border-[#10B981]" style="background-color: #DBEAFE; color: #1E40AF;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3a.75.75 0 0 1 .75-.75Zm-9 13.5a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" /></svg>
                  </div>
                  <div class="absolute -bottom-6 w-3.5 h-3.5 rounded-full bg-slate-200 transition-all peer-checked:bg-[#10B981] peer-checked:scale-110 shadow-sm"></div>
                </label>

                <!-- Ikon 14 -->
                <label class="cursor-pointer flex flex-col items-center relative group">
                  <input type="radio" name="icon_lencana" value="14" class="sr-only peer">
                  <div class="w-12 h-12 rounded-[12px] flex items-center justify-center transition-all border-2 border-transparent peer-checked:border-[#10B981]" style="background-color: #1E293B; color: #F8FAFC;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path d="M11.644 1.59a.75.75 0 0 1 .712 0l9.75 5.25a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.712 0l-9.75-5.25a.75.75 0 0 1 0-1.32l9.75-5.25Z" /><path d="m3.265 10.602 7.668 4.129a2.25 2.25 0 0 0 2.134 0l7.668-4.13-7.153 3.852a2.25 2.25 0 0 1-2.134 0L4.316 10.6c-.393.21-.734.48-1.05.78Z" /><path d="m2.164 12.872 8.77 4.723a2.25 2.25 0 0 0 2.134 0l8.77-4.723c-.347.376-.75.706-1.2.973L12.5 18.22a.75.75 0 0 1-.712 0L3.364 13.845c-.45-.267-.853-.597-1.2-.973Z" /></svg>
                  </div>
                  <div class="absolute -bottom-6 w-3.5 h-3.5 rounded-full bg-slate-200 transition-all peer-checked:bg-[#10B981] peer-checked:scale-110 shadow-sm"></div>
                </label>
                
              </div>
            </div>
          </div>

          <!-- CARD 3: Rentang Bintang Target -->
          <div class="bg-white border border-slate-100 rounded-[24px] shadow-sm p-8">
            <h2 class="text-[18px] font-extrabold text-[#0F172A] mb-6">Rentang Bintang Target</h2>
            <div class="grid grid-cols-1 md:grid-cols-[1fr,auto,1fr] gap-4 items-center">
              <div>
                <label class="block text-[12.5px] font-bold text-slate-500 mb-2">Bintang Minimal</label>
                <input type="number" id="bintangMinInput" class="w-full bg-slate-50 border border-slate-200 rounded-[12px] px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] transition" required>
              </div>
              <div class="hidden md:flex items-center justify-center pt-6 text-slate-400 font-bold">-</div>
              <div>
                <label class="block text-[12.5px] font-bold text-slate-500 mb-2">Bintang Maksimal</label>
                <input type="number" id="bintangMaxInput" class="w-full bg-slate-50 border border-slate-200 rounded-[12px] px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] transition" required>
              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="flex items-center justify-between mt-2">
            <a href="{{ url('/admin/lencana-management') }}" class="px-6 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 rounded-[12px] font-bold transition shadow-sm">Batal</a>
            <button type="button" onclick="openSaveModal()" class="px-6 py-2.5 bg-[#10B981] hover:bg-[#059669] text-white rounded-[12px] font-bold transition shadow-sm">Simpan Perubahan</button>
          </div>

        </form>
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
          <button type="button" onclick="closeLogoutModal()" class="flex-1 px-5 py-3 rounded-[12px] border border-slate-200 text-slate-600 text-[13.5px] font-bold hover:bg-slate-50 hover:text-[#0F172A] transition shadow-sm">Batal</button>
          <button type="button" onclick="confirmLogout()" class="flex-1 px-5 py-3 rounded-[12px] bg-red-500 hover:bg-red-600 text-white text-[13.5px] font-bold transition shadow-sm shadow-red-500/20">Ya, Keluar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= POPUP KONFIRMASI SIMPAN ================= -->
  <div id="saveLencanaModal" class="fixed inset-0 z-50 hidden">
    <div id="saveLencanaBackdrop" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>
    <div class="fixed inset-0 z-10 flex items-center justify-center p-4 sm:p-0">
      <div id="saveLencanaContent" class="relative bg-white rounded-[24px] shadow-xl w-full max-w-sm transform scale-95 opacity-0 transition-all duration-300 flex flex-col p-8 text-center">
        <div class="w-16 h-16 rounded-full bg-emerald-50 text-[#10B981] flex items-center justify-center mx-auto mb-5 border-[4px] border-emerald-100/50">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <h3 class="text-[20px] font-extrabold text-[#0F172A] tracking-tight mb-2">Simpan Perubahan?</h3>
        <p class="text-[13.5px] text-slate-500 font-medium mb-8 leading-relaxed">
          Apakah Anda yakin ingin menyimpan perubahan pada lencana ini? Pastikan semua informasi sudah benar.
        </p>
        <div class="flex items-center justify-center gap-3">
          <button type="button" onclick="closeSaveModal()" class="flex-1 px-5 py-3 rounded-[12px] border border-slate-200 text-slate-600 text-[13.5px] font-bold hover:bg-slate-50 hover:text-[#0F172A] transition shadow-sm">Batal</button>
          <button type="button" onclick="confirmSave()" class="flex-1 px-5 py-3 rounded-[12px] bg-[#10B981] hover:bg-[#059669] text-white text-[13.5px] font-bold transition shadow-sm shadow-[#10B981]/20">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= SCRIPT DINAMIS ================= -->
  <script>
    // --- Data Dummy Lencana (Simulasi Database Berdasarkan ID) ---
    const dataLencanaDatabase = {
      1: {
        nama: 'Benih Kebaikan',
        deskripsi: 'Kebaikanmu mulai tumbuh! Yuk, terus berkembang.',
        icon: '1',
        bintangMin: 5,
        bintangMax: 10
      },
      2: {
        nama: 'Tumbuh Bersama',
        deskripsi: 'Kamu makin rajin! Terus lakukan kebiasaan baik.',
        icon: '2',
        bintangMin: 11,
        bintangMax: 20
      },
      3: {
        nama: 'Pohon Kebaikan',
        deskripsi: 'Keren! Kebiasaan baikmu semakin kuat.',
        icon: '3',
        bintangMin: 21,
        bintangMax: 30
      },
      4: {
        nama: 'Bintang Kebaikan',
        deskripsi: 'Hebat! Kebaikanmu semakin bersinar.',
        icon: '3',
        bintangMin: 31,
        bintangMax: 40
      },
      5: {
        nama: 'Teladan Kebaikan',
        deskripsi: 'Luar biasa! Kamu jadi inspirasi dalam kebaikan.',
        icon: '4',
        bintangMin: 41,
        bintangMax: 50
      },
    };

    // --- Ambil Parameter ID dari URL ---
    const urlParams = new URLSearchParams(window.location.search);
    const lencanaId = urlParams.get('id') || 1;

    // --- Inisialisasi Data ke Form Saat Halaman Dimuat ---
    window.addEventListener('DOMContentLoaded', () => {
      const lencanaData = dataLencanaDatabase[lencanaId] || dataLencanaDatabase[1];

      document.getElementById('namaLencanaInput').value = lencanaData.nama;
      document.getElementById('deskripsiLencanaInput').value = lencanaData.deskripsi;
      document.getElementById('bintangMinInput').value = lencanaData.bintangMin;
      document.getElementById('bintangMaxInput').value = lencanaData.bintangMax;

      const radioIcon = document.querySelector(`input[name="icon_lencana"][value="${lencanaData.icon}"]`);
      if (radioIcon) {
        radioIcon.checked = true;
      }
    });

    // --- Script Modal Simpan Lencana ---
    function openSaveModal() {
      const form = document.getElementById('editLencanaForm');
      if(!form.checkValidity()) {
        form.reportValidity();
        return;
      }

      const modal = document.getElementById('saveLencanaModal');
      const backdrop = document.getElementById('saveLencanaBackdrop');
      const content = document.getElementById('saveLencanaContent');
      
      modal.classList.remove('hidden');
      setTimeout(() => {
        backdrop.classList.remove('opacity-0');
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
      }, 10);
    }

    function closeSaveModal() {
      const modal = document.getElementById('saveLencanaModal');
      const backdrop = document.getElementById('saveLencanaBackdrop');
      const content = document.getElementById('saveLencanaContent');
      
      backdrop.classList.add('opacity-0');
      content.classList.remove('scale-100', 'opacity-100');
      content.classList.add('scale-95', 'opacity-0');
      
      setTimeout(() => {
        modal.classList.add('hidden');
      }, 300);
    }

    function confirmSave() {
      window.location.href = "{{ url('/admin/lencana-management') }}";
    }
  </script>

</body>
</html>