<?php
	//$file = fopen("data.txt", "r") //file open r for read-only
	$file 		= file('data.txt');
	$fileSplit	= explode(',', $file[0]);
	$message	= '';
	$time1		=  time()+60*6;			//6minutes
	$time2		=  time()+60*60*24*30;	//30dagen

	if(isset($_POST['validate'])){
		if (isset($_POST['gebruikersnaam'])) {
			if (isset($_POST['paswoord'])) {
				if ( ($_POST['gebruikersnaam'] == $fileSplit[0]) && ($_POST['paswoord'] == $fileSplit[1]) ) {
					
					$message = 'Login succes';

					if (isset($_POST['onthouden'])) {
						setcookie('loginCookie', true, $time2);
						header('location: opdracht-cookies-1.php');	//pagina refreshen (verplicht na iedere cookie)
					} else {
						setcookie('loginCookie', true, $time1);
						header('location: opdracht-cookies-1.php');
					}
					
				} else {
					$message = 'ERROR ERROR ERROR';
				}
			}
		}
	}
	if (isset($_COOKIE['loginCookie'])) {
		$message = 'hallo ' . $fileSplit[0] . ', Welkom';
	}
	if (isset($_GET['logout'])) {
		setcookie('loginCookie', true, time()-1000);
		header('location: opdracht-cookies-1.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>opdracht-cookies-1</title>
</head>
<body>
	<?php if (!isset($_COOKIE['loginCookie']) ): ?>
		<form action="opdracht-cookies-1.php" method="post">
			Gebruikersnaam: <input type="text" name="gebruikersnaam">
			Paswoord: <input type="text" name="paswoord">
			<input type="submit" name="validate" value="next">
			<input type="checkbox" name="onthouden" value="mij onthouden">mij onthouden
		</form>
		<?php echo $message ?>		
	<?php else: ?>
		<?php echo $message ?>
		<a href="opdracht-cookies-1.php?logout">logout</a>
	<?php endif ?>	



</body>
</html>