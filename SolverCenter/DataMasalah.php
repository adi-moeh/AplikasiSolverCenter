<?php 
require 'functions.php';
$solve = query("SELECT * FROM tb_masalah"); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Admin</title>
</head>
<body>
	<h1>Data Masalah</h1>
	
	<a href="DataPromotor.php">Data Promotor</a>
	<br>
	<a href="DataSolver.php">Data Solver</a>
	<br>
	<a href="DataAdmin.php">Data Admin</a>
	<br>
	<a href="Index.php">Data Solvee</a>
	<br>
	<a href="DataJabatan.php">Data Jabatan</a>
	<br><br><br>

<a href="TambahDataMasalah.php">Tambah data Masalah</a>
<br><br>

	<table border="1" cellpadding="10" cellspacing="0">
		
	<tr>
		<th>No.</th>
		<th>No Masalah</th>
		<th>Masalah</th>
		<th>Aksi</th>

	</tr>

	<?php $i = 1;?>
	<?php foreach( $solve as $row) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td><?= $row["No_Masalah"]; ?></td>
		<td><?= $row["Masalah"]; ?></td>
		<td>
			<a href="UbahMasalah.php?id=<?= $row["No_Masalah"]; ?>">ubah</a> |
			<a href="HapusMasalah.php?id=<?= $row["No_Masalah"]; ?>" onclick="return confirm ('Yakin');">hapus</a>

		</td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>

	</table>

	
	
</body>
</html>