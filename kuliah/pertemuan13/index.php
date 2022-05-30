<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';
$karyawan = query("SELECT * FROM karyawan");

// Ketika tombol cari diklik
if (isset($_POST['cari'])) {
  $karyawan = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Karyawan</title>
</head>

<body>
  <a href="logout.php">Logout</a>
  <h3> Daftar Karyawan</h3>

  <a href="tambah.php">Tambah Data Karyawan</a>
  <br><br>

  <form action="" method="POST">
    <input type="text" name="keyword" size="40" placeholder="Masukan Keyword Pencarian.." autocomplete="off" autofocus class="keyword">
    <button type="submit" name="cari" class="tombol-cari">Cari!</button>
  </form>
  <br>

  <div class="container">
    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Aksi</th>
      </tr>

      <?php if (empty($karyawan)) :  ?>
        <tr>
          <td colspan="4">
            <p>Data Karyawan tidak ditemukan!</p>
          </td>
        </tr>
      <?php endif; ?>
      <?php $i = 1;
      foreach ($karyawan as $k) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><img src="img/<?= $k['gambar'];  ?>" width="60"></td>
          <td><?= $k['nama']; ?></td>
          <td>
            <a href="detail.php?id=<?= $k['id']; ?>">lihat detail</a>
          </td>
        </tr>
      <?php endforeach;  ?>
    </table>
  </div>

  <script src="js/script.js"></script>
</body>

</html>