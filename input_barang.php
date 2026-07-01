<?php
//----------- Cek Login -----------//
session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php");
}
include "config/koneksi.php";
?>
<html>
<head>
        <style>
    body {
    margin: 0;
    padding: 0;
    font-family: var(--body-font);
    color: var(--first-color);
    background-color: #f7d695ff;
    ;
}
</style>
    <title>:: Menu Utama ::</title>
    <link rel="stylesheet" href="assets/css/ibarang.css">
  
</head>
<body>
<?php include 'sound.php'; ?>

<center>
<script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js" type="module"></script>
<dotlottie-wc
  src="https://lottie.host/867d0e61-7db8-42b9-bae3-b0ea518d3db3/ziiD0lJPf9.lottie"
  style="width: 300px;height: 300px"
  speed="1"
  autoplay
  loop
></dotlottie-wc>
</center>

<?php
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file = $_FILES['fupload']['name'];

if (!empty($lokasi_file)) {
    move_uploaded_file($lokasi_file, "gambar/$nama_file");
    $a = mysqli_query($konek, "INSERT INTO barang (namabrg, brand, kategori, jumlah, harga, gambar)
        VALUES (
            '{$_POST['barang']}',
            '{$_POST['brand']}',
            '{$_POST['kategori']}',
            '{$_POST['jumlah']}',
            '{$_POST['harga']}',
            '$nama_file')");
?>
    <script>
        alert('Data berhasil disimpan!');
        window.location = "form_barang.php";
    </script>
<?php
} else {
?>
    <h1 align=center>Maaf, Data yang Anda masukkan tidak lengkap,<br>Silakan kembali.</h1>
    <br><br>
    <center>
        <form method="POST" action="form_barang.php" style="display:inline;">
            <button class="gradient-btn">🔙 Kembali</button>
        </form>
        <form method="POST" action="logout.php" style="display:inline;">
            <button class="gradient-btn">🚪 Logout</button>
        </form>
    </center>
<?php
}
?>
</body>
</html>
