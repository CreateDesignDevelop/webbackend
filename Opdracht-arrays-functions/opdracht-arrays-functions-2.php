<?php 
	$dieren 		= array('kat', 'hond', 'paard', 'ezel', 'muis');
	$dierenSorted 	= $dieren;
	sort($dierenSorted);
	$aantalDieren 	= count($dierenSorted);

	$teZoekenDier 	= 'paard';
	$gevonden		= in_array($teZoekenDier, $dierenSorted);
	$message		= '';
	if ($gevonden) {
		$message = 'dier is gevonden.';
	} else {
		$message = 'dier is niet gevonden.';
	}

	$zoogdieren 	= array('beer', 'stier', 'leeuw');
	$dierenlijst 	= array_merge($dieren, $zoogdieren);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>dieren: <?php var_dump($dierenSorted) ?></p>
	<p>aantal: <?php echo $aantalDieren ?></p>
	<p><?php echo $message?></p>

	<p>dierenlijst: <?php var_dump($dierenlijst)?></p>
</body>
</html>