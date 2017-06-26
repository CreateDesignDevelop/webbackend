<?php
	

	function __autoLoad($filename)
	{
		include "classes/".$filename . ".php";
	}

	__autoLoad("HTMLbuilder");

	$pagina = new HTMLbuilder("header-partial.php", "body-partial.php", "footer-partial.php");

	

?>