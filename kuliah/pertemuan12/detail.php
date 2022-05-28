<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
require 'functions.php';

// ambil id dari URL
$id = $_GET['id'];

// query karyawan berdasarkan id
$k = query("SELECT * FROM karyawan WHERE id = $id")
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Karyawan</title>
</head>

<body>
  <h3>Detail Karyawan</h3>
  <ul>
    <li><img src="img/<?= $k['gambar']; ?>" </li>
    <li>NIP: <?= $k['nip']; ?></li>
    <li>Nama: <?= $k['nama']; ?></li>
    <li>Email: <?= $k['email']; ?></li>
    <li>Jabatan: <?= $k['jabatan']; ?></li>
    <li><a href="ubah.php?id=<?= $k['id']; ?>">ubah</a> | <a href="hapus.php?id=<?= $k['id']; ?>" onclick="return confirm('Apakah anda yakin?');">hapus</a></li>
    <li><a href="index.php">Kembali ke daftar Karyawan</a></li>
  </ul>
</body>

</html>