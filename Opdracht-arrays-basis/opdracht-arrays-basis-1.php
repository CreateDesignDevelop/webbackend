<?php
	$dieren[0] = 'paard';
	$dieren[1] = 'kat';
	$dieren[2] = 'hond';
	$dieren[3] = 'slang';
	$dieren[4] = 'beer';
	$dieren = array('vogel', 'muis', 'vis', 'ezel', 'eland');

	$voertuigen = array('landvoertuigen' 	=> array('auto', 'motor'),
						'watervoertuigen' 	=> array('boot', 'jetski'),
						'luchtvoertuigen'	=> array('vliegtuig')
		);
	/*
	* $voertuigen['landvoertuigen'] = array('auto', 'motor');
	* $watervoertuigen['landvoertuigen'] = array('boot', 'jetski');
	* $luchtvoertuigen['landvoertuigen'] = array('vliegtuig');
	*/


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p> <?php var_dump($dieren) ?></p>
	<p> <?php var_dump($voertuigen) ?></p>
</body>
</html>