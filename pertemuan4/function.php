<?php 
// function nya harus di definisi kan sendiri
function salam($waktu = "datang", $nama = "rizky"){
	return "selamat $waktu, $nama!";
}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>latihan function</title>
 </head>
 <body>
 	<h1><?= salam ( "pagi", "rizky farlian"); ?></h1>
 </body>
 </html>