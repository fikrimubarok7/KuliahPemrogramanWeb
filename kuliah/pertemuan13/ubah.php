<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
require 'functions.php';

// jika tidak ada id di url;
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}


// ambil id dari url
$id = $_GET['id'];

// query karyawan berdasarkan id

$k = query("SELECT * FROM karyawan WHERE id = $id");


// cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script> 
    alert('data berhasil diubah!');
    document.location.href = 'index.php';
    </script>";
  } else {
    echo "Data Gagal diubah!";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah data Karyawan</title>
</head>

<body>
  <h3>Form Ubah Data Karyawan</h3>
  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $k['id']; ?>" <ul>
    <li>
      <label>
        Nama :
        <input type="text" name="nama" autofocus required value="<?= $k['nama']; ?>">
      </label>
    </li>
    <li>
      <label>
        NIP :
        <input type="text" name="nip" required value="<?= $k['nip']; ?>">
      </label>
    </li>
    <li>
      <label>
        Email:
        <input type="text" name="email" required value="<?= $k['email']; ?>">
      </label>
    </li>
    <li>
      <label>
        Jabatan :
        <input type="text" name="jabatan" required value="<?= $k['jabatan']; ?>">
      </label>
    </li>
    <li>
      <label>
        Gambar :
        <input type="text" name="gambar" required value="<?= $k['gambar']; ?>">
      </label>
    </li>
    <li>
      <button type="submit" name="ubah"> Ubah Data!</button>
    </li>
    </ul>
  </form>
</body>

</html>