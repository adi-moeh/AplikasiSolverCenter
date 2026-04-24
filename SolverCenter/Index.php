<?php 
require 'functions.php';
$solve = query("SELECT * FROM solvee "); 

if (isset($_POST["cari"]) ) {
	$solve = cari ($_POST ["keyword"]);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Admin</title>
</head>
<body>
	<h1>Data Solvee</h1>
	
	<a href="DataPromotor.php">Data Promotor</a>
	<br>
	<a href="DataSolver.php">Data Solver</a>
	<br>
	<a href="DataAdmin.php">Data Admin</a>
	<br>
	<a href="DataMasalah.php">Data Masalah</a>
	<br>
	<a href="DataJabatan.php">Data Jabatan</a>
	<br><br><br>

<a href="tambah.php">Tambah data Solvee</a>
<br><br>

<form action="" method="post">
	

<input type="text" name="keyword" size="30" autofocus placeholder=" masukan pencarian" autocomplete="off">
<button type="submit" name="cari">cari</button>

</form>

	<table border="1" cellpadding="10" cellspacing="0">
		
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Jenis kelamin</th>
		<th>No Hp</th>
		<th>Alamat</th>
		<th>TTL</th>
		<th>No Masalah</th>
		<th>Aksi</th>

	</tr>

	<?php $i = 1;?>
	<?php foreach( $solve as $row) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td><?= $row["Nama"]; ?></td>
		<td><?= $row["Sex"]; ?></td>
		<td><?= $row["No_hp"]; ?></td>
		<td><?= $row["Alamat"]; ?></td>
		<td><?= $row["TTL"]; ?></td>
		<td><?= $row["No_Masalah"]; ?></td>
		<td>
			<a href="ubah.php?id=<?= $row["Id_S"]; ?>">ubah</a> |
			<a href="Hapus.php?id=<?= $row["Id_S"]; ?>" onclick="return confirm ('Yakin');">hapus</a>

		</td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>

	</table>

	
	
</body>
</html>