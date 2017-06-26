<?php
	session_start();
	if (isset($_POST['validate'])) {				//als er op de vorige pagina is gevalidate
		if (isset($_POST['email'])) {				//als er een email post plaatsvond
			$_SESSION['email'] = $_POST['email'];	//stop de waarde van de post in de session 'email'
		}	
		if (isset($_POST['nickname'])) {
			$_SESSION['nickname'] = $_POST['nickname'];
		}
	$email		= $_SESSION['email'];	//puur om makkelijk uit te lezen (echo)
	$nickname	= $_SESSION['nickname'];

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Registratiegegevens:</h1><br>
	Email:<br><?php echo $email ?><br>
	Nickname:<br><?php echo $nickname ?><br><br>
	<h1>Deel2: adres</h1><br>
	<form action="opdracht-sessions-3-overzichtspagina.php" method="post">
		<h3>Straat:</h3><br><input type="text" name="straat">
		<?php if(isset($_GET['wijzigStraat'])): ?>
			give autofucus
		<?php endif?>
		<br>
		<h3>Nummer:</h3><br><input type="text" name="nummer">
		<?php if(isset($_GET['wijzigNummer'])): ?>
			give autofucus
		<?php endif?>
		<br>
		<h3>Gemeente:</h3><br><input type="text" name="gemeente">
		<?php if(isset($_GET['wijzigGemeente'])): ?>
			give autofucus
		<?php endif?>
		<br>
		<h3>Postcode:</h3><br><input type="text" name="postcode">
		<?php if(isset($_GET['wijzigPostcode'])): ?>
			give autofucus
		<?php endif?>
		<br><br>
		<input type="submit" name="validate" value="next">
		<!-- maak een get variabele om de gegevens te verwijderen -->
		<a href="opdracht-sessions-1-registratiepagina.php?destroy=1">DESTROY!!</a>	
	</form>
</body>
</html>