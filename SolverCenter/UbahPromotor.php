<?php 
//koneksi ke dbms
require 'functions.php';

$id = $_GET ["id"];

//query berdasar id
$solvee = query("SELECT * FROM promotor WHERE Id_Pro = $id")[0];

	// cek apakah data berhasil di ubah atau tidak
if (isset($_POST["submit"]) ){ 
	if( ubahpromotor ($_POST) > 0) {
		echo "
			<script>
				alert ('data berhasil diubah!');
				document.location.href = 'DataPromotor.php';
			</script>
		";
	}else {
		echo "
			<script>
				alert ('data gagal diubah!');
				document.location.href = 'UbahPromotor.php';
			</script>
		";
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit data Promotor</title>
</head>
<body>
	<h1>Edit data Promotor</h1>

	<form action="" method="POST">
		<input type="hidden" name="id" value="<?= $solvee["Id_Pro"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama</label>
				<input type="text" name ="nama" id="nama" required value="<?= $solvee ["Nama_p"]; ?>">
				
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
				<label for="noj">No Jabatan</label>
				<input type="text" name="noj" id ="noj" value="<?= $solvee ["noj"]; ?>">
			</li>
			
			<li>
				<button type = "submit" name="submit" value="submit"> Ubah Data</button>
			</li>
			<br>
			<br>
			<a href="DataPromotor.php">Kembali</a>
		</ul>
		
	</form>
	
</body>
</html>