<?php  
	session_start();

	if (isset($_POST['add'])) {
		$_SESSION['add']['titel'] 		= $_POST['titel'];
		$_SESSION['add']['artikel'] 	= $_POST['artikel'];
		$_SESSION['add']['kernwoorden'] = $_POST['kernwoorden'];
		$_SESSION['add']['datum'] 		= $_POST['datum'];

		//VERSCHIL???
		//if( ($_POST["titel"] != "") && ($_POST["artikel"] != "") && ($_POST["kernWoorden"] != "") && ($_POST["datum"] != "") )
		if ( (isset($_POST['titel'])) && (isset($_POST['artikel'])) && (isset($_POST['kernwoorden'])) && (isset($_POST['datum']))) {
			$titel 			= $_POST['titel'];
			$artikel 		= $_POST['artikel'];
			$kernwoorden 	= $_POST['kernwoorden'];
							//zet datum om naar leesbaar formaat en replace speciale characters
			$datum 			= date('Y-m-d', strtotime(str_replace('-', '/', $_POST["datum"])));

			try {
				$db = new PDO('mysql:host=localhost;dbname=opdracht-mod-rewrite-blog', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
				$querystring = 	'	INSERT INTO artikels (titel, artikel, kernwoorden, datum)
									VALUES ( :titel, :artikel, :kernwoorden, :datum)	
								'; /*':' om sql injection te voorkomen*/
				$statement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren

				$statement->bindValue( ':titel', $titel);
				$statement->bindValue( ':artikel', $artikel);
				$statement->bindValue( ':kernwoorden', $kernwoorden);
				$statement->bindValue( ':datum', $datum);

				$succes = $statement->execute();
				if ($succes) {
					$_SESSION['message']['type'] = 'SUCCES';
					$_SESSION['message']['text'] = 'Something went right :)';
					header('location: artikel-overzicht.php');
				} else{
					$_SESSION['message']['type'] = 'ERROR';
					$_SESSION['message']['text'] = 'Adding: Something went wrong :(';
					header('location: artikel-toevoegen-form.php');
				}
			} 
			catch(PDOException $e){
				$_SESSION['message']['type'] = 'ERROR';
				$_SESSION['message']['text'] = 'Database: Something went wrong :(';
			}
		} else{
			$_SESSION['message']['type'] = 'ERROR';
			$_SESSION['message']['text'] = 'Please fill in the blanks';
			header('location: artikel-toevoegen-form.php');
		}
	}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>artikel-toevoegen.php</title>
</head>
<body>
	
</body>
</html>