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

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, " DELETE FROM karyawan WHERE id =   $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $nip = htmlspecialchars($data['nip']);
  $email = htmlspecialchars($data['email']);
  $jabatan = htmlspecialchars($data['jabatan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "UPDATE karyawan SET 
            nama = '$nama',
            nip  = '$nip',
            email  = '$email',
            jabatan  = '$jabatan',
            gambar  = '$gambar'
            WHERE id = $id ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}


function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM karyawan
                WHERE 
              nama LIKE '%keyword%' OR 
              nip LIKE '%keyword%' OR
              email LIKE '%keyword%' OR
              jabatan LIKE '%keyword%'

            ";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function login($data)
{
  $conn = koneksi();
  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if (query("SELECT * FROM user WHERE username = '$username' && password = '$password'")) {
    // set session 
    $_SESSION['login'] = true;

    header("Location: index.php");
    exit;
  } else {
    return [
      'error' => true,
      'pesan' => 'Username / Password Salah!'
    ];
  }
}
