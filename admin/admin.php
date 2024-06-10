<?php

session_start();

if(!isset($_SESSION["login"])) {
  header("Location:../index/index.php");
  exit;
}
require 'functions.php';
$game = query("SELECT * FROM game ORDER BY id DESC");

if( isset($_POST["cari"])) {
  $game = cari($_POST["keyword"]);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!--navbar-->


    <nav>
        <div class="brand">
            
          <a href="logout.php"><img src="panahjadi.png" alt="">Keluar</a>
          </div>
          
      </nav>

      <!--tabel-->
      <div class="container">
        <h1>Daftar Game</h1>

<a href="tambah.php" class="btn btn-primary">Tambah Game</a>
<br></br>
<form action="" method="post">

<input type="text" name="keyword" size="30" autofocus placeholder="Cari Game" autocomplete="off">
<button type="submit" name="cari">Cari!!</button>

</form>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Gambar</th>
      <th scope="col">Gamer</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1;
    foreach($game as $gm) : ?>
    <tr>
      <th scope="row"><?= $i++; ?></th>
      <td><img src="<?= "../uploads/" . $gm['gambar']; ?>" class="img img-thumbnail" width="200" height="200" alt="Gambar"></td>
      <td><?= $gm['game_name']; ?></td>
      <td><?= $gm['description']; ?></td>
      <td>
      <a href="ubah.php?id=<?= $gm['id']; ?>" class="badge text-bg-warning text-decoration-none">Ubah</a>
        <a href="hapus.php?id=<?= $gm['id']; ?>" onclick="return confirm('yakin?')" class="badge text-bg-danger text-decoration-none">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



</body>
</html>