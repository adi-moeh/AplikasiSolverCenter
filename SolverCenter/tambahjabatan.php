<?php 
//koneksi ke dbms
require 'functions.php';


	

	// cek apakah data berhasil di tambahkan atau tidak
if (isset($_POST["submit"]) ){ 
	if( tambahjabatan ($_POST) > 0) {
		echo "
			<script>
				alert ('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	}else {
		echo "
			<script>
				alert ('data gagal ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah data Jabatan</title>
</head>
<body>
	<h1>Tambah Data Jabatan</h1>

	<form action="" method="POST">
		<ul>
			<li>
				<label for="noj">No Jabatan</label>
				<input type="text" name ="noj" id="noj" required >

			</li>
			<li>
				<label for="jabatan">Jabatan</label>
				<input type="text" name="jabatan" id="jabatan">
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