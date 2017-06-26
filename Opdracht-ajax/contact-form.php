<?php
session_start();
	$email = "";
	$message = "";

	if(isset($_SESSION["message"])) {
		echo "type : " . $_SESSION["message"]["type"];
		echo " message : " . $_SESSION["message"]["message"];
		unset($_SESSION['message']);
	}
	if(isset($_SESSION["contact"])) {
		$email =   $_SESSION["contact"]["email"];
		$message = $_SESSION["contact"]["text"];
		unset($_SESSION['contact']);
	}
?>

<!doctype html>
<html>
	<head>
		<title>opdracht-ajax</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<h1>Contacteer ons</h1>
		<form id="contactForm" action="contact.php" method = "post">
			<ul>
				<li>
					<label for="email"><p>Email</p></label>
					<input type="text" name="email" value="<?=$email?>">
				</li>
				<li>
					<label for="text"><p>message</p></label>
					<input type="text" name="text" value="<?=$message?>">
				</li>
				<li>					
					<input type="checkBox" name="sendToMyself">Verstuur kopie naar mezelf</input>					
				</li>
				<li>					
					<input type="submit" name="send">				
				</li>
			</ul>
		</form>
	</body>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			console.log('ready');

			//Bind an event handler to the "submit" JavaScript event, or trigger that event on an element.
			$("#contactForm").submit(function(){
				console.log("submit");
				//The .serialize() method creates a text string in standard URL-encoded notation. It can act on a jQuery object that has selected individual form controls, such as <input>, <textarea>, and <select>: $( "input, textarea, select" ).serialize();
				//needed to use for ajax call
				var formData = $("#contactForm").serialize();
				$.ajax({
					type: 'POST',
					url: 'contact-API.php',
					data: formData,
					//succes callback function
					//=een anonieme functie, wordt automatisch uitgevoerd wanneer iemand het formulier wil submitten
					success: function(data){
						console.log('data: ' + data);
						var newData = JSON.parse(data);		//The JSON.parse() method parses (makes it readable) a string as JSON, optionally transforming the value produced by parsing
						if(newData["type"] == "succes") {
							console.log('succes joepie');			
						} else{
							console.log('failed');
						}
					}
				});
				return false;
			});
		})
	</script>
</html>