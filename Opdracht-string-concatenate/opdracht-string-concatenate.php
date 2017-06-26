<?php
	$voornaam		= "Wout";
	$naam			= "Verhoeven";

	$volledigeNaam 	= $voornaam . $naam;

	$length 		= strlen($volledigeNaam);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p><?php echo $volledigeNaam?></p>
	<p><?php echo $length?></p>
</body>
</html>