{{-- Progress lines on a Belajar Bersama story card, for the selected child.
     $p = ['reflections_done', 'reflections_total', 'missions_done', 'missions_total', 'last_read' (Carbon|null)] --}}
<div class="mb-4 space-y-1.5">
  <div class="flex items-center justify-between text-[11px]">
    <span class="flex items-center gap-1 text-slate-500 font-medium">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-3 h-3 {{ $p['reflections_done'] > 0 ? 'text-[#10B981]' : 'text-slate-300' }}"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg> Refleksi
    </span>
    @if ($p['reflections_total'] === 0)
      <span class="text-slate-500 font-bold bg-slate-100 px-1.5 py-0.5 rounded">Belum ada</span>
    @elseif ($p['reflections_done'] > 0)
      <span class="text-[#10B981] font-bold bg-emerald-50 px-1.5 py-0.5 rounded">{{ $p['reflections_done'] }}/{{ $p['reflections_total'] }} Selesai</span>
    @else
      <span class="text-slate-500 font-bold bg-slate-100 px-1.5 py-0.5 rounded">0/{{ $p['reflections_total'] }} Mulai</span>
    @endif
  </div>
  <div class="flex items-center justify-between text-[11px]">
    <span class="flex items-center gap-1 text-slate-500 font-medium">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 {{ $p['missions_done'] > 0 ? 'text-yellow-500' : 'text-slate-300' }}"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" /></svg> Misi
    </span>
    @if ($p['missions_total'] === 0)
      <span class="text-slate-500 font-bold bg-slate-100 px-1.5 py-0.5 rounded">Belum ada</span>
    @elseif ($p['missions_done'] > 0)
      <span class="text-yellow-600 font-bold bg-yellow-50 px-1.5 py-0.5 rounded">{{ $p['missions_done'] }}/{{ $p['missions_total'] }} Selesai</span>
    @else
      <span class="text-slate-500 font-bold bg-slate-100 px-1.5 py-0.5 rounded">0/{{ $p['missions_total'] }} Mulai</span>
    @endif
  </div>
  <p class="text-[9px] md:text-[10px] text-slate-400 mt-2 border-t border-gray-50 pt-2">
    {{ $p['last_read'] ? 'Terakhir dibaca: ' . $p['last_read']->locale('id')->diffForHumans() : 'Belum pernah dibaca' }}
  </p>
</div>
