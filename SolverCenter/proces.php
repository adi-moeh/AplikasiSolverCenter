<?php 

	$username = $_post ['user'];
	$password = $_post ['pass'];

//prefent mysql injeqsion
	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysqli_real_escape_string($username);
	$password = mysqli_real_escape_string($password);

	//coneksi

	$sql = mysqli_connect("localhost", "root", "","solver_center");

	$result = mysqli_query("SELECT * FROM tb_user where username = '$username' and password = '$password'") or die ("failed to query database" mysqli_error());
	$row = mysqli_fetch_array($result);
	if ($row ['username'] == $username && $row['password']== $password){

		echo "login ok ";
	}else{

		echo "filed to login";
	}

 ?>