<?php 
	session_start();
	try{
		unset($_SESSION['message']);
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
		
		$orderBy = 'naam';
		$orderDirection = 'ASC';

		if (isset($_GET['order'])) {
			$orderArray 	= explode('-', $_GET['order']);
			$orderBy		= $orderArray[0];
			$orderDirection	= $orderArray[1];
		}

		$orderQuery = " " . $orderBy . " " . $orderDirection;

		if (isset($_GET['order'])) {
			if ($orderArray[1] == 'ASC') {
				$orderDirection = 'DESC';
			} else{
				$orderDirection = 'ASC';
			}
		}
		$querystring = 	'	SELECT bieren.biernr,
								bieren.naam,
								brouwers.brnaam,
								soorten.soort,
								bieren.alcohol 
							FROM bieren 
								INNER JOIN brouwers
								ON bieren.brouwernr	= brouwers.brouwernr
								INNER JOIN soorten
								ON bieren.soortnr = soorten.soortnr
								ORDER BY
						'.$orderQuery;

		$statement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren
		$statement->execute();

		$bieren = array();
		while ($row = $statement->fetch( PDO:: FETCH_ASSOC)){		//Fetches the next row from a result set
			$bieren[] = $row;										//iedere key is de naam van die row
		}

	} 
	catch (PDOException $e){
		$_SESSION['message']['type'] = 'error';
		$_SESSION['message']['text'] = 'something went wrong';
	}

	if(isset($_SESSION["message"])){
		//worked with echo istead of messagecontainer
		echo "type : " . $_SESSION["message"]["type"];
		echo " message : " . $_SESSION["message"]["text"];
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>opdracht-CRUD-order</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th class=	<?php if($orderDirection == "ASC"):?> "asc" 
							<?php else:?> "desc" 
							<?php endif?>>
					<a href="opdracht-CRUD-order.php?order=biernr-<?=$orderDirection?>">Biernummer</a>
				</th>
				<th class=	<?php if($orderDirection == "ASC"):?> "asc" 
							<?php else:?> "desc" 
							<?php endif?>>
					<a href="opdracht-CRUD-order.php?order=naam-<?=$orderDirection?>">Bier</a>
				</th>
				<th class=	<?php if($orderDirection == "ASC"):?> "asc"  
							<?php else:?> "desc"
							<?php endif?>>
					<a href="opdracht-CRUD-order.php?order=brnaam-<?=$orderDirection?>">Brouwer</a>
				</th>
				<th class=	<?php if($orderDirection == "ASC"):?> "asc"  
							<?php else:?> "desc"
							<?php endif?>>
					<a href="opdracht-CRUD-order.php?order=soort-<?=$orderDirection?>">Soort</a>
				</th>
				<th class=	<?php if($orderDirection == "ASC"):?> "asc"  
							<?php else:?> "desc"
							<?php endif?>>
					<a href="opdracht-CRUD-order.php?order=alcohol-<?=$orderDirection?>">AlcoholPercentage</a>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<?php foreach ($bieren as $key):?>
						<tr>
							<td><?=$key["biernr"]?></td>
							<td><?=$key["naam"]?></td>
							<td><?=$key["brnaam"]?></td>
							<td><?=$key["soort"]?></td>
							<td><?=$key["alcohol"]?></td>
						</tr>
					<?php endforeach ?>
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td>
					
				</td>
			</tr>
		</tfoot>
	</table>
</body>
</html>