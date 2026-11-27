// Halaman Refleksi: pertanyaan dari database (lihat halaman_refleksi.blade.php).
// Setiap tombol punya data-question (id pertanyaan) dan data-answer (1 = Iya, 0 = Tidak).
const reflectionAnswers = {}; // id pertanyaan -> 1 / 0
let reflectionSent = false;

// Ikon tiap jawaban: Iya (1) = tanda centang, Tidak (0) = tanda silang.
// Abu-abu saat belum dipilih, putih (tebal) saat dipilih.
const ANSWER_ICON_PATHS = { '1': 'M4.5 12.75l6 6 9-13.5', '0': 'M6 18L18 6M6 6l12 12' };

function answerIcon(answer, selected) {
  return `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="${selected ? 3 : 2.5}" stroke="currentColor" class="w-4 h-4${selected ? '' : ' text-slate-400'}"><path stroke-linecap="round" stroke-linejoin="round" d="${ANSWER_ICON_PATHS[answer]}" /></svg>`;
}

// Pilih Iya/Tidak: tandai tombol yang dipilih dan catat jawabannya.
function selectAnswer(clickedButton) {
  const container = clickedButton.parentElement;
  const buttons = container.querySelectorAll('.ans-btn');

  buttons.forEach(btn => {
    btn.className = "ans-btn bg-slate-50 hover:bg-slate-100 text-slate-500 font-bold py-3 px-4 rounded-2xl flex items-center justify-center gap-2 text-xs md:text-sm border border-slate-100 transition cursor-pointer";
    const svg = btn.querySelector('svg');
    if (svg) {
      svg.outerHTML = answerIcon(btn.dataset.answer, false);
    }
  });

  clickedButton.className = "ans-btn bg-[#10B981] text-white font-extrabold py-3 px-4 rounded-2xl flex items-center justify-center gap-2 text-xs md:text-sm shadow-sm transition cursor-pointer";
  const activeSvg = clickedButton.querySelector('svg');
  if (activeSvg) {
    activeSvg.outerHTML = answerIcon(clickedButton.dataset.answer, true);
  }

  reflectionAnswers[clickedButton.dataset.question] = clickedButton.dataset.answer;
  document.getElementById('reflection-missing')?.classList.add('hidden');
}

// "Lanjut ke Misi": kirim semua jawaban sekali ke server (saveReflections).
// Belum semua dijawab = tampilkan pesan, tidak ada yang dikirim.
function submitReflections() {
  if (reflectionSent) return;

  const questionIds = [...new Set([...document.querySelectorAll('.ans-btn[data-question]')].map(btn => btn.dataset.question))];
  if (questionIds.some(id => !(id in reflectionAnswers))) {
    document.getElementById('reflection-missing').classList.remove('hidden');
    return;
  }

  reflectionSent = true; // ketukan ganda tidak mengirim dua kali
  document.getElementById('btn-save-reflection').disabled = true;

  const form = document.getElementById('reflectionForm');
  questionIds.forEach(id => {
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = `answers[${id}]`;
    input.value = reflectionAnswers[id];
    form.appendChild(input);
  });
  form.submit();
}
