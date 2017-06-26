<?php 
	$username 	= "wout";
	$password 	= "azerty";
	$message 	= "";

	if (isset($_POST["validate"])) {
		$tempUsername = "";
		$tempPassword = "";
		if (isset($_POST["username"])) {
			$tempUsername = $_POST["username"];
		}
		if (isset($_POST["password"])) {
			$tempPassword = $_POST["password"];
		}

		if ($tempUsername == $username && $tempPassword == $password) {
			$message = "Welkom";
		} else {
			$message = "Er ging iets mis bij het inloggen, probeer opnieuw";
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opdracht Post</title>
</head>
<body>
	<h1>Opdracht Post</h1>

	<form action="opdracht-post.php" method="post">
		<input type="text" 		name="username" placeholder = "Username">
		<input type="password" 	name="password" placeholder = "Password">
		<input type="submit" 	name="validate" >
		<p><?php echo $message ?></p>
		<!-- <?=$message?> -->
	</form>
	
</body>
</html>