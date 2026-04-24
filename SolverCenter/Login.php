<?php 

require 'functions.php';

if (isset($_POST["login"])){

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query ($conn, "SELECT * FROM tb_user WHERE Username = '$username'");

	//cek username
	if (mysqli_num_rows($result) === 1) {

		//cek pasword
		$row = mysqli_fetch_assoc ($result);
		if ( $password = $row["Password"]) {
			header("Location: index.php");
			exit;
			
		}
	}
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<div id="frm">
		<form action="" method="POST">
			<h1>Halaman Login</h1>
			<ul>
				<li>
					<label for="username">Username :</label>
					<input type="text" name="username" id="username">
				</li>
				<li>
					<label for="password">Pasword :</label>
					<input type="password" name="password" id="password">
				</li>
				<li>
					<button type="submit" name="login">Login</button>
				</li>
			</ul>
			
		</form>
		
	</div>
</body>
</html>