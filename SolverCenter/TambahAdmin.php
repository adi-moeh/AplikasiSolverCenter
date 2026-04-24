<?php 
//koneksi ke dbms
require 'functions.php';


	

	// cek apakah data berhasil di tambahkan atau tidak
if (isset($_POST["submit"]) ){ 
	if( tambahadmin ($_POST) > 0) {
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
	<title>Tambah data Admin</title>
</head>
<body>
	<h1>Tambah Data Admin</h1>

	<form action="" method="POST">
		<ul>
			<li>
				<label for="nama">Nama</label>
				<input type="text" name ="nama" id="nama" required >

			</li>
			<li>
				<label for="sex">Jenis Kelamin</label>
				<input type="text" name="sex" id="sex">
			</li>
			<li>
				<label for="no_hp">No hp</label>
				<input type="text" name="no_hp" id="no_hp" >
			</li>
			<li>
				<label for="noj">No Jabatan</label>
				<input type="text" name="noj" id="noj" >
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