<?php
function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'prakweb_c_203040149_pw');
}

function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data
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

  $nama_buku = htmlspecialchars($data['nama_buku']);
  $nama_pengarang = htmlspecialchars($data['nama_pengarang']);
  $jml_lembar = htmlspecialchars($data['jml_lembar']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $gambar_buku = htmlspecialchars($data['gambar_buku']);

  $query = "INSERT INTO
              buku
            VALUES
            (null, '$nama_buku', '$nama_pengarang', '$jml_lembar', '$penerbit','$gambar_buku');
          ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM buku WHERE Id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id = $data['Id'];
  $nama_buku = htmlspecialchars($data['nama_buku']);
  $nama_pengarang = htmlspecialchars($data['nama_pengarang']);
  $jml_lembar = htmlspecialchars($data['jml_lembar']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $gambar_buku = htmlspecialchars($data['gambar_buku']);

  $query = "UPDATE buku SET
              nama_buku = '$nama_buku',
              nama_pengarang = '$nama_pengarang',
              jml_lembar = '$jml_lembar',
              penerbit = '$penerbit',
              gambar_buku = '$gambar_buku'
            WHERE Id = $id";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}


function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM buku
              WHERE 
            nama_buku LIKE '%$keyword%' OR
            nama_pengarang LIKE '%$keyword%'
          ";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}