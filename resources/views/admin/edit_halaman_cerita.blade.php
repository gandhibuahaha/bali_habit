<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Halaman Cerita - BaliHabit</title>
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
        <!-- Breadcrumb sesuai desain -->
        <div class="hidden sm:flex items-center text-[13px] font-bold text-slate-400">
          <a href="{{ route('admin.dashboard') }}" class="hover:text-[#10B981] transition">Portal Admin</a>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 mx-2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5 L15.75 12 L8.25 19.5" />
          </svg>
          <a href="{{ url('/admin/story-management') }}" class="hover:text-[#10B981] transition">Story Management</a>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 mx-2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5 L15.75 12 L8.25 19.5" />
          </svg>
          <span class="text-[#10B981]">Edit Halaman</span>
        </div>
      </div>

      <div class="flex items-center gap-6">
        <button class="relative text-slate-400 hover:text-slate-600 transition">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" /></svg>
          <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 border-2 border-white rounded-full"></span>
        </button>
        
        <!-- Garis Pemisah Header -->
        <div class="h-6 w-px bg-slate-200"></div>

        <!-- Profil Dropdown Container -->
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

    <!-- KONTEN UTAMA: EDIT HALAMAN CERITA -->
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
          <h1 class="text-[26px] font-extrabold text-[#0F172A] tracking-tight mb-1">Edit Halaman Cerita</h1>
          <p class="text-slate-500 text-[13.5px]">Ubah konten pada halaman ini sesuai kebutuhan.</p>
        </div>

        <!-- Form Container -->
        <div class="bg-white border border-slate-100 rounded-[24px] shadow-sm p-8 mt-6 flex flex-col gap-8">
          
          <!-- Urutan Halaman -->
          <div>
            <label class="block text-[13.5px] font-bold text-[#0F172A] mb-2">
              Urutan Halaman <span class="text-red-500">*</span>
            </label>
            <input type="text" value="3" class="w-full bg-white border border-slate-200 rounded-[12px] px-4 py-3 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] transition" required>
            <p class="text-[12px] font-medium text-slate-400 mt-2">
              Masukkan nomor halaman sesuai dengan alur cerita. (Contoh: 1, 2, 3, 4, ...)
            </p>
          </div>

          <!-- Ilustrasi Halaman (Preview & Upload Box) -->
          <div>
            <label class="block text-[13.5px] font-bold text-[#0F172A] mb-2">
              Ilustrasi Halaman <span class="text-red-500">*</span>
            </label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
              <!-- Preview Image -->
              <div class="bg-slate-50 border border-slate-200 rounded-[16px] h-[220px] flex items-center justify-center relative overflow-hidden group">
                <span class="text-slate-400 text-[13.5px] font-medium" id="previewText">Pratinjau Ilustrasi Cerita Halaman 3</span>
                <img id="imagePreview" src="#" alt="Preview" class="absolute inset-0 w-full h-full object-cover hidden">
                
                <button type="button" onclick="openDeleteImageModal()" class="absolute bottom-3 right-3 w-8 h-8 bg-white border border-slate-200 rounded-[8px] flex items-center justify-center text-slate-400 hover:text-red-500 hover:border-red-200 shadow-sm transition z-10">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>
                </button>
              </div>

              <!-- Upload Gambar -->
              <div id="imageUploadArea" class="border-2 border-dashed border-[#10B981]/40 hover:border-[#10B981] bg-emerald-50/20 rounded-[16px] transition-colors flex flex-col items-center justify-center text-center h-[220px] cursor-pointer group">
                <div class="w-12 h-12 bg-emerald-50 border border-emerald-100 rounded-[10px] flex items-center justify-center text-[#10B981] mb-3 shadow-sm group-hover:scale-105 transition">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                  </svg>
                </div>
                <h4 id="imageUploadText" class="text-[13.5px] font-bold text-[#0F172A] mb-1">Klik untuk mengganti gambar</h4>
                <p class="text-[11.5px] font-medium text-slate-400 mb-4">Format: JPG, PNG (Maks. 2 MB)</p>
                <button type="button" class="px-5 py-2 bg-white border border-slate-200 hover:border-[#10B981] rounded-[8px] text-slate-600 text-[12px] font-bold transition shadow-sm pointer-events-none">
                  Pilih Gambar
                </button>

                <!-- Input file tersembunyi -->
                <input type="file" id="imageFileInput" class="hidden" accept="image/png, image/jpeg, image/jpg">
              </div>
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
                <textarea id="teksBali" maxlength="500" rows="4" class="w-full bg-white border border-slate-200 rounded-[12px] px-4 py-3 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] transition resize-none" required>Kancil ngajak buaya melali ngantos ka tengah kali.</textarea>
                <div class="flex justify-end mt-1">
                  <span id="countBali" class="text-[11.5px] font-bold text-slate-400">49/500</span>
                </div>
              </div>
              
              <!-- Audio Bali Player -->
              <div>
                <label class="block text-[12.5px] font-bold text-[#0F172A] mb-2">
                  Audio Bahasa Bali <span class="text-red-500">*</span>
                </label>
                <div class="border border-slate-200 bg-white rounded-[12px] p-4 h-[106px] flex flex-col justify-between">
                  <!-- Player Controls -->
                  <div class="flex items-center gap-3">
                    <button id="btnPlayBali" type="button" class="w-9 h-9 bg-[#10B981] rounded-full text-white flex items-center justify-center flex-shrink-0 hover:bg-[#059669] transition">
                      <!-- Icon Play -->
                      <svg id="iconPlayBali" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 ml-0.5">
                        <path fill-rule="evenodd" d="M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z" clip-rule="evenodd" />
                      </svg>
                      <!-- Icon Pause -->
                      <svg id="iconPauseBali" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 hidden">
                        <path fill-rule="evenodd" d="M6.75 5.25a.75.75 0 01.75-.75H9a.75.75 0 01.75.75v13.5a.75.75 0 01-.75.75H7.5a.75.75 0 01-.75-.75V5.25zm7.5 0a.75.75 0 01.75-.75h1.5a.75.75 0 01.75.75v13.5a.75.75 0 01-.75.75h-1.5a.75.75 0 01-.75-.75V5.25z" clip-rule="evenodd" />
                      </svg>
                    </button>
                    <!-- Progress Bar Slider -->
                    <div class="flex-1 relative flex items-center h-4 group">
                      <div class="absolute w-full h-1.5 bg-slate-100 rounded-full pointer-events-none"></div>
                      <div id="progressBarBali" class="absolute h-1.5 bg-[#10B981] rounded-full pointer-events-none" style="width: 0%;"></div>
                      <input type="range" id="seekSliderBali" value="0" step="0.1" class="absolute w-full h-full opacity-0 cursor-pointer">
                    </div>
                    <span id="timeDisplayBali" class="text-[10px] font-extrabold text-slate-500 whitespace-nowrap">00:00 / 00:00</span>
                    
                    <button type="button" class="text-slate-400 hover:text-slate-600 transition ml-1">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" /></svg>
                    </button>
                    <button type="button" class="text-slate-400 hover:text-red-500 transition">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
                    </button>
                  </div>
                  <!-- Action Button & Format -->
                  <div class="flex items-center justify-between mt-auto pt-2">
                    <button type="button" onclick="document.getElementById('audioBaliInput').click()" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-[8px] text-[11px] font-bold text-slate-600 hover:bg-slate-50 transition shadow-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" /></svg>
                      <span id="audioBaliName">Ganti Audio</span>
                    </button>
                    <!-- Audio Elements Input -->
                    <input type="file" id="audioBaliInput" class="hidden" accept=".mp3, .wav">
                    <audio id="audioElementBali" class="hidden"></audio>
                    <span class="text-[10.5px] font-medium text-slate-400">Format: MP3, WAV (Maks. 5 MB)</span>
                  </div>
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
                <textarea id="teksIndo" maxlength="500" rows="4" class="w-full bg-white border border-slate-200 rounded-[12px] px-4 py-3 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] transition resize-none" required>Kancil mengajak buaya berjalan hingga ke tengah sungai.</textarea>
                <div class="flex justify-end mt-1">
                  <span id="countIndo" class="text-[11.5px] font-bold text-slate-400">52/500</span>
                </div>
              </div>
              
              <!-- Audio Indo Player -->
              <div>
                <label class="block text-[12.5px] font-bold text-[#0F172A] mb-2">
                  Audio Bahasa Indonesia <span class="text-red-500">*</span>
                </label>
                <div class="border border-slate-200 bg-white rounded-[12px] p-4 h-[106px] flex flex-col justify-between">
                  <div class="flex items-center gap-3">
                    <button id="btnPlayIndo" type="button" class="w-9 h-9 bg-[#10B981] rounded-full text-white flex items-center justify-center flex-shrink-0 hover:bg-[#059669] transition">
                      <!-- Icon Play -->
                      <svg id="iconPlayIndo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 ml-0.5">
                        <path fill-rule="evenodd" d="M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z" clip-rule="evenodd" />
                      </svg>
                      <!-- Icon Pause -->
                      <svg id="iconPauseIndo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 hidden">
                        <path fill-rule="evenodd" d="M6.75 5.25a.75.75 0 01.75-.75H9a.75.75 0 01.75.75v13.5a.75.75 0 01-.75.75H7.5a.75.75 0 01-.75-.75V5.25zm7.5 0a.75.75 0 01.75-.75h1.5a.75.75 0 01.75.75v13.5a.75.75 0 01-.75.75h-1.5a.75.75 0 01-.75-.75V5.25z" clip-rule="evenodd" />
                      </svg>
                    </button>
                    <!-- Progress Bar Slider -->
                    <div class="flex-1 relative flex items-center h-4 group">
                      <div class="absolute w-full h-1.5 bg-slate-100 rounded-full pointer-events-none"></div>
                      <div id="progressBarIndo" class="absolute h-1.5 bg-[#10B981] rounded-full pointer-events-none" style="width: 0%;"></div>
                      <input type="range" id="seekSliderIndo" value="0" step="0.1" class="absolute w-full h-full opacity-0 cursor-pointer">
                    </div>
                    <span id="timeDisplayIndo" class="text-[10px] font-extrabold text-slate-500 whitespace-nowrap">00:00 / 00:00</span>
                    
                    <button type="button" class="text-slate-400 hover:text-slate-600 transition ml-1">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" /></svg>
                    </button>
                    <button type="button" class="text-slate-400 hover:text-red-500 transition">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
                    </button>
                  </div>
                  <div class="flex items-center justify-between mt-auto pt-2">
                    <button type="button" onclick="document.getElementById('audioIndoInput').click()" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-[8px] text-[11px] font-bold text-slate-600 hover:bg-slate-50 transition shadow-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" /></svg>
                      <span id="audioIndoName">Ganti Audio</span>
                    </button>
                    <!-- Audio Elements Input -->
                    <input type="file" id="audioIndoInput" class="hidden" accept=".mp3, .wav">
                    <audio id="audioElementIndo" class="hidden"></audio>
                    <span class="text-[10.5px] font-medium text-slate-400">Format: MP3, WAV (Maks. 5 MB)</span>
                  </div>
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
                <textarea id="teksEng" maxlength="500" rows="4" class="w-full bg-white border border-slate-200 rounded-[12px] px-4 py-3 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] transition resize-none" required>The deer invited the crocodile to walk to the middle of the river.</textarea>
                <div class="flex justify-end mt-1">
                  <span id="countEng" class="text-[11.5px] font-bold text-slate-400">66/500</span>
                </div>
              </div>
              
              <!-- Audio English Player -->
              <div>
                <label class="block text-[12.5px] font-bold text-[#0F172A] mb-2">
                  English Audio <span class="text-red-500">*</span>
                </label>
                <div class="border border-slate-200 bg-white rounded-[12px] p-4 h-[106px] flex flex-col justify-between">
                  <div class="flex items-center gap-3">
                    <button id="btnPlayEng" type="button" class="w-9 h-9 bg-[#10B981] rounded-full text-white flex items-center justify-center flex-shrink-0 hover:bg-[#059669] transition">
                      <!-- Icon Play -->
                      <svg id="iconPlayEng" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 ml-0.5">
                        <path fill-rule="evenodd" d="M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z" clip-rule="evenodd" />
                      </svg>
                      <!-- Icon Pause -->
                      <svg id="iconPauseEng" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 hidden">
                        <path fill-rule="evenodd" d="M6.75 5.25a.75.75 0 01.75-.75H9a.75.75 0 01.75.75v13.5a.75.75 0 01-.75.75H7.5a.75.75 0 01-.75-.75V5.25zm7.5 0a.75.75 0 01.75-.75h1.5a.75.75 0 01.75.75v13.5a.75.75 0 01-.75.75h-1.5a.75.75 0 01-.75-.75V5.25z" clip-rule="evenodd" />
                      </svg>
                    </button>
                    <!-- Progress Bar Slider -->
                    <div class="flex-1 relative flex items-center h-4 group">
                      <div class="absolute w-full h-1.5 bg-slate-100 rounded-full pointer-events-none"></div>
                      <div id="progressBarEng" class="absolute h-1.5 bg-[#10B981] rounded-full pointer-events-none" style="width: 0%;"></div>
                      <input type="range" id="seekSliderEng" value="0" step="0.1" class="absolute w-full h-full opacity-0 cursor-pointer">
                    </div>
                    <span id="timeDisplayEng" class="text-[10px] font-extrabold text-slate-500 whitespace-nowrap">00:00 / 00:00</span>
                    
                    <button type="button" class="text-slate-400 hover:text-slate-600 transition ml-1">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" /></svg>
                    </button>
                    <button type="button" class="text-slate-400 hover:text-red-500 transition">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
                    </button>
                  </div>
                  <div class="flex items-center justify-between mt-auto pt-2">
                    <button type="button" onclick="document.getElementById('audioEngInput').click()" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 rounded-[8px] text-[11px] font-bold text-slate-600 hover:bg-slate-50 transition shadow-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" /></svg>
                      <span id="audioEngName">Ganti Audio</span>
                    </button>
                    <!-- Audio Elements Input -->
                    <input type="file" id="audioEngInput" class="hidden" accept=".mp3, .wav">
                    <audio id="audioElementEng" class="hidden"></audio>
                    <span class="text-[10.5px] font-medium text-slate-400">Format: MP3, WAV (Maks. 5 MB)</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="flex items-center justify-between mt-4">
            <a href="{{ url('/admin/detail-cerita') }}" class="px-6 py-2.5 border border-slate-200 bg-white text-slate-600 rounded-[12px] text-[13.5px] font-bold hover:bg-slate-50 transition shadow-sm">
              Batal
            </a>
            <!-- Memanggil JS Modal -->
            <button type="button" onclick="openSaveModal()" class="px-6 py-2.5 bg-[#10B981] hover:bg-[#059669] text-white rounded-[12px] text-[13.5px] font-bold shadow-sm transition">
              Simpan Perubahan
            </button>
          </div>

        </div>

      </div>
    </div>
  </main>

  <!-- ================= POPUP KONFIRMASI KELUAR (LOGOUT) ================= -->
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

  <!-- ================= POPUP KONFIRMASI SIMPAN (EDIT HALAMAN) ================= -->
  <div id="saveModal" class="fixed inset-0 z-[60] hidden">
    <!-- Backdrop -->
    <div id="saveBackdrop" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <div class="fixed inset-0 z-10 flex items-center justify-center p-4 sm:p-0">
      <!-- Modal Box -->
      <div id="saveContent" class="relative bg-white rounded-[24px] shadow-xl w-full max-w-sm transform scale-95 opacity-0 transition-all duration-300 flex flex-col p-8 text-center">
        
        <!-- Icon Konfirmasi (Hijau) -->
        <div class="w-16 h-16 rounded-full bg-emerald-50 text-[#10B981] flex items-center justify-center mx-auto mb-5 border-[4px] border-emerald-100/50">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
          </svg>
        </div>

        <!-- Teks Konfirmasi -->
        <h3 class="text-[20px] font-extrabold text-[#0F172A] tracking-tight mb-2">Simpan Perubahan?</h3>
        <p class="text-[13.5px] text-slate-500 font-medium mb-8 leading-relaxed">
          Apakah Anda yakin ingin menyimpan perubahan pada halaman cerita ini?
        </p>

        <!-- Tombol Aksi Modal -->
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

  <!-- ================= POPUP KONFIRMASI HAPUS GAMBAR ================= -->
  <div id="deleteImageModal" class="fixed inset-0 z-[60] hidden">
    <!-- Backdrop -->
    <div id="deleteImageBackdrop" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>

    <div class="fixed inset-0 z-10 flex items-center justify-center p-4 sm:p-0">
      <!-- Modal Box -->
      <div id="deleteImageContent" class="relative bg-white rounded-[24px] shadow-xl w-full max-w-sm transform scale-95 opacity-0 transition-all duration-300 flex flex-col p-8 text-center">
        
        <!-- Icon Peringatan (Merah) -->
        <div class="w-16 h-16 rounded-full bg-red-50 text-red-500 flex items-center justify-center mx-auto mb-5 border-[4px] border-red-100/50">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
          </svg>
        </div>

        <!-- Teks Konfirmasi -->
        <h3 class="text-[20px] font-extrabold text-[#0F172A] tracking-tight mb-2">Hapus Gambar?</h3>
        <p class="text-[13.5px] text-slate-500 font-medium mb-8 leading-relaxed">
          Apakah Anda yakin ingin menghapus ilustrasi pada halaman ini?
        </p>

        <!-- Tombol Aksi Modal -->
        <div class="flex items-center justify-center gap-3">
          <button type="button" onclick="closeDeleteImageModal()" class="flex-1 px-5 py-3 rounded-[12px] border border-slate-200 text-slate-600 text-[13.5px] font-bold hover:bg-slate-50 hover:text-[#0F172A] transition shadow-sm">
            Batal
          </button>
          <button type="button" onclick="confirmDeleteImage()" class="flex-1 px-5 py-3 rounded-[12px] bg-red-500 hover:bg-red-600 text-white text-[13.5px] font-bold transition shadow-sm shadow-red-500/20">
            Ya, Hapus
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= SCRIPT ================= -->
  <script>
    // --- Script Modal Simpan ---
    function openSaveModal() {
      const modal = document.getElementById('saveModal');
      const backdrop = document.getElementById('saveBackdrop');
      const content = document.getElementById('saveContent');
      
      if (modal && backdrop && content) {
        modal.classList.remove('hidden');
        setTimeout(() => {
          backdrop.classList.remove('opacity-0');
          content.classList.remove('scale-95', 'opacity-0');
          content.classList.add('scale-100', 'opacity-100');
        }, 10);
      }
    }

    function closeSaveModal() {
      const modal = document.getElementById('saveModal');
      const backdrop = document.getElementById('saveBackdrop');
      const content = document.getElementById('saveContent');
      
      if (modal && backdrop && content) {
        backdrop.classList.add('opacity-0');
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
          modal.classList.add('hidden');
        }, 300);
      }
    }

    function confirmSave() {
      window.location.href = "{{ url('/admin/detail-cerita') }}";
    }

    // --- Script Modal Hapus Gambar ---
    function openDeleteImageModal() {
      const modal = document.getElementById('deleteImageModal');
      const backdrop = document.getElementById('deleteImageBackdrop');
      const content = document.getElementById('deleteImageContent');
      
      if (modal && backdrop && content) {
        modal.classList.remove('hidden');
        setTimeout(() => {
          backdrop.classList.remove('opacity-0');
          content.classList.remove('scale-95', 'opacity-0');
          content.classList.add('scale-100', 'opacity-100');
        }, 10);
      }
    }

    function closeDeleteImageModal() {
      const modal = document.getElementById('deleteImageModal');
      const backdrop = document.getElementById('deleteImageBackdrop');
      const content = document.getElementById('deleteImageContent');
      
      if (modal && backdrop && content) {
        backdrop.classList.add('opacity-0');
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
          modal.classList.add('hidden');
        }, 300);
      }
    }

    function confirmDeleteImage() {
      document.getElementById('imagePreview').classList.add('hidden');
      document.getElementById('imagePreview').src = "#";
      document.getElementById('previewText').classList.remove('hidden');
      closeDeleteImageModal();
    }

    // --- Script Upload Gambar & Preview ---
    const imageUploadArea = document.getElementById('imageUploadArea');
    const imageFileInput = document.getElementById('imageFileInput');
    const imagePreview = document.getElementById('imagePreview');
    const previewText = document.getElementById('previewText');
    const imageUploadText = document.getElementById('imageUploadText');

    if(imageUploadArea && imageFileInput) {
      imageUploadArea.addEventListener('click', () => {
        imageFileInput.click();
      });

      imageFileInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreview.classList.remove('hidden');
            previewText.classList.add('hidden');
            imageUploadText.innerHTML = `File terpilih: <span class="font-normal text-slate-500">${file.name}</span>`;
          }
          reader.readAsDataURL(file);
        }
      });
    }

    // --- Script Counter Karakter Multi-Bahasa ---
    function setupCharCounter(textareaId, counterId, maxLength = 500) {
      const textarea = document.getElementById(textareaId);
      const counter = document.getElementById(counterId);
      if (!textarea || !counter) return;

      const updateCount = () => {
        const len = textarea.value.length;
        counter.textContent = `${len}/${maxLength}`;
        if (len >= maxLength) {
          counter.classList.remove('text-slate-400');
          counter.classList.add('text-red-500');
        } else {
          counter.classList.remove('text-red-500');
          counter.classList.add('text-slate-400');
        }
      };

      updateCount();
      textarea.addEventListener('input', updateCount);
    }

    // --- Script Custom Audio Player (Play/Pause, Durasi, Timeline) ---
    function formatTime(seconds) {
      if (isNaN(seconds) || seconds < 0) return "00:00";
      const m = Math.floor(seconds / 60);
      const s = Math.floor(seconds % 60);
      return (m < 10 ? "0" + m : m) + ":" + (s < 10 ? "0" + s : s);
    }

    function setupAudioPlayer(langKey) {
      const fileInput = document.getElementById(`audio${langKey}Input`);
      const audioEl = document.getElementById(`audioElement${langKey}`);
      const btnPlay = document.getElementById(`btnPlay${langKey}`);
      const iconPlay = document.getElementById(`iconPlay${langKey}`);
      const iconPause = document.getElementById(`iconPause${langKey}`);
      const progressBar = document.getElementById(`progressBar${langKey}`);
      const seekSlider = document.getElementById(`seekSlider${langKey}`);
      const timeDisplay = document.getElementById(`timeDisplay${langKey}`);
      const nameDisplay = document.getElementById(`audio${langKey}Name`);

      if(!audioEl || !btnPlay) return;

      // 1. Mengunggah/Memilih File
      if(fileInput) {
        fileInput.addEventListener('change', function() {
          if (this.files && this.files[0]) {
            const file = this.files[0];
            const objectUrl = URL.createObjectURL(file);
            audioEl.src = objectUrl;
            
            nameDisplay.textContent = file.name.length > 20 ? file.name.substring(0, 20) + "..." : file.name;
            
            iconPlay.classList.remove('hidden');
            iconPause.classList.add('hidden');
            progressBar.style.width = "0%";
            seekSlider.value = 0;
            timeDisplay.textContent = `00:00 / 00:00`;
          }
        });
      }

      // 2. Play / Pause Button
      btnPlay.addEventListener('click', () => {
        if (!audioEl.src || audioEl.src === window.location.href) {
          alert("Silakan unggah file audio terlebih dahulu!");
          return;
        }

        if (audioEl.paused) {
          ['Bali', 'Indo', 'Eng'].forEach(l => {
             if(l !== langKey) {
                const otherAudio = document.getElementById(`audioElement${l}`);
                if(otherAudio && !otherAudio.paused) {
                   otherAudio.pause();
                   document.getElementById(`iconPlay${l}`).classList.remove('hidden');
                   document.getElementById(`iconPause${l}`).classList.add('hidden');
                }
             }
          });
          audioEl.play();
          iconPlay.classList.add('hidden');
          iconPause.classList.remove('hidden');
        } else {
          audioEl.pause();
          iconPlay.classList.remove('hidden');
          iconPause.classList.add('hidden');
        }
      });

      // 3. Update waktu berjalan (Time Update)
      audioEl.addEventListener('timeupdate', () => {
        const current = audioEl.currentTime;
        const total = audioEl.duration;
        if (!isNaN(total)) {
          seekSlider.max = total;
          seekSlider.value = current;
          progressBar.style.width = (current / total) * 100 + "%";
          timeDisplay.textContent = `${formatTime(current)} / ${formatTime(total)}`;
        }
      });

      // 4. Setelah audio selesai
      audioEl.addEventListener('ended', () => {
        iconPlay.classList.remove('hidden');
        iconPause.classList.add('hidden');
        seekSlider.value = 0;
        progressBar.style.width = "0%";
        timeDisplay.textContent = `00:00 / ${formatTime(audioEl.duration)}`;
      });

      // 5. Durasi dimuat
      audioEl.addEventListener('loadedmetadata', () => {
        seekSlider.max = audioEl.duration;
        timeDisplay.textContent = `00:00 / ${formatTime(audioEl.duration)}`;
      });

      // 6. Saat Slider digeser manual (Seeking)
      seekSlider.addEventListener('input', () => {
        if (!audioEl.src) return;
        audioEl.currentTime = seekSlider.value;
        const total = audioEl.duration;
        if (!isNaN(total)) {
          progressBar.style.width = (seekSlider.value / total) * 100 + "%";
          timeDisplay.textContent = `${formatTime(seekSlider.value)} / ${formatTime(total)}`;
        }
      });
    }

    // Inisialisasi masing-masing Audio Player dan Counter Karakter
    document.addEventListener('DOMContentLoaded', () => {
      setupAudioPlayer('Bali');
      setupAudioPlayer('Indo');
      setupAudioPlayer('Eng');

      setupCharCounter('teksBali', 'countBali', 500);
      setupCharCounter('teksIndo', 'countIndo', 500);
      setupCharCounter('teksEng', 'countEng', 500);
    });
  </script>

  <!-- Form logout Admin (POST + CSRF): dikirim oleh tombol "Ya, Keluar" lewat confirmLogout() -->
  <form id="adminLogoutForm" action="{{ route('admin.logout') }}" method="POST" class="hidden">@csrf</form>
</body>
</html>