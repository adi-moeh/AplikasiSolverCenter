<?php 
//koneksi ke dbms
require 'functions.php';


	

	// cek apakah data berhasil di tambahkan atau tidak
if (isset($_POST["submit"]) ){ 
	if( tambahdatamasalah ($_POST) > 0) {
		echo "
			<script>
				alert ('data berhasil ditambahkan!');
				document.location.href = 'DataMasalah.php';
			</script>
		";
	}else {
		echo "
			<script>
				alert ('data gagal ditambahkan!');
				document.location.href = 'DataMasalah.php';
			</script>
		";
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah data Masalah</title>
</head>
<body>
	<h1>Tambah Data Masalah</h1>

	<form action="" method="POST">
		<ul>
			<li>
				<label for="no_masalah">No Masalah</label>
				<input type="text" name ="no_masalah" id="no_masalah" required >

			</li>
			<li>
				<label for="masalah">Jenis Masalah</label>
				<input type="text" name="masalah" id="masalah">
			</li>
			
			
			<li>
				<button type = "submit" name="submit" value="submit"> Tambah Data</button>
			</li>
			<br>
			<br>
			<a href="index.php">kembali</a>
		</ul>
		
	</form>
	
</body>
</html>