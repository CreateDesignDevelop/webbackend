<?php
	session_start();

	if (isset($_POST['validate'])) {				//als er op de vorige pagina is gevalidate
		if (isset($_POST['straat'])) {				//als er een straat post plaatsvond
			$_SESSION['straat'] = $_POST['straat'];	//stop de waarde van de post in de session 'email'
		}
		if (isset($_POST['nummer'])) {
			$_SESSION['nummer'] = $_POST['nummer'];
		}
		if (isset($_POST['gemeente'])) {
			$_SESSION['gemeente'] = $_POST['gemeente'];
		}
		if (isset($_POST['postcode'])) {
			$_SESSION['postcode'] = $_POST['postcode'];
		}
	$email 		= $_SESSION['email'];		//puur om makkelijk uit te lezen (echo)
	$nickname 	= $_SESSION['nickname'];
	$straat 	= $_SESSION['straat'];
	$nummer 	= $_SESSION['nummer'];
	$gemeente 	= $_SESSION['gemeente'];
	$postcode 	= $_SESSION['postcode'];
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Overzicht:</h1><br><br>
	<h3>Email:</h3>		<?php echo $email ?><br>
		<a href="opdracht-sessions-1-registratiepagina.php?wijzigEmail">Wijzig</a>
	<h3>Nickname:</h3>	<?php echo $nickname ?><br>
		<a href="opdracht-sessions-1-registratiepagina.php?wijzigNickname">Wijzig</a>
	<h3>Straat:</h3>	<?php echo $straat ?><br>
		<a href="opdracht-sessions-2-adrespagina.php?wijzigStraat">Wijzig</a>
	<h3>Nummer:</h3>	<?php echo $nummer ?><br>
		<a href="opdracht-sessions-2-adrespagina.php?wijzigNummer">Wijzig</a>
	<h3>Gemeente:</h3>	<?php echo $gemeente ?><br>
		<a href="opdracht-sessions-2-adrespagina.php?wijzigGemeente">Wijzig</a>
	<h3>Postcode:</h3>	<?php echo $postcode ?><br>
		<a href="opdracht-sessions-2-adrespagina.php?wijzigPostcode">Wijzig</a>

</body>
</html>