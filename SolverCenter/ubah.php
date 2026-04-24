<?php 
//koneksi ke dbms
require 'functions.php';

$id = $_GET ["id"];

//query berdasar id
$solvee = query("SELECT * FROM solvee WHERE Id_S = $id")[0];

	// cek apakah data berhasil di ubah atau tidak
if (isset($_POST["submit"]) ){ 
	if( ubah ($_POST) > 0) {
		echo "
			<script>
				alert ('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	}else {
		echo "
			<script>
				alert ('data gagal diubah!');
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
	<title>Edit data solvee</title>
</head>
<body>
	<h1>Edit data solvee</h1>

	<form action="" method="POST">
		<input type="hidden" name="id" value="<?= $solvee["Id_S"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama</label>
				<input type="text" name ="nama" id="nama" required value="<?= $solvee ["Nama"]; ?>">
				
			</li>
			<li>
				<label for="sex">Jenis Kelamin</label>
				<input type="text" name="sex" id="sex" value="<?= $solvee ["Sex"]; ?>">
			</li>
			<li>
				<label for="no_hp">No hp</label>
				<input type="text" name="no_hp" id="no_hp" value="<?= $solvee ["No_hp"]; //Sesuaikan dengan Database ?>">
			</li>
			<li>
				<label for="alamat">Alamat</label>
				<input type="text" name="alamat" id ="alamat" value="<?= $solvee ["Alamat"]; ?>">
			</li>
			<li>
				<label for="TTL">TTL</label>
				<input type="text" name="TTL" id="TTL" value="<?= $solvee ["TTL"]; ?>" >
			</li>
			<li>
				<label for="No_Masalah">No Masalah</label>
				<input type="text" name="No_Masalah" id="No_Masalah" value="<?= $solvee ["No_Masalah"]; ?>">
			</li>
			<li>
				<button type = "submit" name="submit" value="submit"> Ubah Data</button>
			</li>
		</ul>
		
	</form>
	
</body>
</html>