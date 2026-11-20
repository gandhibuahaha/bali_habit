<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management - Orang Tua - BaliHabit</title>
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
        <!-- MENU BERANDA (TIDAK AKTIF) -->
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
        <div class="hidden sm:flex items-center text-[13px] font-bold text-slate-400">
          <span>Portal Admin</span>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 mx-2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5 L15.75 12 L8.25 19.5" />
          </svg>
          <span class="text-[#10B981]">User Management</span>
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
            <div class="w-8 h-8 rounded-full bg-emerald-100 text-[#10B981] font-bold flex items-center justify-center text-[12px]">PG</div>
            <span class="text-[13px] font-bold text-[#1E293B] hidden sm:block">Ni Putu Gayatri</span>
            <svg id="profileChevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 text-slate-400 hidden sm:block transition-transform duration-200">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25 L12 15.75 L4.5 8.25" />
            </svg>
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

    <!-- KONTEN USER MANAGEMENT -->
    <div class="p-8 mb-10 flex-1">
      <div class="max-w-[1400px] mx-auto flex flex-col gap-6">
        
        <!-- Judul Halaman -->
        <div>
          <h1 class="text-[28px] font-extrabold text-[#0F172A] tracking-tight mb-1">User Management</h1>
          <p class="text-slate-500 text-[13.5px]">Kelola data orang tua dan anak di BaliHabit.</p>
        </div>

        <!-- Tombol Tab (Orang Tua / Anak / Aktivitas Pengguna) -->
        <div class="inline-flex flex-wrap bg-slate-100 p-1.5 rounded-[16px] w-fit gap-1 mt-2">
          <!-- Tab Aktif (Orang Tua) -->
          <a href="{{ url('/admin/user-management') }}" class="px-5 py-2.5 rounded-[12px] text-[13px] font-bold text-[#10B981] bg-white shadow-[0_2px_8px_rgba(0,0,0,0.05)] transition flex items-center gap-2">
            Orang Tua 
            <span class="px-2 py-0.5 rounded-md bg-emerald-50 text-[#10B981] text-[10px] font-extrabold">24</span>
          </a>
          <!-- Tab Tidak Aktif (Anak) -->
          <a href="{{ url('/admin/user-management-anak') }}" class="px-5 py-2.5 rounded-[12px] text-[13px] font-bold text-slate-500 hover:text-slate-700 transition flex items-center gap-2">
            Anak
            <span class="px-2 py-0.5 rounded-md bg-slate-200 text-slate-500 text-[10px] font-extrabold">36</span>
          </a>
          <!-- Tab Baru: Aktivitas Pengguna -->
          <a href="{{ url('/admin/aktivitas-pengguna') }}" class="px-5 py-2.5 rounded-[12px] text-[13px] font-bold text-slate-500 hover:text-slate-700 transition flex items-center gap-2">
            Aktivitas Pengguna
          </a>
        </div>

        <!-- Kartu Tabel Daftar Orang Tua -->
        <div id="smoothTabContent" class="animate-tab-enter bg-white border border-slate-100 rounded-[24px] shadow-sm p-7 flex flex-col gap-6">
          
          <!-- Header Tabel: Keterangan, Search Bar & Filter -->
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
              <h2 class="text-[17px] font-extrabold text-[#0F172A]">Daftar Orang Tua</h2>
              <p class="text-[12.5px] font-medium text-slate-400 mt-0.5">Berikut adalah daftar orang tua yang terdaftar di BaliHabit.</p>
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
                  placeholder="Cari nama atau email..." 
                  class="w-full bg-slate-50 border border-slate-200 rounded-[12px] pl-10 pr-4 py-2.5 text-[13px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] focus:bg-white transition"
                >
              </div>

              <!-- Filter Dropdown -->
              <div class="relative w-full sm:w-auto">
                <select id="filterSelect" class="w-full sm:w-auto appearance-none bg-white border border-slate-200 rounded-[12px] pl-4 pr-10 py-2.5 text-[13px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] transition cursor-pointer hover:bg-slate-50">
                  <option value="default">Urutkan: Default</option>
                  <option value="nama_az">Nama (A-Z)</option>
                  <option value="nama_za">Nama (Z-A)</option>
                  <option value="anak_desc">Jumlah Anak (Terbanyak)</option>
                  <option value="anak_asc">Jumlah Anak (Sedikit)</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25 L12 15.75 L4.5 8.25" />
                  </svg>
                </div>
              </div>
            </div>
          </div>

          <!-- Tabel Data -->
          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
              <thead>
                <tr class="border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-[0.05em]">
                  <th class="py-4 px-4 w-16">No</th>
                  <th class="py-4 px-4">Nama</th>
                  <th class="py-4 px-4">Email</th>
                  <th class="py-4 px-4">Jumlah Anak</th>
                  <th class="py-4 px-4 text-right w-32">Aksi</th>
                </tr>
              </thead>
              <tbody id="tableBody" class="divide-y divide-slate-50 text-[13.5px] font-medium text-[#0F172A]">
                <!-- Konten dirender oleh JavaScript -->
              </tbody>
            </table>
          </div>

          <!-- Footer Tabel: Informasi Data & Paginasi -->
          <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-5 border-t border-slate-100 mt-2">
            <span id="paginationInfo" class="text-[12px] font-medium text-slate-400">
              Menampilkan <span class="font-extrabold text-[#0F172A]">1 – 5</span> dari <span class="font-extrabold text-[#0F172A]">24</span> data
            </span>
            <div id="paginationControls" class="flex items-center gap-1.5">
               <!-- Kontrol paginasi dirender oleh JavaScript -->
            </div>
          </div>

        </div>

      </div>
    </div>
  </main>

  <!-- ================= POPUP MODAL DETAIL ORANG TUA ================= -->
  <div id="detailOrtuModal" class="fixed inset-0 z-[70] hidden">
    <!-- Backdrop -->
    <div id="detailOrtuBackdrop" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <div class="fixed inset-0 z-10 flex items-center justify-center p-4 sm:p-0">
      
      <!-- Modal Box -->
      <div id="detailOrtuContent" class="relative bg-white rounded-[24px] shadow-xl w-full max-w-2xl transform scale-95 opacity-0 transition-all duration-300 flex flex-col max-h-[90vh] overflow-hidden">
        
        <!-- Modal Header -->
        <div class="px-7 py-6 border-b border-slate-100 flex items-center justify-between bg-white z-20 flex-shrink-0">
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-emerald-50 text-[#10B981] flex items-center justify-center flex-shrink-0 border border-emerald-100">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
              </svg>
            </div>
            <div>
              <div class="flex items-center gap-2 mb-1">
                <h3 class="text-[19px] font-extrabold text-[#0F172A] tracking-tight">Detail Orang Tua</h3>
                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 border border-emerald-100 text-[#10B981] text-[11px] font-bold">
                  <div class="w-1.5 h-1.5 rounded-full bg-[#10B981]"></div> Terdaftar
                </span>
              </div>
              <p class="text-[12.5px] text-slate-500 font-medium">Informasi profil lengkap dan data anak yang ditautkan.</p>
            </div>
          </div>
          <button type="button" onclick="closeDetailOrtuModal()" class="w-8 h-8 flex items-center justify-center rounded-full text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Modal Body Wrapper -->
        <div class="flex-1 overflow-y-auto min-h-0 bg-white">
          <div class="p-7 flex flex-col gap-6">
            
            <!-- Card Identitas Profil -->
            <div class="border border-slate-100 rounded-[16px] p-5 flex flex-col sm:flex-row items-center sm:items-start justify-between gap-4 shadow-sm relative overflow-hidden bg-white">
              <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-50/50 rounded-full blur-3xl -mr-10 -mt-10 pointer-events-none"></div>

              <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 z-10 w-full">
                <!-- Avatar -->
                <div id="modalOrtuInisial" class="w-14 h-14 rounded-full bg-emerald-50 text-[#10B981] text-[16px] font-extrabold flex items-center justify-center border border-emerald-100 flex-shrink-0">
                  PD
                </div>
                <!-- Info Utama -->
                <div class="flex flex-col items-center sm:items-start text-center sm:text-left">
                  <div class="flex items-center gap-2 mb-1.5">
                    <h4 id="modalOrtuNama" class="text-[17px] font-extrabold text-[#0F172A]">Putri Dewi</h4>
                    <span class="inline-flex items-center gap-1 text-[#10B981] text-[11px] font-bold">
                      <div class="w-1.5 h-1.5 rounded-full bg-[#10B981]"></div> Aktif
                    </span>
                  </div>
                  <div class="text-[13px] font-medium text-slate-500 flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                    <span id="modalOrtuEmail">putri.dewi@mail.com</span>
                    <span class="hidden sm:inline text-slate-300">•</span>
                    <span>+62 812 3456 7890</span>
                  </div>
                </div>
              </div>

              <!-- Total Anak -->
              <div class="bg-slate-50 border border-slate-100 rounded-[12px] px-4 py-2.5 flex items-center gap-3 flex-shrink-0 mt-2 sm:mt-0 z-10 w-full sm:w-auto justify-center sm:justify-start">
                <div class="w-9 h-9 rounded-full bg-white border border-slate-100 flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-slate-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                  </svg>
                </div>
                <div class="flex flex-col">
                  <span class="text-[10px] font-extrabold text-slate-500 uppercase tracking-wider mb-0.5">Total Data</span>
                  <span id="modalOrtuJumlahAnakText" class="text-[15px] font-extrabold text-[#0F172A] leading-none">2 Anak</span>
                </div>
              </div>
            </div>

            <!-- Section: Informasi Pendaftaran -->
            <div class="flex flex-col gap-3">
              <h5 class="text-[11px] font-extrabold text-slate-400 uppercase tracking-[0.05em]">Informasi Akun</h5>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="border border-slate-100 rounded-[12px] p-4 flex flex-col gap-1.5 shadow-sm">
                  <div class="flex items-center gap-2 text-slate-400 mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                    </svg>
                    <span class="text-[12px] font-bold">Terdaftar Sejak</span>
                  </div>
                  <span class="text-[14px] font-extrabold text-[#0F172A]">14 Januari 2026</span>
                </div>
                <div class="border border-slate-100 rounded-[12px] p-4 flex flex-col gap-1.5 shadow-sm">
                  <div class="flex items-center gap-2 text-slate-400 mb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-[12px] font-bold">Status Akun</span>
                  </div>
                  <span class="inline-flex items-center gap-1.5 text-[#10B981] font-extrabold text-[13px]">
                    <div class="w-1.5 h-1.5 rounded-full bg-[#10B981]"></div> Terverifikasi OTP
                  </span>
                </div>
              </div>
            </div>

            <!-- Section: Daftar Anak -->
            <div class="flex flex-col gap-3">
              <h5 class="text-[11px] font-extrabold text-slate-400 uppercase tracking-[0.05em]">Anak Yang Ditautkan (<span id="modalAnakCountTitle">2</span>)</h5>
              <div id="modalAnakContainer" class="flex flex-col gap-3">
                <!-- Konten Anak Dirender Dinamis Oleh JS -->
              </div>
            </div>
            
          </div>
        </div>

        <div class="px-7 py-5 bg-slate-50 border-t border-slate-100 flex items-center justify-between flex-shrink-0">
          <span class="text-[12px] font-medium text-slate-400">Terakhir aktif: Hari ini, 09:12 WITA</span>
          <button type="button" onclick="closeDetailOrtuModal()" class="px-5 py-2.5 rounded-[12px] bg-white border border-slate-200 text-slate-600 hover:border-[#10B981] hover:text-[#10B981] font-bold text-[13px] shadow-sm transition">
            Tutup
          </button>
        </div>

      </div>
    </div>
  </div>
  <!-- ================= AKHIR POPUP ================= -->

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

    // --- SCRIPT MODAL DETAIL ORANG TUA (DINAMIS) ---
    function openDetailOrtuModal(ortuId) {
      if(ortuId) {
        const ortu = dataOrtu.find(o => o.id === ortuId);
        
        if(ortu) {
          document.getElementById('modalOrtuInisial').innerText = ortu.inisial;
          document.getElementById('modalOrtuNama').innerText = ortu.nama;
          document.getElementById('modalOrtuEmail').innerText = ortu.email;
          document.getElementById('modalOrtuJumlahAnakText').innerText = ortu.jumlahAnak + ' Anak';
          document.getElementById('modalAnakCountTitle').innerText = ortu.jumlahAnak;

          document.getElementById('modalAnakContainer').innerHTML = generateDummyChildrenHTML(ortu.jumlahAnak);
        }
      }

      const modal = document.getElementById('detailOrtuModal');
      const backdrop = document.getElementById('detailOrtuBackdrop');
      const content = document.getElementById('detailOrtuContent');
      
      modal.classList.remove('hidden');
      setTimeout(() => {
        backdrop.classList.remove('opacity-0');
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
      }, 10);
    }

    // Fungsi Untuk Membuat Dummy Kartu Anak berdasarkan Jumlah
    function generateDummyChildrenHTML(count) {
      const names = ['Ayu', 'Made', 'Budi', 'Sita', 'Agus', 'Dina', 'Putra', 'Sari'];
      const genders = ['Perempuan', 'Laki-laki'];
      let htmlContent = '';

      for(let i=0; i<count; i++) {
        let name = names[Math.floor(Math.random() * names.length)];
        let initial = name.substring(0,2).toUpperCase();
        let gender = genders[Math.floor(Math.random() * genders.length)];
        let age = Math.floor(Math.random() * 7) + 5;
        let stars = Math.floor(Math.random() * 40) + 5;

        htmlContent += `
          <div class="border border-slate-100 rounded-[12px] p-4 shadow-sm flex items-center justify-between hover:border-[#10B981] transition group">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 rounded-full bg-emerald-50 text-[#10B981] flex items-center justify-center border border-emerald-100 text-[12px] font-extrabold flex-shrink-0">${initial}</div>
              <div class="flex flex-col gap-0.5">
                <span class="text-[14px] font-extrabold text-[#0F172A]">${name}</span>
                <span class="text-[12px] font-medium text-slate-500">${gender} • ${age} Tahun</span>
              </div>
            </div>
            <span class="inline-flex items-center gap-1 bg-amber-50 text-amber-600 px-2 py-1 rounded-[8px] text-[11px] font-extrabold border border-amber-100/50">
              <svg class="w-3 h-3 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              ${stars} Bintang
            </span>
          </div>
        `;
      }
      return htmlContent;
    }

    function closeDetailOrtuModal() {
      const modal = document.getElementById('detailOrtuModal');
      const backdrop = document.getElementById('detailOrtuBackdrop');
      const content = document.getElementById('detailOrtuContent');
      
      backdrop.classList.add('opacity-0');
      content.classList.remove('scale-100', 'opacity-100');
      content.classList.add('scale-95', 'opacity-0');
      
      setTimeout(() => {
        modal.classList.add('hidden');
      }, 300);
    }

    document.getElementById('detailOrtuBackdrop').addEventListener('click', closeDetailOrtuModal);

    // =========================================================
    // --- SCRIPT PAGINASI, SEARCH & DATA DUMMY ORANG TUA ---
    // =========================================================
    
    const dataOrtu = [
      { id: 1, inisial: 'PD', nama: 'Putri Dewi', email: 'putri.dewi@mail.com', jumlahAnak: 2 },
      { id: 2, inisial: 'IS', nama: 'I Made Surya', email: 'made.surya@mail.com', jumlahAnak: 1 },
      { id: 3, inisial: 'KA', nama: 'Komang Ayu', email: 'komang.ayu@mail.com', jumlahAnak: 3 },
      { id: 4, inisial: 'NS', nama: 'Ni Luh Sari', email: 'sari@mail.com', jumlahAnak: 1 },
      { id: 5, inisial: 'KA', nama: 'Ketut Adi', email: 'ketut.adi@mail.com', jumlahAnak: 2 }
    ];

    const baseNames = ['Wayan', 'Putu', 'Made', 'Kadek', 'Nyoman', 'Komang', 'Ketut', 'Ngurah', 'Gede', 'Agus', 'Dian'];
    for(let i = 6; i <= 24; i++) {
      let randomName = baseNames[i % baseNames.length] + ' ' + (i > 10 ? 'S.' : 'P.');
      dataOrtu.push({
        id: i,
        inisial: randomName.substring(0, 2).toUpperCase(),
        nama: randomName,
        email: randomName.toLowerCase().replace(' ', '.') + '@mail.com',
        jumlahAnak: Math.floor(Math.random() * 3) + 1
      });
    }

    let filteredDataOrtu = [...dataOrtu];
    const itemsPerPage = 5;
    let currentPage = 1;
    let totalPages = Math.ceil(filteredDataOrtu.length / itemsPerPage);

    const tableBody = document.getElementById('tableBody');
    const paginationInfo = document.getElementById('paginationInfo');
    const paginationControls = document.getElementById('paginationControls');
    const searchInput = document.getElementById('searchInput');
    const filterSelect = document.getElementById('filterSelect');

    function getBadgeHTML(jumlah) {
      if (jumlah > 1) {
        return `<span class="inline-flex items-center justify-center px-2.5 py-1 rounded-[8px] bg-emerald-50 text-[#10B981] border border-emerald-100/50 text-[12px] font-extrabold">${jumlah} Anak</span>`;
      } else {
        return `<span class="inline-flex items-center justify-center px-2.5 py-1 rounded-[8px] bg-slate-50 text-slate-600 border border-slate-200 text-[12px] font-extrabold">${jumlah} Anak</span>`;
      }
    }

    function renderTable(page) {
      tableBody.innerHTML = '';
      const start = (page - 1) * itemsPerPage;
      const end = start + itemsPerPage;
      const paginatedItems = filteredDataOrtu.slice(start, end);

      if (paginatedItems.length === 0) {
        tableBody.innerHTML = `
          <tr>
            <td colspan="5" class="py-8 text-center text-slate-400 font-medium text-[13px]">
              Data tidak ditemukan.
            </td>
          </tr>
        `;
        paginationInfo.innerHTML = `Menampilkan <span class="font-extrabold text-[#0F172A]">0</span> data`;
        return;
      }

      paginatedItems.forEach((ortu, index) => {
        const tr = document.createElement('tr');
        tr.className = 'hover:bg-slate-50/50 transition';
        tr.innerHTML = `
          <td class="py-4 px-4 text-slate-400 font-bold text-[12px]">${start + index + 1}</td>
          <td class="py-4 px-4">
            <div class="flex items-center gap-3">
              <div class="w-[34px] h-[34px] rounded-full bg-emerald-50 text-[#10B981] flex items-center justify-center border border-emerald-100 text-[12px] font-extrabold flex-shrink-0">
                ${ortu.inisial}
              </div>
              <span class="font-extrabold text-[#0F172A]">${ortu.nama}</span>
            </div>
          </td>
          <td class="py-4 px-4 text-slate-500">${ortu.email}</td>
          <td class="py-4 px-4">
            ${getBadgeHTML(ortu.jumlahAnak)}
          </td>
          <td class="py-4 px-4 text-right">
            <button type="button" onclick="openDetailOrtuModal(${ortu.id})" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-[10px] border border-slate-200 hover:border-[#10B981] hover:text-[#10B981] text-slate-500 text-[12px] font-bold transition shadow-sm bg-white">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              Lihat
            </button>
          </td>
        `;
        tableBody.appendChild(tr);
      });

      const currentEnd = end > filteredDataOrtu.length ? filteredDataOrtu.length : end;
      paginationInfo.innerHTML = `Menampilkan <span class="font-extrabold text-[#0F172A]">${start + 1} – ${currentEnd}</span> dari <span class="font-extrabold text-[#0F172A]">${filteredDataOrtu.length}</span> data`;
    }

    function renderPagination(page) {
      paginationControls.innerHTML = '';
      
      totalPages = Math.ceil(filteredDataOrtu.length / itemsPerPage);
      if(totalPages === 0) totalPages = 1;

      const prevBtn = document.createElement('button');
      prevBtn.onclick = () => { if(currentPage > 1) changePage(currentPage - 1); };
      prevBtn.className = `w-8 h-8 rounded-lg border flex items-center justify-center transition ${page === 1 ? 'border-slate-100 text-slate-300 cursor-not-allowed' : 'border-slate-200 text-slate-500 hover:bg-slate-50'}`;
      prevBtn.disabled = page === 1;
      prevBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 L8.25 12 L15.75 4.5" /></svg>`;
      paginationControls.appendChild(prevBtn);

      let startPage = Math.max(1, page - 2);
      let endPage = Math.min(totalPages, page + 2);
      
      if(endPage - startPage < 4) {
        if(startPage === 1) endPage = Math.min(totalPages, 5);
        else if(endPage === totalPages) startPage = Math.max(1, totalPages - 4);
      }

      for (let i = startPage; i <= endPage; i++) {
        const btn = document.createElement('button');
        btn.onclick = () => changePage(i);
        if (i === page) {
          btn.className = 'w-8 h-8 rounded-lg bg-[#10B981] text-white text-[12px] font-extrabold flex items-center justify-center shadow-sm';
        } else {
          btn.className = 'w-8 h-8 rounded-lg border border-slate-200 text-slate-500 hover:bg-slate-50 text-[12px] font-extrabold flex items-center justify-center transition';
        }
        btn.innerText = i;
        paginationControls.appendChild(btn);
      }

      const nextBtn = document.createElement('button');
      nextBtn.onclick = () => { if(currentPage < totalPages) changePage(currentPage + 1); };
      nextBtn.className = `w-8 h-8 rounded-lg border flex items-center justify-center transition ${page === totalPages || filteredDataOrtu.length === 0 ? 'border-slate-100 text-slate-300 cursor-not-allowed' : 'border-slate-200 text-slate-500 hover:bg-slate-50'}`;
      nextBtn.disabled = page === totalPages || filteredDataOrtu.length === 0;
      nextBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5 L15.75 12 L8.25 19.5" /></svg>`;
      paginationControls.appendChild(nextBtn);
    }

    function changePage(page) {
      currentPage = page;
      renderTable(currentPage);
      renderPagination(currentPage);
    }
    
    function applySearchAndFilter() {
      const query = searchInput.value.toLowerCase().trim();
      const filterValue = filterSelect.value;
      
      filteredDataOrtu = dataOrtu.filter(ortu => 
        ortu.nama.toLowerCase().includes(query) || 
        ortu.email.toLowerCase().includes(query)
      );

      if (filterValue === 'nama_az') {
        filteredDataOrtu.sort((a, b) => a.nama.localeCompare(b.nama));
      } else if (filterValue === 'nama_za') {
        filteredDataOrtu.sort((a, b) => b.nama.localeCompare(a.nama));
      } else if (filterValue === 'anak_desc') {
        filteredDataOrtu.sort((a, b) => b.jumlahAnak - a.jumlahAnak);
      } else if (filterValue === 'anak_asc') {
        filteredDataOrtu.sort((a, b) => a.jumlahAnak - b.jumlahAnak);
      } else {
        filteredDataOrtu.sort((a, b) => a.id - b.id);
      }
      
      changePage(1);
    }

    searchInput.addEventListener('input', applySearchAndFilter);
    filterSelect.addEventListener('change', applySearchAndFilter);

    changePage(1);
  </script>

</body>
</html>