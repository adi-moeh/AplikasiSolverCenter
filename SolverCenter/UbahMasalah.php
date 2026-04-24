<?php 
//koneksi ke dbms
require 'functions.php';

$id = $_GET ["id"];

//query berdasar id
$mslh = query("SELECT * FROM tb_masalah WHERE No_Masalah = $id")[0];

	// cek apakah data berhasil di ubah atau tidak
if (isset($_POST["submit"]) ){ 
	if( ubahm ($_POST) > 0) {
		echo "
			<script>
				alert ('data berhasil diubah!');
				document.location.href = 'DataMasalah.php';
			</script>
		";
	}else {
		echo "
			<script>
				alert ('data gagal diubah!');
				document.location.href = 'DataMasalah.php';
			</script>
		";
	}
};

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit data Masalah</title>
</head>
<body>
	<h1>Edit data Masalah</h1>

	<form action="" method="POST">
		
		<ul>
			<li>
				<label for="no_masalah">No Masalah</label>
				<input type="text" name ="no_masalah" id ="no_masalah" required value ="<?= $mslh ["No_Masalah"]; ?>">
				
			</li>
			<li>
				<label for="masalah">Jenis Masalah</label>
				<input type ="text" name ="masalah" id ="masalah" value ="<?= $mslh ["Masalah"]; //Sesuaikan dengan Database?>">
			</li>
			
			<li>
				<button type = "submit" name="submit" value="submit"> Ubah Data</button>
			</li>
			<br>
			<br>
			<a href="DataMasalah.php">Kembali</a>
		</ul>
		
	</form>
	
</body>
</html>