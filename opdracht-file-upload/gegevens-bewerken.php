<?php
	session_start();
	if (isset($_POST['btnGegevensWijzigen'])) {
		$email = $_POST['email'];
		$id = $_SESSION['id'];

		if ( ($_POST['email'] != '') && ($_FILES['profilePicture']['name'] != '') ) {
			if 	( 	($_FILES['profilePicture']['type'] == 'image/png')||
					($_FILES['profilePicture']['type'] == 'image/jpg')||
					($_FILES['profilePicture']['type'] == 'image/gif')
				) {
				if ($_FILES['profilePicture']['size'] <= 2000000) {	//2MB
					$newFileName = newName($_FILES['profilePicture']['name']);

					//Checks whether a file or directory exists
					//if name exists make new one
					while ( file_exists('images\\' . $newFileName)) {
						$newFileName = newName($_FILES['profilePicture']['name']);
					}

					//move tmp_name file to $tempName folder
					$movedSuccesful = move_uploaded_file($_FILES[ 'profilePicture' ][ 'tmp_name' ], 'images\\' . $newFileName);
					if ($movedSuccesful) {
						$db = new PDO('mysql:host=localhost;dbname=opdracht-file-upload', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
						try {
							if ($email != $_POST['email']) {
								$newEmail = $_POST['email'];
								$querystring = 	'	UPDATE users
													SET profile_picture = :tempName, 
													email = :email
													WHERE id = :id
												'; /*':' om sql injection te voorkomen*/
								$selectStatement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren
								$selectStatement->bindValue(':tempName', $newFileName);
								$selectStatement->bindValue(':email', $newEmail);
								$selectStatement->bindValue(':id', $id);
								$succes = $selectStatement->execute();

								if ($succes) {
									setcookie('email', true, time()-1000);
									setcookie('email', $newEmail, time()+2592000);
									$_SESSION["message"]["type"] = "succes";
							 		$_SESSION["message"]["text"] = "Moved Succesful";
									header('location: dashboard.php');
								} else{
									$_SESSION["message"]["type"] = "error";
							 		$_SESSION["message"]["text"] = "ERROR ERROR ERROR";
							 		header('location: gegevens-bewerken.php');	
								}
							} else {
								$querystring = 	'	UPDATE users
													SET profile_picture = :tempName
													WHERE email = :email
												'; /*':' om sql injection te voorkomen*/
								$selectStatement = $db->prepare($querystring);	//klaarzetten maar nog niet uitvoeren
								$selectStatement->bindValue(':tempName', $newFileName);
								$selectStatement->bindValue(':email', $email);
								$succes = $selectStatement->execute();

								if ($succes) {
									$_SESSION["message"]["type"] = "succes";
							 		$_SESSION["message"]["text"] = "Moved Succesful";
									header('location: dashboard.php');
								} else{
									$_SESSION["message"]["type"] = "error";
							 		$_SESSION["message"]["text"] = "ERROR ERROR ERROR";
							 		header('location: gegevens-bewerken.php');	
								}
							}
						}
						catch (PDOException $e) {
							$_SESSION['message']['type'] = 'error';
							$_SESSION['message']['text'] = 'PDO ERROR';
							header('location: gegevens-bewerken.php');	
						}
					}
				} else {
					$_SESSION["message"]["type"] = "error";
				 	$_SESSION["message"]["text"] = "File too big";
				 	header("location: gegevens-bewerken.php");
				}
			} else {
				$_SESSION["message"]["type"] = "error";
			 	$_SESSION["message"]["text"] = "Wrong file type";
			 	header("location: gegevens-wijzigen-form.php");
			 	
			}
		} else {
				$_SESSION["message"]["type"] = "error";
			 	$_SESSION["message"]["text"] = "Fill in blanks";
			 	header("location: gegevens-wijzigen-form.php");
		}
	}

	if(isset($_SESSION["message"])){
		//worked with echo istead of messagecontainer
		echo "type : " . $_SESSION["message"]["type"];
		echo " message : " . $_SESSION["message"]["text"];
	}

	function newName($originalName)
	{
		$result = time() . "_" . $originalName;	//new random name with timestamp
		return $result;
	}
?>