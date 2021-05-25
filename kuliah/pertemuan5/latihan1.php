<?php   
//  rizky farlian siregar
// 203040021
// https://github.com/rizkyfarlian/pw2021_203040021
// pertemua ke 5 - 4 maret 2021
// mempelajari array 
?>

<?php 
// array
// variabel yang dapat menapung bnyak nilai
// elemen pada array boleh memiliki tipe data yang berbeda
// pasangan antara key dan velue
// key-nya adalah index, yang di mulai dari nol


// cara membuat erray ada dua cara 

// cara lama
$hari = array("senin", "selasa", "rabu ");

// cara baru
$bulan = ["januari", "februari", "maret",];
$arrl = [123, "tulisan", false];
 


 //  cara menampilkan array
 // bisa mnggunakan var_dump() atau print_r()
// var_dump($hari);
// echo "<br>";
// print_r($bulan);
// echo "<br>";

// menampilkan satu elemen pada array
// echo $arrl [0];
// echo "<br>";
// echo $bulan [1];


// menambahkan elemen baru pada array
var_dump($hari);
$hari[] = "kamis";
$hari[] = "jumat";
echo "<br>";
var_dump($hari);


 ?>