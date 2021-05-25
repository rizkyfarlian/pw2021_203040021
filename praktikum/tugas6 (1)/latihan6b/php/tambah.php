<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                        alert('Data Berhasil ditambahkan!');
                        document.location.href = 'admin.php';
                    </script>";
    } else {
        echo "<script>
            alert('Data Gagal ditambahkan!');
            document.location.href = 'admin.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4.3.2/css/metro-all.min.css">


</head>

<body>
    <div class="container">
        <div class="add" style="padding-top: 20px;">
            <a href="admin.php"><button class="button alert outline">Batal ? :( </button></a>
        </div>
        <h3>Form Add Product Yukk gasskeun</h3>
        <form action="" method="post">
            <label for="nama">Masukan nama movie</label>
            <input type="text" placeholder="sayang" data-role="input" name="nama" id="nama" require>
            <label for="genre">Masukan genre movie</label>
            <input type="text" placeholder="cinta" data-role="input" name="genre" id="genre" require>
            <label for="tahun">Masukan tahun movie</label>
            <input type="text" placeholder="1780" data-role="input" name="tahun" id="tahun" require>
            <label for="country">Masukan negara movie</label>
            <input type="text" placeholder="indonesia" data-role="input" name="country" id="country" class="mb-1"
                title="">
            <label for="sinopis">Masukan sinopis movie</label>
            <input type="text" placeholder="haii kamuu lopyou wkwkwk" data-role="input" name="sinopis" id="sinopis"
                class="mb-1" title="">
            <label for="gambar">Masukan nama file Gambar Produk</label>
            <input type="text" placeholder="sayang.jpg" data-role="input" name="gambar" id="gambar" require><br>
            <button type="submit" name="tambah" class="button success outline">
                klik ini
            </button>
        </form>
    </div>
    <script src="https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js"></script>

</body>

</html>