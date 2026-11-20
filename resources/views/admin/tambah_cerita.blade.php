<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Cerita - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/admin/code_global.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/js/admin/global_admin.js') }}" defer></script>
</head>
<body class="bg-[#F8FAFC] text-slate-800 font-sans antialiased flex min-h-screen items-start relative overflow-x-hidden">

  <!-- ================= MOBILE OVERLAY ================= -->
  <div id="mobileOverlay" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-30 opacity-0 invisible transition-all duration-300 lg:hidden"></div>

  <!-- ================= SIDEBAR KIRI (Desain Konsisten) ================= -->
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
        <a href="{{ url('/admin/dashboard') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.592 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Beranda</span>
        </a>

        <!-- Menu: User Management -->
        <a href="{{ url('/admin/user-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">User Management</span>
        </a>

        <!-- Menu Aktif: Story Management -->
        <a href="{{ url('/admin/story-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] bg-[#10B981] text-white transition shadow-[0_2px_10px_rgba(16,185,129,0.2)]">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 flex-shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-bold whitespace-nowrap">Story Management</span>
        </a>

        <!-- Menu: Refleksi Management -->
        <a href="{{ url('/admin/refleksi-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Refleksi Management</span>
        </a>

        <!-- Menu: Mission Management -->
        <a href="{{ url('/admin/mission-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 flex-shrink-0 text-slate-400 group-hover:text-[#10B981] transition">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span class="sidebar-text text-[13.5px] font-semibold whitespace-nowrap">Mission Management</span>
        </a>

        <!-- Menu: Lencana Management -->
        <a href="{{ url('/admin/lencana-management') }}" class="sidebar-menu-link flex items-center gap-3.5 px-4 py-3 rounded-[14px] text-[#475569] hover:bg-slate-50 hover:text-[#10B981] transition group">
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
    
    <!-- HEADER ATAS (Desain Konsisten) -->
    <header class="h-[72px] bg-white border-b border-slate-100 flex items-center justify-between px-8 z-30 sticky top-0 flex-shrink-0">
      <div class="flex items-center gap-4">
        <!-- Hamburger Menu Button (Tampil di Desktop & Mobile) -->
        <button id="sidebarToggleBtn" class="text-slate-500 hover:text-[#10B981] hover:bg-slate-50 transition p-2 rounded-lg focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>

        <!-- Breadcrumb Navigasi Atas -->
        <div class="hidden sm:flex items-center text-[13px] font-bold text-slate-400">
          <span>Portal Admin</span>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 mx-2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
          <a href="{{ url('/admin/story-management') }}" class="hover:text-[#10B981] transition">Story Management</a>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 mx-2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
          <span class="text-[#10B981]">Tambah Cerita</span>
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

    <!-- KONTEN TAMBAH CERITA -->
    <div class="p-8 mb-10 flex-1">
      <div class="max-w-[1100px] mx-auto flex flex-col gap-6">
        
        <!-- Tombol Kembali ke Story Management -->
        <div>
          <a href="{{ url('/admin/story-management') }}" class="inline-flex items-center gap-2 text-[13.5px] font-bold text-slate-500 hover:text-[#10B981] transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Kembali ke Story Management
          </a>
        </div>

        <!-- Judul & Subjudul Halaman -->
        <div>
          <h1 class="text-[28px] font-extrabold text-[#0F172A] tracking-tight mb-1">Tambah Cerita</h1>
          <p class="text-slate-500 text-[13.5px]">Lengkapi informasi dasar cerita.</p>
        </div>

        <!-- Kartu Form Tambah Cerita -->
        <div class="bg-white border border-slate-100 rounded-[24px] shadow-sm p-8 sm:p-10 flex flex-col gap-8 mt-2">
          
          <!-- Input: Judul Cerita -->
          <div class="flex flex-col gap-2">
            <label class="text-[13.5px] font-bold text-[#1E293B]">
              Judul Cerita <span class="text-red-500">*</span>
            </label>
            <input 
              type="text" 
              placeholder="Masukkan judul cerita..." 
              class="w-full bg-slate-50 border border-slate-200 rounded-[12px] px-4 py-3 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] focus:bg-white transition"
            >
          </div>

          <!-- Input: Deskripsi Singkat -->
          <div class="flex flex-col gap-2">
            <label class="text-[13.5px] font-bold text-[#1E293B]">
              Deskripsi Singkat <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <textarea 
                id="deskripsiCerita"
                maxlength="300"
                rows="4"
                placeholder="Tulis deskripsi singkat cerita..." 
                class="w-full bg-slate-50 border border-slate-200 rounded-[12px] p-4 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] focus:bg-white transition resize-none"
              ></textarea>
              <span id="ceritaCharCount" class="absolute bottom-3 right-4 text-[11px] font-bold text-slate-400 pointer-events-none">0/300</span>
            </div>
          </div>

          <!-- Input: Cover Cerita -->
          <div class="flex flex-col gap-2">
            <label class="text-[13.5px] font-bold text-[#1E293B]">
              Cover Cerita <span class="text-red-500">*</span>
            </label>
            <div id="coverUploadArea" class="border-2 border-dashed border-[#10B981]/40 hover:border-[#10B981] bg-emerald-50/20 rounded-[20px] p-8 text-center flex flex-col items-center justify-center gap-3 transition cursor-pointer group relative overflow-hidden">
              <!-- Kotak Ikon Gambar -->
              <div class="w-12 h-12 rounded-[14px] bg-emerald-50 text-[#10B981] border border-emerald-100 flex items-center justify-center group-hover:scale-105 transition shadow-sm z-10">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
              </div>
              <div class="flex flex-col gap-1 z-10">
                <p id="coverUploadText" class="text-[13.5px] font-bold text-slate-700">
                  Klik untuk mengunggah gambar <span class="font-normal text-slate-500">atau seret dan lepas di sini</span>
                </p>
                <p class="text-[12px] text-slate-400 font-medium">
                  Format: JPG, PNG (Maks. 2 MB) • Rasio 16:9 atau 4:3 disarankan
                </p>
              </div>
              <button type="button" id="btnSelectCover" class="mt-2 px-4 py-2 bg-white border border-slate-200 hover:border-[#10B981] text-slate-700 text-[12.5px] font-bold rounded-[10px] shadow-sm transition z-10 pointer-events-none">
                Pilih Gambar
              </button>

              <!-- Input file tersembunyi -->
              <input type="file" id="coverFileInput" class="hidden" accept="image/png, image/jpeg, image/jpg">
              <!-- Area Preview Gambar -->
              <img id="coverPreview" src="#" alt="Preview Cover" class="absolute inset-0 w-full h-full object-cover hidden z-0">
            </div>
          </div>

          <!-- Input: Status -->
          <div class="flex flex-col gap-2">
            <label class="text-[13.5px] font-bold text-[#1E293B]">
              Status <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <select class="w-full bg-slate-50 border border-slate-200 rounded-[12px] px-4 py-3 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] focus:bg-white transition appearance-none cursor-pointer">
                <option>Draft</option>
                <option>Published</option>
              </select>
              <span class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
              </span>
            </div>
            <p class="text-[12px] text-slate-400 font-medium mt-0.5">Cerita yang sudah lengkap dapat dipublikasikan.</p>
          </div>

          <!-- Tombol Aksi di Bawah -->
          <div class="flex items-center justify-between pt-6 border-t border-slate-100 mt-2">
            <a href="{{ url('/admin/story-management') }}" class="px-5 py-2.5 rounded-[12px] bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-600 font-bold text-[13px] transition text-center">
              Batal
            </a>
            <button type="button" onclick="openSaveModal()" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-[12px] bg-[#10B981] hover:bg-[#059669] text-white font-bold text-[13px] shadow-sm transition">
              Simpan Cerita
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

  <!-- ================= POPUP KONFIRMASI SIMPAN ================= -->
  <div id="saveModal" class="fixed inset-0 z-50 hidden">
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
        <h3 class="text-[20px] font-extrabold text-[#0F172A] tracking-tight mb-2">Simpan Cerita?</h3>
        <p class="text-[13.5px] text-slate-500 font-medium mb-8 leading-relaxed">
          Apakah Anda yakin informasi cerita ini sudah benar dan ingin menyimpannya?
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
      window.location.href = "{{ url('/admin/story-management') }}";
    }

    // --- Script Upload Cover Cerita ---
    const coverUploadArea = document.getElementById('coverUploadArea');
    const coverFileInput = document.getElementById('coverFileInput');
    const coverPreview = document.getElementById('coverPreview');
    const coverUploadText = document.getElementById('coverUploadText');

    if(coverUploadArea && coverFileInput) {
      coverUploadArea.addEventListener('click', () => {
        coverFileInput.click();
      });

      coverFileInput.addEventListener('change', function() {
        const file = this.files[0];
        
        if (file) {
          const reader = new FileReader();
          
          reader.onload = function(e) {
            coverPreview.src = e.target.result;
            coverPreview.classList.remove('hidden');
            coverUploadText.innerHTML = `File terpilih: <span class="font-normal text-slate-500">${file.name}</span>`;
            coverPreview.classList.add('group-hover:opacity-75', 'transition-opacity', 'duration-300');
          }
          
          reader.readAsDataURL(file);
        } else {
          coverPreview.src = "#";
          coverPreview.classList.add('hidden');
          coverUploadText.innerHTML = `Klik untuk mengunggah gambar <span class="font-normal text-slate-500">atau seret dan lepas di sini</span>`;
        }
      });
    }

    // --- Script Realtime Character Counter untuk Deskripsi Cerita ---
    document.addEventListener('DOMContentLoaded', () => {
      const deskripsiInput = document.getElementById('deskripsiCerita');
      const charCountDisplay = document.getElementById('ceritaCharCount');
      const maxLength = 300;

      if(deskripsiInput && charCountDisplay) {
        deskripsiInput.addEventListener('input', function() {
          const currentLength = this.value.length;
          charCountDisplay.textContent = `${currentLength}/${maxLength}`;
          
          if(currentLength >= maxLength) {
            charCountDisplay.classList.remove('text-slate-400');
            charCountDisplay.classList.add('text-red-500');
          } else {
            charCountDisplay.classList.remove('text-red-500');
            charCountDisplay.classList.add('text-slate-400');
          }
        });
      }
    });

  </script>

</body>
</html>