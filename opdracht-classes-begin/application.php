<?php  
	//Waarom autoload?
	//variabelen worden nog niet geladen
	function __autoload($className){
		require_once 'classes/' . $className . '.php';		//include/require class
	}
	//require_once 'classes/Percent.php';					//include/require class

	$new	=	150;
	$unit	=	100;
	$percent = new Percent($new, $unit);		//make instance

	/*$absolute	= $percent->absolute;		//get variable value
	$relative	= $percent->relative;
	$hundred	= $percent->hundred;
	$nominal	= $percent->nominal;
	$new		= $percent->new;
	$unit		= $percent->unit;*/	

	require_once 'applicationView.php';		//include html
?>