<!DOCTYPE html>
<html>
<head>
  <title>Kamar - Sistem Informasi Asrama</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
  <style>
    .big-image {
      max-width: 100%;
      height: auto;
    }

    .small-image {
      max-width: 100%;
      height: auto;
    }

    .facility-list {
      list-style-type: disc;
      margin-left: 20px;
    }

    .badge {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <?php include 'navbar.php';?>

  <div class="container mt-4">
    <div class="row">
      <div class="col-lg-8">
        <img src="path/to/big-image.jpg" class="big-image" alt="Big Image">
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="col-sm-6">
            <img src="path/to/small-image1.jpg" class="small-image" alt="Small Image 1">
          </div>
          <div class="col-sm-6">
            <img src="path/to/small-image2.jpg" class="small-image" alt="Small Image 2">
          </div>
          <div class="col-sm-6">
            <img src="path/to/small-image3.jpg" class="small-image" alt="Small Image 3">
          </div>
        </div>
      </div>
    </div>

    <div class="mt-4">
      <h3>Detail Fasilitas Kamar</h3>
      <ul class="facility-list">
        <li>Fasilitas 1</li>
        <li>Fasilitas 2</li>
        <li>Fasilitas 3</li>
        <!-- Tambahkan fasilitas kamar lainnya sesuai kebutuhan -->
      </ul>
    </div>

    <div class="mt-4">
      <h4>Jumlah Kamar Tersedia:</h4>
      <?php
      // Koneksi ke database
      include('config.php');

      // Query untuk mengambil jumlah kamar dari admin page
      $query = "SELECT jumlahKamar FROM kamarAsrama";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $jumlahKamar = $row['jumlahKamar'];

        echo '<h3><span class="badge bg-primary">' . $jumlahKamar . ' kamar</span></h3>';
      } else {
        echo '<span class="badge bg-primary">Data tidak ditemukan</span>';
      }
      ?>
    </div>

    <div class="mt-4">
      <h4>Harga Kamar:</h4>
      <p>Rp 1.000.000,- per bulan</p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
