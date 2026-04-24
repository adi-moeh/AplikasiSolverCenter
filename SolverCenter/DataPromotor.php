<?php 
require 'functions.php';
$solve = query("SELECT * FROM promotor"); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Admin</title>
</head>
<body>
	<h1>Data Promotor</h1>

	<a href="Index.php">Data Solvee</a>
	<br>
	<a href="DataSolver.php">Data Solver</a>
	<br>
	<a href="DataAdmin.php">Data Admin</a>
	<br>
	<a href="DataMasalah.php">Data Masalah</a>
	<br>
	<a href="DataJabatan.php">Data Jabatan</a>
	<br><br><br>

<a href="tambahpromotor.php">Tambah data Promotor</a>
<br><br>

	<table border="1" cellpadding="10" cellspacing="0">
		
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Jenis kelamin</th>
		<th>No Hp</th>
		<th>No jabatan</th>
		<th>Aksi</th>
		
	</tr>

	<?php $i = 1;?>
	<?php foreach( $solve as $row) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td><?= $row["Nama_p"]; ?></td>
		<td><?= $row["Sex"]; ?></td>
		<td><?= $row["No_hp"]; ?></td>
		<td><?= $row["noj"]; ?></td>
		<td>
			<a href="UbahPromotor.php?id=<?= $row["Id_Pro"]; ?>">ubah</a> |
			<a href="HapusPromotor.php?id=<?= $row["Id_Pro"]; ?>" onclick="return confirm ('Yakin');">hapus</a>

		</td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>

	</table>

	
	
</body>
</html>