<?php 
//koneksi ke dbms
require 'functions.php';

$id = $_GET ["id"];

//query berdasar id
$noj = query("SELECT * FROM pegawai WHERE noj = $id")[0];

	// cek apakah data berhasil di ubah atau tidak
if (isset($_POST["submit"]) ){ 
	if( ubahjabatan ($_POST) > 0) {
		echo "
			<script>
				alert ('data berhasil diubah!');
				document.location.href = 'DataJabatan.php';
			</script>
		";
	}else {
		echo "
			<script>
				alert ('data gagal diubah!');
				document.location.href = 'DataJabatan.php';
			</script>
		";
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit data Jabatan</title>
</head>
<body>
	<h1>Edit data Jabatan</h1>

	<form action="" method="POST">
		
		<ul>
			<li>
				<label for="noj">No Jabatan</label>
				<input type="text" name ="noj" id="noj" required value="<?= $noj ["noj"]; ?>">
				
			</li>
			<li>
				<label for="jabatan">Jabatan</label>
				<input type="text" name="jabatan" id="jabatan" value="<?= $noj ["jabatan"]; ?>">
			</li>
			
			
			</li>
			<li>
				<button type = "submit" name="submit" value="submit"> Ubah Data</button>
			</li>
			<br>
			<br>
			<a href="DataJabatan.php">Kembali</a>
		</ul>
		
	</form>
	
</body>
</html>