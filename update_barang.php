<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Utama</title>
</head>
<body>
     <?php include 'sound.php'; ?>
</body>
</html>
<?php
//---
session_start();
if (empty($_SESSION['username'])) {
    header("location: index.php");
    exit;
}
//---
include "config/koneksi.php";

$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file = $_FILES['fupload']['name'];

// Apabila Gambar Tidak Diganti
if (empty($lokasi_file)) {
    mysqli_query($konek, "UPDATE barang SET 
        namabrg = '".mysqli_real_escape_string($konek, $_POST['barang'])."',
        brand = '".mysqli_real_escape_string($konek, $_POST['brand'])."',
        kategori = '".mysqli_real_escape_string($konek, $_POST['kategori'])."',
        jumlah = '".mysqli_real_escape_string($konek, $_POST['jumlah'])."',
        harga = '".mysqli_real_escape_string($konek, $_POST['harga'])."'
        WHERE idbarang = '".mysqli_real_escape_string($konek, $_POST['id'])."'");
} 
// Apabila Gambar Diganti
else {
    // Validasi ekstensi file
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $file_extension = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
    
    if (in_array($file_extension, $allowed_extensions)) {
        move_uploaded_file($lokasi_file, "gambar/".$nama_file);
        
        mysqli_query($konek, "UPDATE barang SET 
            namabrg = '".mysqli_real_escape_string($konek, $_POST['barang'])."',
            brand = '".mysqli_real_escape_string($konek, $_POST['brand'])."',
            kategori = '".mysqli_real_escape_string($konek, $_POST['kategori'])."',
            jumlah = '".mysqli_real_escape_string($konek, $_POST['jumlah'])."',
            harga = '".mysqli_real_escape_string($konek, $_POST['harga'])."',
            gambar = '".mysqli_real_escape_string($konek, $nama_file)."'
            WHERE idbarang = '".mysqli_real_escape_string($konek, $_POST['id'])."'");
    } else {
        $_SESSION['error'] = "Ekstensi file tidak diizinkan. Hanya JPG, JPEG, PNG, dan GIF yang diperbolehkan.";
        header("location: edit_barang.php?id=".$_POST['id']);
        exit;
    }
}

header('location: tampil_barang.php');
exit;
?>