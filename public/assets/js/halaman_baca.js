    const urlParams = new URLSearchParams(window.location.search);
    const idCerita = urlParams.get('cerita');

    const daftarJudul = {
      'kedis-puuh': 'I Alu Teken I Kedis Puuh',
      'lutung-kekua': 'I Lutung teken I Kekua',
      'lelipi-selem': 'Lelipi Selem Bukit',
      'lutung-pecalang': 'I Lutung Dadi Pecalang'
    };

    if (idCerita && daftarJudul[idCerita]) {
      const judulElemen = document.querySelector('main > div:first-child a');
      if (judulElemen) {
        judulElemen.innerHTML = `
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
          ${daftarJudul[idCerita]}
        `;
      }
    }

    const storyData = [
      {
        adegan: "Adegan 1: Goa Yang Asri",
        bali: '"Goa nike dadi umah I Kedis Puuh. Ia demen pesan idup ditu krana liu ada tetamanan ane bungan ne sedeng mekar, tur udara disediabesik sangat sejuk lan nyaman."',
        indo: '"Gua itu menjadi rumah bagi I Kedis Puuh. Ia sangat senang tinggal di sana karena ada banyak tanaman dan bunga yang sedang bermekaran dengan indah."',
        eng: '"The cave is the home of I Kedis Puuh. She loves living there because there are many plants and flowers blooming beautifully all around."',
        image: "",
        audioBali: "",
        audioIndo: "", 
        audioEng: "" 
      },
      {
        adegan: "Adegan 2: I Alu yang Kelaparan",
        bali: '"Sedek dina anu, teka lantas I Alu mererod ngalih amah. I Alu matolihan tur nepukin goa ane asri pesan ento."',
        indo: '"Suatu hari, datanglah I Alu merayap mencari makan. I Alu menoleh dan melihat gua yang sangat asri tersebut."',
        eng: '"One day, I Alu came crawling looking for food. I Alu looked around and saw the very beautiful cave."',
        image: "",
        audioBali: "",
        audioIndo: "",
        audioEng: ""
      },
      {
        adegan: "Adegan 3: Niat Licik I Alu",
        bali: '"I Alu ngelah keneh corah lakar ngrebut goane ento. Ia ngenehang kenken carane apang I Kedis Puuh magedi uli ditu."',
        indo: '"I Alu memiliki niat licik untuk merebut gua itu. Ia memikirkan bagaimana caranya agar I Kedis Puuh pergi dari sana."',
        eng: '"I Alu had a cunning intention to take over the cave. He thought about how to make I Kedis Puuh leave the place."',
        image: "",
        audioBali: "",
        audioIndo: "",
        audioEng: ""
      },
      {
        adegan: "Adegan 4: Pertemuan Pertama",
        bali: '"I Alu ngeraos ngaku-ngaku goane ento warisan uli kumpi-kumpine, tur ngorahin I Kedis Puuh apang enggal makisid."',
        indo: '"I Alu berbicara mengaku-ngaku bahwa gua itu adalah warisan dari leluhurnya, lalu menyuruh I Kedis Puuh agar segera pindah."',
        eng: '"I Alu spoke, claiming that the cave was an inheritance from his ancestors, and told I Kedis Puuh to move away immediately."',
        image: "",
        audioBali: "",
        audioIndo: "",
        audioEng: ""
      },
      {
        adegan: "Adegan 5: I Kedis Puuh Bingung",
        bali: '"I Kedis Puuh tengkejut tur bingung, krana ia suba makelo idup ditu. Nanging ia tusing nyerah keto dogen."',
        indo: '"I Kedis Puuh terkejut dan bingung, karena ia sudah lama tinggal di sana. Namun, ia tidak menyerah begitu saja."',
        eng: '"I Kedis Puuh was surprised and confused, because she had lived there for a long time. However, she didn\'t give up just like that."',
        image: "",
        audioBali: "",
        audioIndo: "",
        audioEng: ""
      },
      {
        adegan: "Adegan 6: Meminta Bantuan",
        bali: '"I Kedis Puuh makeber ngalih timpal-timpalne, ngidih tulung apang ngidaang ngusir I Alu uli goane."',
        indo: '"I Kedis Puuh terbang menemui teman-temannya, meminta bantuan agar bisa mengusir I Alu dari gua tersebut."',
        eng: '"I Kedis Puuh flew to meet her friends, asking for help to drive I Alu away from the cave."',
        image: "",
        audioBali: "",
        audioIndo: "",
        audioEng: ""
      },
      {
        adegan: "Adegan 7: Rencana Cerdik",
        bali: '"Makasami kedise lantas masikep, nyiapang rencana cerdik. Ditu lantas kedise pada makumpul di duur goane."',
        indo: '"Semua burung kemudian bersatu, menyiapkan rencana cerdik. Mereka pun berkumpul di atas gua tersebut."',
        eng: '"All the birds then united, preparing a clever plan. They gathered on top of the cave."',
        image: "",
        audioBali: "",
        audioIndo: "",
        audioEng: ""
      },
      {
        adegan: "Adegan 8: Menakuti I Alu",
        bali: '"Kedise masuryak bareng-bareng makada suara mageluran. I Alu tengkejut ngadenang ada musuh gede teka."',
        indo: '"Burung-burung bersorak bersamaan membuat suara yang menggelegar. I Alu terkejut mengira ada musuh besar datang."',
        eng: '"The birds chirped together making a roaring sound. I Alu was surprised thinking a huge enemy was coming."',
        image: "",
        audioBali: "",
        audioIndo: "",
        audioEng: ""
      },
      {
        adegan: "Adegan 9: I Alu Lari Ketakutan",
        bali: '"Kala ento, I Alu jejeh tur malaib patipurug ninggalin goane, tusing bani buin teka mai."',
        indo: '"Saat itu juga, I Alu ketakutan dan lari terbirit-birit meninggalkan gua, tidak berani datang lagi."',
        eng: '"At that moment, I Alu was terrified and ran away leaving the cave, not daring to come back."',
        image: "",
        audioBali: "",
        audioIndo: "",
        audioEng: ""
      },
      {
        adegan: "Adegan 10: Hidup Damai Kembali",
        bali: '"Pamuputne, I Kedis Puuh lega pesan. Ia muah timpal-timpalne nyidaang buin idup damai di goa ane asri ento."',
        indo: '"Akhirnya, I Kedis Puuh sangat lega. Ia dan teman-temannya bisa kembali hidup damai di gua yang asri itu."',
        eng: '"Finally, I Kedis Puuh felt very relieved. She and her friends could live peacefully again in the beautiful cave."',
        image: "",
        audioBali: "",
        audioIndo: "",
        audioEng: ""
      }
    ];

    let currentPage = 0;
    let currentAudioObj = null; 
    let currentActiveLang = null;

    function formatTime(seconds) {
      if (isNaN(seconds)) return "0:00";
      const m = Math.floor(seconds / 60);
      const s = Math.floor(seconds % 60);
      return `${m}:${s < 10 ? '0' : ''}${s}`;
    }

    function resetAudioUI(lang) {
      document.getElementById(`icon-play-${lang}`).classList.remove('hidden');
      document.getElementById(`icon-pause-${lang}`).classList.add('hidden');
      document.getElementById(`progress-bar-${lang}`).style.width = '0%';
      document.getElementById(`time-${lang}`).innerText = "0:00 / 0:00";
    }

    function stopSemuaAudio() {
      if (currentAudioObj) {
        currentAudioObj.pause();
        currentAudioObj.currentTime = 0;
      }
      currentAudioObj = null;
      currentActiveLang = null;
      ['bali', 'indo', 'eng'].forEach(resetAudioUI);
    }

    function seekAudio(e, lang) {
      if (currentActiveLang === lang && currentAudioObj && currentAudioObj.duration) {
        const rect = e.currentTarget.getBoundingClientRect();
        const clickX = e.clientX - rect.left;
        const width = rect.width;
        
        let newTime = (clickX / width) * currentAudioObj.duration;
        newTime = Math.max(0, Math.min(newTime, currentAudioObj.duration));
        
        currentAudioObj.currentTime = newTime;
        
        const progressPercent = (newTime / currentAudioObj.duration) * 100;
        document.getElementById(`progress-bar-${lang}`).style.width = `${progressPercent}%`;
        document.getElementById(`time-${lang}`).innerText = `${formatTime(newTime)} / ${formatTime(currentAudioObj.duration)}`;
      }
    }

    function toggleAudio(lang) {
      const data = storyData[currentPage];
      let audioPath = "";

      if (lang === 'bali') audioPath = data.audioBali;
      else if (lang === 'indo') audioPath = data.audioIndo;
      else if (lang === 'eng') audioPath = data.audioEng;

      if (!audioPath || audioPath === "") {
        alert("File audio belum diunggah untuk halaman ini.");
        return;
      }

      if (currentActiveLang === lang && currentAudioObj && !currentAudioObj.paused) {
        currentAudioObj.pause();
        document.getElementById(`icon-play-${lang}`).classList.remove('hidden');
        document.getElementById(`icon-pause-${lang}`).classList.add('hidden');
        return;
      }

      if (currentActiveLang === lang && currentAudioObj && currentAudioObj.paused) {
        currentAudioObj.play();
        document.getElementById(`icon-play-${lang}`).classList.add('hidden');
        document.getElementById(`icon-pause-${lang}`).classList.remove('hidden');
        return;
      }

      stopSemuaAudio();
      
      currentAudioObj = new Audio(audioPath);
      currentActiveLang = lang;

      currentAudioObj.addEventListener('loadedmetadata', () => {
        document.getElementById(`time-${lang}`).innerText = `0:00 / ${formatTime(currentAudioObj.duration)}`;
      });

      currentAudioObj.addEventListener('timeupdate', () => {
        const progressPercent = (currentAudioObj.currentTime / currentAudioObj.duration) * 100;
        document.getElementById(`progress-bar-${lang}`).style.width = `${progressPercent}%`;
        document.getElementById(`time-${lang}`).innerText = `${formatTime(currentAudioObj.currentTime)} / ${formatTime(currentAudioObj.duration)}`;
      });

      currentAudioObj.addEventListener('ended', () => {
        resetAudioUI(lang);
        currentAudioObj = null;
        currentActiveLang = null;
      });

      currentAudioObj.play().catch(e => console.log("Gagal memutar audio:", e));
      document.getElementById(`icon-play-${lang}`).classList.add('hidden');
      document.getElementById(`icon-pause-${lang}`).classList.remove('hidden');
    }

    function updatePage() {
      stopSemuaAudio();

      const currentData = storyData[currentPage];

      document.getElementById('scene-label').innerHTML = `<div class="w-2 h-2 bg-[#10B981] rounded-full"></div> ${currentData.adegan}`;
      document.getElementById('text-bali').innerText = currentData.bali;
      document.getElementById('text-indo').innerText = currentData.indo;
      document.getElementById('text-eng').innerText = currentData.eng;
      
      const illustrationContainer = document.getElementById('illustration-container');
      const defaultSvg = document.getElementById('default-svg');
      
      if(currentData.image && currentData.image !== "") {
        illustrationContainer.style.backgroundImage = `url('${currentData.image}')`;
        defaultSvg.style.display = 'none';
      } else {
        illustrationContainer.style.backgroundImage = 'none';
        defaultSvg.style.display = 'block';
      }

      document.getElementById('page-indicator-text').innerText = `${currentPage + 1}/${storyData.length}`;

      const dotsContainer = document.getElementById('dots-container');
      dotsContainer.innerHTML = ''; 
      for (let i = 0; i < storyData.length; i++) {
        if (i === currentPage) {
          dotsContainer.innerHTML += `<div class="w-6 h-2 bg-[#10B981] rounded-full transition-all duration-300"></div>`;
        } else {
          dotsContainer.innerHTML += `<div class="w-2 h-2 bg-gray-200 rounded-full transition-all duration-300"></div>`;
        }
      }

      const btnPrev = document.getElementById('btn-prev');
      if (currentPage === 0) {
        btnPrev.disabled = true;
        btnPrev.className = "bg-emerald-50/50 border border-emerald-50 text-emerald-400 font-extrabold py-3.5 rounded-2xl flex items-center justify-center gap-2 text-sm cursor-not-allowed";
      } else {
        btnPrev.disabled = false;
        btnPrev.className = "bg-white border border-gray-200 text-[#1F2937] font-extrabold py-3.5 rounded-2xl flex items-center justify-center gap-2 text-sm shadow-sm hover:bg-gray-50 transition cursor-pointer";
      }

      const btnNext = document.getElementById('btn-next');
      if (currentPage === storyData.length - 1) {
        btnNext.innerHTML = `Lanjut Refleksi <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>`;
      } else {
        btnNext.innerHTML = `Selanjutnya <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>`;
      }
    }

    function goNext() {
      if (currentPage < storyData.length - 1) {
        currentPage++;
        updatePage();
      } else {
        window.location.href = "/halaman-refleksi";
      }
    }

    function goPrev() {
      if (currentPage > 0) {
        currentPage--;
        updatePage();
      }
    }

    updatePage();