// Validasi form profil anak (Tambah Anak & Edit Anak).
// Menampilkan pesan merah di bawah setiap field, menggantikan bubble bawaan browser.
// Pesan di sini sama dengan pesan validasi di ChildController (server).
(function () {
  const MAX_PHOTO_BYTES = 2 * 1024 * 1024;
  const PHOTO_TYPES = ['image/jpeg', 'image/png', 'image/webp'];
  const FIELDS = ['photo', 'name', 'birth_date', 'gender']; // urutan sesuai tampilan di halaman

  const MESSAGES = {
    name: 'Nama anak wajib diisi.',
    birthDateRequired: 'Tanggal lahir wajib diisi.',
    birthDateFuture: 'Tanggal lahir tidak boleh melewati hari ini.',
    gender: 'Pilih jenis kelamin anak.',
    photoType: 'Foto harus berformat JPG, PNG, atau WEBP.',
    photoSize: 'Ukuran foto maksimal 2 MB.',
  };

  function todayString() {
    const d = new Date();
    const pad = (n) => String(n).padStart(2, '0');
    return `${d.getFullYear()}-${pad(d.getMonth() + 1)}-${pad(d.getDate())}`;
  }

  function fieldsOf(form) {
    return {
      name: form.querySelector('[name="name"]'),
      birth_date: form.querySelector('[name="birth_date"]'),
      gender: Array.from(form.querySelectorAll('[name="gender"]')),
      // Input foto berada di luar <form> dan terhubung lewat atribut form="..."
      photo: document.querySelector(`input[type="file"][form="${form.id}"]`),
    };
  }

  // Mengembalikan pesan error, atau '' jika field valid.
  function check(field, f) {
    switch (field) {
      case 'name':
        return f.name.value.trim() === '' ? MESSAGES.name : '';
      case 'birth_date':
        if (f.birth_date.value === '') return MESSAGES.birthDateRequired;
        return f.birth_date.value > todayString() ? MESSAGES.birthDateFuture : '';
      case 'gender':
        return f.gender.some((radio) => radio.checked) ? '' : MESSAGES.gender;
      case 'photo': {
        const file = f.photo && f.photo.files[0];
        if (!file) return '';
        if (!PHOTO_TYPES.includes(file.type)) return MESSAGES.photoType;
        return file.size > MAX_PHOTO_BYTES ? MESSAGES.photoSize : '';
      }
    }
    return '';
  }

  // Elemen yang diberi warna merah saat field bermasalah.
  function highlightTargets(field, f) {
    if (field === 'name' || field === 'birth_date') return [f[field]];
    if (field === 'gender') return f.gender.map((radio) => radio.nextElementSibling);
    return [];
  }

  function setError(field, f, message) {
    const errorText = document.getElementById('err-' + field);
    if (errorText) {
      errorText.textContent = message;
      errorText.classList.toggle('hidden', !message);
    }
    highlightTargets(field, f).forEach((el) => {
      el.classList.toggle('border-gray-200', !message);
      el.classList.toggle('bg-white', !message);
      el.classList.toggle('border-red-200', !!message);
      el.classList.toggle('bg-red-50', !!message);
    });
  }

  // Dipanggil sebelum membuka popup konfirmasi simpan. Mengembalikan true jika semua valid.
  window.validateChildForm = function (form) {
    const f = fieldsOf(form);
    let firstInvalid = null;

    FIELDS.forEach((field) => {
      const message = check(field, f);
      setError(field, f, message);
      if (message && !firstInvalid) firstInvalid = field;
    });

    if (firstInvalid) {
      const errorText = document.getElementById('err-' + firstInvalid);
      const scrollTarget = firstInvalid === 'name' || firstInvalid === 'birth_date' ? f[firstInvalid] : errorText;
      scrollTarget.scrollIntoView({ behavior: 'smooth', block: 'center' });
      if (firstInvalid === 'name' || firstInvalid === 'birth_date') f[firstInvalid].focus({ preventScroll: true });
    }

    return firstInvalid === null;
  };

  function init(form) {
    const f = fieldsOf(form);

    // Error dari server (setelah submit): beri warna merah juga pada field-nya.
    FIELDS.forEach((field) => {
      const errorText = document.getElementById('err-' + field);
      if (errorText && !errorText.classList.contains('hidden')) setError(field, f, errorText.textContent.trim());
    });

    // Pesan hilang begitu field sudah diperbaiki.
    const clearWhenValid = (field) => () => {
      if (check(field, f) === '') setError(field, f, '');
    };
    f.name.addEventListener('input', clearWhenValid('name'));
    f.birth_date.addEventListener('input', clearWhenValid('birth_date'));
    f.birth_date.addEventListener('change', clearWhenValid('birth_date'));
    f.gender.forEach((radio) => radio.addEventListener('change', clearWhenValid('gender')));

    // Foto langsung dicek saat dipilih, karena file yang salah tidak terlihat dari luar.
    if (f.photo) f.photo.addEventListener('change', () => setError('photo', f, check('photo', f)));
  }

  function initAll() {
    ['formTambahAnak', 'formEditAnak'].forEach((id) => {
      const form = document.getElementById(id);
      if (form) init(form);
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAll);
  } else {
    initAll();
  }
})();
