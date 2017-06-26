<?php  
	session_start();
	$isValid = false;

	try {
		if (isset($_POST['validate'])) {
			if (isset($_POST['code'])) {
				if ($_POST['code'] == '') {
					throw new Exception('SUBMIT-ERROR');	//exception, jump out try and go to switch catch with message					
				} elseif (strlen($_POST['code']) >= 8) {
					$isValid = true;
				} else {
					throw new Exception('VALIDATION-CODE-LENGTH');					
				}
			}			
		}
	} catch (Exception $e) {
		$messageCode	= $e->getMessage();
		$message		= array();
		$createMessage	= false;

		switch ($messageCode) {
			case 'SUBMIT-ERROR':
				$message['type'] 	= 'error';
				$message['text'] 	= 'SUBMIT ERROR';
				break;
			case 'VALIDATION-CODE-LENGTH':
				$message['type'] 	= 'error';
				$message['text'] 	= 'De kortingscode heeft niet de juiste lengte';
				$createMessage 		= true;
				break;
		}
		logToFile($message);
		if ($createMessage) {
			createMessage($message);
		}
		$showMessage = showMessage();
		echo $showMessage;
	}
	function logToFile($input){
		$date 			= '[' . date('H:i:s', time()) . ']';
		$ip 			= $_SERVER['REMOTE_ADDR'];
		$errorString	= $date . ' - ' . $ip . ' - type:[' . $input['type'] . ']' . $input['text'] . "\n\r";
		//file_put_contents:	Write a string to a file
		//FILE_APPEND: 			If file filename already exists, append the data to the file instead of overwriting it. 
		file_put_contents('log.txt', $errorString, FILE_APPEND);
	}
	function createMessage($message){
		$_SESSION['message']['type']	= $message['type'];
		$_SESSION['message']['message']	= $message['text'];
	}
	function showMessage(){
		if (isset($_SESSION['message'])) {
			$type 		= $_SESSION['message']['type'];
			$newMessage	= $_SESSION['message']['message'];
			unset($_SESSION['message']);	//unset() destroys the specified variables
			return 'er was een ' . $type . ' met boodschap ' . $newMessage;
		} else {
			return false;
		}
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h3>Opdracht error handeling</h3>
	<p></p>
	<?php if(!$isValid):?>
		<form method="post" action="opdracht-error-handeling.php">
			<input type="text" name="code">
			<input type="submit" name="validate">
		</form>
	<?php else:?>
		<p>Korting toegekend!</p>
	<?php endif?>
</body>
</html>