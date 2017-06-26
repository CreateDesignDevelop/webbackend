<?php 
	//this way you NEED to pass index.php to acces anything

	function __autoload($className){
		require_once 'classes/' . $className . '.php';		//include/require class
	}

	$class = "";
	if (isset($_GET["controller"])){
		$class = $_GET["controller"];
	}
	//gerewrite method getVariabele wordt opgevangen en hierdoor wordt de desbetreffende methode uit de klasse uitgevoerd
	$controller = new $class;
	if (isset($_GET['method'])) {		
		$controller->$_GET['method']();
	}

	if(isset($_GET["id"])){
		echo "<p>id = " . $_GET["id"] . "</p>";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>opdracht-mod-rewrite-single-point-of-entry</title>
</head>
<body>
<h1>IndexPage</h1>
	<!-- <?= var_dump($_GET) ?> -->	
</body>
</html>