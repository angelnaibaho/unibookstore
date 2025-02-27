<?php
include('config.php');

// Ambil data buku dan penerbit
$query = mysqli_query($koneksi, "SELECT * FROM buku INNER JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit");
$query_penerbit = mysqli_query($koneksi, "SELECT * FROM penerbit");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Manajemen Buku</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php include('navbar.php'); ?>

    <!-- Judul -->
    <div class="page-header text-center" style="margin-top: 90px;">
      <h2 class="fw-bold">List Buku</h2>
    </div>
    <div class="container">
        <div class="text-center">
            <p>Berikut Tampilan Buku Yang Tersedia</p>
        </div>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahBukuModal">Tambah Buku</button>

        <!-- Tambah Buku -->
        <div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="add.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">ID Buku</label>
                                <input type="text" class="form-control" name="id_buku" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <input type="text" class="form-control" name="kategori" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Buku</label>
                                <input type="text" class="form-control" name="nama_buku" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" class="form-control" name="harga" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stok</label>
                                <input type="number" class="form-control" name="stok" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Penerbit</label>
                                <select class="form-control" name="id_penerbit" required>
                                    <?php while ($penerbit = mysqli_fetch_array($query_penerbit)) { ?>
                                        <option value="<?= $penerbit['id_penerbit']; ?>">
                                            <?= $penerbit['nama_penerbit']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Buku -->
        <table class="table table-striped table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Nama Buku</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Penerbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?= $data['id_buku'] ?></td>
                    <td><?= $data['kategori'] ?></td>
                    <td><?= $data['nama_buku'] ?></td>
                    <td>Rp <?= number_format($data['harga'], 0, ',', '.') ?></td>
                    <td><?= $data['stok'] ?></td>
                    <td><?= $data['nama_penerbit'] ?></td>
                    <td>
                        <button class="btn btn-success btn-edit" data-bs-toggle="modal" data-bs-target="#editModal"
                            data-id="<?= $data['id_buku']; ?>"
                            data-kategori="<?= $data['kategori']; ?>"
                            data-nama="<?= $data['nama_buku']; ?>"
                            data-harga="<?= $data['harga']; ?>"
                            data-stok="<?= $data['stok']; ?>"
                            data-penerbit="<?= $data['id_penerbit']; ?>">
                            Edit
                        </button>
                        <a href="delete.php?id=<?= $data['id_buku']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                            Delete
                        </a>
                    </td>
                </tr>
                <?php } mysqli_close($koneksi); ?>
            </tbody>
        </table>
    </div>

    <!-- Edit Buku -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="update.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" id="edit_id_buku" name="id_buku">
                        <div class="mb-3">
                            <label>Kategori:</label>
                            <input type="text" class="form-control" id="edit_kategori" name="kategori" required>
                        </div>
                        <div class="mb-3">
                            <label>Nama Buku:</label>
                            <input type="text" class="form-control" id="edit_nama_buku" name="nama_buku" required>
                        </div>
                        <div class="mb-3">
                            <label>Harga:</label>
                            <input type="number" class="form-control" id="edit_harga" name="harga" required>
                        </div>
                        <div class="mb-3">
                            <label>Stok:</label>
                            <input type="number" class="form-control" id="edit_stok" name="stok" required>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('.btn-edit').click(function () {
            $('#edit_id_buku').val($(this).data('id'));
            $('#edit_kategori').val($(this).data('kategori'));
            $('#edit_nama_buku').val($(this).data('nama'));
            $('#edit_harga').val($(this).data('harga'));
            $('#edit_stok').val($(this).data('stok'));
        });
    </script>
</body>
</html>
