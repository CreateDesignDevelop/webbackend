<?php
	//Deze pagina controleert of ze is opgeroepen door een AJAX-request. Kijk naar de $_SERVER-variabele
	session_start();

	$admin = "verhoevenwout@gmail.com";

	if(isset($_POST["email"])){
		$_SESSION["contact"]["email"] = $_POST["email"];
		$_SESSION["contact"]["text"] = $_POST["text"];

		if( (isset($_POST['email'])) && (isset($_POST['text'])) ){
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
  					$sendToMyself = true;
  					if(isset($_POST["sendToMyself"])){
                        //mail(to, subject, message)
  						if(mail($email, "kopie contact message", $text)){
  							$sendToMyself = true;
  						} else{
  							$sendToMyself = false;
  						}
  					}

					if((mail($admin, "contact Message from", $text)) && ($sendToMyself == true)) {
				        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){	//check if ajax request		            
				            $ajaxData["type"] = "succes";
				            $ajaxData["message"] = "sent succesfully";
				            unset($_SESSION["contact"]);
				            echo json_encode($ajaxData);
				        } else{
							$_SESSION["message"]["type"] = "succes";
							$_SESSION["message"]["message"] = "contact sent";
							unset($_SESSION["contact"]);
							header("location: contact-form.php");
				        }
				    } else{
					   	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
							$ajaxData["type"] = "failed";
							$ajaxData["message"] = "Not send";
							echo json_encode($ajaxData);
						} else{
					        $_SESSION["message"]["type"] = "failed";
					        $_SESSION["message"]["message"] = "sending failed";
					        header("location: contact-form.php");
						}
					}
				} else{
	  				$_SESSION["message"]["type"] = "failed";
	  				$_SESSION["message"]["message"] = "Not added to database";
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