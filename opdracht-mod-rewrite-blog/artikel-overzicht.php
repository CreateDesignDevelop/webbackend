<?php 
	$title 		= "Overzicht van de artikels";
	$subtitle 	= "";

	try {
		$db = new PDO('mysql:host=localhost;dbname=opdracht-mod-rewrite-blog', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
		$querystring = 	'	SELECT * FROM artikels	
						'; /*':' om sql injection te voorkomen*/
		$statement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren
		$statement->execute();
	} 
	catch(PDOException $e){
		$_SESSION['message']['type'] = 'ERROR';
		$_SESSION['message']['text'] = 'Database: Something went wrong :(';
	}

	$articles = array();
	while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		$articles[] = $row;
	}
	if (empty($articles)) {
		$subtitle = "No articles were found";
	} else{
		$subtitle = "Articles found:";
	}

	if(isset($_SESSION["message"])){
		//work with echo istead of messagecontainer
		echo "type : " . $_SESSION["message"]["type"];
		echo " message : " . $_SESSION["message"]["text"];

		//Do NOT unset the whole $_SESSION with unset($_SESSION) as this will disable the registering of session variables through the $_SESSION superglobal.
		unset($_SESSION['message']);
	}
	
	require 'overzichtview.php';
?>

