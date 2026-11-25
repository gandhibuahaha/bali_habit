<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Admin - BaliHabit</title>
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
          <span>Portal Admin</span>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 mx-2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
          <span class="text-[#10B981]">Profil Saya</span>
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
            <div class="w-8 h-8 rounded-full bg-emerald-100 text-[#10B981] font-bold flex items-center justify-center text-[12px] shadow-sm overflow-hidden">@if ($adminPhoto)<img src="{{ $adminPhoto }}" alt="Foto {{ $admin->name }}" class="w-full h-full object-cover">@else{{ $adminInitials }}@endif</div>
            <span class="text-[13px] font-bold text-[#1E293B] hidden sm:block">{{ $admin->name }}</span>
            <svg id="profileChevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 text-slate-400 hidden sm:block transition-transform duration-200"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
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
              <a href="{{ url('/admin/profil') }}" class="flex items-center justify-between px-3.5 py-3 rounded-[14px] text-[#10B981] bg-emerald-50/50 transition group">
                <div class="flex items-center gap-3">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-[#10B981] transition"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                  <span class="text-[13px] font-bold">Profil</span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5 text-emerald-400"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
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

    <!-- KONTEN PROFIL ADMIN -->
    <div class="p-8 mb-10 flex-1">
      <div class="max-w-[1000px] mx-auto flex flex-col gap-6">
        
        <!-- Judul Halaman -->
        <div>
          <h1 class="text-[28px] font-extrabold text-[#0F172A] tracking-tight mb-1">Profil Admin</h1>
          <p class="text-slate-500 text-[13.5px]">Kelola informasi pribadi, kredensial akun, dan hak akses administratif BaliHabit.</p>
        </div>

        @if (session('status'))
          <p class="bg-emerald-50 border border-emerald-100 text-[#10B981] text-[13px] font-bold rounded-[12px] px-4 py-3">{{ session('status') }}</p>
        @endif

        <form
            id="adminProfileForm"
            method="POST"
            action="{{ route('admin.profile.update') }}"
            enctype="multipart/form-data"
            class="hidden"
        >
            @csrf
        </form>

        <!-- Kartu Konten Utama -->
        <div class="bg-white border border-slate-100 rounded-[24px] shadow-sm p-7 sm:p-10 flex flex-col gap-8 mt-2">
          
          <!-- Bagian Atas: Avatar & Nama -->
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-8 border-b border-slate-100">
            <div class="flex items-center gap-5">
              <!-- Avatar Besar -->
              <div class="relative">
                <div id="avatarContainer" class="w-20 h-20 rounded-full bg-[#10B981] text-white text-[24px] font-extrabold flex items-center justify-center shadow-md overflow-hidden bg-cover bg-center" @if ($adminPhoto) style="background-image: url('{{ $adminPhoto }}')" @endif>
                  <span id="avatarInitials" @if ($adminPhoto) style="display: none" @endif>{{ $adminInitials }}</span>
                </div>
                <!-- Badge Ikon Kamera -->
                <div onclick="document.getElementById('profileImageInput').click()" class="absolute bottom-0 right-0 w-7 h-7 bg-white rounded-full border border-slate-200 flex items-center justify-center text-slate-500 shadow-sm cursor-pointer hover:text-[#10B981] transition group">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0z" />
                  </svg>
                </div>
              </div>
              <div>
                <h2 class="text-[20px] font-extrabold text-[#0F172A]">{{ $admin->name }}</h2>
                <p class="text-[13px] text-slate-400 font-medium mt-0.5">Administrator</p>
              </div>
            </div>

            <!-- Tombol Ganti Foto -->
            <button onclick="document.getElementById('profileImageInput').click()" class="self-start sm:self-center inline-flex items-center gap-2 bg-slate-50 text-slate-600 border border-slate-200 hover:bg-[#10B981] hover:text-white hover:border-[#10B981] px-5 py-2.5 rounded-[12px] text-[13px] font-bold shadow-sm transition group">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-slate-500 group-hover:text-white transition">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
              </svg>
              Ganti Foto
            </button>
            
            <!-- Input File Tersembunyi -->
            <input type="file" id="profileImageInput" name="photo" form="adminProfileForm" class="hidden" accept="image/png, image/jpeg, image/jpg">
          </div>
          <p class="text-xs text-red-500 font-medium {{ $errors->has('photo') ? '' : 'hidden' }}">{{ $errors->first('photo') }}</p>

          <!-- Form Informasi Akun -->
          <div class="flex flex-col gap-6">
            <div class="flex justify-between items-center">
              <h3 class="text-[16px] font-extrabold text-[#1E293B]">Informasi Akun</h3>
              <span class="text-[12px] text-slate-400 font-medium">Bidang bertanda (*) wajib diisi</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Nama Lengkap -->
              <div class="flex flex-col gap-2">
                <label class="text-[13px] font-bold text-[#1E293B]">Nama Lengkap <span class="text-red-500">*</span></label>
                <input
                    type="text"
                    name="name"
                    form="adminProfileForm"
                    value="{{ old('name', auth()->user()->name) }}"
                    class="w-full border {{ $errors->has('name') ? 'bg-red-50 border-red-200' : 'bg-slate-50 border-slate-200' }} rounded-[12px] px-4 py-3 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] focus:bg-white transition"
                >
                <p class="text-xs text-red-500 font-medium {{ $errors->has('name') ? '' : 'hidden' }}">{{ $errors->first('name') }}</p>
              </div>

              <!-- Alamat Email -->
              <div class="flex flex-col gap-2">
                <label class="text-[13px] font-bold text-[#1E293B]">Alamat Email <span class="text-red-500">*</span></label>
                <input
                    type="email"
                    value="{{ auth()->user()->email }}"
                    readonly
                    class="w-full bg-slate-50 border border-slate-200 rounded-[12px] px-4 py-3 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] focus:bg-white transition"
                >
              </div>

              <!-- Nomor Telepon WhatsApp -->
              <div class="flex flex-col gap-2 md:col-span-2">
                <label class="text-[13px] font-bold text-[#1E293B]">Nomor Telepon WhatsApp <span class="text-red-500">*</span></label>
                @php $phone = (string) old('no_tlp', $admin->no_tlp); @endphp
               <input
                  type="text"
                  name="no_tlp"
                  form="adminProfileForm"
                  value="{{ $phone !== '' ? '+' . ltrim($phone, '+') : '' }}"
                  class="w-full border {{ $errors->has('no_tlp') ? 'bg-red-50 border-red-200' : 'bg-slate-50 border-slate-200' }} rounded-[12px] px-4 py-3 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] focus:bg-white transition"
              >
                <p class="text-xs text-red-500 font-medium {{ $errors->has('no_tlp') ? '' : 'hidden' }}">{{ $errors->first('no_tlp') }}</p>
              </div>
            </div>
          </div>

          <!-- Form Ubah Kata Sandi -->
          <div class="flex flex-col gap-6 pt-6 border-t border-slate-100">
            <div>
              <h3 class="text-[16px] font-extrabold text-[#1E293B]">Ubah Kata Sandi</h3>
              <p class="text-[13px] text-slate-400 mt-1 font-medium">Biarkan kosong jika tidak ingin mengubah kata sandi saat ini.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Kata Sandi Baru -->
              <div class="flex flex-col gap-2">
                <label class="text-[13px] font-bold text-[#1E293B]">Kata Sandi Baru</label>
                <input
                    type="password"
                    name="password"
                    form="adminProfileForm"
                    placeholder="Minimal 8 karakter"
                    autocomplete="new-password"
                    class="w-full border {{ $errors->has('password') ? 'bg-red-50 border-red-200' : 'bg-slate-50 border-slate-200' }} rounded-[12px] px-4 py-3 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] focus:bg-white transition"
                >
                <p class="text-xs text-red-500 font-medium {{ $errors->has('password') ? '' : 'hidden' }}">{{ $errors->first('password') }}</p>
              </div>

              <!-- Konfirmasi Kata Sandi Baru -->
              <div class="flex flex-col gap-2">
                <label class="text-[13px] font-bold text-[#1E293B]">Konfirmasi Kata Sandi Baru</label>
                <input
                    type="password"
                    name="password_confirmation"
                    form="adminProfileForm"
                    placeholder="Ulangi kata sandi baru"
                    autocomplete="new-password"
                    class="w-full border {{ $errors->has('password_confirmation') ? 'bg-red-50 border-red-200' : 'bg-slate-50 border-slate-200' }} rounded-[12px] px-4 py-3 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] focus:bg-white transition"
                >
                <p class="text-xs text-red-500 font-medium {{ $errors->has('password_confirmation') ? '' : 'hidden' }}">{{ $errors->first('password_confirmation') }}</p>
              </div>
            </div>
          </div>

          <!-- Footer Kartu: Catatan & Tombol Aksi -->
          <div class="flex flex-col sm:flex-row items-center justify-between gap-6 pt-8 border-t border-slate-100 mt-2">
            <div class="flex items-center gap-2 text-[12.5px] font-bold text-[#10B981]">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              Perubahan profil otomatis tercatat di log audit sistem.
            </div>

            <div class="flex items-center gap-3 w-full sm:w-auto justify-end">
              <a href="{{ url('/admin/dashboard') }}" class="px-5 py-2.5 rounded-[12px] bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-600 font-bold text-[13px] transition shadow-sm">
                Batal
              </a>
              <!-- Tombol pemicu openSaveModal -->
              <button type="button" onclick="openSaveModal()" class="px-5 py-2.5 rounded-[12px] bg-[#10B981] hover:bg-[#059669] text-white font-bold text-[13px] shadow-sm transition flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                Simpan Perubahan
              </button>
            </div>
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
        <h3 class="text-[20px] font-extrabold text-[#0F172A] tracking-tight mb-2">Simpan Perubahan?</h3>
        <p class="text-[13.5px] text-slate-500 font-medium mb-8 leading-relaxed">
          Apakah Anda yakin ingin menyimpan perubahan pada profil akun Anda?
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
      const form = document.getElementById('adminProfileForm');

      if (!form) {
          alert('Form profil tidak ditemukan.');
          return;
      }

      form.requestSubmit();
  }

    // --- Script Preview Foto Profil ---
    const profileImageInput = document.getElementById('profileImageInput');
    const avatarContainer = document.getElementById('avatarContainer');
    const avatarInitials = document.getElementById('avatarInitials');

    if (profileImageInput) {
      profileImageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            avatarContainer.style.backgroundImage = `url(${e.target.result})`;
            if (avatarInitials) {
              avatarInitials.style.display = 'none';
            }
          }
          reader.readAsDataURL(file);
        }
      });
    }
  </script>

</body>
</html>