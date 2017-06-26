<?php
	session_start();
	$isValid = FALSE;
	try {
		if(isset($_POST["validate"]))
		{
			if(isset($_POST["code"]))
			{
				if($_POST["code"] == "")
				{
					throw new Exception('SUBMIT-ERROR');
				}
				elseif(strlen($_POST["code"]) >= 8)
				{
					$isValid = TRUE;
				}
				else
				{
					throw new Exception('VALIDATION-CODE-LENGTH');
				}
			}
		}
	}
	catch(Exception $e)
	{
		$messageCode 	= $e->getMessage();
		$message 		= array();
		$createMessage 	= FALSE;
		switch ($messageCode) {
			case 'SUBMIT-ERROR':
				$message["type"] = "error";
				$message["text"] = "Er werd met het formulier geknoeid";			
				break;
			case 'VALIDATION-CODE-LENGTH':
				$message[ 'type' ] = "error";
				$message['text'] = "niet de juiste lengte";
				$createMessage = TRUE;
				break;
		}

		logToFile($message);
		if($createMessage)
		{
			createMessage($message);
		}

		$toShow = showMessage();
		echo $toShow;


	}

	function showMessage(){
		if(isset($_SESSION["message"]))
		{
			$type = $_SESSION["message"]["type"];
			$newMessage = $_SESSION["message"]["message"];
			unset($_SESSION["message"]);
			return " er was een " . $type . " met bootschap " .$newMessage;
		}

		else
		{
			return FALSE;
		}
	}

	function createMessage($message){
		$_SESSION['message']['type'] = $message['type'];
		$_SESSION['message']['message'] = $message['text'];
	}

	function logToFile($input)
	{
		$date	= '[' . date( 'H:i:s', time() ).']';
		$ip		= $_SERVER['REMOTE_ADDR'];

		$errorString = $date . ' - ' . $ip . ' - type:[' . $input["type"] . '] ' . $input["text"] . "\n\r";

		//file_put_contents:	Write a string to a file
		//FILE_APPEND: 			If file filename already exists, append the data to the file instead of overwriting it. 
		file_put_contents( 'error.log', $errorString, FILE_APPEND );
	}
?>

<!doctype html>
<html>
	<head>
		<title>Opdracht error handeling</title>
	</head>
	<body>
		<h1>geef je kortingscode in </h1>	

	<?php if(!$isValid):?>
		<form method="post", action="error-handeling.php">
			<input type="text", name="code"><p>
			<input type="submit", name="validate">
		</form>
	<?php else:?>
		<h2>Korting toegekend</h2>
	<?php endif?>
	</body>
</html>