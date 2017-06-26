<?php  
	function __autoload($classname){				//__autoload load automatisch alle classes in 
		include('classes/' . $classname . '.php');
	}
	$lion	= new Animal('wout', 'male', 100);
	$tiger	= new Animal('tiger', 'female', 80);
	$bear	= new Animal('bear', 'male', 150);

	$simba 	= new Lion('Congo lion', 'simba', 50, 'female');
	$scar  	= new Lion('Kenia lion', 'scar', 70, 'female');

	$zeke	= new Zebra('zeke', 'male', 20, 'Quagga'); 
	$zana 	= new Zebra('zana ', 'female', 20, 'Selous'); 
	$lion-> changeHealth(150);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Opdracht classes extends</h1>
	
	<h3>Instanties van de classe Animal</h3>
	<p><?=$lion->getName()?> is van het geslacht <?=$lion->getGender()?> en heeft <?=$lion->getHealth()?> levenspunten (de special move is <?=$lion->doSpecialMove()?>)
	<p><?=$tiger->getName()?> is van het geslacht <?=$tiger->getGender()?> en heeft <?=$tiger->getHealth()?> levenspunten (de special move is <?=$tiger->doSpecialMove()?>)
	<p><?=$bear->getName()?> is van het geslacht <?=$bear->getGender()?> en heeft <?=$bear->getHealth()?> levenspunten (de special move is <?=$bear->doSpecialMove()?>)

	<h3>Instanties van de classe Lion</h3>
	<p>De special move van <?=$simba->getName()?> is (soort: <?=$simba->getSpecies()?>) <?=$simba->doSpecialMove()?></p>
	<p>De special move van <?=$scar->getName()?> is (soort: <?=$scar->getSpecies()?>) <?=$scar->doSpecialMove()?></p>


	<h3>Instanties van de classe Zebra</h3>
	<p>De special move van <?=$zeke->getName()?> is (soort: <?=$zeke->getSpecies()?>) <?=$zeke->doSpecialMove()?></p>
	<p>De special move van <?=$zana->getName()?> is (soort: <?=$zana->getSpecies()?>) <?=$zana->doSpecialMove()?></p>

</body>
</html>