<?php
include('config.php');

// Ambil data buku dengan stok paling sedikit
$query = mysqli_query($koneksi, "SELECT nama_buku, nama_penerbit, stok FROM buku 
    INNER JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit 
    ORDER BY stok ASC LIMIT 10"); // Ambil 10 buku dengan stok paling sedikit

// Ambil buku dengan stok terendah (saran pembelian)
$saran_query = mysqli_query($koneksi, "SELECT nama_buku, nama_penerbit, stok FROM buku 
    INNER JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit 
    ORDER BY stok ASC LIMIT 1"); // Ambil 1 buku dengan stok terendah
$saran = mysqli_fetch_assoc($saran_query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Laporan Pengadaan Buku</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include('navbar.php'); ?>

    <!-- Judul -->
    <div class="page-header text-center" style="margin-top: 90px;">
      <h2 class="fw-bold">Laporan Kebutuhan Buku</h2>
    </div>
    <div class="container">
        <div class="col-md-10 mx-auto">
            <p class="text-center text-muted">Berikut adalah daftar buku yang perlu segera dibeli karena stok hampir habis.</p>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Judul Buku</th>
                            <th>Penerbit</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td><?php echo $data['nama_buku'] ?></td>
                            <td><?php echo $data['nama_penerbit'] ?></td>
                            <td class="fw-bold text-danger"><?php echo $data['stok'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- Bagian Saran Pembelian -->
            <div class="mt-4 p-4 border rounded bg-light">
                <h5 class="fw-bold">📢 Saran untuk segera membeli buku:</h5>
                <p class="fs-5">
                    📖 <strong><?php echo $saran['nama_buku']; ?></strong> oleh <em><?php echo $saran['nama_penerbit']; ?></em>
                </p>
                <p class="text-danger fw-bold">Stok tersisa: <?php echo $saran['stok']; ?></p>
                <p>Disarankan untuk segera melakukan pemesanan.</p>
            </div>

        </div>
    </div>
</body>
</html>
