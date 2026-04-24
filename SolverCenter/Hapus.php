<?php 

require 'functions.php';
$id = $_GET["id"];//id ini di dapat dari href hapus di aksi
// $id_sol = $_GET["id_sol"];
// $id_pro = $_GET["id_pro"];
// $id_ad = $_GET["id_ad"];
//$masalah = $_GET["id"];

if (hapus ($id) > 0) {

	echo "
			<script>
				alert ('data berhasil dihapus!');
				document.location.href = 'index.php';
			</script>
		";
	}else {
		echo "
			<script>
				alert ('data gagal dihapus!');
				document.location.href = 'index.php';
			</script>
		";
} 

// if (hapus_pro ($id) > 0) {

// 	echo "
// 			<script>
// 				alert ('data berhasil dihapus!');
// 				document.location.href = 'index.php';
// 			</script>
// 		";
// 	}else {
// 		echo "
// 			<script>
// 				alert ('data gagal dihapus!');
// 				document.location.href = 'index.php';
// 			</script>
// 		";
// } 

// if (hapus_sol ($id) > 0) {

// 	echo "
// 			<script>
// 				alert ('data berhasil dihapus!');
// 				document.location.href = 'index.php';
// 			</script>
// 		";
// 	}else {
// 		echo "
// 			<script>
// 				alert ('data gagal dihapus!');
// 				document.location.href = 'index.php';
// 			</script>
// 		";
// } 

if (hapus_ad ($id) > 0) {

	echo "
			<script>
				alert ('data berhasil dihapus!');
				document.location.href = 'index.php';
			</script>
		";
	}else {
		echo "
			<script>
				alert ('data gagal dihapus!');
				document.location.href = 'index.php';
			</script>
		";
}

//hapus_jabatan didapat dari file functions.php
if (hapus_jabatan ($id) > 0) {

	echo "
			<script>
				alert ('data berhasil dihapus!');
				document.location.href = 'index.php';
			</script>
		";
	}else {
		echo "
			<script>
				alert ('data gagal dihapus!');
				document.location.href = 'index.php';
			</script>
		";
}

// if (hapus_masalah ($masalah) > 0) {

// 	echo "
// 			<script>
// 				alert ('data berhasil dihapus!');
// 				document.location.href = 'DataMasalah.php';
// 			</script>
// 		";
// 	}else {
// 		echo "
// 			<script>
// 				alert ('data gagal dihapus!');
// 				document.location.href = 'DataMasalah.php';
// 			</script>
// 		";
// }

 ?>