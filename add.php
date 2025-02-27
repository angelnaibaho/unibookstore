<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_buku = $_POST['id_buku'];
    $kategori = $_POST['kategori'];
    $nama_buku = $_POST['nama_buku'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $id_penerbit = $_POST['id_penerbit'];

    // Cek apakah semua input diisi
    if (!empty($id_buku) && !empty($kategori) && !empty($nama_buku) && !empty($harga) && !empty($stok) && !empty($id_penerbit)) {
        // Query untuk menambahkan buku
        $query_insert = "INSERT INTO buku (id_buku, kategori, nama_buku, harga, stok, id_penerbit) 
                         VALUES ('$id_buku', '$kategori', '$nama_buku', '$harga', '$stok', '$id_penerbit')";

        if (mysqli_query($koneksi, $query_insert)) {
            echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Semua field harus diisi!'); window.history.back();</script>";
    }
}
?>