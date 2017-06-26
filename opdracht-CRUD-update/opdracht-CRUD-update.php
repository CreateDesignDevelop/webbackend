<?php 
	$messageContainer = '';
	$brouwernr = '';

	session_start();

	try{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
	
		$querystring =	'	SELECT * FROM brouwers 							
						';
		$statement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren
		$statement->execute();

		//brouwers data opvragen
		$brouwers = array();
		while ($row = $statement->fetch( PDO:: FETCH_ASSOC)){		//Fetches the next row from a result set
			$brouwers[] = $row;										//iedere key is de naam van die row
		}

		$columnNames = array();
		foreach($brouwers[0] as $key => $bier)		//index 0 is '#'
		{
			$columnNames[] = $key;
		}

		if ( isset($_POST['btnDelete']) ) {

			$queryDelete = 	'	DELETE FROM brouwers 
								WHERE brouwernr = :brouwernr
							'; 							//':' om sql injection te voorkomen
			$statementDelete = $db->prepare($queryDelete);	//klaarzetten maar nog niet uitvoeren
			$statementDelete->bindValue(':brouwernr', $_POST['btnDelete']);
			$deleted = $statementDelete->execute();

			if ($deleted) {
				header('location: opdracht-CRUD-update.php');	//needed to update the table
				$messageContainer = 'deleted';
			} else {
				$messageContainer = 'not deleted';
			}
		}

		if(isset($_GET["update"]))
		{
			$brouwernr = $_GET['update'];
			foreach($brouwers as $key)
			{
				if($key["brouwernr"] == $brouwernr)	//check if the key is thesame as $brouwernr
				{
					$brnaam = $key["brnaam"];		//apply values to input fields
					$adres = $key["adres"];
					$postcode = $key["postcode"];
					$gemeente = $key["gemeente"];
					$omzet = $key["omzet"];
				}
			}
		}

		if (isset($_GET['updateConfirm'])) {
			if (isset($_POST['brnaam']) &&
			 	isset($_POST['adres']) && 
			 	isset($_POST['postcode']) && 
			 	isset($_POST['gemeente']) && 
			 	isset($_POST['omzet'])) {
				try{
					$querystring = 	'	UPDATE brouwers
										SET
										brnaam = :brnaam,
										adres = :adres,
										postcode = :postcode,
										gemeente = :gemeente,
										omzet = :omzet
										WHERE brouwernr = :brouwernr
									'; /*':' om sql injection te voorkomen*/
					$statement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren

					$statement->bindValue( ':brnaam', $_POST[ 'brnaam' ] );
					$statement->bindValue( ':adres', $_POST[ 'adres' ] );
					$statement->bindValue( ':postcode', $_POST[ 'postcode' ] );
					$statement->bindValue( ':gemeente', $_POST[ 'gemeente' ] );
					$statement->bindValue( ':omzet', $_POST[ 'omzet' ] );
					$statement->bindValue( ':brouwernr', $_GET['updateConfirm']);

					$statement->execute();

					$messageContainer = 'waardes toegevoegd';
				} 
				catch(PDOException $e){
					$messageContainer = 'er ging iets fout met het updaten';
				}
			}
		}	
	}
	catch(PDOException $e){
		$messageContainer = 'ERROR ERROR ERROR: ' .$e; 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>opdracht-CRUD-delete-Deel2</title>
</head>
<body>
	<?= $messageContainer ?>
	<form action="opdracht-CRUD-update.php" method="POST">
	<!-- <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST"> -->

		<?php if(isset($_POST['btnSemiDelete'])): ?>
			<p>Do you realy want to delete??</p>
			<button type="submit" name="btnDelete" value="<?= $_POST["btnSemiDelete"] ?>">Yes</button>
			<button type="submit" name="btnNoDelete" value="confirmContainerClear">No</button>
		<?php endif ?>

		<?php if(isset($_GET['update'])): ?>
			<p>Update the value</p>			
			<ul>
				<li>
					<label for="brouwernaam">Brouwernaam</label>
					<input id="brouwernaam" name="brnaam" type="text" value="<?=$brnaam?>">
				</li>			
				<li>
					<label for="adres">Adres</label>
					<input id="adres" name="adres" type="text" value="<?=$adres?>">
				</li>
				<li>
					<label for="postcode">Postcode</label>
					<input id="postcode" name="postcode" type="text" value="<?=$postcode?>">
				</li>
				<li>
					<label for="gemeente">Gemeente</label>
					<input id="gemeente" name="gemeente" type="text" value="<?=$gemeente?>">
				</li>
				<li>
					<label for="omzet">Omzet</label>
		    		<input id="omzet" name="omzet" type="text" value="<?=$omzet?>">
				</li>
			</ul>
			<!-- <button type="submit" name="btnUpdate" value="<?= $brouwernr ?>">Update</button> -->
			<a href="opdracht-CRUD-update.php?updateConfirm=<?=$brouwer["brouwernr"]?>">Confirm</a>
		<?php endif ?>

		
		<table>
			<thead>
				<tr>
					<?php foreach($columnNames as $columnName): ?>
						<td><?= $columnName ?></td>
					<?php endforeach?>
				</tr>
			</thead>
			<tbody>
				<?php foreach($brouwers as $key=>$brouwer): ?>	
					<tr>				
						<!-- nodig om kolom op te schuiven vanwege '#' --> 				
						<?php foreach($brouwer as $value): ?>
							<td><?= $value ?></td>
						<?php endforeach ?>
						<td>
							<button type="submit" name="btnSemiDelete" value="<?= $brouwer['brouwernr'] ?>">
								<img src="icon-delete.png" alt="Delete button">
							</button>
						</td>
						<td>
							<a href="opdracht-CRUD-update.php?update=<?=$brouwer["brouwernr"]?>">
								<img src="icon-update.png" alt="Update button">
							</a>
						</td>
					</tr>
				<?php endforeach?>
			</tbody>
			<tfoot>
				
			</tfoot>
		</table>
	</form>
</body>
</html>
