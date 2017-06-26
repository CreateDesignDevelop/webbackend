<?php  
	function __autoload($className){
		require_once 'classes/' . $className . '.php';		//include/require class
	}

	session_start();
	$titel = "";
	$artikel = "";
	$kernWoorden = "";
	$datum = "";

	if(isset($_SESSION["message"])){
		//work with echo istead of messagecontainer
		echo "type : " . $_SESSION["message"]["type"];
		echo " message : " . $_SESSION["message"]["text"];

		//Do NOT unset the whole $_SESSION with unset($_SESSION) as this will disable the registering of session variables through the $_SESSION superglobal.
		unset($_SESSION['message']);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>artikel-toevoegen-form.php</title>
	<style type="text/css">
		label{
			/*display: inline-block;*/
			display: block;		/*make it full width (block everything else down)*/
			width: 50px;
		}
		li{
			text-decoration: none;
			list-style: none;
			margin-top: 5px;
		}
	</style>
</head>
<body>
	<h1>Artikel Toevoegen (Form)</h1>
	<form action="artikel-toevoegen.php" method="post">
		<ul>
			<li>
				<label for="titel">Titel</label>
				<input type="text" name="titel" value="<?=$titel?>">
			</li>
			<li>
				<label for="artikel">Artikel</label>
				<textarea name="artikel"><?=$artikel?></textarea>
			</li>
			<li>
				<label for="kernwoorden">Kernwoorden</label>
				<input type="text" name="kernwoorden"value="<?=$kernWoorden?>" >
			</li>
			<li>
				<label for="date">Datum</label>
				<input type="date" name="datum" value="<?=$datum?>">
			</li>
			<li>
				<input type="submit" value="Toevoegen" name="add">
			</li>
		</ul>
	</form>
</body>
</html>