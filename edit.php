<?php
include('config.php');

// Pastikan ID tersedia
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
    $data = mysqli_fetch_assoc($query);

    if (!$data) {
        echo "Buku tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak tersedia!";
    exit;
}

// Ambil data penerbit untuk dropdown
$query_penerbit = mysqli_query($koneksi, "SELECT * FROM penerbit");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Buku</h2>

        <form action="update.php" method="POST">
            <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']; ?>">

            <div class="mb-3">
                <label>Kategori:</label>
                <input type="text" class="form-control" name="kategori" value="<?php echo $data['kategori']; ?>" required>
            </div>

            <div class="mb-3">
                <label>Nama Buku:</label>
                <input type="text" class="form-control" name="nama_buku" value="<?php echo $data['nama_buku']; ?>" required>
            </div>

            <div class="mb-3">
                <label>Harga:</label>
                <input type="number" class="form-control" name="harga" value="<?php echo $data['harga']; ?>" required>
            </div>

            <div class="mb-3">
                <label>Stok:</label>
                <input type="number" class="form-control" name="stok" value="<?php echo $data['stok']; ?>" required>
            </div>

            <div class="mb-3">
                <label>Penerbit:</label>
                <select class="form-control" name="id_penerbit" required>
                    <?php while ($penerbit = mysqli_fetch_array($query_penerbit)) { ?>
                        <option value="<?php echo $penerbit['id_penerbit']; ?>" 
                            <?php if ($data['id_penerbit'] == $penerbit['id_penerbit']) echo "selected"; ?>>
                            <?php echo $penerbit['nama_penerbit']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
