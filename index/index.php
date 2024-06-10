<?php
require 'functions.php';
$game = query("SELECT * FROM game ORDER BY id DESC");

if( isset($_POST["cari"])) {
  $game = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Zaa Topup</title>
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  </head>
  <body>
    <!-- header -->
      <nav>
        <div class="brand">
          <a href="#">Zaa Store</a>
        </div>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#produk">Game</a></li>
          <li><a href="../login/login.php">Login</a></li>
        </ul>
      </nav>
    <!-- tutup header -->

    <!-- home section -->
    <section class="home" id="home">
      <div class="content">
        <h3>Zaa Store</h3>
        <span>Merupakan toko topup game online termurah dan terpercaya</span>
        <a href="https://wa.link/x0dlli" class="btn">shop now</a>
      </div>
    </section>

    <!-- tutup home -->

    <!--produck-->
    <div class="container" id="produk">
    <form action="" method="post">

<input type="text" name="keyword" size="40" autofocus placeholder="Cari Game" autocomplete="off">
<button type="submit" name="cari" class="btn btn-primary">Cari!!</button>

</form>
<br>
        <h1>Daftar Produk</h1>
        <?php $i = 1;
  foreach($game as $gm) : ?>
        <div class="product-list">


  <tr>
    <th scope="row"><?= $i++; ?>
                    <div class='product'>
                    <img src="<?= "../uploads/" . $gm['gambar']; ?>" class="img img-thumbnail" width="200" height="200" alt="Gambar"></td>
                    <h2><?=$gm["game_name"];?></h2>
                    <p><?=$gm["description"];?></p>
                    <a href="https://wa.link/x0dlli" class="btn">shop now</a>
                    </div>
                    <?php endforeach; ?></th>
  </tr>
        </div>
    </div>


</html>