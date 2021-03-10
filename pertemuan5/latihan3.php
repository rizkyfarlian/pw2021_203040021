<?php 
$mahasiswa = [
	["rizky farlian", "203040021", "TEKNIK Informatika", "rizkyfarlian07@gmial.com"],
	["fikri pamungkas", "203040022", "TEKNIK industri", "fikripamungkas07@gmial.com"]

];




 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Daftar Mahasiswa</title>
 </head>
 <body>
 
<h1>Daftar Mahasiswa</h1>


<?php foreach ( $mahasiswa as $mhs) : ?>
<ul>e
	<li>nama :<?= $mhs [0]; ?></li>
	<li>nrp :<?= $mhs [1]; ?></li>
	<li>jurusa :<?= $mhs [2]; ?></li>
	<li>email :<?= $mhs [3]; ?></li>
</ul>
<?php  endforeach; ?>

 </body>
 </html>