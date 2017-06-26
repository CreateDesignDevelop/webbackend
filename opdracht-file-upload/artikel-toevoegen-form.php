<?php
	$validation = $_COOKIE['validation'];
	$email = $_COOKIE['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>artikel toevoegen</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<h1>artikel toevoegen</h1>
	<a href="artikel-overzicht.php">Terug naar overzicht</a>
	<form action="artikel-toevoegen-process.php" method="post">
		<ul>
			<li>
				<label for="titel">Titel</label>
				<input id="titel" name="titel" type="text">
			</li>
			<li>
				<label for="artikel">Artikel</label>
				<input id="artikel" name="artikel" type="text">
			</li>
			<li>
				<label for="kernwoorden">Kernwoorden</label>
				<input id="kernwoorden" name="kernwoorden" type="text">
			</li>
			<li>
				<label for="datum">Datum (dd-mm-jjjj)</label>
				<input id="datum" name="datum" type="text">
			</li>
			<input id='btnArtikelToevoegen' name="btnArtikelToevoegen" value="Artikel Toevoegen" type="submit">
		</ul>
	</form>
</body>
</html>