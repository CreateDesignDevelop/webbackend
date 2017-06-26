<?php
	class HTMLBuilder{
		protected $header;
		protected $body;
		protected $footer;

		function __construct($header, $body, $footer){
			$this->header 	= $header;
			$this->body 	= $body;
			$this->footer 	= $footer;
			$this->buildPage();
		}

		public function buildHeader(){
			include 'html/' . $this->header;

			$cssDirectory	= dirname( dirname(__FILE__) ) . '/css/';	//upper map/css 
			$filesArray		= $this->findFiles($cssDirectory, 'css');	//build array with files (map, extension)
			$cssFiles		= $this->buildCssLinks($filesArray);
		}
		public function buildBody(){
			include 'html/' . $this->body;
		}
		public function buildFooter(){
			$jsDirection	= dirname(dirname(__FILE__)).'/js/';
			$filesArray 	= $this->findFiles($jsDirection, 'js');
			$fileLink 		= $this->buildJsLinks($filesArray);
			echo $fileLink;
			include 'html/' . $this->footer;
		}
		public function findFiles($dir, $file){
			//glob searches for all the pathnames matching a patern ($dir)
			//returns array
			//select map, select all .css
			return glob($dir . '/*.' . $file);			
		}
		public function buildCssLinks($array){
			$newArray = array();
			//easy way to iterate over array
			foreach ($array as $file) {
				$fileInfo	= pathinfo($file);	//pathinfo returns infomation about a file path
				$fileName	= $fileInfo["basename"];

				$newArray[] = '<link rel="stylesheet" type="text/css" href="css/' . $fileName . '">';
			}
			//Join array elements with a string
			return implode('', $newArray);
		}
		public function buildJsLinks($array){
			$newArray = array();
			foreach ($array as $file) 
			{
				$fileInfo 	= pathinfo($file);
				$fileName 	= $fileInfo["basename"];

				$newArray[] = '<script src="js/' . $fileName . '"></script>';
			}
			return implode('', $newArray);
		}
		public function buildPage(){
			$this->buildHeader();
			$this->buildBody();
			$this->buildFooter();
		}
	}
?>