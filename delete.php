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

  // Menghapus data mahasiswa berdasarkan id
  $query = "DELETE FROM asramaConfirmed WHERE conMahaId = $id";
  mysqli_query($conn, $query);

  // Redirect kembali ke halaman adminPage.php
  header('Location: admin.php');
  exit();
} else {
  // Jika parameter id tidak ada, redirect kembali ke halaman adminPage.php
  header('Location: admin.php');
  exit();
}
?>
