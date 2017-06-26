<?php
	class Bieren{
		protected $db;
		function __construct()
  		{
  			//this.db
 			$this->db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
  		}
  		public function overview()
  		{
  			echo '<h1>overview</h1>';
  		}
  		public function insert()
  		{
  			echo '<h1>insert</h1>';
  		}
  		public function delete()
  		{
  			echo '<h1>delete</h1>';	
  		}
  		public function update()
  		{
  			echo '<h1>update</h1>';	
  		}
	}
?>