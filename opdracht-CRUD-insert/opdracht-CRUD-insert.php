<?php 
	$messageContainer = '';

	if (isset($_POST['submit']) ) {
		if (isset($_POST['brnaam']) && isset($_POST['adres']) && isset($_POST['postcode']) && isset($_POST['gemeente']) && isset($_POST['omzet'])) {
			try{
				$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
				$querystring = 	'	INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet)
									VALUES ( :brnaam, :adres, :postcode, :gemeente, :omzet )	
								'; /*':' om sql injection te voorkomen*/
				$statement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren

				$statement->bindValue( ':brnaam', $_POST[ 'brnaam' ] );
				$statement->bindValue( ':adres', $_POST[ 'adres' ] );
				$statement->bindValue( ':postcode', $_POST[ 'postcode' ] );
				$statement->bindValue( ':gemeente', $_POST[ 'gemeente' ] );
				$statement->bindValue( ':omzet', $_POST[ 'omzet' ] );

				$statement->execute();

				$messageContainer = 'waardes toegevoegd';
			} 
			catch(PDOException $e){
				$messageContainer = 'er ging iets fout';
			}
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>opdracht-CRUD-insert</title>

	<style type="text/css">
		li label{
			width: 100px;
		}
		
	</style>
</head>
<body>
	<h1>Voeg waardes toe aan de 'brouwers' database</h1>
	<form method="POST" action="opdracht-CRUD-insert.php">
		<ul>
			<li>
				<label for="brouwernaam">Brouwernaam</label>
				<input id="brouwernaam" name="brnaam" type="text">
			</li>			
			<li>
				<label for="adres">Adres</label>
				<input id="adres" name="adres" type="text">
			</li>
			<li>
				<label for="postcode">Postcode</label>
				<input id="postcode" name="postcode" type="text">
			</li>
			<li>
				<label for="gemeente">Gemeente</label>
				<input id="gemeente" name="gemeente" type="text">
			</li>
			<li>
				<label for="omzet">Omzet</label>
	    		<input id="omzet" name="omzet" type="text">
			</li>
		</ul>

    	<input name="submit" type="submit"></input>
		<?= $messageContainer ?>
	</form>
</body>
</html>