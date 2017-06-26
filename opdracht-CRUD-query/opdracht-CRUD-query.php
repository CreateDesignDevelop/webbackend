<?php 
	$messageContainer = '';

	try{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
		
		$querystring = 	'	SELECT * FROM bieren 
							INNER JOIN brouwers 
							ON bieren.brouwernr = brouwers.brouwernr 
							WHERE bieren.naam LIKE "Du%" AND 
							brouwers.brnaam LIKE "%a%"
						';
		$statement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren
		$statement->execute();

		/*$db->query('SELECT * FROM bieren');
		$messageContainer = 'Selected * from bieren';*/

		$bieren = array();
		while ($row = $statement->fetch( PDO:: FETCH_ASSOC)){		//Fetches the next row from a result set
			$bieren[] = $row;										//iedere key is de naam van die row
		}

		$columnNames = array();
		$columnNames[] = '#';

		foreach($bieren[0] as $key => $bier)		//index 0 is '#'
		{
			$columnNames[] = $key;
		}


		$querystring2 =	'	SELECT * FROM brouwers 							
						';

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
					<td><?= ($key + 1)?></td>			
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