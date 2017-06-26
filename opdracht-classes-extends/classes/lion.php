<?php
	class Lion extends Animal
	{
		protected $species;
		function __construct($species, $name, $health, $gender)
		{
			parent:: __construct($name, $health, $gender);
			$this->species = $species;
		}
		public function getSpecies() {
			return $this->species;
		}
		public function doSpecialMove(){
			return "roar";
		}
	}
?>