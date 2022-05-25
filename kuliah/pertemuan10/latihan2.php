<?php
require 'functions.php';
$karyawan = query("SELECT * FROM karyawan");
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
  <h3> Daftar Karyawan</h3>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>NIP</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jabatan</th>
      <th>Aksi</th>
    </tr>

    <?php $i = 1;
    foreach ($karyawan as $k) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $k['gambar'];  ?>" width="60"></td>
        <td><?= $k['nip']; ?></td>
        <td><?= $k['nama']; ?></td>
        <td><?= $k['email']; ?></td>
        <td><?= $k['jabatan']; ?></td>
        <td>
          <a href="">ubah</a> | <a href="">hapus</a>
        </td>
      </tr>
    <?php endforeach;  ?>
  </table>
</body>

</html>