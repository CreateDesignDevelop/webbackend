<?php
	session_start();
	$validation = $_COOKIE['validation'];
	$email = $_COOKIE['email'];

	if (isset($_POST['btnArtikelToevoegen'])) {
		try{
			$db = new PDO('mysql:host=localhost;dbname=opdracht-CRUD-CMS', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
			$querystring = 	'	INSERT INTO artikels (titel, artikel, kernwoorden, datum)
									VALUES ( :titel, :artikel, :kernwoorden, :datum )	
								'; /*':' om sql injection te voorkomen*/
			$insertStatement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren
			$insertStatement->bindValue( ':titel', $_POST[ 'titel' ] );
			$insertStatement->bindValue( ':artikel', $_POST[ 'artikel' ] );
			$insertStatement->bindValue( ':kernwoorden', $_POST[ 'kernwoorden' ] );
			$insertStatement->bindValue( ':datum', $_POST[ 'datum' ] );
			$succes = $insertStatement->execute();

			if ($succes) {
				$_SESSION['message']['text'] = 'artikel succesvol toegevoegd';
				header('location: artikel-overzicht.php');
			}
		}
		catch(PDOException $e){
			$_SESSION['message']['error'] = 'oeps er liep iets mis';
		}
		if (isset($_SESSION['message'])) {
			echo $_SESSION['message'];
		}
	}
?>