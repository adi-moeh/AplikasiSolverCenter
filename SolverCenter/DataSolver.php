<?php 
require 'functions.php';
$solve = query("SELECT * FROM solver"); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Admin</title>
</head>
<body>
	<h1>Data Solver</h1>
	
	<a href="DataPromotor.php">Data Promotor</a>
	<br>
	<a href="Index.php">Data Solvee</a>
	<br>
	<a href="DataAdmin.php">Data Admin</a>
	<br>
	<a href="DataMasalah.php">Data Masalah</a>
	<br>
	<a href="DataJabatan.php">Data Jabatan</a>
	<br><br><br>

<a href="TambahSolver.php">Tambah data Solver</a>
<br><br>

	<table border="1" cellpadding="10" cellspacing="0">
		
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Jenis kelamin</th>
		<th>No Masalah</th>
		<th>No Hp</th>
		<th>No Jabatan</th>
		<th>Aksi</th>

	</tr>

	<?php $i = 1;?>
	<?php foreach( $solve as $row) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td><?= $row["Nama"]; ?></td>
		<td><?= $row["Sex"]; ?></td>
		<td><?= $row["No_Masalah"]; ?></td>
		<td><?= $row["No_hp"]; ?></td>
		<td><?= $row["noj"]; ?></td>
		<td>
			<a href="UbahSolver.php?id=<?= $row["Id_Sol"]; ?>">ubah</a> |
			<a href="HapusSolver.php?id=<?= $row["Id_Sol"]; ?>" onclick="return confirm ('Yakin');">hapus</a>

		</td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>

	</table>

	
	
</body>
</html>