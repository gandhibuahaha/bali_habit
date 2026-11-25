<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Cerita - BaliHabit</title>
  <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased">

  <!-- ================= NAV BAR ================= -->
  <nav class="flex justify-between items-center px-6 py-4 max-w-6xl mx-auto w-full bg-white/80 backdrop-blur-md sticky top-0 z-40">

    <a href="{{ url('/') }}" class="flex items-center gap-2.5 z-10 hover:opacity-80 transition cursor-pointer">
      <div class="w-9 h-9 bg-emerald-50 rounded-full flex items-center justify-center border border-emerald-100 overflow-hidden p-0.5">
        <img
          src="{{ asset('assets/images/logo.png') }}"
          alt="Logo BaliHabit"
          class="w-full h-full rounded-full object-cover"
        />
      </div>
      <span class="text-xl font-extrabold tracking-tight text-[#1F2937]">Bali<span class="text-[#10B981]">Habit</span></span>
    </a>

    <!-- Menu Utama Desktop (Menu 'Cerita' tetap aktif saat membuka Detail Cerita) -->
    <div class="hidden lg:flex items-center gap-8 text-sm font-bold text-slate-500">
      <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'text-[#10B981]' : 'text-slate-500 hover:text-[#10B981]' }} transition">Beranda</a>
      <a href="{{ url('/cerita') }}" class="{{ request()->is('cerita*') || request()->is('detail-cerita*') ? 'text-[#10B981]' : 'text-slate-500 hover:text-[#10B981]' }} transition">Cerita</a>
      <a href="{{ url('/tentang') }}" class="{{ request()->is('tentang*') ? 'text-[#10B981]' : 'text-slate-500 hover:text-[#10B981]' }} transition">Tentang Kami</a>
    </div>

    <div class="flex items-center gap-3">
      <a href="{{ url('/login') }}" class="hidden sm:block px-5 py-2 rounded-full border border-gray-200 text-sm font-semibold hover:bg-gray-50 hover:text-[#10B981] transition bg-white">
        Masuk
      </a>

      <a href="{{ url('/registrasi') }}" class="hidden sm:block px-5 py-2 rounded-full bg-[#10B981] text-white text-sm font-semibold hover:bg-[#059669] transition shadow-sm">
        Daftar
      </a>

      <button id="hamburgerBtn" class="lg:hidden p-2 rounded-full border border-emerald-100 text-[#10B981] bg-emerald-50 hover:bg-emerald-100 transition cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
      </button>
    </div>
  </nav>

  <!-- ================= KONTEN UTAMA ================= -->
  <main class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 pb-16">

    <!-- Tombol Kembali -->
    <a href="{{ url('/cerita') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-[#10B981] font-semibold text-sm mb-6 transition">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
      Kembali ke Daftar Cerita
    </a>

    <!-- Gambar Hero Cerita -->
    <div class="w-full h-48 md:h-80 bg-gray-200 rounded-3xl mb-8 overflow-hidden shadow-sm">
      <div id="hero-img" class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('assets/images/alu_puuh.png') }}');"></div>
    </div>

    <!-- Judul & Deskripsi Singkat Cerita -->
    <div class="text-center mb-10">
      <h1 id="judul-cerita" class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-3">I Alu Teken I Kedis Puuh</h1>
      <p id="deskripsi-cerita" class="text-slate-500 text-sm md:text-base leading-relaxed max-w-lg mx-auto">
        Cerita tentang kecerdikan untuk menjaga rumah dan alam.
      </p>
    </div>

    <!-- Section: Tentang Cerita -->
    <div class="bg-white border border-gray-100 rounded-3xl p-6 md:p-8 shadow-sm mb-8">
      <div class="flex items-center gap-2 mb-4">
        <div class="w-1.5 h-5 bg-[#10B981] rounded-full"></div>
        <h2 class="text-lg font-bold text-slate-900">Tentang Cerita</h2>
      </div>
      <p id="tentang-cerita" class="text-slate-600 text-sm leading-relaxed">
        Di sebuah tegalan yang hijau di Bali, tumbuh berbagai macam tumbuhan. Pohon-pohon besar berdiri rindang, tempat burung-burung bernyanyi dan mencari perlindungan dengan penuh kedamaian.
      </p>
    </div>

    <!-- Section: Preview Cerita -->
    <div class="mb-8">
      <div class="flex justify-between items-center mb-4">
        <div class="flex items-center gap-2">
          <div class="w-1.5 h-5 bg-[#10B981] rounded-full"></div>
          <h2 class="text-lg font-bold text-slate-900">Preview Cerita</h2>
        </div>
        <span class="bg-emerald-50 text-[#10B981] text-xs font-semibold px-3 py-1.5 rounded-full border border-emerald-100">
          Cuplikan
        </span>
      </div>

      <!-- Kartu Preview (Buku & Terjemahan) -->
      <div class="bg-white border border-emerald-50 rounded-3xl p-4 md:p-5 shadow-sm flex flex-col md:flex-row gap-5">

        <!-- Gambar Cover Kecil -->
        <div class="relative w-full md:w-32 h-40 bg-gray-200 rounded-2xl overflow-hidden flex-shrink-0">
          <div id="preview-img" class="w-full h-full bg-cover bg-center" style="background-image: url('{{ asset('assets/images/alu_puuh.png') }}');"></div>
          <div class="absolute bottom-2 right-2 bg-black/60 text-white text-[10px] font-bold px-2 py-1 rounded-lg backdrop-blur-sm">Hal 1</div>
        </div>

        <!-- Konten Bahasa -->
        <div class="flex-grow flex flex-col gap-4">
          <div class="flex justify-between items-center border-b border-gray-100 pb-2">
            <span class="text-[#10B981] font-bold text-xs">Halaman 1 dari 10</span>
            <span class="text-slate-400 text-[10px] uppercase font-bold tracking-wider">Preview</span>
          </div>

          <!-- Bahasa Bali -->
          <div>
            <div class="flex justify-between items-center mb-1">
              <h4 class="font-bold text-slate-900 text-xs">Bahasa Bali</h4>
              <button class="text-[#10B981] hover:bg-emerald-50 p-1 rounded-md transition cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" /></svg>
              </button>
            </div>
            <p id="teks-bali" class="text-slate-600 text-[11px] italic leading-relaxed">"Ring alas sane gadang ring bali, mentik sarwa entik-entikan"</p>
          </div>

          <!-- Bahasa Indonesia -->
          <div>
            <div class="flex justify-between items-center mb-1">
              <h4 class="font-bold text-slate-900 text-xs">Bahasa Indonesia</h4>
              <button class="text-[#10B981] hover:bg-emerald-50 p-1 rounded-md transition cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" /></svg>
              </button>
            </div>
            <p id="teks-indo" class="text-slate-600 text-[11px] italic leading-relaxed">"Di sebuah tegalan yang hijau di bali, tumbuh berbagai macam tumbuhan.."</p>
          </div>

          <!-- Bahasa Inggris -->
          <div>
            <div class="flex justify-between items-center mb-1">
              <h4 class="font-bold text-slate-900 text-xs">Bahasa Inggris</h4>
              <button class="text-[#10B981] hover:bg-emerald-50 p-1 rounded-md transition cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" /></svg>
              </button>
            </div>
            <p id="teks-inggris" class="text-slate-600 text-[11px] italic leading-relaxed">"In a green filed in bali, a wide variety of plants grow."</p>
          </div>

        </div>
      </div>
    </div>

    <!-- Tombol CTA Bawah -->
    <a href="{{ url('/registrasi') }}" class="w-full bg-[#10B981] text-white font-bold py-4 rounded-full flex justify-center items-center gap-2 hover:bg-[#059669] transition shadow-md mt-6 cursor-pointer">
      Yuk Baca Seluruh Cerita
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>
    </a>

  </main>

  <!-- ================= FOOTER ================= -->
  <footer class="bg-gray-50/50 pt-8 pb-12 mt-4 border-t border-gray-100">
    <div class="max-w-6xl mx-auto px-4 text-center">
      <p class="text-slate-800 font-bold text-sm mb-1">
        BaliHabit <span class="text-slate-400 font-normal mx-1">•</span> <span class="font-normal text-slate-500">© 2026</span>
      </p>
      <p class="text-slate-500 text-xs mb-4">Misi Kebaikan & Karakter Baik <span class="mx-1">•</span> Pulau Dewata</p>
      <div class="flex flex-wrap justify-center gap-x-3 gap-y-2 text-xs text-[#10B981] font-semibold">
        <a href="#" class="hover:underline">Kebijakan Privasi</a>
        <span class="text-slate-300">•</span>
        <a href="#" class="hover:underline">Ketentuan Layanan</a>
      </div>
      <div class="flex flex-wrap justify-center gap-x-3 gap-y-2 text-xs text-[#10B981] font-semibold mt-2">
        <a href="{{ url('/halaman-bantuan') }}" class="hover:underline">Bantuan Ayah & Bunda</a>
      </div>
    </div>
  </footer>

  <!-- ================= POPUP MENU NAVIGASI (MOBILE) ================= -->
  <div id="mobileMenu" class="fixed inset-0 z-[60] hidden lg:hidden">
    <div id="menuBackdrop" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"></div>
    <div id="menuContent" class="absolute top-4 left-4 right-4 bg-white rounded-[2rem] p-5 shadow-2xl transform -translate-y-[150%] transition-transform duration-300 flex flex-col">

      <!-- Header (Logo Clickable + Tombol Close) -->
      <div class="flex justify-between items-center border-b border-gray-100 pb-4 mb-4">
        <a href="{{ url('/') }}" class="flex items-center gap-3 !bg-transparent hover:opacity-80 transition cursor-pointer">
          <div class="w-10 h-10 rounded-full flex items-center justify-center overflow-hidden">
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

      <!-- Menu Mobile (Menu 'Cerita' tetap aktif saat membuka Detail Cerita) -->
      <div class="flex flex-col gap-2">
        <a href="{{ url('/') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-2xl font-bold transition {{ request()->is('/') ? 'text-[#10B981] bg-emerald-50' : 'text-slate-500 hover:bg-slate-50' }}">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
          Beranda
        </a>
        <a href="{{ url('/cerita') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-2xl font-bold transition {{ request()->is('cerita*') || request()->is('detail-cerita*') ? 'text-[#10B981] bg-emerald-50' : 'text-slate-500 hover:bg-slate-50' }}">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
          Cerita
        </a>
        <a href="{{ url('/tentang') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-2xl font-bold transition {{ request()->is('tentang*') ? 'text-[#10B981] bg-emerald-50' : 'text-slate-500 hover:bg-slate-50' }}">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" /></svg>
          Tentang Kami
        </a>
      </div>
      <div class="h-px bg-gray-100 my-5"></div>
      <div class="flex flex-col gap-3">
        <a href="{{ url('/login') }}" class="w-full text-center border-2 border-[#10B981] text-[#10B981] font-bold py-3.5 rounded-xl hover:bg-emerald-50 transition">Masuk</a>
        <a href="{{ url('/registrasi') }}" class="w-full text-center bg-[#10B981] text-white font-bold py-3.5 rounded-xl hover:bg-[#059669] transition shadow-md">Daftar</a>
      </div>
    </div>
  </div>

  <!-- ================= SCRIPT DINAMIS DETAIL CERITA ================= -->
  <script>
    const databaseCerita = {
      "alu-puuh": {
        judul: "I Alu Teken I Kedis Puuh",
        deskripsi: "Tentang kecerdikan menjaga rumah dan alam.",
        tentang: "Di sebuah tegalan yang hijau di Bali, tumbuh berbagai macam tumbuhan. Pohon-pohon besar berdiri rindang, tempat burung-burung bernyanyi dan mencari perlindungan dengan penuh kedamaian.",
        gambar: "{{ asset('assets/images/alu_puuh.png') }}",
        bali: '"Ring alas sane gadang ring bali, mentik sarwa entik-entikan."',
        indo: '"Di sebuah tegalan yang hijau di Bali, tumbuh berbagai macam tumbuhan."',
        inggris: '"In a green field in Bali, a wide variety of plants grow."'
      },
      "lutung-kekua": {
        judul: "I Lutung Teken I Kekua",
        deskripsi: "Tentang kepedulian dan menjaga lingkungan.",
        tentang: "Kisah persahabatan antara lutung yang cerdik dan kekua yang sabar dalam menghadapi tantangan serta menjaga kebersihan lingkungan hutan.",
        gambar: "{{ asset('assets/images/lutung_kekua.png') }}",
        bali: '"Bikas tresna asih ring sarwa urip pinaka tetamian luhur."',
        indo: '"Sikap saling menyayangi sesama makhluk hidup adalah warisan luhur."',
        inggris: '"Loving attitude towards all living things is a noble heritage."'
      },
      "lipi-selem": {
        judul: "Lipi Selem Bukit",
        deskripsi: "Pentingnya alam dan lingkungan.",
        tentang: "Petualangan di bukit hijau Bali yang mengajarkan anak-anak pentingnya menjaga keseimbangan ekosistem alam.",
        gambar: "{{ asset('assets/images/lelipi_selem.png') }}",
        bali: '"Rahina wengi nglimbakang pakaryan melah ring bukit sane Asri."',
        indo: '"Siang malam merawat keindahan alam di bukit yang asri."',
        inggris: '"Day and night preserving the natural beauty of the lush hill."'
      },
      "lutung-pecalang": {
        judul: "I Lutung Dadi Pecalang",
        deskripsi: "Penjaga yang berusaha memahami masalah.",
        tentang: "Kisah lucu sekaligus mendidik ketika sang lutung bertugas menjaga ketertiban desa adat dengan cara yang unik.",
        gambar: "{{ asset('assets/images/lutung_pecalang.png') }}",
        bali: '"Dados pecalang patut pageh ring swadarmaning desa."',
        indo: '"Menjadi pecalang harus teguh pada kewajiban menjaga desa."',
        inggris: '"Being a traditional security guard requires firmness in village duties."'
      }
    };

    const urlParams = new URLSearchParams(window.location.search);
    const idCerita = urlParams.get('cerita');

    if (idCerita && databaseCerita[idCerita]) {
      const data = databaseCerita[idCerita];

      document.getElementById('judul-cerita').innerText = data.judul;
      document.getElementById('deskripsi-cerita').innerText = data.deskripsi;
      document.getElementById('tentang-cerita').innerText = data.tentang;
      document.getElementById('hero-img').style.backgroundImage = `url('${data.gambar}')`;
      document.getElementById('preview-img').style.backgroundImage = `url('${data.gambar}')`;
      document.getElementById('teks-bali').innerText = data.bali;
      document.getElementById('teks-indo').innerText = data.indo;
      document.getElementById('teks-inggris').innerText = data.inggris;
    }
  </script>

  <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>