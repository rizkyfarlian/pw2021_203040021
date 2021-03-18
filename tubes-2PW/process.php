<?php 

	include("connection.php");

	if ($_GET['action'] == "login") {
		$sql = "SELECT * FROM user WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'";
        $result = $conn->query($sql);
		if (mysqli_num_rows($result) > 0) {
			$_SESSION['username'] = $_POST['username'];
			echo '<script language="javascript">';
			echo 'alert("Selamat datang, '.$_POST['username'].'");';
			echo 'window.location.href = "home.php";';
			echo '</script>';
			//header('location: list_barang.php');	
		}else{
			echo '<script language="javascript">';
			echo 'alert("Periksa kembali username dan password Anda.");';
			echo 'window.location.href = "home.php";';
			echo '</script>';
		}
	}elseif ($_GET['action'] == "logout") {
		session_destroy();
		echo '<script language="javascript">';
		echo 'window.location.href = "index.php";';
		echo '</script>';
	}elseif ($_GET['action'] == "tambah_barang") {
		$kode_barang = $_POST['kode_barang'];
		$nama_barang = $_POST['nama_barang'];
		$harga_beli  = $_POST['harga_beli'];
		$harga_jual	 = $_POST['harga_jual'];

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
		$check = $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$change_name = $target_dir . $kode_barang . "." . $check;
		if (empty($_FILES['gambar']['tmp_name']))
		{
		    $sql = "INSERT INTO barang VALUES (null, '$kode_barang', '$nama_barang', '0', '$harga_beli', '$harga_jual', '')";
		    $result = $conn->query($sql);

			if ($result) {
				echo '<script language="javascript">';
				echo 'alert("Berhasil menyimpan data barang");';
				echo 'window.location.href = "list_barang.php";';
				echo '</script>';
				//header('location: list_barang.php');	
			}
		}else{
			if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $change_name)) {
				$sql = "INSERT INTO barang VALUES (null, '$kode_barang', '$nama_barang', '0', '$harga_beli', '$harga_jual', '$change_name')";
			    $result = $conn->query($sql);

				if ($result) {
					echo '<script language="javascript">';
					echo 'alert("Berhasil menyimpan data barang");';
					echo 'window.location.href = "list_barang.php";';
					echo '</script>';
					//header('location: list_barang.php');	
				}else{
					echo $sql;
				}
			}else{
				echo '<script language="javascript">';
				echo 'alert("Gagal melakukan upload");';
				echo 'window.location.href = "list_barang.php";';
				echo '</script>';
			}
		}
	}elseif($_GET['action'] == "edit_barang"){
		$id_barang = $_POST['id_barang'];
		$kode_barang = $_POST['kode_barang'];
		$nama_barang = $_POST['nama_barang'];
		$harga_beli  = $_POST['harga_beli'];
		$harga_jual	 = $_POST['harga_jual'];
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
		$check = $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$change_name = $target_dir . $kode_barang . "." . $check;
		if (empty($_FILES['gambar']['tmp_name']))
		{
		    $sql = "UPDATE barang SET kode_barang = '$kode_barang', nama_barang = '$nama_barang', harga_beli = '$harga_beli', harga_jual = '$harga_jual' WHERE id_barang = '".$id_barang."'";
		    $result = $conn->query($sql);
		    
		    if ($result) {
		    	echo '<script language="javascript">';
				echo 'alert("Berhasil mengedit data barang");';
				echo 'window.location.href = "list_barang.php";';
				echo '</script>';
		    	//header('location: list_barang.php');
		    }
		}else{
			if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $change_name)) {
				$sql = "UPDATE barang SET kode_barang = '$kode_barang', nama_barang = '$nama_barang', harga_beli = '$harga_beli', harga_jual = '$harga_jual', link_gambar = '$change_name' WHERE id_barang = '".$id_barang."'";
				    $result = $conn->query($sql);
				    
				    if ($result) {
				    	echo '<script language="javascript">';
						echo 'alert("Berhasil mengedit data barang");';
						echo 'window.location.href = "list_barang.php";';
						echo '</script>';
				    	//header('location: list_barang.php');
				    }
			}else{
				echo '<script language="javascript">';
				echo 'alert("Gagal melakukan upload");';
				echo 'window.location.href = "list_barang.php";';
				echo '</script>';
			}
		}
	}elseif($_GET['action'] == "hapus_barang") {
		$sql = "DELETE FROM barang WHERE id_barang='".$_GET['id_barang']."'";
	    $result = $conn->query($sql);
	    
	    if ($result) {
	    	echo '<script language="javascript">';
			echo 'alert("Berhasil menghapus data barang");';
			echo 'window.location.href = "list_barang.php";';
			echo '</script>';
	    	//header('location: list_barang.php');
	    }
	}elseif ($_GET['action'] == "tambah_kategori") {
		$kode_kategori = $_POST['kode_kategori'];
		$nama_kategori = $_POST['nama_kategori'];
			
		$sql = "INSERT INTO kategori VALUES (null, '$kode_kategori', '$nama_kategori')";
	    $result = $conn->query($sql);

		if ($result) {
			echo '<script language="javascript">';
			echo 'alert("Berhasil menyimpan data kategori");';
			echo 'window.location.href = "list_kategori.php";';
			echo '</script>';
		}
	}elseif($_GET['action'] == "edit_kategori"){
		$id_kategori = $_POST['id_kategori'];
		$kode_kategori = $_POST['kode_kategori'];
		$nama_kategori = $_POST['nama_kategori'];

		$sql = "UPDATE kategori SET kode_kategori = '$kode_kategori', nama_kategori = '$nama_kategori' WHERE id_kategori = '".$id_kategori."'";
	    $result = $conn->query($sql);
	    
	    if ($result) {
	    	echo '<script language="javascript">';
			echo 'alert("Berhasil mengedit data kategori");';
			echo 'window.location.href = "list_kategori.php";';
			echo '</script>';
	    }else{
	    	echo $sql;
	    }
	}elseif($_GET['action'] == "hapus_kategori") {
		$sql = "DELETE FROM kategori WHERE id_kategori='".$_GET['id_kategori']."'";
	    $result = $conn->query($sql);
	    
	    if ($result) {
	    	echo '<script language="javascript">';
			echo 'alert("Berhasil menghapus data kategori");';
			echo 'window.location.href = "list_kategori.php";';
			echo '</script>';
	    }
	}elseif ($_GET['action'] == "tambah_jasa") {
		$kode_jasa = $_POST['kode_jasa'];
		$nama_jasa = $_POST['nama_jasa'];
			
		$sql = "INSERT INTO jasa VALUES (null, '$kode_jasa', '$nama_jasa')";
	    $result = $conn->query($sql);

		if ($result) {
			echo '<script language="javascript">';
			echo 'alert("Berhasil menyimpan data jasa");';
			echo 'window.location.href = "list_jasa.php";';
			echo '</script>';
		}
	}elseif($_GET['action'] == "edit_jasa"){
		$id_jasa = $_POST['id_jasa'];
		$kode_jasa = $_POST['kode_jasa'];
		$nama_jasa = $_POST['nama_jasa'];

		$sql = "UPDATE jasa SET kode_jasa = '$kode_jasa', nama_jasa = '$nama_jasa' WHERE id_jasa = '".$id_jasa."'";
	    $result = $conn->query($sql);
	    
	    if ($result) {
	    	echo '<script language="javascript">';
			echo 'alert("Berhasil mengedit data jasa");';
			echo 'window.location.href = "list_jasa.php";';
			echo '</script>';
	    }else{
	    	echo $sql;
	    }
	}elseif($_GET['action'] == "hapus_jasa") {
		$sql = "DELETE FROM jasa WHERE id_jasa='".$_GET['id_jasa']."'";
	    $result = $conn->query($sql);
	    
	    if ($result) {
	    	echo '<script language="javascript">';
			echo 'alert("Berhasil menghapus data jasa");';
			echo 'window.location.href = "list_jasa.php";';
			echo '</script>';
	    }
	}elseif ($_GET['action'] == "tambah_supplier") {
		$nama_supplier = $_POST['nama_supplier'];
		$alamat  = $_POST['alamat'];
		$telepon	 = $_POST['telepon'];
			
		$sql = "INSERT INTO supplier VALUES (null, '$nama_supplier', '$alamat', '$telepon')";
	    $result = $conn->query($sql);

		if ($result) {
			echo '<script language="javascript">';
			echo 'alert("Berhasil menyimpan data supplier");';
			echo 'window.location.href = "list_supplier.php";';
			echo '</script>';
			//header('location: list_supplier.php');	
		}
	}elseif($_GET['action'] == "edit_supplier"){
		$id_supplier = $_POST['id_supplier'];
		$nama_supplier = $_POST['nama_supplier'];
		$alamat  = $_POST['alamat'];
		$telepon	 = $_POST['telepon'];

		$sql = "UPDATE supplier SET nama_supplier = '$nama_supplier', alamat = '$alamat', telepon = '$telepon' WHERE id_supplier = '".$id_supplier."'";
	    $result = $conn->query($sql);
	    
	    if ($result) {
	    	echo '<script language="javascript">';
			echo 'alert("Berhasil mengedit data supplier");';
			echo 'window.location.href = "list_supplier.php";';
			echo '</script>';
	    	//header('location: list_supplier.php');
	    }else{
	    	echo $sql;
	    }
	}elseif($_GET['action'] == "hapus_supplier") {
		$sql = "DELETE FROM supplier WHERE id_supplier='".$_GET['id_supplier']."'";
	    $result = $conn->query($sql);
	    
	    if ($result) {
	    	echo '<script language="javascript">';
			echo 'alert("Berhasil menghapus data supplier");';
			echo 'window.location.href = "list_supplier.php";';
			echo '</script>';
	    	//header('location: list_supplier.php');
	    }
	}elseif ($_GET['action'] == "tambah_pelanggan") {
		$nama_pelanggan = $_POST['nama_pelanggan'];
		$alamat  = $_POST['alamat'];
		$telepon	 = $_POST['telepon'];
			
		$sql = "INSERT INTO pelanggan VALUES (null, '$nama_pelanggan', '$alamat', '$telepon')";
	    $result = $conn->query($sql);

		if ($result) {
			echo '<script language="javascript">';
			echo 'alert("Berhasil menyimpan data pelanggan");';
			echo 'window.location.href = "list_pelanggan.php";';
			echo '</script>';
			//header('location: list_pelanggan.php');	
		}
	}elseif($_GET['action'] == "edit_pelanggan"){
		$id_pelanggan = $_POST['id_pelanggan'];
		$nama_pelanggan = $_POST['nama_pelanggan'];
		$alamat  = $_POST['alamat'];
		$telepon	 = $_POST['telepon'];

		$sql = "UPDATE pelanggan SET nama_pelanggan = '$nama_pelanggan', alamat = '$alamat', telepon = '$telepon' WHERE id_pelanggan = '".$id_pelanggan."'";
	    $result = $conn->query($sql);
	    
	    if ($result) {
	    	echo '<script language="javascript">';
			echo 'alert("Berhasil mengedit data pelanggan");';
			echo 'window.location.href = "list_pelanggan.php";';
			echo '</script>';
	    	//header('location: list_pelanggan.php');
	    }else{
	    	echo $sql;
	    }
	}elseif($_GET['action'] == "hapus_pelanggan") {
		$sql = "DELETE FROM pelanggan WHERE id_pelanggan='".$_GET['id_pelanggan']."'";
	    $result = $conn->query($sql);
	    
	    if ($result) {
	    	echo '<script language="javascript">';
			echo 'alert("Berhasil menghapus data pelanggan");';
			echo 'window.location.href = "list_pelanggan.php";';
			echo '</script>';
	    	//header('location: list_pelanggan.php');
	    }
	}elseif ($_GET['action'] == "tambah_user") {
		$nama_user = $_POST['nama_user'];
		$username  = $_POST['username'];
		$password	 = $_POST['password'];
			
		$sql = "INSERT INTO user VALUES (null, '$nama_user', '$username', '$password')";
	    $result = $conn->query($sql);

		if ($result) {
			echo '<script language="javascript">';
			echo 'alert("Berhasil menyimpan data user");';
			echo 'window.location.href = "list_user.php";';
			echo '</script>';
			//header('location: list_user.php');	
		}
	}elseif($_GET['action'] == "edit_user"){
		$id_user = $_POST['id_user'];
		$nama_user = $_POST['nama_user'];
		$username  = $_POST['username'];
		$password	 = $_POST['password'];

		$sql = "UPDATE user SET nama_user = '$nama_user', username = '$username', password = '$password' WHERE id_user = '".$id_user."'";
	    $result = $conn->query($sql);
	    
	    if ($result) {
	    	echo '<script language="javascript">';
			echo 'alert("Berhasil mengedit data user");';
			echo 'window.location.href = "list_user.php";';
			echo '</script>';
	    	//header('location: list_user.php');
	    }else{
	    	echo $sql;
	    }
	}elseif($_GET['action'] == "hapus_user") {
		$sql = "DELETE FROM user WHERE id_user='".$_GET['id_user']."'";
	    $result = $conn->query($sql);
	    
	    if ($result) {
	    	echo '<script language="javascript">';
			echo 'alert("Berhasil menghapus data user");';
			echo 'window.location.href = "list_user.php";';
			echo '</script>';
	    	//header('location: list_user.php');
	    }
	}elseif ($_GET['action'] == "tambah_detail_transaksi_pembelian") {
        $kode_barang = $_POST['kode_barang'];
		$jumlah  = $_POST['jumlah'];
        $sql = "SELECT * FROM transaksi_pembelian WHERE no_nota = '".$_POST['no_nota']."'";
        $result = $conn->query($sql);
        while ($hasil = $result->fetch_assoc()) {
        	$sql2 = "INSERT INTO detail_pembelian VALUES (null, '".$hasil['id_pembelian']."','$kode_barang', '$jumlah')";
		    $result2 = $conn->query($sql2);
			if ($result2) {
				echo '<script language="javascript">';
				echo 'alert("Berhasil menambahkan cart");';
				echo 'window.location.href = "detail_transaksi_pembelian.php";';
				echo '</script>';
				//header('location: list_user.php');	
			}
        }
	}elseif($_GET['action'] == "hapus_detail_transaksi_pembelian") {
		$sql = "DELETE FROM detail_pembelian WHERE id_detail_pembelian='".$_GET['id_detail_pembelian']."'";
	    $result = $conn->query($sql);
	    
	    if ($result) {
	    	echo '<script language="javascript">';
			echo 'alert("Berhasil menghapus data cart");';
			echo 'window.location.href = "detail_transaksi_pembelian.php";';
			echo '</script>';
	    	//header('location: list_user.php');
	    }
	}elseif($_GET['action'] == "end_transaksi_pembelian") {
		$id_pembelian = "";
		$sql = "SELECT * FROM transaksi_pembelian WHERE no_nota = '".$_GET['no_nota']."'";
        $result = $conn->query($sql);
        while ($hasil = $result->fetch_assoc()) {
        	$id_pembelian = $hasil['id_pembelian'];
        }

		$sql = "SELECT * FROM detail_pembelian WHERE id_pembelian='".$id_pembelian."'";
	    $result = $conn->query($sql);
	    while ($hasil = $result->fetch_assoc()) {
	    	$sql2 = "SELECT * FROM barang WHERE id_barang='".$hasil['id_barang']."'";
		    $result2 = $conn->query($sql2);
		    while ($hasil2 = $result2->fetch_assoc()) {
		    	$jumlah_stok = $hasil['jumlah'] + $hasil2['stok'];
		    	$sql3 = "UPDATE barang SET stok = '$jumlah_stok' WHERE id_barang='".$hasil2['id_barang']."'";
		    	$result3 = $conn->query($sql3);
	        }
        }
		$_SESSION['no_nota'] = "";
    	echo '<script language="javascript">';
		echo 'alert("Transaksi Pembelian Selesai.");';
		echo 'window.location.href = "transaksi_pembelian.php";';
		echo '</script>';
    	//header('location: list_user.php');
	}elseif ($_GET['action'] == "tambah_detail_transaksi_penjualan") {
        $kode_barang = $_POST['kode_barang'];
		$jumlah  = $_POST['jumlah'];
        $sql = "SELECT * FROM transaksi_penjualan WHERE no_nota = '".$_POST['no_nota']."'";
        $result = $conn->query($sql);
        while ($hasil = $result->fetch_assoc()) {
        	$harga_beli = 0;
        	$harga_jual = 0;
        	$sql3 = "SELECT * FROM barang WHERE id_barang = '$kode_barang'";
	        $result3 = $conn->query($sql3);
	        while ($hasil3 = $result3->fetch_assoc()) {
	        	$harga_beli = $hasil3['harga_beli'];
	        	$harga_jual = $hasil3['harga_jual'];
	        }
        	$sql2 = "INSERT INTO detail_penjualan VALUES (null, '".$hasil['id_penjualan']."','$kode_barang', '$jumlah', '$harga_beli', '$harga_jual')";
		    $result2 = $conn->query($sql2);
			if ($result2) {
				echo '<script language="javascript">';
				echo 'alert("Berhasil menambahkan cart");';
				echo 'window.location.href = "detail_transaksi_penjualan.php";';
				echo '</script>';
				//header('location: list_user.php');	
			}
        }
	}elseif($_GET['action'] == "hapus_detail_transaksi_penjualan") {
		$sql = "DELETE FROM detail_penjualan WHERE id_detail_penjualan='".$_GET['id_detail_penjualan']."'";
	    $result = $conn->query($sql);
	    
	    if ($result) {
	    	echo '<script language="javascript">';
			echo 'alert("Berhasil menghapus data cart");';
			echo 'window.location.href = "detail_transaksi_penjualan.php";';
			echo '</script>';
	    	//header('location: list_user.php');
	    }
	}elseif($_GET['action'] == "end_transaksi_penjualan") {
		$id_penjualan = "";
		$sql = "SELECT * FROM transaksi_penjualan WHERE no_nota = '".$_GET['no_nota']."'";
        $result = $conn->query($sql);
        while ($hasil = $result->fetch_assoc()) {
        	$id_penjualan = $hasil['id_penjualan'];
        }
		$trap = 0;
		$keterangan = "";
		$sql = "SELECT * FROM detail_penjualan WHERE id_penjualan='".$id_penjualan."'";
	    $result = $conn->query($sql);
	    if (mysqli_num_rows($result) == 0) {
	    	echo '<script language="javascript">';
			echo 'alert("Transaksi penjualan tidak dapat dilakukan karena tidak ada barang. Silahkan dilakukan pengecekan kembali.");';
			echo 'window.location.href = "detail_transaksi_penjualan.php";';
			echo '</script>';
	    }else{
	    	while ($hasil = $result->fetch_assoc()) {
		    	$sql2 = "SELECT * FROM barang WHERE id_barang='".$hasil['id_barang']."'";
			    $result2 = $conn->query($sql2);
			    while ($hasil2 = $result2->fetch_assoc()) {
			    	if($hasil['jumlah'] <= $hasil2['stok']){
			    		$trap = $trap + 1;
			    	}else{
			    		$keterangan = "Barang ''".$hasil2['nama_barang']."'' tersisa ".$hasil2['stok'].". Tolong periksa kembali jumlah barang Anda.";
			    	}
		        }
	        }
	        /*echo $keterangan;echo "<br>";
	        echo mysqli_num_rows($result);echo "<br>";
	        echo $trap;echo "<br>";
	        exit();*/
	        if ($trap == mysqli_num_rows($result)) {
	        	$sql = "SELECT * FROM detail_penjualan WHERE id_penjualan='".$id_penjualan."'";
			    $result = $conn->query($sql);
			    while ($hasil = $result->fetch_assoc()) {
			    	$sql2 = "SELECT * FROM barang WHERE id_barang='".$hasil['id_barang']."'";
				    $result2 = $conn->query($sql2);
				    while ($hasil2 = $result2->fetch_assoc()) {
				    	$jumlah_stok = $hasil2['stok'] - $hasil['jumlah'];
				    	$sql3 = "UPDATE barang SET stok = '$jumlah_stok' WHERE id_barang='".$hasil2['id_barang']."'";
				    	$result3 = $conn->query($sql3);
			        }
		        }
		        $_SESSION['no_nota_penjualan'] = "";
		    	echo '<script language="javascript">';
				echo 'alert("Transaksi Penjualan Selesai.");';
				echo 'window.location.href = "transaksi_penjualan.php";';
				echo '</script>';
	        }else{
	        	echo '<script language="javascript">';
				echo 'alert("'.$keterangan.'");';
				echo 'window.location.href = "transaksi_penjualan.php";';
				echo '</script>';
	        }
	    }
    	//header('location: list_user.php');
	}

 ?>