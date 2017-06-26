<?php
	$getal	= 1;
	$dag 	= 'onbekend';
	$dagCap = '';


	if ($getal == 1) {
		$dag = "maandag";
	}
	if ($getal == 2) {
		$dag = "dinsdag";
		}
	if ($getal == 3) {
		$dag = "woensdag";
		}
	if ($getal == 4) {
		$dag = "donderdag";
		}
	if ($getal == 5) {
		$dag = "vrijdag";
		}
	if ($getal == 6) {
		$dag = "zaterdag";
		}
	if ($getal == 7) {
		$dag = "zondag";
		}
	$dagCap 	= strtoupper($dag);
	$dagLastA	= strrpos($dagCap, 'A');
	//substr_replace — Replace text within a portion of a string
	//if 1 isn't given, the 'g' is not displayed
	$dagRep		= substr_replace($dagCap, 'a', $dagLastA, 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>getal: <?php echo $getal?>, dag: <?php echo $dag?></p>
	<p><?php echo $dagCap?></p>
	<p><?php echo $dagRep?></p>
</body>
</html>