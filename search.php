<?php
include 'config.php';

if (isset($_POST['query'])) {
    $search = mysqli_real_escape_string($koneksi, $_POST['query']);

    $sql = "SELECT * FROM buku 
            INNER JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit 
            WHERE nama_buku LIKE '%$search%' 
            ORDER BY nama_buku ASC";

    $query = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($query) > 0) {
        while ($data = mysqli_fetch_assoc($query)) {
            echo '
            <div class="content-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4 text-center" style="min-height: 300px">
                    <img class="img-fluid rounded mb-3" src="<?= $thumbnail; ?>" style="width: 100px; height: 150px; object-fit: cover;">
                    <h6 class="fw-bold mb-2">' . $data['nama_buku'] . '</h6>
                    <p class="text-primary fw-bold">Rp ' . number_format($data['harga'], 0, ',', '.') . '</p>
                </div>
            </div>';
        }
    } else {
        echo '<p class="text-center text-danger">Buku tidak ditemukan</p>';
    }
}
?>
