<?php
// Koneksi ke database
include('config.php');

// Pesan kamar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Mendapatkan data dari form
  $nama = $_POST['nama'];
  $nim = $_POST['nim'];
  $jurusan = $_POST['jurusan'];
  $noTelp = $_POST['noTelp'];
  $tanggalMasuk = $_POST['tanggalMasuk'];
  $tanggalKeluar = $_POST['tanggalKeluar'];
  $email = $_POST['email'];

  // Query untuk memasukkan data ke tabel asrama
  $query = "INSERT INTO asrama (nameMahasiswa, nim, jurusan, noTelp, tanggalMasuk, tanggalKeluar, email) VALUES ('$nama', '$nim', '$jurusan', '$noTelp', '$tanggalMasuk', '$tanggalKeluar', '$email')";
  mysqli_query($conn, $query);
  // Redirect ke halaman utama
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Pesan Kamar - Sistem Informasi Asrama</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
</head>

<body>
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>

  <div class="container mt-4">
    <h2>Pesan Kamar</h2>
    <form method="POST">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Mahasiswa</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" required>
      </div>
      <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <input type="text" class="form-control" id="jurusan" name="jurusan" required>
      </div>
      <div class="mb-3">
        <label for="noTelp" class="form-label">No. Telepon</label>
        <input type="text" class="form-control" id="noTelp" name="noTelp" required>
      </div>
      <div class="mb-3">
        <label for="tanggalMasuk" class="form-label">Tanggal Masuk</label>
        <input type="date" class="form-control" id="tanggalMasuk" name="tanggalMasuk" required>
      </div>
      <div class="mb-3">
        <label for="tanggalKeluar" class="form-label">Tanggal Keluar</label>
        <input type="date" class="form-control" id="tanggalKeluar" name="tanggalKeluar" required>
      </div>
      <button type="submit" class="btn btn-primary">Pesan Kamar</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>