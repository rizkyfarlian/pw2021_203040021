<?php   
//  rizky farlian siregar
// 203040021
// https://github.com/rizkyfarlian/pw2021_203040021
// pertemua ke 5 - 4 maret 2021
// mempelajari array 
?>




<?php 
// $mahasiswa = [
// ["rizky farlian", "203040021", "rizkyfarlian07@gmail.com", "Teknik Informatika"],
// ["203040099", "fikri pamungkas", "fikripamungkas12@gmail.com", "Teknik Industri"]
// ];

// Array Associative
// definisinya sama seperti array numerik, kecuali
// key-nya adalah string yang kita buat sendiri
$mahasiswa = [
	[	
		"nrp" => "203040021",
		"nama" => "rizky farlian",
		"email" => "rizkyfarlian07@gmail.com",
		"jurusan" => "Teknik Informatika",
		"gambar" => "team.png"
	],
	[
		"nama" => "fikri pamungkas", 
		"nrp" => "203040099",
		"email" => "fikripamungkas12@gmail.com",
		"jurusan" => "Teknik Industri",
		"gambar" => "team.png"
	]
];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Mahasiswa</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>

	<?php foreach( $mahasiswa as $mhs ) : ?>
		<ul>
			<li>
				<img src="img/<?= $mhs["gambar"]; ?>">
			</li>
			<li>Nama : <?= $mhs["nama"]; ?></li>
			<li>NRP : <?= $mhs["nrp"]; ?></li>
			<li>Jurusan : <?= $mhs["jurusan"]; ?></li>
			<li>Email : <?= $mhs["email"]; ?></li>
		</ul>
	<?php endforeach; ?>




</body>
</html>