<?php
// ---------- Cek Login ----------
session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php");
}
  include 'sound.php';
  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>:: BARANG ::</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Comic Sans MS', cursive, sans-serif;
      background: linear-gradient(to bottom right, #f7d695ff);
      color: #4e2d15;
    }

    h1 {
      margin-top: 5px;
      color: #d35400;
      text-shadow: 5px 5px #fbeec1;
    }

    .glass {
      background: rgba(163, 136, 72, 0.45);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
      padding: 10px;
      max-width: 600px;
      width: 90%;
      margin: 0px auto;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 10px;
    }

    td {
      font-size: 16px;
      padding: 5px;
      vertical-align: middle;
    }

    input[type="text"],
    select,
    input[type="file"] {
      padding: 8px 12px;
      width: 100%;
      border: 1px solid #f37e0aff;
      border-radius: 10px;
      outline: none;
      font-size: 14px;
      transition: box-shadow 0.2s;
    }

    input[type="text"]:focus,
    select:focus,
    input[type="file"]:focus {
      box-shadow: 0 0 8px #ffa94d;
    }

   /* ✨ Tombol Simpan dengan gradasi berputar */
#simpan {
  background: linear-gradient(270deg, #ffb347, #ffcc33, #ff9a9e, #fad0c4);
  background-size: 800% 800%;
  animation: simpanAnim 10s ease infinite;

  border: none;
  color: #fff;
  padding: 12px 26px;
  border-radius: 12px;
  font-size: 17px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.4s ease;
  box-shadow: 0 4px 12px rgba(255, 153, 0, 0.3);
}

#simpan:hover {
  background: linear-gradient(270deg, #ffedbc, #ff9a9e);
  background-size: 400% 400%;
  animation: simpanAnimHover 4s ease infinite;
  transform: scale(1.08);
  box-shadow: 0 0 15px rgba(255, 204, 0, 0.6);
}

/* ✨ Tombol Umum */
button {
  background: linear-gradient(270deg, #ff9966, #ff5e62, #ffc371);
  background-size: 600% 600%;
  animation: tombolPutar 12s ease infinite;

  color: white;
  border: none;
  padding: 10px 24px;
  margin: 8px 4px;
  border-radius: 14px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 10px rgba(255, 94, 98, 0.3);
}

button:hover {
  background: linear-gradient(270deg, #ffe29f, #ffa69e, #ff5e62);
  background-size: 400% 400%;
  animation: tombolPutarHover 5s ease infinite;
  transform: scale(1.07);
  box-shadow: 0 0 12px rgba(255, 94, 98, 0.5);
}

/* 🔁 Animasi */
@keyframes tombolPutar {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

@keyframes tombolPutarHover {
  0% { background-position: 0% 50%; }
  100% { background-position: 100% 50%; }
}

@keyframes simpanAnim {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

@keyframes simpanAnimHover {
  0% { background-position: 0% 50%; }
  100% { background-position: 100% 50%; }
}

    /* Responsiveness */
    @media (max-width: 600px) {
      .glass {
        padding: 20px;
      }

      td {
        display: block;
        width: 100%;
        padding: 6px 0;
      }

      td:first-child {
        font-weight: bold;
      }
    }
  </style>
</head>

<body>
  <center>
    <h1>INPUT DATA BARANG</h1>
    <h5>Login Sebagai: <?= $_SESSION['username']; ?></h5>

    <!-- 🐱 Lottie Kucing -->
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js" type="module"></script>
    <dotlottie-wc
      src="https://lottie.host/588953bc-17ec-4675-9772-e49cd6468364/jxapXLquOa.lottie"
      style="width: 300px;height: 300px"
      speed="1"
      autoplay
      loop>
    </dotlottie-wc>
  </center>

  <div class="glass">
    <form method="POST" action="input_barang.php" enctype="multipart/form-data">
      <table>
        <tr>
          <td>Nama Barang</td>
          <td><input type="text" name="barang"></td>
        </tr>
        <tr>
          <td>Brand</td>
          <td><input type="text" name="brand"></td>
        </tr>
        <tr>
          <td>Kategori</td>
          <td>
            <select name="kategori">
              <option value="0">- Pilih Kategori -</option>
              <?php
              include "config/koneksi.php";
              $tampil = mysqli_query($konek, "SELECT * FROM kategori ORDER BY nama_kategori");
              while ($r = mysqli_fetch_array($tampil)) {
                echo "<option value='$r[nama_kategori]'>$r[nama_kategori]</option>";
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Jumlah</td>
          <td><input type="text" name="jumlah"></td>
        </tr>
        <tr>
          <td>Harga</td>
          <td><input type="text" name="harga"></td>
        </tr>
        <tr>
          <td>Gambar</td>
          <td><input type="file" name="fupload"></td>
        </tr>
        <tr>
          <td colspan="2" align="right">
            <input id="simpan" type="submit" name="submit" value="Simpan">
          </td>
        </tr>
      </table>
    </form>

    <div style="text-align: center; margin-top: 20px;">
      <form method="POST" action="menu.php" style="display: inline;">
        <button>🏠 Menu Utama</button>
      </form>
      <form method="POST" action="tampil_barang.php" style="display: inline;">
        <button>📦 Tampil Barang</button>
      </form>
    </div>
  </div>
</body>
</html>
