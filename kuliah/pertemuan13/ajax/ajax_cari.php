<?php

require '../functions.php';
$karyawan = cari($_GET['keyword']);
?>

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