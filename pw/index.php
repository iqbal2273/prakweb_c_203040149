<?php
require 'functions.php';
$buku = query("SELECT * FROM buku");

//ketika tombol cari di klik
if (isset($_POST['cari'])) {
  $buku = cari($_POST['keyword']);
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Daftar Buku</title>
</head>

<body>
    <h3>Daftar Koleksi Buku</h3>

    <a href="tambah.php">Tambah Data Buku</a>
    <br><br>

    <form method="post" action="">
      <input type="text" name="keyword" size="50" placeholder="masukkan keywoard pencarian" autocomplete="off" autofocus>
      <button type="submit" name="cari">Cari!</button>
    </form>
    <br>

    <table border="5" cellpadding="15" cellspacing="0" style="background-color: white;">
      <tr>
        <th>No</th>
        <th>Nama Buku</th>
        <th>pengarang</th>
        <th>jumlah lembar</th>
        <th>penerbit</th>
        <th>gambar</th>
        <th>aksi</th>
      </tr>

      <?php if (empty($buku)) : ?>
        <tr>
          <td colspan="4">
            <p style="color: red; font-style: italic;">Data buku tidak ditemukan</p>
          </td>
        </tr>
      <?php endif; ?>

      <?php $i = 1;
      foreach ($buku as $m) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $m['nama_buku']; ?></td>
          <td><?= $m['nama_pengarang']; ?></td>
          <td><?= $m['jml_lembar']; ?></td>
          <td><?= $m['penerbit']; ?></td>
          <td><img src="img/<?= $m['gambar_buku']; ?>" width="120"></td>
          <td>
          <a href="ubah.php?id=<?= $m['Id']; ?>">ubah</a>
          <a href="hapus.php?id=<?= $m['Id']; ?>">hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
</body>

</html>