<?php
/* 
rizky farlian siregar
203040021
https://github.com/rizkyfarlian/pw2021_203040021
pertemua ke 2 - 11 februari 2021
mempelajari sintax PHP
*/
?>
<?php 
// standar output
// echo, print
// print_r
// var_dump

// penulisan sintax php
// 1.php di dalam html
// 2.html di dalam php

// variabel dan tipe data
// variabel
// tidak boleh diawlai dengan angka tapi boleh mengandung akngka

// $nama = "rizky farlian";
// echo "halo, nama saya $nama";

// penghubung string / concatenation / concat
// .
// $nama_depan = "rizky";
// $nama_belakang = "farlian";
// echo $nama_depan . " " . $nama_belakang;

// operator
// aritmatika
// + - * / %

// $x = 10;
// $y = 20;
// echo $x * $y;

// assignment
// =, =+, -=, *=, /=, %=, .=
// $x = 1;
// $x -= 5;
// echo $x;
// $nama ="rizky";
// $nama .=" ";
// $nama .="farlian";
// echo $nama;

// operator perbandingan
// <, >, <=, >=, == 
// var_dump(1 < 5);
// var_dump(1 > 5);
// var_dump(1 == "1");

// indentitas
// ===, !==
// var_dump(1 === "1");

// logika
// &&, II, !
// $x = 10;
// var_dump($x < 20 && $x % 2 == 0)

$nama = "rizkyfarlian";

// echo "RIZKY FARLIAN SIREGAR";

?>
<!-- 1 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BELAJAR PHP</title>
</head>
<body>
	<h1>halo, selamat datang <?php echo $nama; ?></h1>
	<p><?php echo "ini adalah paragraf"; ?></p>

</body>
</html>

<!-- 2 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BELAJAR PHP</title>
</head>
<body>
	<?php 
	echo "<h1>halo, selamat datang rizky farlian</h1>";

	?>

</body>
</html>