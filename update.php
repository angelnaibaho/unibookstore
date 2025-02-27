<?php
include('config.php');

$id = $_POST['id_buku'];
$kategori = $_POST['kategori'];
$nama = $_POST['nama_buku'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$penerbit = $_POST['id_penerbit'];

$sql = "UPDATE buku SET kategori='$kategori', nama_buku='$nama', harga='$harga', stok='$stok', id_penerbit='$penerbit' WHERE id_buku='$id'";
mysqli_query($koneksi, $sql);
header("Location: admin.php");
?>
