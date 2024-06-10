<?php
require 'functions.php';
//jika tombol tambah ditekan
if(isset($_POST['tambah'])) {
 //jka data berhasil ditambahkan
 if(tambah($_POST) > 0) {
  echo "<script>
  alert('data berhasil ditambah!');
  document.location.href = 'admin.php';
  </script>";
 }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container col-8">
        <h1>Tambah Game</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="game_name" class="form-label">Game</label>
                <input type="text" class="form-control border-secondary" id="game_name" name="game_name" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control border-secondary" id="gambar" name="gambar">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <input type="text" class="form-control border-secondary" id="description" name="description">
            </div>
            
            <button type="submit" name="tambah" class="btn btn-primary">Tambah Game</button>
        </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>