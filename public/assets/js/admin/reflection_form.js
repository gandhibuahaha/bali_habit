// Tambah / Edit Refleksi (D-36): add and remove question rows, keep numbers and
// field names (questions[0][...], questions[1][...]) in form order, and submit
// the form after the "Simpan" popup. Rows come from the #reflectionRowTemplate.
(function () {
  const container = document.getElementById('reflectionListContainer');
  const addButton = document.getElementById('addReflectionBtn');
  const countBadge = document.getElementById('questionCountBadge');
  const template = document.getElementById('reflectionRowTemplate');

  function renumber() {
    const rows = container.querySelectorAll('.reflection-item');
    rows.forEach((row, index) => {
      row.querySelector('.reflection-number').textContent = index + 1;
      row.querySelectorAll('[data-field]').forEach(field => {
        field.name = `questions[${index}][${field.dataset.field}]`;
      });
    });
    if (countBadge) {
      countBadge.textContent = rows.length + ' Pertanyaan';
    }
  }

  if (addButton && container && template) {
    addButton.addEventListener('click', () => {
      container.appendChild(template.content.firstElementChild.cloneNode(true));
      renumber();
      container.lastElementChild.querySelector('textarea').focus();
    });
  }

  // At least one question must stay.
  window.removeReflection = function (button) {
    if (container.querySelectorAll('.reflection-item').length <= 1) {
      return;
    }
    button.closest('.reflection-item').remove();
    renumber();
  };

  // ---------- Ubah urutan dengan pegangan geser [data-drag-handle] ----------
  // Mouse dan layar sentuh (pointer events): tarik barisnya ke atas/bawah.
  // Keyboard: fokus pada pegangan, lalu panah atas/bawah.
  // Urutan yang disimpan = urutan di layar (renumber() memperbarui nama kolom).
  let dragging = null;

  function moveRowTo(row, clientY) {
    const others = [...container.querySelectorAll('.reflection-item')].filter(r => r !== row);
    const before = others.find(r => {
      const box = r.getBoundingClientRect();
      return clientY < box.top + box.height / 2;
    });
    if (before) {
      if (row.nextElementSibling !== before) container.insertBefore(row, before);
    } else if (container.lastElementChild !== row) {
      container.appendChild(row);
    }
  }

  function endDrag() {
    if (!dragging) return;
    dragging.row.style.opacity = '';
    dragging.row.style.boxShadow = '';
    dragging.row.style.background = '';
    document.body.style.userSelect = '';
    dragging = null;
    renumber();
  }

  if (container) {
    container.addEventListener('pointerdown', (event) => {
      const handle = event.target.closest('[data-drag-handle]');
      if (!handle || event.button > 0) return;
      event.preventDefault();
      const row = handle.closest('.reflection-item');
      dragging = { row, pointerId: event.pointerId };
      handle.setPointerCapture(event.pointerId);
      row.style.opacity = '0.75';
      row.style.boxShadow = '0 10px 25px -10px rgba(15, 23, 42, 0.25)';
      row.style.background = '#ffffff';
      document.body.style.userSelect = 'none';
    });

    container.addEventListener('pointermove', (event) => {
      if (!dragging || event.pointerId !== dragging.pointerId) return;
      moveRowTo(dragging.row, event.clientY);
      renumber();
    });

    container.addEventListener('pointerup', endDrag);
    container.addEventListener('pointercancel', endDrag);

    container.addEventListener('keydown', (event) => {
      const handle = event.target.closest('[data-drag-handle]');
      if (!handle || (event.key !== 'ArrowUp' && event.key !== 'ArrowDown')) return;
      event.preventDefault();
      const row = handle.closest('.reflection-item');
      if (event.key === 'ArrowUp' && row.previousElementSibling) {
        container.insertBefore(row, row.previousElementSibling);
      } else if (event.key === 'ArrowDown' && row.nextElementSibling) {
        container.insertBefore(row.nextElementSibling, row);
      }
      renumber();
      handle.focus();
    });
  }

  // ---------- Pesan merah di bawah kolom (menggantikan gelembung bawaan browser) ----------
  // Kolom dengan data-error-target memakai <p id="..."> yang sudah ada di halaman;
  // kolom lain mendapat <p class="field-error"> di dalam [data-error-anchor] terdekat.
  function clearFieldError(field) {
    if (field.dataset.errorTarget) {
      const slot = document.getElementById(field.dataset.errorTarget);
      if (slot) {
        slot.textContent = '';
        slot.classList.add('hidden');
      }
      return;
    }
    field.closest('[data-error-anchor]')?.querySelectorAll('.field-error').forEach(el => el.remove());
  }

  function showFieldError(field, message) {
    clearFieldError(field);
    if (field.dataset.errorTarget) {
      const slot = document.getElementById(field.dataset.errorTarget);
      if (slot) {
        slot.textContent = message;
        slot.classList.remove('hidden');
      }
      return;
    }
    const p = document.createElement('p');
    p.className = 'field-error text-[12px] font-medium text-red-500 mt-1.5';
    p.textContent = message;
    field.closest('[data-error-anchor]')?.appendChild(p);
  }

  // Dipanggil oleh openSaveModal(): true jika semua terisi; jika tidak, tampilkan pesan merah
  // dan arahkan ke kolom pertama yang salah.
  window.validateReflectionForm = function (form) {
    let firstInvalid = null;
    const mark = (field, message) => {
      showFieldError(field, message);
      firstInvalid = firstInvalid || field;
    };

    const story = form.querySelector('select[name="story_id"]');
    if (story) {
      clearFieldError(story);
      if (!story.value) {
        mark(story, story.options.length <= 1
          ? 'Semua cerita sudah punya pertanyaan refleksi. Ubah lewat tombol Edit di Refleksi Management.'
          : 'Pilih cerita terlebih dahulu.');
      }
    }

    container.querySelectorAll('.reflection-item').forEach(row => {
      const text = row.querySelector('[data-field="text"]');
      const answer = row.querySelector('[data-field="answer"]');
      clearFieldError(text);
      clearFieldError(answer);
      if (!text.value.trim()) mark(text, 'Pertanyaan wajib diisi.');
      if (!answer.value) mark(answer, 'Pilih jawaban benar: Iya atau Tidak.');
    });

    if (firstInvalid) {
      firstInvalid.scrollIntoView({ block: 'center', behavior: 'smooth' });
      firstInvalid.focus({ preventScroll: true });
      return false;
    }
    return true;
  };

  // Pesan hilang begitu kolomnya diisi.
  const form = container ? container.closest('form') : null;
  if (form) {
    const clearIfFilled = (event) => {
      const field = event.target;
      if (field.matches('select, textarea') && field.value.trim() !== '') {
        clearFieldError(field);
      }
    };
    form.addEventListener('input', clearIfFilled);
    form.addEventListener('change', clearIfFilled);
  }

  renumber();
})();
