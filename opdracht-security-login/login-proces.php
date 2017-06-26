<?php
	session_start();	

	if (isset($_SESSION['login']['email']) && isset($_SESSION['login']['password'])) {
		$email = $_SESSION['login']['email'];
		$password = $_SESSION['login']['password'];
	
		try{
			$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken

			$emailQuery = 	'	SELECT email FROM users 
								WHERE email = :email
							'; 	

			$emailStatement = $db->prepare($emailQuery);
			$emailStatement->bindValue(':email', $email);
			$emailStatement->execute();

			$emailArray = array();
			while($row = $emailStatement->fetch(PDO::FETCH_ASSOC)){
				$emailArray[] = $row;		//data in array zetten om te checken
			}

			if (empty($emailArray)) {
				$_SESSION['message']['type'] = 'error';
				$_SESSION['message']['text'] = 'email not found';
				header('location: login-form.php');
			} else {
				$checkPasswordQuery = 	'	SELECT hashed_password, salt FROM users 
											WHERE email = :email
										'; 	
				$checkPasswordStatement = $db->prepare($checkPasswordQuery);
				$checkPasswordStatement->bindValue(':email', $email);
				$checkPasswordStatement->execute();

				$passwordSaltedArray = array();

				while ($row = $checkPasswordStatement->fetch(PDO::FETCH_ASSOC)) {
					$passwordSaltedArray[] = $row;
				}

				$passwordToCheck = openssl_digest($password . $passwordSaltedArray[0]['salt'], 'sha512');
				$originalPassword = $passwordSaltedArray[0]['hashed_password'];

				if ($passwordToCheck == $originalPassword) {

					unset($_SESSION['login']);
					//hash the email + password that is salted with name 'salt'
					$hashedEmailSalt = openssl_digest($email . $passwordSaltedArray[0]['salt'], 'sha512');
					setcookie('login', $email . ',' . $hashedEmailSalt, time()+2592000); //30days
					header('location: dashboard.php');
				} else {
					$_SESSION['message']['type'] = 'error';
					$_SESSION['message']['text'] = 'password is wrong';
					header('location: login-form.php');
				}
			}
		}
		catch(PDOException $e){
			$messageContainer = 'ERROR ERROR ERROR: ' .$e; 
		}
	}

	
?>

