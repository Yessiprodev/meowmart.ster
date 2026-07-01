<?php
//---
session_start();
if (empty($_SESSION['username'])) {
    header("location: index.php");
    exit;
}
//---
include "config/koneksi.php";

$id = $_GET["id"];
if (hapus($id) > 0) {
    echo '
    <script>
        alert("Data berhasil dihapus!");
        document.location.href = "tampil_barang.php";
    </script>
    ';
} else {
    echo '
    <script>
        alert("Data gagal dihapus!");
        document.location.href = "tampil_barang.php";
    </script>
    ';
}
?>