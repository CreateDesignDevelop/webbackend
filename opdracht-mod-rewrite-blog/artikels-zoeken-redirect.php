<?php 
	if(isset($_GET["query-content"]))
	{
		if($_GET["query-content"] == "")
		{
			header("location: http://oplossingen-web-backend.local/opdracht-mod-rewrite-blog/artikels/");
		} else{
			header("location: http://oplossingen-web-backend.local/opdracht-mod-rewrite-blog/artikels/zoeken/content/".$_GET["query-content"]."/");
		}
	}
	elseif (isset($_GET["query-date"])) 
	{
		if($_GET["query-date"] == "")
		{
			header("location: http://oplossingen-web-backend.local/opdracht-mod-rewrite-blog/artikels/");
		} else{
			header("location: http://oplossingen-web-backend.local/opdracht-mod-rewrite-blog/artikels/zoeken/date/".$_GET["query-date"]."/");
		}
	} else{
		header("location: http://oplossingen-web-backend.local/opdracht-mod-rewrite-blog/artikels/");
	}
 ?>