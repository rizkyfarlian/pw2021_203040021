<?php
/* 
rizky farlian siregar
203040021
https://github.com/rizkyfarlian/pw2021_203040021
pertemua ke 4 - 25 februari 2021
mempelajari function
*/
?>

<?php 
	// date
	// untuk menampilkan tanggal dengan format tertentu
	// echo date("M");

	// time
	// UNIX Timestap / epoch time
	// detik yang sudeh berlalu sejak 1 januari 1970
	// echo time();

	// echo date("l", time() - 60*60*24*100);

	// mktime
	// membuat sendiri detik
	// mktime(0,0,0,0,0,0)
	// jam, menit, detik, bulan, tanggal, tahun
	// echo date ("l", mktime (0,0,0,5,4,2002));


	// strtotime
	echo date ("l", strtotime("05 april 2002"));

 ?>