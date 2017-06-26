<?php 
	$dieren 		= array('kat', 'hond', 'paard', 'ezel', 'muis');
	$aantalDieren 	= count($dieren);

	$teZoekenDier 	= 'paard';
	$gevonden		= in_array($teZoekenDier, $dieren);
	$message		= '';
	if ($gevonden) {
		$message = 'dier is gevonden.';
	} else {
		$message = 'dier is niet gevonden.';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>dieren: <?php var_dump($dieren) ?></p>
	<p>aantal: <?php echo $aantalDieren ?></p>
	<p><?php echo $message?></p>
</body>
</html>