<?php
// ----------- Cek Login ----------- //
session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Menu Utama</title>
<head>

  <style>
    body {
      background-color: #f7d695ff;
      font-family: 'Comic Sans MS', cursive;
      margin: 0;
      padding: 0;
      text-align: center;
    }

    .animated-title {
      font-size: 60px;
      font-weight: bold;
      color: #ff6600;
      text-shadow: 2px 2px #4e3820ff;
      display: inline-block;
      animation: moveText 4s ease-in-out infinite alternate;
      margin-top: 10px;
    }

    @keyframes moveText {
      0% {
        transform: translateX(-20%);
      }
      100% {
        transform: translateX(20%);
      }
    }
  </style>
</head>
<body>
 <?php include 'sound.php'; ?>


  <!-- Teks Bergerak -->
 <!-- 🧡 Animated Menu Utama 🧡 -->
<div class="animated-title">🧡 M E N U &nbsp; U T A M A 🧡</div>

<style>
  .animated-title {
    font-size: 3rem;
    font-weight: bold;
    font-family: 'Comic Sans MS', cursive, sans-serif;
    text-align: center;
    margin-top: 10px;
    animation: wave 2s infinite ease-in-out;
    background: linear-gradient(90deg, #f39c12, #e74c3c, #9b59b6, #1abc9c, #f39c12);
    background-size: 400%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  @keyframes wave {
    0%, 100% {
      transform: translateY(0px) rotate(0deg);
    }
    25% {
      transform: translateY(-5px) rotate(-1deg);
    }
    50% {
      transform: translateY(5px) rotate(1deg);
    }
    75% {
      transform: translateY(-3px) rotate(-1deg);
    }
  }
</style>

</body>
</html>


        <?php
            echo "<h3>Login Sebagai : " . $_SESSION['username'] . "</h3>";
        ?>

        <!-- Lottie animation -->
        <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js" type="module"></script>
        <dotlottie-wc
            src="https://lottie.host/c8f644ec-1784-4f15-899f-c39e493d5c77/Y0OXdQ7Tyx.lottie"
            style="width: 300px; height: 300px; margin-left: 480px; margin-bottom: 10px"
            speed="1"
            autoplay
            loop>
        </dotlottie-wc>

   <!-- 🌈 Background Container dengan Gradasi Bergerak -->
<div class="menu-container">
  <div class="menu-buttons">
    <form method="POST" action="form_barang.php">
      <button class="btn btn-orange">➕ Tambah Barang</button>
    </form>

    <form method="POST" action="tampil_barang.php">
      <button class="btn btn-blue">📦 Tampil Barang</button>
    </form>

    <form method="POST" action="logout.php">
      <button class="btn btn-red">🚪 Logout</button>
    </form>
  </div>
</div>

<!-- 🎨 CSS Styling -->
<style>
/* 🌄 Container dengan background gradasi dinamis */
.menu-container {
  padding: 10px 20px;
  background: linear-gradient(270deg, #f9ffb5, #ffd6ff, #c2f0fc, #ffd6cc);
  background-size: 800% 800%;
  animation: bgGradient 15s ease infinite;
  border-radius: 20px;
  margin: 40px auto;
  margin-top: 10px;
  max-width: 800px;
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
}

/* 🎞️ Animasi gradasi latar */
@keyframes bgGradient {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

/* 📦 Tombol container */
.menu-buttons {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
}

/* 🎯 Style tombol umum */
.btn {
  padding: 14px 28px;
  font-size: 16px;
  font-weight: bold;
  border-radius: 14px;
  border:#c2f0fc;
  cursor: pointer;
  color: white;
  background-size: 200% auto;
  transition: all 0.4s ease-in-out;
  box-shadow: 0 4px 15px rgba(0,0,0,0.2);
  animation: btnGradient 6s ease infinite;
}

/* 💫 Animasi gradasi tombol */
@keyframes btnGradient {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

/* 🎨 Warna tombol berbeda */
.btn-orange {
  background-image: linear-gradient(-45deg, #ffb347, #ffcc33, #c5b093ff);
}
.btn-blue {
  background-image: linear-gradient(-45deg, #00c6ff, #0072ff, #b9e4f0ff);
}
.btn-red
    {      
  width: 200px;
  background-image: linear-gradient(45deg, #f85032, #e73827, #ff6f61);
  background-size: 300% 300%;
  animation: btnGradient 8s ease infinite;
}

/* 🌟 Hover */
.btn:hover {
  transform: scale(1.05);
  box-shadow: 0 0 5px rgba(255, 255, 255, 0.4);
}

/* 🖱️ Saat diklik */
.btn:active {
  transform: scale(0.95);
  filter: brightness(1.1);
  box-shadow: inset 0 0 5px rgba(255, 255, 255, 0.3);
}
</style>

</body>

</html>
