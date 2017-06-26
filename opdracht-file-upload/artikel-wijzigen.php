<?php
	$validation = $_COOKIE['validation'];
	$email = $_COOKIE['email'];

	if (isset($_GET['artikel'])) {
		$id = $_GET['artikel'];

		try {
			$db = new PDO('mysql:host=localhost;dbname=opdracht-CRUD-CMS', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
			$querystring = 	'	SELECT * 
								FROM artikels 
								WHERE is_archived = 0
							'; /*':' om sql injection te voorkomen*/
			$selectStatement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren
			$succes = $selectStatement->execute();
			
			$artikel = array();
			while ($row = $selectStatement->fetch( PDO:: FETCH_ASSOC)){		//Fetches the next row from a result set
				$artikel[] = $row;										//iedere key is de naam van die row
			}

			foreach ($artikel as $value) {
				if ($value['id'] == $id) {	/*to select the right values and not the last*/				
					$titel = $value['titel'];
					$artikel = $value['artikel'];
					$kernwoorden = $value['kernwoorden'];
					$datum = $value['datum'];
				}
			}
		} catch (PDOException $e) {
			$_SESSION['message']['error'] = 'oeps er liep iets mis';
			header('location: artikel-overzicht.php');	
		}
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>artikel wijzigen</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<h1>artikel wijzigen</h1>
	<a href="artikel-overzicht.php">Terug naar overzicht</a>
	<form action="artikel-overzicht.php" method="post">
		<ul>
			<li>
				<label for="titel">Titel</label>
				<input id="titel" name="titel" type="text" value="<?=$titel?>">
			</li>
			<li>
				<label for="artikel">Artikel</label>
				<input id="artikel" name="artikel" type="text" value="<?=$artikel?>">
			</li>
			<li>
				<label for="kernwoorden">Kernwoorden</label>
				<input id="kernwoorden" name="kernwoorden" type="text" value="<?=$kernwoorden?>">
			</li>
			<li>
				<label for="datum">Datum (dd-mm-jjjj)</label>
				<input id="datum" name="datum" type="text" value="<?=$datum?>">
			</li>
			<input id='btnArtikelToevoegen' name="btnArtikelToevoegen" value= <?= $id ?> type="submit">
		</ul>
	</form>
</body>
</html>