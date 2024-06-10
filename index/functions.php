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

function cari($keyword) {
    $query = "SELECT * FROM game
    WHERE
    game_name LIKE '%$keyword%'
    ";
    return query($query);
}