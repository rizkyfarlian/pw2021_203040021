<?php 
// pengulagan
// for
// while
// do.. while
// foreach : pengulagan khusus array


// for( $i = 0; $i < 5; $++ ) {
// 	echo "hello world <br>";
// }


// $i = 0;
// while ( $i < 5) {
// 	echo "hello world! <br>";
// $i++;
// }

// $i = 0;
// do {
// 	echo "hello world! <br>";
// $i++;	
// } while ($i < 5);

?>

<!-- <! <!DOCTYPE html> -->
<html>
<head>
	<title>latihan1</title>
</head>
<body>

<table border="1" cellpadding="10" cellspacing="0">
<?php 
for ($i = 1; $i <= 3; $i++) { 
	echo "<tr>";
	for ($j=1; $j <= 5; $j++) { 
		echo "<td>$i,$j</td>";
	}
	echo "</tr>";
}
 ?>
</tabel>

</body>
<!-- </html>  -->



<!-- <! <!DOCTYPE html> -->
<html>
<head>
	<title>latihan1</title>
</head>
<body>

<table border="1" cellpadding="10" cellspacing="0">
<?php for ( $i = 1; $i <= 3; $i++) : ?>
<tr>
	<?php for ($j=1; $j <=5 ; $j++) : ?>
	<td><?php echo "$i, $j"; ?></td>
	<?php endfor; ?>	
	
</tr>

<?php endfor; ?>

</tabel>

</body>
<!-- </html>  -->


<!DOCTYPE html>
<html>
<head>
	<title>latihan1</title>
	<style>
	   	.warna-baris{
	   		background-color: silver;
	   	}
	</style>
</head>
<body>

<table border="1" cellpadding="10" cellspacing="0">
<?php for ( $i = 1; $i <= 5; $i++) : ?>
	<?php if ($i % 2 == 1) : ?>
		
	
<tr class="warna-baris">

	<?php else : ?>
		<tr>
    <?php endif; ?>
	     <?php for ($j=1; $j <=5 ; $j++) : ?>
	          <td><?= "$i, $j"; ?></td>
	<?php endfor; ?>	
	
</tr>

<?php endfor; ?>

</tabel>

</body>
</html>