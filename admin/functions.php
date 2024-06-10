<?php

function koneksi()
{

//koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'pw2024_TUBES_233040109');

return $conn;

}

function query($query)
{
    //koneksi ke database
    $conn = koneksi();

//query ke tabel mahasiswa
$result = mysqli_query($conn, $query);

//menyiapkan data mahasiswa
$rows = [];
while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

return $rows;

}

function tambah($data)
{
    $conn = koneksi();

    $game_name = htmlspecialchars($data['game_name']);
    $description = htmlspecialchars($data['description']);

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $imageName = basename($_FILES["gambar"]["name"]);

    // Cek apakah file adalah gambar
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Batasi ukuran file (maksimal 2MB)
    if ($_FILES["gambar"]["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Batasi format file yang diperbolehkan
    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Cek apakah uploadOk diset ke 0 oleh error di atas
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return 0;
    } else {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["gambar"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

  
    $query = "INSERT INTO game (game_name, description, gambar)
          VALUES ('$game_name ', '$description', '$imageName')";
  
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}
function hapus($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM game WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    $conn = koneksi();

    $id = htmlspecialchars($data['id']);
    $gambar = htmlspecialchars($data['gambar']);
    $game_name = htmlspecialchars($data['game_name']);
    $description = htmlspecialchars($data['description']);
  
    $query = "UPDATE game SET
                gambar = '$gambar',
                game_name = '$game_name',
                description = '$description'
                WHERE id = $id
    ";
  
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM game
    WHERE
    game_name LIKE '%$keyword%'
    ";
    return query($query);
}

?>