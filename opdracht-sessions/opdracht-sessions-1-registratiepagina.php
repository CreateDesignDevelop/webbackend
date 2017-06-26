<?php
	session_start();	
	if (isset($_GET['destroy'])) {	// check if get var exists
		if ($_GET['destroy']) {		// check if get variabele is destroyed
			session_destroy();
			echo "SESSION DESTROYED";
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Deel 1: registratiegegevens</h1>

	<form action="opdracht-sessions-2-adrespagina.php" method="post">
		<h3>Email:</h3><input type="text" name="email">
		<?php if(isset($_GET['wijzigEmail'])): ?>
			give autofucus
		<?php endif?>
		<br>
		<h3>Nickname:</h3><input type="text" name="nickname">
		<?php if(isset($_GET['wijzigNickname'])): ?>
			give autofucus
		<?php endif?>
		<br>

		<input type="submit" name="validate" value="next">

	</form>
</body>
</html>