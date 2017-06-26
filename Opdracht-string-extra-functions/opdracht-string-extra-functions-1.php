<?php 
	$fruit 			= "kokosnoot";
	$fruitLetter 	= "o";

	$fruitlen		= strlen($fruit);
	$fruitPos 		= strpos($fruit, $fruitLetter);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>fruitlength: <?= $fruitlen ?></p>
	<p>fruitposition 'o': <?= $fruitPos ?></p>
</body>
</html>