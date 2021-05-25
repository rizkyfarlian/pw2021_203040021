<?php
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "pw_tubes_203040021");

    return $conn;
}

function query($sql)
{
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function tambah($data)
{
    $conn = koneksi();

    $nama_movie = htmlspecialchars($data['nama']);
    $genre_movie = htmlspecialchars($data['genre']);
    $tahun_release = htmlspecialchars($data['tahun']);
    $negara_movie = htmlspecialchars($data['country']);
    $sinopis_movie = htmlspecialchars($data['sinopis']);
    $Gambar = htmlspecialchars($data['gambar']);

    $query = "INSERT INTO movie
                            VALUES
                            ('', '$nama_movie', '$genre_movie', '$tahun_release', '$negara_movie', '$sinopis_movie', '$Gambar')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function hapus($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM movie WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    $conn = koneksi();
    $id = ($data['id']);
    $nama_movie = htmlspecialchars($data['nama']);
    $genre_movie = htmlspecialchars($data['genre']);
    $tahun_release = htmlspecialchars($data['tahun']);
    $negara_movie = htmlspecialchars($data['country']);
    $sinopis_movie = htmlspecialchars($data['sinopis']);
    $Gambar = htmlspecialchars($data['gambar']);

    $query = "UPDATE movie SET
    nama = '$nama_movie',
    genre = '$genre_movie',
    tahun = '$tahun_release',
    country = '$negara_movie',
    sinopis = '$sinopis_movie',
    gambar = '$Gambar'
    WHERE id = $id
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM movie
    WHERE
    nama LIKE '%$keyword%' OR
    genre LIKE '%$keyword%' OR
    tahun LIKE '%$keyword%' OR
    country LIKE '%$keyword%' OR
    gambar LIKE '%$keyword%'
    ";
    return query($query);
}
function registrasi($data)
{
    $conn = koneksi();
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username sudah di gunakan');
        </script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query_tambah = "INSERT INTO user VALUES ('','$username','$password')";
    mysqli_query($conn, $query_tambah);
    return mysqli_affected_rows($conn);
}