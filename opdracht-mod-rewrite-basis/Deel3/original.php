<?php
/*
	RewriteEngine On
	RewriteRule ^([^/\.]+)/?$ original.php?user=$1

	^ 		Start of string, or start of line in multi-line pattern
	(..) 	group
	[..]	Explicit set of characters to match
	/		
	\		escape character
	.		Any character (except \n newline)
	+		1 or more
	/
	?		or 					ab?c => ac, abc
	$		end of string
*/

	$username = "";
	if (isset($_GET['user'])) {
		$username = $_GET['user'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>opdracht-mod-rewrite Deel3</title>
</head>
<body>
	<h1>Het originele bestand</h1>
	<p>Username is <?= $username?></p>
</body>
</html>