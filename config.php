<?php

define('host', 'localhost');
define('user', 'root');
define('pass', '');
define('db', 'asrama');

$conn = mysqli_connect(host, user, pass, db);

function registrasi($data)
{
    global $conn;

    $nim = mysqli_real_escape_string($conn, $data["nim"]);
    $jurusan = mysqli_real_escape_string($conn, $data["major"]);
    $telepon = mysqli_real_escape_string($conn, $data["telepon"]);
    $alamat = mysqli_real_escape_string($conn, $data["alamat"]);
    $user_email = mysqli_real_escape_string($conn, $data["user_email"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["userpass"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT name FROM account WHERE name = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO account(name, nim, jurusan, no_telp, alamat, email, password) VALUES('$username', '$nim', '$jurusan', '$telepon', '$alamat', '$user_email', '$password')");

    return mysqli_affected_rows($conn);

}

function tambah($data) {
	global $conn;

	$total_month = mysqli_real_escape_string($conn, $_POST['total_month']);
    $dateIn = mysqli_real_escape_string($conn, $_POST['tanggal_masuk']);
    $dateOut = mysqli_real_escape_string($conn, $_POST['tanggal_keluar']);
    $id_kamar = mysqli_real_escape_string($conn, $_POST['choosedItem']);
    $id_user = $_SESSION['id'];

	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO request (id_acc, id_kamar, tanggal_masuk, tanggal_keluar, lama_bayar, bukti_pembayaran)
				VALUES
			  ('$id_user', '$id_kamar', '$dateIn', '$dateOut', '$total_month', '$gambar')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload() {

	$namaFile = $_FILES['bukti']['name'];
	$ukuranFile = $_FILES['bukti']['size'];
	$error = $_FILES['bukti']['error'];
	$tmpName = $_FILES['bukti']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'bukti/' . $namaFileBaru);

	return $namaFileBaru;
}

?>