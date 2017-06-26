<?php
	session_start();
	$result = 'No result yet';
	$regEx = '';
	$text = '';

	if (isset($_POST['btnTestRegEx'])) {
		if (isset($_POST['regEx']) &&  (isset($_POST['text']))) {
			$_SESSION['regEx'] = $_POST['regEx'];
			$_SESSION['text'] = $_POST['text'];

			$regEx 	= $_SESSION['regEx'];
			$text 	= $_SESSION['text'];

			$newRegEx = "/" . $regEx . "/";
			$result = preg_replace($newRegEx, '<span>#</span>', $text);
		}
	}


	$regEx 	= $_SESSION['regEx'];
	$text 	= $_SESSION['text'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>opdracht-regular-expressions</title>
	<style type="text/css">
		#result span{
			color: red;
		}
	</style>
</head>
<body>
	<h1>RegEx Tester</h1>
<form action="opdracht-regular-expressions.php" method="POST"> 
	<ul>
		<li>
			<label for="RegEx">Regular expression:</label>
			<input id="regEx" name="regEx" type="text" value=<?= $regEx ?>>
		</li>
		<li>
			<label for="Text">Text:</label>
			<input id="text" name="text" type="text" value=<?= $text ?>>
		</li>
		<li>
			<p>Result:
				<?php if ( $result ): ?>
					<p id="result"><?= $result ?></p>
				<?php endif ?>
			 </p>		
			<input id="btnTestRegEx" name="btnTestRegEx" value="Test RegEx" type="submit">
		</li>
	</ul>
</form>
</body>
</html>