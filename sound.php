<!-- 🔊 Audio latar -->
<audio id="bg-audio" autoplay loop>
  <source src="Chai Kichi x Spaul Ha Hee (Singing Cat) KIFFNESS style.mp3" type="audio/mpeg">
  Browser kamu tidak mendukung audio.
</audio>

<!-- 🔘 Kontrol ON/OFF -->
<div id="controls">
  <button onclick="toggleAudio()">🔊 / 🔇</button>
</div>

<!-- 🎯 Posisi tombol ON/OFF di kanan atas -->
<style>
  #controls {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #fff0dc;
    padding: 8px 12px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    z-index: 9999;
  }

  #controls button {
    background-color: #ffd18c;
    border: none;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
  }

  #controls button:hover {
    background-color: #ffc061;
  }
</style>

<!-- 🔁 Script toggle audio -->
<script>
  const audio = document.getElementById("bg-audio");
  function toggleAudio() {
    if (audio.paused) {
      audio.play();
    } else {
      audio.pause();
    }
  }
</script>
