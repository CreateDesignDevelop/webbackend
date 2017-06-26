<?php 
	$seconden 	= 123456789;

	$minuten	= 60;
	$uren		= 60 	* $minuten;
	$dagen		= 24 	* $uren;
	$weken		= 7 	* $dagen;
	$maanden	= 4 	* $weken;
	$jaren		= 12 	* $maanden;

	//floor = afronding naar beneden
	$aantalMinuten	= floor($seconden / $minuten);
	$aantalUren		= floor($seconden / $uren);
	$aantalDagen	= floor($seconden / $dagen);
	$aantalWeken	= floor($seconden / $weken);
	$aantalMaanden	= floor($seconden / $maanden);
	$aantalJaren	= floor($seconden / $jaren);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>in <?php echo $seconden?> seconden zitten: </p>
	<p>minuten: <?php echo $aantalMinuten ?></p>
	<p>uren: 	<?php echo $aantalUren ?></p>
	<p>dagen: 	<?php echo $aantalDagen ?></p>
	<p>weken: 	<?php echo $aantalWeken ?></p>
	<p>maanden: <?php echo $aantalMaanden ?></p>
	<p>jaren: 	<?php echo $aantalJaren ?></p>
	
</body>
</html>