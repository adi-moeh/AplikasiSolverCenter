<?php 
//koneksi ke dbms
require 'functions.php';
/*$conn = mysqli_connect("localhost", "root", "", "solver_center");


mysqli_query($conn, $sql);*/
// mysqli_connect("localhost", "root", "","solver_center");

/*$conn = mysqli_connect("localhost", "root", "", "solver_center");
$sql ="INSERT INTO solvee (Id_S, Nama, Sex, No_hp, Alamat, TTL, No_Masalah ) VALUES ( ''. '$nama', '$sex', '$no_hp', '$alamat', '$TTL', '$No_Masalah')";
mysqli_query($conn, $sql);*/
//header("location: ../tambah.php?sambah=succes");

// Mysqli_query ( mysqli_connect("localhost", "root", "","solver_center"),"INSERT INTO solvee VALUES (''. '$Nama', '$Sex', '$No_hp', '$Alamat', '$TTL', '$No_Masalah')");
// // cek apakah tombol submit sudah ditekan atau belum

	
// 	// Cek data apa berhasil
// 	//var_dump(mysqli_affected_rows($conn));

	/*$nama = $_POST ["nama"] ;
	$sex = $_POST ["sex"];
	$no_hp = $_POST ["no_hp"] ;
	$alamat = $_POST ["alamat"];
	$TTL = $_POST ["TTL"] ;
	$No_Masalah = $_POST ["No_Masalah"];
*/


	


//var_dump(mysqli_affected_rows($conn));
//var_dump($_POST);

	

	// cek apakah data berhasil di tambahkan atau tidak
if (isset($_POST["submit"]) ){ 
	if( tambahsolver ($_POST) > 0) {
		echo "
			<script>
				alert ('data berhasil ditambahkan!');
				document.location.href = 'DataSolver.php';
			</script>
		";
	}else {
		echo "
			<script>
				alert ('data gagal ditambahkan!');
				document.location.href = 'DataSolver.php';
			</script>
		";
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah data solver</title>
</head>
<body>
	<h1>Tambah data solver</h1>

	<form action="" method="POST">
		<ul>
			<li>
				<label for="nama">Nama</label>
				<input type="text" name ="nama" id="nama" required >

			</li>
			<li>
				<label for="sex">Jenis Kelamin</label>
				<input type="text" name="sex" id="sex">
			</li>
			<li>
				<label for="No_Masalah">No Masalah</label>
				<input type="text" name="No_Masalah" id="No_Masalah" >
			</li>
			<li>
				<label for="no_hp">No hp</label>
				<input type="text" name="no_hp" id="no_hp" >
			</li>
			<li>
				<label for="noj">No Jabatan</label>
				<input type="text" name="noj" id="noj"  >
			</li>
			
			<li>
				<button type = "submit" name="submit" value="submit"> Tambah Data</button>
			</li>
			<br>
			<br>
			<a href="index.php">Kembali</a>
		</ul>
		
	</form>
	
</body>
</html>