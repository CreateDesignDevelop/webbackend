<?php
	$getal		= 88;
	$tussen 	= "";
	$tekst 		= 'het getal ligt tussen ';


	if ($getal > 0 && $getal <= 10) {
		$tussen = "0 en 10";
	}
	elseif ($getal > 10 && $getal <= 20) {
		$tussen = "10 en 20";
	}
	elseif ($getal > 20 && $getal <= 30) {
		$tussen = "20 en 30";
	}
	elseif ($getal > 30 && $getal <= 40) {
		$tussen = "30 en 40";
	}
	elseif ($getal > 40 && $getal <= 50) {
		$tussen = "40 en 50";
	}
	elseif ($getal > 50 && $getal <= 60) {
		$tussen = "50 en 60";
	}
	elseif ($getal > 60 && $getal <= 70) {
		$tussen = "60 en 70";
	}
	elseif ($getal > 70 && $getal <= 80) {
		$tussen = "70 en 80";
	}
	elseif ($getal > 80 && $getal <= 90) {
		$tussen = "80 en 90";
	}
	elseif ($getal > 90 && $getal <= 100) {
		$tussen = "90 en 100";
	}
	
	$tekstConc	= $tekst . $tussen;
	$tekstRev 	= strrev($tekstConc);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>Het getal: <?php echo $getal?> ligt tussen <?php echo $tussen?></p>
	<p>omgekeerde tekst: <?php echo $tekstRev?></p>
</body>
</html>