<?php
	session_start();

	$messageContainer = '';
	$rndPassword = '';
	$email = '';

	if (isset( $_POST['btnGeneratePassword'] )) {
/*		
		emailToSession();
		rndPasswordToSession();
*/
		$_SESSION['login']['rndPassword'] = generatePassword(6, 15, 'all');
		$rndPassword = $_SESSION['login']['rndPassword'];	

		if (isset($_POST['email'])) {
			$_SESSION['login']['email'] = $_POST['email'];
			$email = $_SESSION['login']['email'];
		}
	}


	if (isset( $_POST['btnRegister'] )) {
		if ( isset($_POST['email']) && isset($_POST['password'])) {
			$emailValid = filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL );
			
			if (!$emailValid) {
				$email = 'not valid, try again';
			} else {
				$_SESSION['login']['email'] = $_POST['email'];
				$_SESSION['login']['password'] = $_POST['password'];
				$email = $_SESSION['login']['email'];
				$password = $_SESSION['login']['password'];

				try{
					$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken

					//search if email exists
					$emailQuery = 	'	SELECT email FROM users 
										WHERE email = :email
									'; 	
					$emailStatement = $db->prepare($emailQuery);
					$emailStatement->bindValue(':email', $email);
					$emailStatement->execute();

					$emailArray = array();
					while($row = $emailStatement->fetch(PDO::FETCH_ASSOC))
					{
						$emailArray[] = $row;
					}
					if (!empty($emailArray)) {
						// $_SESSION['message']['type'] = 'error';
						// $_SESSION['message']['text'] = 'email already exists';
						
					} else {
						//Gets a prefixed unique identifier based on the current time in microseconds. 
						//true for more likelihood that the result will be unique. (additional entropy)
						$salt = uniqid(mt_rand(), true);
						$passwordConcat = $password . $salt;
						$hashedPassword = openssl_digest($passwordConcat, 'sha512');

						$insertQuery = 	'	INSERT into users (email, salt, hashed_password, last_login_time)
											values (:email, :salt, :hashed_password, NOW())
										'; 	

						$insertStatement = $db->prepare($insertQuery);
						$insertStatement->bindValue(':email', $email);
						$insertStatement->bindValue(':salt', $salt);
						$insertStatement->bindValue(':hashed_password', $hashedPassword);
						$insertStatement->execute();

						//Computes a digest hash value for the given data using a given method, and returns a raw or binhex encoded string. 
						$hashedEmailSalt = openssl_digest($email . $salt, 'sha512');

						setcookie('login', $email . ',' . $hashedEmailSalt, time() + 2592000); //30 days (watch ',' delimiter)
						unset($_SESSION['login']);	//delete session
						$messageContainer = 'succes';
						header('location: dashboard.php');
					}

				}
				catch(PDOException $e){
					$messageContainer = 'ERROR ERROR ERROR: ' .$e; 
				}
			}
		}
	}

	function generatePassword($min, $max, $alphabet){
		$passwordLength = rand($min, $max);
		switch ($alphabet) {
			case 'all':
				$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';	//string is in principe array van characters
				break;
			case 'lower':
				$alphabet = 'abcdefghijklmnopqrstuvwxyz';
				break;
			case 'upper':
				$alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
				break;
			case 'numeric':
				$alphabet = '1234567890';	
				break;
		}
	    $pass = array(); 						//remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; 	//put the length -1 in cache
	    for ($i = 0; $i < $passwordLength; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass); 	//turn the array into a string
	}
	require_once 'registratie-form.php';
?>








<!-- 












-->