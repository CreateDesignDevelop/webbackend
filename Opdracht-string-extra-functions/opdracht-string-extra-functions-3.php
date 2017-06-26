<?php 
	$lettertje 		= "e";
	$cijfertje  	= "3";
	$langsteWoord 	= "zandzeepsodemineralenwatersteenstralen";
	$fruitrepl 		= str_replace($lettertje, $cijfertje, $langsteWoord);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>longest word replaced 'e' with '3': <?= $fruitrepl ?></p>
</body>
</html>