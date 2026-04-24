<?php 
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "solver_center");







function query ($query) {
	global $conn;
	$result = mysqli_query ($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result)) {
		$rows [] = $row; 
	}
	return $rows;

}



function tambah ($data) {
	
	global $conn;
	// ambil data dari tiap elemen dalam form


	$nama = htmlspecialchars($data["nama"]);
	$sex = htmlspecialchars($data["sex"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$TTL = htmlspecialchars($data["TTL"]);
	$No_Masalah = htmlspecialchars($data["No_Masalah"]);


	//query insert data
	$sql = "INSERT INTO solvee VALUES ( '','$nama', '$sex', '$no_hp', '$alamat', '$TTL', '$No_Masalah')";
	mysqli_query($conn, $sql);
	

	return mysqli_affected_rows($conn);
}

function tambahsolver ($data) {
	
	global $conn;
	// ambil data dari tiap elemen dalam form


	$nama = htmlspecialchars($data["nama"]);
	$sex = htmlspecialchars($data["sex"]);
	$No_Masalah = htmlspecialchars($data["No_Masalah"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	$noj = htmlspecialchars($data["noj"]);
	


	//query insert data
	$sql = "INSERT INTO solver VALUES ( '','$nama', '$sex',  '$No_Masalah','$no_hp', '$noj')";
	mysqli_query($conn, $sql);
	

	return mysqli_affected_rows($conn);
}

function tambahpromotor ($data) {
	
	global $conn;
	// ambil data dari tiap elemen dalam form


	$nama = htmlspecialchars($data["nama"]);
	$sex = htmlspecialchars($data["sex"]);
	
	$no_hp = htmlspecialchars($data["no_hp"]);
	$noj = htmlspecialchars($data["noj"]);
	


	//query insert data
	$sql = "INSERT INTO promotor VALUES ( '','$nama', '$sex','$no_hp', '$noj')";
	mysqli_query($conn, $sql);
	

	return mysqli_affected_rows($conn);
}

function tambahadmin ($data) {
	
	global $conn;
	// ambil data dari tiap elemen dalam form


	$nama = htmlspecialchars($data["nama"]);
	$sex = htmlspecialchars($data["sex"]);
	
	$no_hp = htmlspecialchars($data["no_hp"]);
	$noj = htmlspecialchars($data["noj"]);
	


	//query insert data
	$sql = "INSERT INTO admin VALUES ( '','$nama', '$sex','$no_hp', '$noj')";
	mysqli_query($conn, $sql);
	

	return mysqli_affected_rows($conn);
}

function tambahdatamasalah ($data) {
	
	global $conn;
	// ambil data dari tiap elemen dalam form


	$no_masalah = htmlspecialchars($data["no_masalah"]);
	$masalah = htmlspecialchars($data["masalah"]);
	
	

	//query insert data
	$sql = "INSERT INTO tb_masalah VALUES ( '$no_masalah','$masalah')";
	mysqli_query($conn, $sql);
	

	return mysqli_affected_rows($conn);
}

function tambahjabatan ($data) {
	
	global $conn;
	// ambil data dari tiap elemen dalam form


	$noj = htmlspecialchars($data["noj"]);
	$jabatan = htmlspecialchars($data["jabatan"]);
	
	

	//query insert data
	$sql = "INSERT INTO pegawai VALUES ( '$noj','$jabatan')";
	mysqli_query($conn, $sql);
	

	return mysqli_affected_rows($conn);
}


function ubah ($data){
		global $conn;
	// ambil data dari tiap elemen dalam form

	$id = $data ["id"];
	$nama = htmlspecialchars($data["nama"]);
	$sex = htmlspecialchars($data["sex"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$TTL = htmlspecialchars($data["TTL"]);
	$No_Masalah = htmlspecialchars($data["No_Masalah"]);


	//query insert data
	$sql = "UPDATE solvee SET 
			Nama = '$nama',
			Sex = '$sex',
			No_hp = '$no_hp',
			Alamat = '$alamat',
			TTL = '$TTL',
			No_Masalah = '$No_Masalah'
			WHERE Id_S = $id ";
	mysqli_query($conn, $sql);
	

	return mysqli_affected_rows($conn);
}

function ubahpromotor ($data){
		global $conn;
	// ambil data dari tiap elemen dalam form

	$id = $data ["id"];
	$nama = htmlspecialchars($data["nama"]);
	$sex = htmlspecialchars($data["sex"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	$noj = htmlspecialchars($data["noj"]);
	
	

	//query insert data
	$sql = "UPDATE promotor SET 
			Nama_p = '$nama',
			Sex = '$sex',
			No_hp = '$no_hp',
			noj = '$noj'
			WHERE Id_Pro = $id ";
	mysqli_query($conn, $sql);
	

	return mysqli_affected_rows($conn);
}

function ubahsolver ($data){
		global $conn;
	// ambil data dari tiap elemen dalam form

	$id = $data ["id"];
	$nama = htmlspecialchars($data["nama"]);
	$sex = htmlspecialchars($data["sex"]);
	$no_masalah = htmlspecialchars($data["no_masalah"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	$noj = htmlspecialchars($data["noj"]);
	
	

	//query insert data
	$sql = "UPDATE solver SET 
			Nama = '$nama',
			Sex = '$sex',
			No_Masalah = '$no_masalah',
			No_hp = '$no_hp',
			noj = '$noj'
			WHERE Id_Sol = $id ";
	mysqli_query($conn, $sql);
	

	return mysqli_affected_rows($conn);
}

function ubahadmin ($data){
		global $conn;
	// ambil data dari tiap elemen dalam form

	$id = $data ["id"];
	$nama = htmlspecialchars($data["nama"]);
	$sex = htmlspecialchars($data["sex"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	$noj = htmlspecialchars($data["noj"]);
	
	

	//query insert data
	$sql = "UPDATE admin SET 
			Nama = '$nama',
			Sex = '$sex',
			No_hp = '$no_hp',
			noj = '$noj'
			WHERE Id_ad = $id ";
	mysqli_query($conn, $sql);
	

	return mysqli_affected_rows($conn);
}

function ubahm($data){
		global $conn;
	// ambil data dari tiap elemen dalam form

	
	$no_masalah = htmlspecialchars($data["no_masalah"]);
	$masalah = htmlspecialchars($data["masalah"]);
	
	

	//query insert data
	$sql = "UPDATE tb_masalah SET 
			No_Masalah = '$no_masalah',
			Masalah = '$masalah' 
			WHERE No_Masalah = $no_masalah ";
	mysqli_query($conn, $sql);
	

	return mysqli_affected_rows($conn);
}

function ubahjabatan($data){
		global $conn;
	// ambil data dari tiap elemen dalam form

	
	$noj = htmlspecialchars($data["noj"]);
	$jabatan = htmlspecialchars($data["jabatan"]);
	
	

	//query insert data
	$sql = "UPDATE pegawai SET 
			noj = '$noj',
			jabatan = '$jabatan' 
			WHERE noj = $noj ";
	mysqli_query($conn, $sql);
	

	return mysqli_affected_rows($conn);
}

function hapus ($id) {

	global $conn;
	mysqli_query ($conn, "DELETE FROM solvee where Id_S = $id ");
	return mysqli_affected_rows($conn);
}

function hapus_pro ($id) {

	global $conn;
	mysqli_query ($conn, "DELETE FROM promotor where Id_Pro = $id ");
	return mysqli_affected_rows($conn);
}



function hapus_sol ($id) {

	global $conn;
	mysqli_query ($conn, "DELETE FROM solver where Id_Sol = $id ");
	return mysqli_affected_rows($conn);
}

function hapus_ad ($id) {

	global $conn;
	mysqli_query ($conn, "DELETE FROM admin where Id_ad = $id ");
	return mysqli_affected_rows($conn);
}

function hapus_masalah ($id) {

	global $conn;
	mysqli_query ($conn, "DELETE FROM tb_masalah where No_Masalah = $id");
	return mysqli_affected_rows($conn);
}

function hapus_jabatan ($id) {

	global $conn;
	mysqli_query ($conn, "DELETE FROM pegawai where noj = $id");
	return mysqli_affected_rows($conn);
}




function cari ($keyword) {

	$query = "SELECT * FROM solvee WHERE Nama LIKE '%$keyword%' 
	

	";

	return query ( $query);
}


 ?>