@props(['id'])
{{-- Popup after the Misi page is saved: a dark backdrop, a card with the twitching star
     and the "Misi Selesai!" label, then the slot (title, text and button).
     Used by Halaman Misi (stars gained / +0) and Rekap Cerita ("Bintang Sudah Penuh"). --}}
<style>
  /* Animasi Kedut (Twitch / Heartbeat) untuk Bintang */
  @keyframes heartbeat {
    0% { transform: scale(1); }
    14% { transform: scale(1.15); }
    28% { transform: scale(1); }
    42% { transform: scale(1.15); }
    70% { transform: scale(1); }
    100% { transform: scale(1); }
  }
  .animasi-kedut {
    animation: heartbeat 2s infinite ease-in-out;
  }

  /* Animasi Popup Muncul (Pop In) */
  @keyframes popIn {
    0% { opacity: 0; transform: scale(0.9); }
    100% { opacity: 1; transform: scale(1); }
  }
  .popup-muncul {
    animation: popIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
  }
</style>

<div id="{{ $id }}" {{ $attributes->merge(['class' => 'fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm px-4 flex items-center justify-center']) }}>
  <div class="bg-white rounded-[2rem] px-6 py-8 w-full max-w-[320px] flex flex-col items-center text-center shadow-2xl popup-muncul">

    <div class="relative flex flex-col items-center justify-center mb-6 mt-2">
      <div class="relative w-32 h-32 flex items-center justify-center">
        <div class="absolute w-28 h-28 bg-yellow-100/80 rounded-full blur-[2px]"></div>

        <svg class="absolute w-32 h-32 text-orange-400 drop-shadow-sm" viewBox="0 0 100 100">
          <line x1="50" y1="6" x2="50" y2="14" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
          <line x1="50" y1="94" x2="50" y2="86" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
          <line x1="6" y1="50" x2="14" y2="50" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
          <line x1="94" y1="50" x2="86" y2="50" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
          <line x1="81" y1="19" x2="75" y2="25" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
          <line x1="19" y1="19" x2="25" y2="25" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
          <line x1="81" y1="81" x2="75" y2="75" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
          <line x1="19" y1="81" x2="25" y2="75" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[72px] h-[72px] text-yellow-400 drop-shadow-md animasi-kedut z-10">
          <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
        </svg>
      </div>

      <div class="bg-yellow-50 text-orange-400 font-extrabold text-[11px] px-3.5 py-1.5 rounded-full flex items-center gap-1 z-20 border border-yellow-100 shadow-sm -mt-3">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5">
          <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
        </svg>
        Misi Selesai!
      </div>
    </div>

    {{ $slot }}
  </div>
</div>
