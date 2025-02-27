<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="image/logo.jpg" alt="Logo" width="50" height="50" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Menu Home & Admin -->
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pengadaan.php">Pengadaan</a>
        </li>
      </ul>

      <!-- Search Bar di Tengah -->
      <!-- Search Bar di Tengah -->
<form class="d-flex mx-auto" role="search" id="searchForm">
    <input class="form-control me-2" type="text" id="searchBox" placeholder="Cari Buku..." aria-label="Search" autocomplete="off" />
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>


      <!-- Menu Pengadaan di Sebelah Kanan -->
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="image/profile.jpeg" alt="Profile" class="rounded-circle" width="35" height="35" />
            <!-- Gambar profil -->
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="#">Admin</a></li>
            <li><a class="dropdown-item" href="#">User</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
