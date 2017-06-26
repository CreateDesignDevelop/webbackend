<?php  
	function __autoload($classname){
		include 'classes/' . $classname . '.php';
	}
	__autoload('HTMLBuilder');
	$page = new HTMLBuilder('header-partial.php', "body-partial.php", "footer-partial.php");
?>