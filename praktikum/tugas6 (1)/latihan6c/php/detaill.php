<?php
if (!isset($_GET['id'])) {
    header("Location: ../indeks.php");
    exit;
}
require '../php/functions.php';
$Id = $_GET['id'];
$film = query("SELECT * FROM movie WHERE id = $Id")[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="../css/aio.css">
    <title>Movies</title>
</head>

<body>
    <div class="container">
        <div class="gambar">
            <img src="../assets/pict/<?=$film["gambar"];?>" alt="">
        </div>
        <div class="keterangan">
            <p><?=$film["nama"];?></p>
            <p><?=$film["genre"];?></p>
            <p><?=$film["tahun"];?></p>
            <p><?=$film["country"];?></p>
            <p><?=$film["sinopis"];?></p>
        </div>
        <button class="tombol-kembali"><a href="../index.php">Kembali</a></button>
    </div>
</body>

</html>
</body>

</html>