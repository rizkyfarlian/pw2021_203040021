<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';
$id = $_GET['id'];
$film = query("SELECT * FROM movie WHERE id = $id")[0];
if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                        alert('Data Berhasil diubah!');
                        document.location.href = 'admin.php';
                    </script>";
    } else {
        echo "<script>
            alert('Data Gagal diubah!');
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
    <title>203040012</title>
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4.3.2/css/metro-all.min.css">
</head>

<body>
    <div class="container">
        <div class="add" style="padding-top: 20px;">
            <a href="admin.php"><button class="button alert outline">Cancel</button></a>
        </div>
        <h3>Form Edit Product</h3>
        <form action="" method="post">
            <input type="hidden" name="id" id="id" value="<?=$film['id']?>">
            <label for="nama">Nama movie</label>
            <input type="text" data-role="input" name="nama" id="nama" value="<?=$film['nama']?>" require>
            <label for="genre">Genre movie</label>
            <input type="text" data-role="input" name="genre" id="genre" value="<?=$film['genre']?>" require>
            <label for="tahun">Tahun movie</label>
            <input type="text" data-role="input" name="tahun" id="tahun" value="<?=$film['tahun']?>" require>
            <label for="country">Negara movie</label>
            <input type="text" data-role="input" name="country" id="country" value="<?=$film['country']?>" class="mb-1"
                title="">
            <label for="sinopis">Sinopis movie</label>
            <input type="text" data-role="input" name="sinopis" id="sinopis" value="<?=$film['sinopis']?>" class="mb-1"
                title="">
            <label for="gambar">Nama file gambar Movie</label>
            <input type="text" data-role="input" name="gambar" id="gambar" value="<?=$film['gambar']?>" require>
            <br>
            <button type="submit" name="ubah" class="button success outline">
                Edit Product
            </button>
        </form>
    </div>
    <script src="https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js"></script>
</body>

</html>