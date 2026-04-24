<?php 
//koneksi ke dbms
require 'functions.php';

$id = $_GET ["id"];

//query berdasar id
$admin = query("SELECT * FROM admin WHERE Id_ad = $id")[0];

	// cek apakah data berhasil di ubah atau tidak
if (isset($_POST["submit"]) ){ 
	if( ubahadmin ($_POST) > 0) {
		echo "
			<script>
				alert ('data berhasil diubah!');
				document.location.href = 'DataAdmin.php';
			</script>
		";
	}else {
		echo "
			<script>
				alert ('data gagal diubah!');
				document.location.href = 'UbahAdmin.php';
			</script>
		";
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit data Admin</title>
</head>
<body>
	<h1>Edit data Admin</h1>

	<form action="" method="POST">
		<input type="hidden" name="id" value="<?= $admin["Id_ad"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama</label>
				<input type="text" name ="nama" id="nama" required value="<?= $admin ["Nama"]; ?>">
				
			</li>
			<li>
				<label for="sex">Jenis Kelamin</label>
				<input type="text" name="sex" id="sex" value="<?= $admin ["Sex"]; ?>">
			</li>
			<li>
				<label for="no_hp">No hp</label>
				<input type="text" name="no_hp" id="no_hp" value="<?= $admin ["No_hp"]; //Sesuaikan dengan Database ?>">
			</li>
			
			
			<li>
				<label for="noj">No Jabatan</label>
				<input type="text" name="noj" id="noj" value="<?= $admin ["noj"]; ?>">
			</li>
			<li>
				<button type = "submit" name="submit" value="submit"> Ubah Data</button>
			</li>
		</ul>
		
	</form>
	
</body>
</html>