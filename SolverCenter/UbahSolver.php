<?php 
//koneksi ke dbms
require 'functions.php';

$id = $_GET ["id"];

//query berdasar id
$solver = query("SELECT * FROM solver WHERE Id_Sol = $id")[0];

	// cek apakah data berhasil di ubah atau tidak
if (isset($_POST["submit"]) ){ 
	if( ubahsolver ($_POST) > 0) {
		echo "
			<script>
				alert ('data berhasil diubah!');
				document.location.href = 'DataSolver.php';
			</script>
		";
	}else {
		echo "
			<script>
				alert ('data gagal diubah!');
				document.location.href = 'UbahSolver.php';
			</script>
		";
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit data solver</title>
</head>
<body>
	<h1>Edit data solver</h1>

	<form action="" method="POST">
		<input type="hidden" name="id" value="<?= $solver["Id_Sol"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama</label>
				<input type="text" name ="nama" id="nama" required value="<?= $solver ["Nama"]; ?>">
				
			</li>
			<li>
				<label for="sex">Jenis Kelamin</label>
				<input type="text" name="sex" id="sex" value="<?= $solver ["Sex"]; ?>">
			</li>
			<li>
				<label for="no_masalah">No masalah</label>
				<input type="text" name="no_masalah" id ="no_masalah" value="<?= $solver ["No_Masalah"]; ?>">
			</li>
			<li>
				<label for="no_hp">No hp</label>
				<input type="text" name="no_hp" id="no_hp" value="<?= $solver ["No_hp"]; //Sesuaikan dengan Database ?>">
			</li>
			
			<li>
				<label for="noj">No Jabatan</label>
				<input type="text" name="noj" id="noj" value="<?= $solver ["noj"]; ?>" >
			</li>
			
			<li>
				<button type = "submit" name="submit" value="submit"> Ubah Data</button>
			</li>
			<br>
			<br>
			<a href="DataSolver.php">Kembali</a>
		</ul>
		
	</form>
	
</body>
</html>