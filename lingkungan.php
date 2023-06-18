<!DOCTYPE html>
<html>
<head>
  <title>Lingkungan - Sistem Informasi Asrama</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
  <style>
    .carousel-item {
      text-align: center;
    }
    .carousel-item img {
      max-height: 400px;
      object-fit: cover;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <?php include 'navbar.php';?>

  <div class="container mt-4">
    <h2>Lingkungan</h2>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image1.jpg" class="d-block w-100" alt="Image 1">
          <div class="carousel-caption">
            <h5>Fasilitas 1</h5>
            <p>Deskripsi singkat tentang fasilitas 1.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="image2.jpg" class="d-block w-100" alt="Image 2">
          <div class="carousel-caption">
            <h5>Fasilitas 2</h5>
            <p>Deskripsi singkat tentang fasilitas 2.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="image3.jpg" class="d-block w-100" alt="Image 3">
          <div class="carousel-caption">
            <h5>Fasilitas 3</h5>
            <p>Deskripsi singkat tentang fasilitas 3.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div class="mt-4">
      <h4>Detail Fasilitas Kamar:</h4>
      <ul>
        <li>Fasilitas 1</li>
        <li>Fasilitas 2</li>
        <li>Fasilitas 3</li>
      </ul>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
