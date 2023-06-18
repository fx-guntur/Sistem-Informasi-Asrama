<?php 
 // Koneksi ke database
include('config.php');

$query = "SELECT jumlahKamar FROM kamarAsrama";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$jumlahKamarTersedia = $row['jumlahKamar'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sistem Informasi Asrama</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
</head>
<body>
  <!-- Navbar -->
  <?php include 'navbar.php';?>

  <div class="container mt-4">
    <!-- Informasi Asrama -->
    <div class="row">
      <div class="col-md-6">
        <h2>Deskripsi Singkat Asrama</h2>
        <p>Deskripsi singkat tentang asrama.</p>
        <a class="btn btn-primary" href="pesankamar.php">Pesan Kamar</a>
      </div>
      <div class="col-md-6">
        <!-- Carousel Foto Asrama -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="path/to/image1.jpg" class="d-block w-100" alt="Gambar Asrama 1">
            </div>
            <div class="carousel-item">
              <img src="path/to/image2.jpg" class="d-block w-100" alt="Gambar Asrama 2">
            </div>
            <!-- Tambahkan carousel-item sesuai dengan jumlah gambar asrama -->
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>

    <!-- Tabel Data Mahasiswa yang Telah Menempati Asrama -->
    <div class="mt-4">
      <h4>Data Mahasiswa yang Telah Menempati Asrama</h4>

     <!-- Form Pencarian -->
     <form method="GET" action="">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari berdasarkan Nama/NIM/Jurusan" name="keyword">
          <button class="btn btn-outline-secondary" type="submit">Cari</button>
          <?php if(isset($_GET['keyword'])) { ?>
            <a class="btn btn-outline-secondary" href="?">Hapus Pencarian</a>
          <?php } ?>
        </div>
      </form>

      <?php
      // Koneksi ke database
      include('config.php');

      // Mendapatkan keyword pencarian dari form
      $keyword = $_GET['keyword'] ?? '';

      // Query untuk mencari data mahasiswa berdasarkan keyword
      $query = "SELECT * FROM asramaConfirmed WHERE 
                conNamaMaha LIKE '%$keyword%' OR 
                conNim LIKE '%$keyword%' OR 
                conJurusan LIKE '%$keyword%'";
      $result = mysqli_query($conn, $query);

      // Menampilkan hasil pencarian
      if (mysqli_num_rows($result) > 0) {
        ?>
        <table class="table table-bordered">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama Mahasiswa</th>
          <th>NIM</th>
          <th>Email</th>
          <th>Jurusan</th>
          <th>No. Telepon</th>
          <th>Tanggal Masuk</th>
          <th>Tanggal Keluar</th>
          <th>Kamar</th>
        </tr>
      </thead>
      <tbody>
        <!-- Looping untuk menampilkan -->
        <?php $no = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['conNamaMaha']; ?></td>
            <td><?php echo $row['conNim']; ?></td>
            <td><?php echo $row['conEmail']; ?></td>
            <td><?php echo $row['conJurusan']; ?></td>
            <td><?php echo $row['conNoTelp']; ?></td>
            <td><?php echo $row['contglmasuk']; ?></td>
            <td><?php echo $row['contglkeluar']; ?></td>
            <td><?php echo $row['conKamar']; ?></td>
          </tr>
          <?php $no++; ?>
        <?php endwhile; ?>
      </tbody>
    </table>
        <?php
      } else {
        echo "Data tidak ditemukan.";
      }
      ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
