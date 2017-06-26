<?php
	$validation = false;
	if (isset($_COOKIE['login'])) {
		//explode — Split a string by string
		$userInfo 	= explode(',', $_COOKIE['login']);	//same ',' delimiter as setCookie
		$email 		= $userInfo[0];
		$hash 		= $userInfo[1];

		$db = new PDO('mysql:host=localhost;dbname=opdracht-CRUD-CMS', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
		$checkSaltQuery = 	'	SELECT salt FROM users 
								WHERE email = :email
							'; 	
		$checkSaltStatement = $db->prepare($checkSaltQuery);
		$checkSaltStatement->bindValue(':email', $email);
		$checkSaltStatement->execute();

		$saltArray = array();
		while($row = $checkSaltStatement->fetch(PDO::FETCH_ASSOC))
		{
			$saltArray[] = $row;		//get values
		}

		$salt = $saltArray[0]['salt'];	//get 'salt' value from columns

		//hash
		//Computes a digest hash value for the given data using a given method, and returns a raw or binhex encoded string. 
		$hashedEmailAndSalt = openssl_digest($email . $salt , 'sha512');
		
		//check if hashed email/salt is thesame as the hash from the database, if so: user is realy the same user 
		if ($hashedEmailAndSalt == $hash) {
			$validation = true;
			setcookie('validation', $validation, time()+2592000); //30days

		} else {
			//setcookie("cookieName", $value, time()+3600);  /* expire in 1 hour */
			setcookie('login', null, -1);
			$_SESSION['message']['type'] = 'ERROR';
			$_SESSION['message']['text'] = 'Validation is not correct';
		}

		$db = new PDO('mysql:host=localhost;dbname=opdracht-file-upload', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
		$querystring = 	'	SELECT profile_picture
							FROM users
							WHERE email = :email;
						'; /*':' om sql injection te voorkomen*/
		$selectStatement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren
		$selectStatement->bindValue(':email', $email);
		$selectStatement->execute();

		$profilePictureArray = array();
		while($row = $selectStatement->fetch(PDO::FETCH_ASSOC))
		{
			$profilePictureArray[] = $row;		//get values
		}

		if (!empty($profilePictureArray)) {
			$profilePicture = $profilePictureArray[0]['profile_picture'];
		} else {
			$profilePicture = 'dummy.jpg';
		}

	} else {
		header('location: login-proces');
		$_SESSION['message']['type'] = 'ERROR';
		$_SESSION['message']['text'] = 'You first need to login';
	}

	if (isset($_GET['logout'])) {
		setcookie('login', null, -1);			//-1 for 'past time' so it unsets

		$_SESSION['message']['type'] = 'SUCCES';
		$_SESSION['message']['text'] = 'You succesfully logged out';

		header('location: login-form.php');
	}

	if(isset($_SESSION["message"])){
		//worked with echo istead of messagecontainer
		echo "type : " . $_SESSION["message"]["type"];
		echo " message : " . $_SESSION["message"]["text"];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>dashboard</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<?php if($validation):?>
		<p>|| Ingelogd als: <?= $email?> || <a href="dashboard.php?logout">Logout</a><br><br></p>
		<h1>Dashboard</h1><br>
		<img class='image' src="images/<?= $profilePicture ?>"><br>

		<a href="artikel-overzicht.php">Artikels</a><br>
		<a href="gegevens-wijzigen-form.php">Gegevens Wijzigen</a>
	<?php endif?>
</body>
</html>