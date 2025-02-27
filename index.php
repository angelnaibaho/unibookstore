<?php

include 'config.php';

$sql = "SELECT * FROM buku INNER JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit";
$query = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Unibookstore</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  </head>

  <body>
    <!-- Navigator -->
    <?php include('navbar.php'); ?>

    <!-- Judul -->
    <div class="page-header text-center" style="margin-top: 90px">
      <h2 class="fw-bold">Pilih Buku</h2>
    </div>

    <!-- Content -->
    <div class="container">
      <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
        <p class="">Kumpulan Buku Yang Tersedia</p>
      </div>
      <div class="owl-carousel content-carousel" id="bookList">
        <?php while ($data = mysqli_fetch_array($query)) { ?>
        <div class="content-item bg-light rounded p-3">
          <div class="bg-white border rounded p-4 text-center" style="min-height: 300px">
            <?php
            // Ambil data buku
            $judulBuku = urlencode($data['nama_buku']);

            // Gunakan Open Library API jika ISBN tersedia
            if (!empty($isbn)) {
                $thumbnail = "https://covers.openlibrary.org/b/isbn/{$isbn}-M.jpg";
            } else {
                // Jika tidak ada ISBN, cari gambar di Google Books API
                $googleBooksApi = "https://www.googleapis.com/books/v1/volumes?q=" . $judulBuku;
                $response = file_get_contents($googleBooksApi);
                $result = json_decode($response, true);

                $thumbnail = isset($result['items'][0]['volumeInfo']['imageLinks']['thumbnail'])
                    ? $result['items'][0]['volumeInfo']['imageLinks']['thumbnail']
                    : 'img/default.jpg'; // Gambar default jika tidak ada di API
            }
            ?>

            <div class="d-flex justify-content-center">
              <img class="img-fluid rounded mb-3" src="<?= $thumbnail; ?>" style="width: 100px; height: 150px; object-fit: cover" />
            </div>

            <!-- Nama Buku -->
            <h6 class="fw-bold mb-2"><?php echo $data['nama_buku']; ?></h6>

            <!-- Harga Buku -->
            <p class="text-primary fw-bold">
              Rp
              <?php echo number_format($data['harga'], 0, ',', '.'); ?>
            </p>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
      $(document).ready(function () {
        $(".content-carousel").owlCarousel({
          loop: true,
          margin: 20,
          nav: true,
          dots: true,
          autoplay: true,
          autoplayTimeout: 3000,
          responsive: {
            0: { items: 1 },
            576: { items: 2 },
            768: { items: 3 },
          },
        });
      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>
