<?php 
require 'functions.php';
$solve = query("SELECT * FROM admin"); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Admin</title>
</head>
<body>
	<h1>Data Admin</h1>
	
	<a href="DataPromotor.php">Data Promotor</a>
	<br>
	<a href="DataSolver.php">Data Solver</a>
	<br>
	<a href="Index.php">Data Solvee</a>
	<br>
	<a href="DataMasalah.php">Data Masalah</a>
	<br>
	<a href="DataJabatan.php">Data Jabatan</a>
	<br><br><br>

<a href="tambahadmin.php">Tambah data Admin</a>
<br><br>

	<table border="1" cellpadding="10" cellspacing="0">
		
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Jenis kelamin</th>
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
		<td><?= $row["No_hp"]; ?></td>
		<td><?= $row["noj"]; ?></td>
		<td>
			<a href="UbahAdmin.php?id=<?= $row["Id_ad"]; ?>">ubah</a> |
			<a href="Hapus.php?id=<?= $row["Id_ad"]; ?>" onclick="return confirm ('Yakin');">hapus</a>

		</td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>

	</table>

	
	
</body>
</html>