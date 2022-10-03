<?php
require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>";
  } else {
    echo "data gagal ditambahkan!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Buku</title>
</head>

<body>
  <h3>Form Tambah Data Buku</h3>
  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Nama Buku :
          <input type="text" name="nama_buku" autofocus required>
        </label>
      </li>
      <li>
        <label>
          pengarang :
          <input type="text" name="nama_pengarang" required>
        </label>
      </li>
      <li>
        <label>
          Jumlah Lembar :
          <input type="text" name="jml_lembar" required>
        </label>
      </li>
      <li>
        <label>
          penerbit :
          <input type="text" name="penerbit" required>
        </label>
      </li>
      <li>
        <label>
          gambar :
          <input type="text" name="gambar_buku" required>
        </label>
      </li>
      <li>
        <button type="submit" name="tambah">Tambah Data!</button>
      </li>
    </ul>
  </form>
</body>

</html>