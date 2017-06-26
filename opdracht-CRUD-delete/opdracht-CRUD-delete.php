<?php 
	$messageContainer = '';
	
	try{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
	
		if ( isset($_POST['btnDelete']) ) {

			echo $_POST['btnDelete'];

			$queryDelete = 	'	DELETE FROM brouwers 
								WHERE brouwernr = :brouwernr
							'; 							//':' om sql injection te voorkomen
			$statementDelete = $db->prepare($queryDelete);	//klaarzetten maar nog niet uitvoeren
			$statementDelete->bindValue(':brouwernr', $_POST['btnDelete']);
			$deleted = $statementDelete->execute();

			if ($deleted) {
				$messageContainer = 'deleted';
			} else {
				$messageContainer = 'not deleted';
			}
		}

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
	}
	catch(PDOException $e){
		$messageContainer = 'ERROR ERROR ERROR: ' .$e; 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>opdracht-CRUD-delete</title>
</head>
<body>
	<?= $messageContainer ?>
	<form action="opdracht-CRUD-delete.php" method="POST">
	<!-- <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST"> -->
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
							<button type="submit" name="btnDelete" value="<?= $brouwer['brouwernr'] ?>">
								<img src="icon-delete.png" alt="Delete button">
							</button>
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





<!-- 
<?php foreach($brouwers as $value): ?>
	<tr>
		<td><?= $value['brouwernr'] ?></td>
		<td><?= $value['brnaam'] ?></td>
		<td><?= $value['adres'] ?></td>
		<td><?= $value['postcode'] ?></td>
		<td><?= $value['gemeente'] ?></td>
		<td><?= $value['omzet'] ?></td>
		<button type="submit" name="btnDelete" value="<?= $key['brouwernr'] ?>">
			<img src="icon-delete.png" alt="Delete button">
		</button>
	</tr>
<?php endforeach ?> 
-->