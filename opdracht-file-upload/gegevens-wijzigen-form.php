<?php
	$validation = $_COOKIE['validation'];
	$email = $_COOKIE['email'];

	$db = new PDO('mysql:host=localhost;dbname=opdracht-file-upload', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
	$querystring = 	'	SELECT profile_picture, id
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
		$id = $profilePictureArray[0]['id'];
		$_COOKIE['profilePicture'] = $profilePicture;
		$_SESSION['id'] = $id;
	} else {
		$profile_picture = 'dummy/imagesdummy.jpg';
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
	<form action="gegevens-bewerken.php" method="post" enctype="multipart/form-data">
		<p><a href="dashboard.php">Terug naar Dashboard</a> || Ingelogd als: <?= $email?> || <a href="dashboard.php?logout">Logout</a><br><br></p>
		<h1>Gegevens wijzigen</h1><br>

		<p>Profielfoto</p><br>
		<img class='image' src="images/<?= $profilePicture ?>">
		<input type="file" name="profilePicture"><br><br>
		<label>e-mail</label>
		<input id="email" name="email" type="text"><br><br>
		<input id='btnGegevensWijzigen' name="btnGegevensWijzigen" value= 'Gegevens wijzigen' type="submit">
	</form>
</body>
</html>