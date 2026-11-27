{{-- One reflection question row in Tambah/Edit Refleksi (D-36).
     $index: position in the form (names questions[$index][...]; "__INDEX__" in the JS template)
     $number: number shown; $question: ['id' => ?int, 'text' => string, 'answer' => '1'|'0'|null] --}}
<div class="reflection-item px-6 py-5 border-b border-slate-100 flex items-start gap-4 hover:bg-slate-50/50 transition last:border-0 rounded-b-[12px]">
  <div class="flex items-center gap-3 mt-3 w-8 shrink-0">
    {{-- Pegangan geser: tarik (mouse/sentuh) atau fokus + panah atas/bawah untuk mengubah urutan (reflection_form.js) --}}
    <span data-drag-handle role="button" tabindex="0" aria-label="Geser untuk mengubah urutan pertanyaan" title="Geser untuk mengubah urutan" class="cursor-grab active:cursor-grabbing select-none text-slate-300 hover:text-[#10B981] focus:outline-none focus:text-[#10B981] transition" style="touch-action: none">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5zM8.25 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM8.25 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM8.25 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" /></svg>
    </span>
    <span class="reflection-number text-[16px] font-extrabold text-[#0F172A]">{{ $number }}</span>
  </div>

  <input type="hidden" data-field="id" name="questions[{{ $index }}][id]" value="{{ $question['id'] }}">

  {{-- data-error-anchor: tempat pesan merah di bawah kolom (reflection_form.js) --}}
  <div class="flex-1 flex flex-col sm:flex-row gap-3">
    <div class="flex-1 flex flex-col" data-error-anchor>
      <textarea data-field="text" name="questions[{{ $index }}][text]" rows="2" maxlength="500" placeholder="Masukkan pertanyaan refleksi..." class="w-full bg-[#F8FAFC] border border-slate-200 rounded-[12px] px-4 py-3 text-[13.5px] font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] resize-y min-h-[60px]" required>{{ $question['text'] }}</textarea>
    </div>

    <div class="w-40 shrink-0" data-error-anchor>
      <label class="block text-[11px] font-bold text-slate-500 mb-1">Jawaban Benar <span class="text-red-500">*</span></label>
      <select data-field="answer" name="questions[{{ $index }}][answer]" class="w-full bg-slate-50 border border-slate-200 rounded-[12px] px-3 py-2.5 text-[13px] font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#10B981]/20 focus:border-[#10B981] cursor-pointer" required>
        <option value="" disabled @selected($question['answer'] === null)>Pilih...</option>
        <option value="1" @selected($question['answer'] === '1')>Iya</option>
        <option value="0" @selected($question['answer'] === '0')>Tidak</option>
      </select>
    </div>
  </div>

  <button type="button" onclick="removeReflection(this)" class="mt-3 w-10 h-10 flex items-center justify-center text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-[10px] transition shrink-0" title="Hapus Pertanyaan">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
  </button>
</div>
