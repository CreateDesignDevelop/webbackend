<?php
	session_start();

	$email = '';

	if (isset($_POST['btnNext'])) {
		//returns true if valid, otherwise returns email
		$emailValid = filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL );
		
		if (!$emailValid) {
			$email = 'not valid, try again';
		} else {
			$_SESSION['login']['email'] = $_POST['email'];
			$_SESSION['login']['password'] = $_POST['password'];
			$email = $_SESSION['login']['email'];
			$password = $_SESSION['login']['password'];

			header('location: login-proces.php');
		}
	}

	if(isset($_SESSION["message"])){
		echo "type: " . $_SESSION["message"]["type"];
		echo " message : " . $_SESSION["message"]["text"];
		unset($_SESSION["message"]);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login-form</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<h1>Login-form</h1>
	<form action="login-form.php" method="POST">
		<ul>
			<li>
				<label for="email">Email</label>
				<input id="email" name="email" type="text" value="<?= (isset( $_SESSION['registration']['email'] )) ?$email:'';?>">
			</li>
			<li>
				<label for="password">Password</label>
				
				<input id="password" name="password" type="text">
			</li>
			<li>
				<input id='btnNext' name="btnNext" value="Next" type="submit">
			</li>
		</ul>
	</form>
	<p>
		Nog geen account? Maak er dan eentje aan op de <a href="registratie-process.php">registratiepagina.</a>
	</p>
</body>
</html>