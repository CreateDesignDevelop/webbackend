<?php
session_start();
	$email = "";
	$message ="";

	if(isset($_SESSION["message"]))
	{
		echo "type : " .     $_SESSION["message"]["type"] . "</br>";
		echo " message : " . $_SESSION["message"]["message"];
	}

	if(isset($_SESSION["contact"]))
	{
		$email =   $_SESSION["contact"]["email"];
		$message = $_SESSION["contact"]["text"];
	}
?>

<!doctype html>
<html>
	<head>
		<title>opdracht-mail</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<h1>Contacteer ons</h1>
		<form action="contact.php" method = "post">
			<ul>
				<li>
					<label for="email"><p>Email</p></label>
					<input type="text" name="email" value="<?=$email?>">
				</li>
				<li>
					<label for="text"><p>message</p></label>
					<input type="text" name="text" value="<?=$message?>">
				</li>
				<li>					
					<input type="checkBox" name="sendToMyself">Verstuur kopie naar mezelf</input>					
				</li>
				<li>					
					<input type="submit" name="send">				
				</li>
			</ul>
		</form>
	</body>
</html>