<?php
session_start();

// Periksa apakah pengguna sudah login sebagai admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
  header("Location: login.php");
  exit();
}

// Fungsi logout
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: index.php");
  exit();
}

// Koneksi ke database
include('config.php');

// Query untuk mendapatkan data mahasiswa yang perlu dikonfirmasi
$query = "SELECT * FROM asrama";
$result = mysqli_query($conn, $query);

// Query untuk mengambil data dari tabel asramaConfirmed
$query = "SELECT * FROM asramaConfirmed";
$confirmedResult = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Admin Page - Sistem Informasi Asrama</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
</head>

<body>
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>

  <div class="container mt-4">
    <h2>Admin Page</h2>


    <div class="container mt-4">
      <h2>Daftar Mahasiswa yang Mendaftar Asrama</h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Mahasiswa ID</th>
            <th scope="col">Nama Mahasiswa</th>
            <th scope="col">NIM</th>
            <th scope="col">Email</th>
            <th scope="col">Jurusan</th>
            <th scope="col">No. Telepon</th>
            <th scope="col">Tanggal Masuk</th>
            <th scope="col">Tanggal Keluar</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <th scope="row"><?php echo $row['mahasiswaId']; ?></th>
              <td><?php echo $row['nameMahasiswa']; ?></td>
              <td><?php echo $row['nim']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['jurusan']; ?></td>
              <td><?php echo $row['noTelp']; ?></td>
              <td><?php echo $row['tanggalMasuk']; ?></td>
              <td><?php echo $row['tanggalKeluar']; ?></td>
              <td>
                <a href="konfirmasi.php?id=<?php echo $row['mahasiswaId']; ?>" class="btn btn-success">Konfirmasi</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <h2>Daftar Mahasiswa yang Telah Menempati Asrama</h2>
    <!-- Tabel Mahasiswa Terkonfirmasi -->
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
        <!-- Looping untuk menampilkan data mahasiswa terkonfirmasi -->
        <?php $no = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($confirmedResult)) : ?>
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
            <td>
              <a href="delete.php?id=<?php echo $row['conMahaId']; ?>" class="btn btn-danger">Delete</a>
              <a href="update.php?id=<?php echo $row['conMahaId']; ?>" class="btn btn-primary">Update</a>
            </td>
          </tr>
          <?php $no++; ?>
        <?php endwhile; ?>
      </tbody>
    </table>


    <!-- Form Pengurangan dan Penambahan Jumlah Kamar -->
    <div class="mt-4 col-sm-4">
      <h4>Pengurangan dan Penambahan Jumlah Kamar</h4>

      <?php
      // Query untuk mendapatkan jumlah kamar saat ini
      $queryKamar = "SELECT jumlahKamar FROM kamarAsrama";
      $resultKamar = mysqli_query($conn, $queryKamar);
      $rowKamar = mysqli_fetch_assoc($resultKamar);
      $jumlahKamar = $rowKamar['jumlahKamar'];

      // Memproses pengurangan atau penambahan jumlah kamar
      if (isset($_POST['kurangi'])) {
        $jumlahKamar = $jumlahKamar - 1;

        // Update jumlah kamar di tabel kamarAsrama
        $queryUpdate = "UPDATE kamarAsrama SET jumlahKamar = $jumlahKamar";
        mysqli_query($conn, $queryUpdate);

        // Redirect ke halaman admin
        header("Location: admin.php");
        exit();
      } elseif (isset($_POST['tambah'])) {
        $jumlahKamar = $jumlahKamar + 1;

        // Update jumlah kamar di tabel kamarAsrama
        $queryUpdate = "UPDATE kamarAsrama SET jumlahKamar = $jumlahKamar";
        mysqli_query($conn, $queryUpdate);

        // Redirect ke halaman admin
        header("Location: admin.php");
        exit();
      }
      ?>

      <form method="POST" action="" class="form-inline">
        <div class="input-group mb-3">
          <span class="input-group-text">Jumlah Kamar:</span>
          <input type="text" class="form-control" value="<?php echo $jumlahKamar; ?>" disabled>
          <button class="btn btn-outline-secondary" type="submit" name="kurangi">-</button>
          <button class="btn btn-outline-secondary" type="submit" name="tambah">+</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>