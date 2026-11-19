/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.html",             // Memantau file HTML di folder utama (user)
    "./admin/**/*.html",    // Memantau SEMUA file HTML di dalam folder admin
    "./assets/**/*.js"      // Memantau file JS
  ],
  theme: {
    extend: {
      // Tambahkan konfigurasi font di bawah ini
      fontFamily: {
        sans: ['Plus Jakarta Sans', 'sans-serif'],
      },
    },
  },
  plugins: [],
}