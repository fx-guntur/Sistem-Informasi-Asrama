<?php
// Koneksi ke database
include('config.php');

// Fungsi untuk konfirmasi dan menghapus data
if (isset($_GET['id'])) {
  $mahasiswaID = $_GET['id'];

  // Ambil data mahasiswa dari tabel asrama
  $query = "SELECT * FROM asrama WHERE mahasiswaID = '$mahasiswaID'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);

  // Insert data ke tabel asramaConfirmed
  $nama = $row['nameMahasiswa'];
  $nim = $row['nim'];
  $email = $row['email'];
  $jurusan = $row['jurusan'];
  $noTelp = $row['noTelp'];
  $tanggalMasuk = $row['tanggalMasuk'];
  $tanggalKeluar = $row['tanggalKeluar'];
  $kamar = $row['kamar'];

  $queryInsert = "INSERT INTO asramaConfirmed (conNamaMaha, conNim, conEmail, conJurusan, conNoTelp, contglmasuk, contglkeluar, conKamar)
                  VALUES ('$nama', '$nim', '$email', '$jurusan', '$noTelp', '$tanggalMasuk', '$tanggalKeluar', '$kamar')";
  mysqli_query($conn, $queryInsert);

  // Hapus data dari tabel asrama
  $queryDelete = "DELETE FROM asrama WHERE mahasiswaID = '$mahasiswaID'";
  mysqli_query($conn, $queryDelete);

  // Redirect ke halaman admin setelah konfirmasi dan penghapusan berhasil
  header('Location: admin.php');
  exit();
}
?>
