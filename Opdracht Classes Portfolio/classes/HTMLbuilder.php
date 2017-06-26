<?php

	
	class HTMLbuilder

	{

		protected $header;
		protected $body;
		protected $footer;

			function __construct($header, $body, $footer)
			{
				$this->header = $header;
				$this->body = $body;
				$this->footer = $footer;

				$this->buildPages();
			}

		public function buildHeader()
		{

			$cssDir	=	 dirname(dirname(__FILE__)) . '/css/';
			$filesArray	=	$this->findFiles($cssDir, 'css');
			
			$cssLinks	=	$this->createCssLink($filesArray);

			echo $cssLinks;

			include "html/" . $this->header;

		}

		public function buildBody()
		{
			include "html/" . $this->body;
		
		}

		public function buildFooter()
		{
			$jsDir = dirname(dirname(__FILE__))."/js/";
			$filesArray = $this->findFiles($jsDir, 'js');
			$fileLink = $this->createJsLink($filesArray);
			echo $fileLink;
			include "html/" . $this->footer;
		}

		public function findFiles($dir, $file)
		{
			
			return glob($dir . '/*.' . $file);
		}

		public function createCssLink($array)
		{
			$newArray = array();
			foreach ($array as $file)
			 
				$fileInfo = pathinfo($file);
				$fileName = $fileInfo["basename"];

				$newArray[] = '<link rel="stylesheet" type="text/css" href="css/' . $fileName . '">';
			}

			//Join array elements with a string
			return implode('', $newArray);
		}



		public function createJsLink($array)
		{
			$newArray = array();
			foreach ($array as $file) 
			{
				$fileInfo = pathinfo($file);
				$fileName = $fileInfo["basename"];

			
				$newArray[]='<script src="js/' . $fileName . '"></script>';

			}

			return implode('', $newArray);
		}

		public function buildPages()
		{
			$this->buildHeader();
			$this->buildBody();
			$this->buildFooter();
		}
	}





?>