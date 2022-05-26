<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'kuliahpemrograman');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // Jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $nama = htmlspecialchars($data['nama']);
  $nip = htmlspecialchars($data['nip']);
  $email = htmlspecialchars($data['email']);
  $jabatan = htmlspecialchars($data['jabatan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO 
              karyawan
            VALUES
            (null, '$nama', '$nip', '$email', '$jabatan', '$gambar')
            ";

  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}
