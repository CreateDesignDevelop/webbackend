<?php  
	$aantalGetallen = 100;
	$getallen 		= array();
	$getal 			= 0;

	while ($getal < $aantalGetallen) {
		//push $getal to array
		$getallen[] = $getal;
		++$getal;
	}
	$separated 		= implode(', ', $getallen);

	$getal 			= 0;
	$getallen2		= array();
	while ($getal < $aantalGetallen) {
		if($getal % 3 == 0 && $getal > 30 && $getal < 80){
			$getallen2[] = $getal;
		}
		++$getal;
	}
	$separated2		= implode(', ', $getallen2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>1: <?php var_dump($separated) ?></p>
	<p>2: <?php var_dump($separated2) ?></p>
</body>
</html>