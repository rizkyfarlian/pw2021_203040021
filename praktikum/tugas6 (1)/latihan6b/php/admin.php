<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';
$film = query("SELECT * FROM movie");
if (isset($_GET["cari"])) {
    $film = cari($_GET["keyword"]);
}
if (isset($_GET['cari'])) {
    $keyword = $_GET['keyword'];
    $film = query(
        "SELECT * FROM movie WHERE
        nama LIKE '%$keyword%' OR
        genre LIKE '%$keyword%' OR
        country LIKE '%$keyword%' OR
        sinopis LIKE '%$keyword%'
        "
    );
} else {
    $film = query("SELECT * FROM movie");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <link rel="stylesheet" href="../css/mantap.css">
    <title>Movie</title>
</head>

<body>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <div class="container">
        <h1 class="centered white-text">Movie</h1>
        <div class="add">
            <a href="tambah.php" class="waves-effect waves-light teal btn-small">Tambah Data</a>
            <form action="" method="GET">
                <input class="white-text" type="text" name="keyword" autofocus placeholder="masukkan keyword.."
                    autocomplete="off">
                <button class="waves-effect waves-light teal btn-small" type="submit" name="cari">Search</button>
            </form>
        </div>
        <table class="centered highlight - white-text grey darken-3">
            <tr class="z-depth-5 pink darken-3 white-text">
                <th>No</th>
                <th>Nama</th>
                <th>Genre</th>
                <th>Tahun</th>
                <th>Country</th>
                <th>Sinopis</th>
                <th>Foto</th>
                <th>Detail</th>
                <th>Opsi</th>
            </tr>
            <?php if (empty($film)): ?>
            <tr>
                <td colspan="7">
                    <h1>Data tidak ditemukan</h1>
                </td>
            </tr>
            <?php else: ?>
            <?php $i = 1?>
            <?php foreach ($film as $movies): ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$movies["nama"];?></td>
                <td><?=$movies["genre"];?></td>
                <td><?=$movies["tahun"];?></td>
                <td><?=$movies["country"];?></td>
                <td><?=$movies["sinopis"];?></td>
                <td><img width="100px" src="../assets/pict/<?=$movies["gambar"];?>" alt=""></td>
                <td>
                    <p class="Nama">
                        <a href="../php/detaill.php?id=<?=$movies['id'];?>">Lihat Produk</a>
                </td>
                <td>
                    <a href="ubah.php?id=<?=$movies['id']?>" class="waves-effect waves-light teal btn-small">Ubah</a>
                    <a href="hapus.php?id=<?=$movies['id']?>"
                        class="waves-effect waves-light pink darken-3 btn-small">Hapus</a>
                </td>
            </tr>
            <?php $i++?>
            <?php endforeach;?>
            <?php endif;?>
            <div class="logout">
                <a href="logout.php" class="waves-effect waves-light pink btn-small">Logout</a>
            </div>
    </div>
</body>

</html>