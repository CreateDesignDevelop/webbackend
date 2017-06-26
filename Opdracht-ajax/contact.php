<?php
  session_start();
	$admin = "verhoevenwout@gmail.com";

	if(isset($_POST["send"]))
	{
		$_SESSION["contact"]["email"] = $_POST["email"];
		$_SESSION["contact"]["text"] = $_POST["text"];

		if( (isset($_POST['email'])) && (isset($_POST['text'])) )
		{
			$email = $_POST["email"];
			$text  = $_POST["text"];
			try {
                $db = new PDO('mysql:host=localhost;dbname=opdracht-ajax', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
  				$insertQuery =  "   INSERT INTO contact_messages(email, message, time_sent)
                                    VALUES(:email, :message, :time)
                                ";
  				$insertStatement = $db->prepare($insertQuery);

                $date = date("Y-m-d h:i:sa");           //transpose date to readable format
  				$insertStatement->bindValue(":email", $email);
  				$insertStatement->bindValue(":message", $text);
  				$insertStatement->bindValue(":time", $date);
  				$succes = $insertStatement->execute();

  				if($succes){
  					if(isset($_POST["sendToMyself"])){
                        //mail(to, subject, message)
  						mail($email, "kopie contact message", $text);
  					}
                    //subject who it is send to
  					if(mail($admin, "contact Message from", $text)){
                        $_SESSION["message"]["type"] = "succes";
                        $_SESSION["message"]["message"] = "contact verzonden";
                        header("location: contact-form.php");
  					} else {
    					$_SESSION["message"]["type"] = "failed";
  	  				    $_SESSION["message"]["message"] = "verzenden mislukt";
    					header("location: contact-form.php");
  				    }
  				}else{
  	  				$_SESSION["message"]["type"] = "failed";
  	  				$_SESSION["message"]["message"] = "Niet toegevoegd";
  	  				header("location: contact-form.php");
    			}
  			}
  			catch(PDOException $e) {
  				$_SESSION["message"]["type"] = "dateBase Error";
  				$_SESSION["message"]["message"] = "failed to connect to database";
  				header("location: contact-form.php");
  			}
		} else {
  			$_SESSION["message"]["type"]= "Error";
  			$_SESSION["message"]["message"] = "Fill in both TextBoxes";
  			header("location: contact-form.php");
  		}
	}
?>