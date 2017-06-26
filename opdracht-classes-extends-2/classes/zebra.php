<?php  
/**
* 
*/
class Zebra extends Animal{
	protected $species;

	public function __construct($name, $health, $gender, $species)
	{
		parent:: __construct($name, $health, $gender);
		$this->species = $species;
	}
	public function getSpecies(){
		return $this->species;
	}
}
?>