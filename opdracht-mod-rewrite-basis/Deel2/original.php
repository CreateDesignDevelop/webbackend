<?php
	$username = "";
	if (isset($_GET['user'])) {
		$username = $_GET['user'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>opdracht-mod-rewrite Deel2</title>
</head>
<body>
	<h1>Het originele bestand</h1>
	<p>Username is <?= $username?></p>
</body>
</html>