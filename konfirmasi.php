<?php
session_start();
// Koneksi ke database
include('config.php');

$id_acc = $_SESSION['id'];

// Ambil data mahasiswa dari tabel asrama
$query = "SELECT * FROM request WHERE id_acc = '$id_acc'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Insert data ke tabel asramaConfirmed
$id_acc = $row['id_acc'];
$id_kamar = $row['id_kamar'];
$tanggalMasuk = $row['tanggal_masuk'];
$tanggalKeluar = $row['tanggal_keluar'];
$bulan = $row['lama_bayar'];
var_dump($bulan);

$queryInsert = "INSERT INTO confirmed (id_acc, id_kamar, tanggal_masuk, tanggal_keluar, bulan_terbayar)
                  VALUES ('$id_acc', '$id_kamar', '$tanggalMasuk', '$tanggalKeluar', '$bulan')";
mysqli_query($conn, $queryInsert);

// Hapus data dari tabel asrama
$queryDelete = "DELETE FROM request WHERE id_acc = '$id_acc'";
mysqli_query($conn, $queryDelete);

// Redirect ke halaman admin setelah konfirmasi dan penghapusan berhasil
header('Location: newAdmin.php?op=penghuni');
exit();

?>