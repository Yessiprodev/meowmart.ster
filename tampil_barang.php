<?php
//-----------------Cek Login ------------------//
session_start();
if (empty($_SESSION['username'])) {
    header("location: index.php");
    exit;
}
//---------------------------------------------//

require 'config/koneksi.php';
$barang = query("SELECT * FROM barang");

// kolom pencarian terisi
if (isset($_POST["cari"])) {
    $barang = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
     <?php include 'sound.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Gudang</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #3dac90;
            --secondary-color: #2ed691;
            --accent-color: #06bed8;
        }
        
        body {
            background: linear-gradient(135deg, #f7d695ff 0%, #e9ecef 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .header-container {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            color: white;
            padding: 2rem 0;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .header-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(255,255,255,0.3) 0%,
                rgba(255,255,255,0) 60%
            );
            transform: rotate(30deg);
            animation: shine 8s infinite linear;
        }
        
        @keyframes shine {
            0% { transform: rotate(30deg) translate(-30%, -30%); }
            100% { transform: rotate(30deg) translate(30%, 30%); }
        }
        
        .page-title {
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .btn-grad {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color), var(--accent-color));
            background-size: 300% 300%;
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 50px;
            padding: 12px 30px;
            margin: 0 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn-grad::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--accent-color), var(--secondary-color), var(--primary-color));
            background-size: 300% 300%;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
            border-radius: 50px;
        }
        
        .btn-grad:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        
        .btn-grad:hover::before {
            opacity: 1;
            animation: gradientBG 3s ease infinite;
        }
        
        .btn-grad:active {
            transform: translateY(1px);
        }
        
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .action-buttons .btn {
            transition: all 0.2s ease;
        }
        
        .action-buttons .btn:hover {
            transform: scale(1.1);
        }
        
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: none;
            overflow: hidden;
        }
        
        .card-header {
            background: white;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            font-weight: 600;
        }
        
        .search-box {
            max-width: 600px;
            margin: 0 auto 30px;
        }
        
        .search-box .form-control {
            border-radius: 50px;
            padding: 12px 20px;
            border: 1px solid rgba(0,0,0,0.1);
        }
        
        .search-box .btn {
            border-radius: 0 50px 50px 0;
        }
        
        .img-thumbnail {
            max-width: 80px;
            height: auto;
            border-radius: 10px !important;
            transition: transform 0.3s ease;
        }
        
        .img-thumbnail:hover {
            transform: scale(1.1);
        }
        
        .button-container {
            margin: 2rem 0;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
        }
    </style>
</head>

<body>
    <!-- Header Interaktif -->
    <div class="header-container text-center animate__animated animate__fadeIn">
        <div class="container">
            <h1 class="page-title animate__animated animate__fadeInDown">DAFTAR BARANG</h1>
        </div>
    </div>
    
    <div class="container">
        <!-- Button Container -->
        <div class="button-container animate__animated animate__fadeIn animate__delay-1s">
            <a href="form_barang.php" class="btn-grad" style="background: linear-gradient(45deg, #fffa6bff, #e2be48ff);">
                <i class="fas fa-plus-circle"></i> Tambah Barang
            </a>
            <a href="menu.php" class="btn-grad">
                <i class="fas fa-home"></i> Menu Utama
            </a>
            <a href="logout.php" class="btn-grad" style="background: linear-gradient(45deg, #ff6b6b, #ff8e8e);">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
        
        <!-- Search Box -->
        <div class="search-box animate__animated animate__fadeIn animate__delay-2s">
            <form action="" method="post" class="input-group">
                <input type="text" class="form-control" name="keyword" placeholder="Cari barang..." autocomplete="off" id="keyword">
                <button class="btn btn-primary" type="submit" name="cari">
                    <i class="fas fa-search"></i> Cari
                </button>
            </form>
        </div>
        
        <!-- Tabel Barang -->
        <div class="card animate__animated animate__fadeIn animate__delay-2s">
            <div class="card-header">
                <i class="fas fa-boxes"></i> Daftar Inventori Barang
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="barangTable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Barang</th>
                                <th>Brand</th>
                                <th>Kategori</th>
                                <th width="8%">Stok</th>
                                <th width="12%">Harga</th>
                                <th width="10%">Gambar</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($barang as $row): ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td><?= htmlspecialchars($row["namabrg"]) ?></td>
                                <td><?= htmlspecialchars($row["brand"]) ?></td>
                                <td>
                                    <span class="badge bg-primary"><?= htmlspecialchars($row["kategori"]) ?></span>
                                </td>
                                <td class="text-center">
                                    <span class="badge <?= $row["jumlah"] < 5 ? 'bg-danger' : 'bg-success' ?>">
                                        <?= $row["jumlah"] ?>
                                    </span>
                                </td>
                                <td class="text-end">Rp <?= number_format($row["harga"], 0, ',', '.') ?></td>
                                <td class="text-center">
                                    <?php if(!empty($row["gambar"])): ?>
                                        <img src="gambar/<?= $row["gambar"] ?>" class="img-thumbnail">
                                    <?php else: ?>
                                        <span class="text-muted">No Image</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center action-buttons">
                                    <a href="edit_barang.php?id=<?= $row["idbarang"] ?>" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="hapus_barang.php?id=<?= $row["idbarang"] ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus barang ini?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <button class="btn btn-sm btn-info btn-detail" title="Detail" data-id="<?= $row["idbarang"] ?>">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="fas fa-info-circle"></i> Detail Barang</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="detailContent">
                    <!-- Konten detail akan dimuat di sini -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            $('#barangTable').DataTable({
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                },
                dom: '<"top"f>rt<"bottom"lip><"clear">',
                initComplete: function() {
                    $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Cari...');
                }
            });
            
            // Animasi tombol gradasi
            setInterval(function() {
                $('.btn-grad').each(function() {
                    var bgPos = $(this).css('background-position').split(' ')[0];
                    var newPos = (parseInt(bgPos) + 1) % 300;
                    $(this).css('background-position', newPos + '% 50%');
                });
            }, 50);
            
            // Tombol detail
            $('.btn-detail').click(function() {
                var id = $(this).data('id');
                
                // AJAX untuk mengambil detail barang
                $.ajax({
                    url: 'get_detail_barang.php',
                    type: 'GET',
                    data: {id: id},
                    success: function(response) {
                        $('#detailContent').html(response);
                        $('#detailModal').modal('show');
                    },
                    error: function() {
                        alert('Gagal memuat detail barang');
                    }
                });
            });
            
            // Live search (jika ingin menggunakan AJAX)
            $('#keyword').keyup(function() {
                var keyword = $(this).val();
                
                if(keyword.length > 2) {
                    $.ajax({
                        url: 'ajax_search.php',
                        type: 'POST',
                        data: {keyword: keyword},
                        success: function(data) {
                            $('#barangTable tbody').html(data);
                        }
                    });
                } else if(keyword.length == 0) {
                    location.reload();
                }
            });
        });
    </script>
</body>
</html>