<!-- 
-not able to fill in option correctly
-toon bieren aan de hand van geselcteerde brouwerij
 -->

<?php 
	$messageContainer = '';

	if (isset($_GET['btnSelect'])) {
		$currentBrouwer = '';
	}

	try{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
		
		$querystring = 	'	SELECT brouwernr, brnaam 
							FROM brouwers						
						';
		$statement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren
		$statement->execute();

		/*$db->query('SELECT * FROM bieren');
		$messageContainer = 'Selected * from bieren';*/

		$bieren = array();
		while ($row = $statement->fetch( PDO:: FETCH_ASSOC)){		//Fetches the next row from a result set
			$bieren[] = $row;
		}

		$columnNames = array();

		foreach($bieren[0] as $key => $bier)		//index 0 is '#'
		{
			$columnNames[] = $key;					//fills in the column names
		}

	} 
	catch (PDOException $e){
		$messageContainer = 'Er ging iets mis'. $e->getMessage();
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		thead{
			font-weight: 800;
		}
		table{
			border: solid 1px;
		}
		td{
			border: solid 1px;
			border-color: rgba(0, 0, 0, 0.4);
		}
	</style>
</head>
<body>
	<p><?php echo $messageContainer ?></p>
	<form action="opdracht-CRUD-query-deel2.php" method="GET">
		<select>
		<!-- key = index, value = brouwerij -->
			<?php foreach($brouwers as $key):?>
					<option value="<?= $key['brouwernr']?>"> <?= $key['brouwernr'] ?> </option>
			<?php endforeach?>
		</select>
		<input id="select" name="btnSelect" value="Select" type="submit">
	</form>







	<table>
		<thead>
			<tr>
				<?php foreach($columnNames as $columnName): ?>
					<td><?= $columnName ?></td>
				<?php endforeach?>
			</tr>
		</thead>
		<tbody>
			<?php foreach($bieren as $key=>$value): ?>	
				<tr>							
					<?php foreach($value as $value): ?>
						<td><?= $value ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach?>
		</tbody>
		<tfoot>
			
		</tfoot>
	</table>
</body>
</html>