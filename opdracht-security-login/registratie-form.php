<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>opdracht-security-login</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<h1>Register</h1>
	<?= $messageContainer ?>
	<form action="registratie-process.php" method="POST">
		<ul>
			<li>
				<label for="email">Email</label>
				<input id="email" name="email" type="text" value="<?= (isset( $_SESSION['login']['email'] )) ?$email:'';?>">
			</li>
			<li>
				<label for="password">Password</label>
				
				<input id="password" name="password" type="text" value="<?= (isset( $_SESSION['login']['rndPassword'] )) ?$rndPassword:'';?>">
				<input id="btnGeneratePassword" name="btnGeneratePassword" value="Generate random" type="submit">
			</li>
			<li>
				<input id='btnNext' name="btnRegister" value="Register" type="submit">
			</li>
		</ul>
	</form>
</body>
</html>