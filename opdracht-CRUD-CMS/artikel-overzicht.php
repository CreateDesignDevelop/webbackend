<?php
	session_start();
	$message = 'geen artikel gevonden.';
	$userInfo 	= explode(',', $_COOKIE['login']);	//same ',' delimiter as setCookie
	$email 		= $userInfo[0];

	if (isset($_SESSION['message'])) {
		$message = $_SESSION['message']['text'];
		echo $_SESSION['message']['error'];
	}

	try{
		$db = new PDO('mysql:host=localhost;dbname=opdracht-CRUD-CMS', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
		$querystring = 	'	SELECT * 
							FROM artikels 
							WHERE is_archived = 0
						'; /*':' om sql injection te voorkomen*/
		$selectStatement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren
		$succes = $selectStatement->execute();

		$artikels = array();
		while ($row = $selectStatement->fetch( PDO:: FETCH_ASSOC)){		//Fetches the next row from a result set
			$artikels[] = $row;										//iedere key is de naam van die row
		}
	}
	catch(PDOException $e){
		$_SESSION['message']['error'] = 'oeps er liep iets mis';
	}

	if (isset($_POST['btnArtikelToevoegen'])) {
		try {
			$db = new PDO('mysql:host=localhost;dbname=opdracht-CRUD-CMS', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
			$querystring = 	'	UPDATE artikels
								SET
								titel = :titel,
								artikel = :artikel,
								kernwoorden = :kernwoorden,
								datum = :datum
								WHERE id = :id
							'; /*':' om sql injection te voorkomen*/
					$statement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren

					$statement->bindValue( ':titel', $_POST[ 'titel' ] );
					$statement->bindValue( ':artikel', $_POST[ 'artikel' ] );
					$statement->bindValue( ':kernwoorden', $_POST[ 'kernwoorden' ] );
					$statement->bindValue( ':datum', $_POST[ 'datum' ] );
					$statement->bindValue( ':id', $_POST['btnArtikelToevoegen']);

					$statement->execute();
		} catch (PDOException $e) {
			
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>artikel overzicht</title>
	<link rel="stylesheet" href="style.css" type="text/css">
	<style type="text/css">
		#artikels span{
			color: black;
			position: relative;
			left: 20px;
		}
		#artikels{
			background-color: rgba(0,255,0,0.3);
			border-radius: 5px;
			margin: 5px 0 5px 0;
			padding: 5px;
			color: rgba(0,0,0,0.5);
		}
		.archived{
			background-color: rgba(0,0,0,0.3);
		}
	</style>
</head>
<body>
	<?php if($_COOKIE['login']):?>
		<p><a href="dashboard.php">Terug naar dashboard</a> || Ingelogd als: <?= $email?> || <a href="dashboard.php?logout">Logout</a><br><br></p>
		<h1>Overzicht van de artikels</h1><br>
		<?= $message ?><br><br>
		
		<table>
			<?php foreach($artikels as $value): ?>
				<div id="artikels">
					<p><?=$value['id']?></p>
					<p>Artikel: <span><br><?= $value['artikel'] ?></span></p>
					<p>Kernwoorden: <span><br><?= $value['kernwoorden'] ?></span></p>
					<p>Datum: <span><br><?= $value['datum'] ?></span></p>
					<p>
						<a href="artikel-wijzigen.php?artikel=<?=$value["id"]?>">artikel wijzigen</a> ||
						<a href="artikel-activeren.php?artikel=<?=$value["id"]?>" <?php if($value["is_active"] == 1):?>class='.archived'<?php endif?> ><?php if($value["is_active"] == 0):?>artikel activeren <?php else:?>artikel deactiveren<?php endif?></a> ||
						<a href="artikels-verwijderen.php?artikel=<?=$value["id"]?>">artikel verwijderen</a> ||
					</p>
				</div>

			<?php endforeach ?> 
		</table><br><br>

		<a href="artikel-toevoegen-form.php">Voeg een artikel toe</a>
	<?php endif?>
</body>
</html>