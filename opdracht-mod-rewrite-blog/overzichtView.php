<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>artikel-overzicht.php</title>
	<style type="text/css">
		label{
			/*display: inline-block;*/
			display: block;		/*make it full width (block everything else down)*/
			width: 150px;
		}
		li{
			text-decoration: none;
			list-style: none;
			margin-top: 5px;
		}
	</style>
</head>
<body>
	<div class="overzicht">
		<!-- 2 forms because we can search by words or by date -->
		<form action="artikel-zoeken.php" method="get">	
			<ul>
				<li>
					<label for="zoeken">Zoek in artikels</label>
					<input type="text" name="searchWord" id=""><input type="submit" value="zoek">
				</li>
			</ul>
		</form>

		<form action="artikel-zoeken.php" method="get">		
			<ul>
				<li>
					<label for="Datum">Datum</label>
					<input type="date" name="searchDate" id=""><input type="submit" value="zoek">
				</li>
			</ul>
		</form>

		<h1><?=$title?></h1>
		<h4><?=$subtitle?></h4>
		<a href="artikel-toevoegen-form.php">Artikel toevoegen</a>
		
		<!-- foreach(array name as random variabele name) -->
		<?php foreach ($articles as $article):?>
			<article>				
				<h2><?=$article["titel"]?></h2>
				<p><?=$article["artikel"]?></p>
				<p>kernwoorden: <?=$article["kernwoorden"]?></p>
				<p>datum: <?=$article["datum"]?></p>
			</article>
		<?php endforeach ?>
	</div>
</body>
</html>