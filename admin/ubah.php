<?php
require 'functions.php';


$id = $_GET['id'];

$gm = query("SELECT * FROM game WHERE id = $id")[0];

if(isset($_POST['ubah'])) {
 if(ubah($_POST) > 0) {
  echo "<script>
  alert('data berhasil diubah!');
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
    <title>Ubah Detail Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container col-8">
        <h1>Ubah Detail Game</h1>

        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $gm['id']; ?>">
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" value="<?= $gm['gambar']; ?>" >
            </div>
            <div class="mb-3">
                <label for="game_name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="game_name" name="game_name" value="<?= $gm['game_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <input type="text" class="form-control" id="description" name="description" value="<?= $gm['description']; ?>">
            </div>
            <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
        </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></>
  </body>
</html>