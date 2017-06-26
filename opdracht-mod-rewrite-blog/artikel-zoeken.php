<?php 
	
	$db = new PDO('mysql:host=localhost;dbname=opdracht-mod-rewrite-blog', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken

	if (isset($_GET['searchWord'])) {
		//waarom op deze manier???
		//$searchWord = "%".$_GET["searchWord"]."%";
		$searchWord = $_GET["searchWord"];

		//artikel is a column name
		try {
			$querystring = 	'	SELECT * FROM artikels WHERE artikel LIKE :searchWord
							'; /*':' om sql injection te voorkomen*/
			$statement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren
			$statement->bindValue(":searchWord", $searchWord);
			$statement->execute();
			$title = "Artikels die het woord " . $searchWord . " bevatten:";
		} 
		catch(PDOException $e){
			$_SESSION['message']['type'] = 'ERROR';
			$_SESSION['message']['text'] = 'Database: Something went wrong :(';
		}
	}
	elseif (isset($_GET['searchDate'])) {
		$date = date('Y-m-d', strtotime(str_replace('-', '/', $_GET["searchDate"])));

		try {
			$querystring = 	'	SELECT * FROM artikels WHERE datum LIKE :searchDate	
							'; /*':' om sql injection te voorkomen*/
			$statement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren
			$statement->bindValue(":searchDate", $searchDate);
			$statement->execute();
			$title = "Artikels die de datum " . $searchDate . " bevatten:";
		} 
		catch(PDOException $e){
			$_SESSION['message']['type'] = 'ERROR';
			$_SESSION['message']['text'] = 'Database: Something went wrong :(';
		}
	} else{
		header('location: artikel-overzicht.php');
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
	
	require 'overzichtview.php';
?>