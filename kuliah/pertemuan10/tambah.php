<?php
require 'functions.php';

// cek apakah tombol sudah di tekan 
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script> 
    alert('data berhasil ditambahkan');
    document.location.href = 'latihan3.php';
    </script>";
  } else {
    echo "Data Gagal di tambahkan!";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah data Karyawan</title>
</head>

<body>
  <h3>Form Tambah Data Karyawan</h3>
  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" autofocus required>
        </label>
      </li>
      <li>
        <label>
          NIP :
          <input type="text" name="nip" required>
        </label>
      </li>
      <li>
        <label>
          Email:
          <input type="text" name="email" required>
        </label>
      </li>
      <li>
        <label>
          Jabatan :
          <input type="text" name="jabatan" required>
        </label>
      </li>
      <li>
        <label>
          Gambar :
          <input type="text" name="gambar" required>
        </label>
      </li>
      <li>
        <button type="submit" name="tambah"> Tambah Data!</button>
      </li>
    </ul>
  </form>
</body>

</html>