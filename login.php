<?php
session_start();

// Koneksi ke database
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query untuk memeriksa kecocokan username dan password
  $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    // Login berhasil
    $_SESSION['admin'] = true;
    header("Location: admin.php");
    exit();
  } else {
    // Login gagal
    $error = "Username atau password salah.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login - Sistem Informasi Asrama</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">Sistem Informasi Asrama</a>
  </nav>

  <div class="container mt-4">
    <h2>Login</h2>
    <?php if (isset($error)) { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
      </div>
    <?php } ?>
    <form action="login.php" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
