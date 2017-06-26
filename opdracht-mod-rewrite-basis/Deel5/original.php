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

	$role = "";
	$username = "";
	if ( (isset($_GET['role'])) && (isset($_GET['user'])) ) {
		$role = $_GET['role'];
		$username = $_GET['user'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>opdracht-mod-rewrite Deel5</title>
</head>
<body>
	<h1>Het originele bestand</h1>
	<p>Role is <?= $role?></p>
	<p>Username is <?= $username?></p>
</body>
</html>