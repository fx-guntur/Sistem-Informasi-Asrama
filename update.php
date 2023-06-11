<?php
// Koneksi ke database
include('config.php');

// Cek apakah user telah login
session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: login.php');
  exit();
}

// Mengecek apakah parameter id ada
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Mengambil data mahasiswa berdasarkan id
  $query = "SELECT * FROM asrama WHERE mahasiswaId = $id";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);

  // Mengecek apakah data mahasiswa ditemukan
  if (!$row) {
    // Jika data tidak ditemukan, redirect kembali ke halaman admin.php
    header('Location: admin.php');
    exit();
  }
} else {
  // Jika parameter id tidak ada, redirect kembali ke halaman admin.php
  header('Location: admin.php');
  exit();
}

// Mengupdate data mahasiswa
if (isset($_POST['update'])) {
  $namaMahasiswa = $_POST['namaMahasiswa'];
  $nim = $_POST['nim'];
  $jurusan = $_POST['jurusan'];
  $noTelp = $_POST['noTelp'];
  $tanggalMasuk = $_POST['tanggalMasuk'];
  $tanggalKeluar = $_POST['tanggalKeluar'];

  $query = "UPDATE asrama SET nameMahasiswa = '$namaMahasiswa', nim = '$nim', jurusan = '$jurusan', noTelp = '$noTelp', tanggalMasuk = '$tanggalMasuk', tanggalKeluar = '$tanggalKeluar' WHERE mahasiswaId = $id";
  mysqli_query($conn, $query);

  // Redirect kembali ke halaman admin.php setelah berhasil update
  header('Location: admin.php');
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Mahasiswa - Sistem Informasi Asrama</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">Sistem Informasi Asrama</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Homepage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?logout=true">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <h2>Update Data Mahasiswa</h2>
    <form method="POST">
      <div class="mb-3">
        <label for="namaMahasiswa" class="form-label">Nama Mahasiswa</label>
        <input type="text" class="form-control" id="namaMahasiswa" name="namaMahasiswa" value="<?php echo $row['nameMahasiswa']; ?>">
      </div>
      <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $row['nim']; ?>">
      </div>
      <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $row['jurusan']; ?>">
      </div>
      <div class="mb-3">
        <label for="noTelp" class="form-label">No. Telepon</label>
        <input type="text" class="form-control" id="noTelp" name="noTelp" value="<?php echo $row['noTelp']; ?>">
      </div>
      <div class="mb-3">
        <label for="tanggalMasuk" class="form-label">Tanggal Masuk</label>
        <input type="date" class="form-control" id="tanggalMasuk" name="tanggalMasuk" value="<?php echo $row['tanggalMasuk']; ?>">
      </div>
      <div class="mb-3">
        <label for="tanggalKeluar" class="form-label">Tanggal Keluar</label>
        <input type="date" class="form-control" id="tanggalKeluar" name="tanggalKeluar" value="<?php echo $row['tanggalKeluar']; ?>">
      </div>
      <button type="submit" class="btn btn-primary" name="update">Update</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
