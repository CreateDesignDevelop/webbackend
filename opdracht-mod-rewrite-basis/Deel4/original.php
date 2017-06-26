<?php
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
	<title>opdracht-mod-rewrite Deel4</title>
</head>
<body>
	<h1>Het originele bestand</h1>
	<p>Role is <?= $role?></p>
	<p>Username is <?= $username?></p>
</body>
</html>