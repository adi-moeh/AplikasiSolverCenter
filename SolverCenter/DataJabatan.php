<?php 
require 'functions.php';
$solve = query("SELECT * FROM pegawai"); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Admin</title>
</head>
<body>
	<h1>Data Jabatan</h1>
	
	<a href="DataPromotor.php">Data Promotor</a>
	<br>
	<a href="DataSolver.php">Data Solver</a>
	<br>
	<a href="DataMasalah.php">Data Masalah</a>
	<br>
	<a href="Index.php">Data Solvee</a>
	<br>
	<a href="DataAdmin.php">Data Admin</a>
	<br><br><br>

<a href="tambahjabatan.php">Tambah data Jabatan</a>
<br><br>

	<table border="1" cellpadding="10" cellspacing="0">
		
	<tr>
		<th>No.</th>
		<th>No Jabatan</th>
		<th>Jabatan</th>
		<th>Aksi</th>

	</tr>

	<?php $i = 1;?>
	<?php foreach( $solve as $row) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td><?= $row["noj"]; ?></td>
		<td><?= $row["jabatan"]; ?></td>
		<td>
			<a href="UbahJabatan.php?id=<?=$row["noj"];?>">ubah</a> |
			<a href="HapusJabatan.php?id=<?= $row["noj"]; ?>" onclick="return confirm ('Yakin');">hapus</a>

		</td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>

	</table>

	
	
</body>
</html>