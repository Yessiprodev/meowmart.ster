<?php
//---
session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php");
}
//---
include "config/koneksi.php";

$edit = mysqli_query($konek, "SELECT * FROM barang WHERE idbarang='$_GET[id]'");
$row = mysqli_fetch_array($edit);
?>
<html>
<head>
    <title>:: BARANG ::</title>
    <link rel="stylesheet" href="assets/css/ebarang.css">
</head>
<body>
       <?php include 'sound.php'; ?>
<center>
    <h2 align="center">Edit Barang</h2>
    <?php
    echo "<h5>Login Sebagai : ";
    echo $_SESSION['username'];
    echo "</h5>";
    ?>
    
    <div class="glass">
        <form method="POST" enctype="multipart/form-data" name="update" action="update_barang.php">
            <input type="hidden" name="id" value="<?php echo $row['idbarang']; ?>">
            <table align="center" border="0" id="table1">
                <tr>
                    <td valign="top">Nama Barang</td>
                    <td>
                        <input type="text" name="barang" size="30" value="<?php echo $row['namabrg']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="kategori">
                            <?php
                            $tampil = mysqli_query($konek, "SELECT * FROM kategori ORDER BY nama_kategori");
                            while($c = mysqli_fetch_array($tampil)) {
                                if ($row['kategori'] == $c['nama_kategori']) {
                                    echo "<option value='".$c['nama_kategori']."' selected>".$c['nama_kategori']."</option>";
                                } else {
                                    echo "<option value='".$c['nama_kategori']."'>".$c['nama_kategori']."</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td><input type="text" name="jumlah" size="15" value="<?php echo $row['jumlah']; ?>"></td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>Brand</td>
                    <td><input type="text" name="brand" size="15" value="<?php echo $row['brand']; ?>"></td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="harga" size="15" value="<?php echo $row['harga']; ?>"></td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>Gambar</td>
                    <td><img src="gambar/<?php echo $row['gambar']; ?>" width="200" height="200"></td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>Ganti Gambar</td>
                    <td><input type="file" name="fupload"></td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td colspan="2">*Jika tidak ingin mengubah gambar silahkan abaikan saja</td>
                </tr>
                <tr>
                    <td colspan="2"><input id="update" type="submit" value="Perbarui"></td>
                </tr>
            </table>
        </form>
        
        <br><br>
        <table>
            <tr>
                <td>
                    <form method="POST" action="menu.php">
                        <button>Menu Utama</button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="tampil_barang.php">
                        <button>Tampil Barang</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</center>
</body>
</html>