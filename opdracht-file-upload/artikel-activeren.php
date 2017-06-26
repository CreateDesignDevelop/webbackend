<?php
	session_start();
	if (isset($_GET['artikel'])) {
		$id = $_GET['artikel'];

		try {
			$db = new PDO('mysql:host=localhost;dbname=opdracht-crud-cms', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
			$querystring = 	'	UPDATE artikels
								SET is_active = IF(is_active=1, 0, 1)
								WHERE id = :id
							'; /*':' om sql injection te voorkomen*/
							/*IF(is_active=1, 0, 1) = toggle*/

			$statement = $db->prepare($querystring);
			$statement->bindValue(':id', $id);
			$statement->execute();
			header('location: artikel-overzicht.php');

		} catch (PDOException $e) {
			$_SESSION['message']['error'] = 'oeps er liep iets mis';
			header('location: artikel-overzicht.php');			
		}
	}
?>