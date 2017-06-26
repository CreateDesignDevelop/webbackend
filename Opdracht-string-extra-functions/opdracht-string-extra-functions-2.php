<?php 
	$fruit 				= "ananas";
	$fruitLastLetter	= "a";

	$fruitLastPos 		= strrpos($fruit, $fruitLastLetter);
	$fruitCapitalized	= strtoupper($fruit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>fruitposition 'a': <?= $fruitLastPos ?></p>
	<p>fruit Capitalized: <?= $fruitCapitalized ?></p>
</body>
</html>