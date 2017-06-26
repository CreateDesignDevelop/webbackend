<?php 
	$artikels = array(
		array(
			'titel' 				=>'American Apparel-winkel in Kammenstraat blijft open',
			'datum' 				=>'vandaag: 7/10/15',
			'inhoud' 				=>'In de voorbije vijf jaar heeft American Apparel een verlies gemaakt van 340 miljoen dollar (301 miljoen euro). De keten richt zich vooral op jongvolwassenen, maar heeft last van de concurrentie van onder meer Zara, H&M en Primark.',
			'afbeelding' 			=>'1.jpg',
			'afbeeldingBeschrijving'=>'vrouw blauwe trui',
		),
		array(
			'titel' 				=>'13-jarige Essenaar wint provinciaal kampioenschap mountainbike',
			'datum' 				=>'vandaag: 7/10/15',
			'inhoud' 				=>'Lennert Jacobs (13) zit in het tweede middelbaar van het college in Essen. Sinds zijn zevende is hij lid van mountainbikeschool Noorderkempen, met vestiging in Essen-Wildert. “Ik vind mountainbike een leuke sport”, zegt Lennert. “Vroeger ging ik wel eens met mijn papa door de bossen fietsen. Zo ben ik er eigenlijk een beetje ingerold.',
			'afbeelding' 			=>'2.jpg',
			'afbeeldingBeschrijving'=>'jongen op fiets',
		),
		array(
			'titel' 				=>'Glazen trein moet ongebruikte treinverbinding weer op kaart zetten',
			'datum' 				=>'vandaag: 7/10/15',
			'inhoud' 				=>'Mocht België het stukje spoor tussen Hamont en het Nederlandse Weert weer in gebruik nemen, dan kunnen de Limburgers daar zowel naar Amsterdam als naar Parijs sporen. Om dat te bepleiten, rijdt er zondag een hoogst ongewone trein tussen Weert en Antwerpen.',
			'afbeelding' 			=>'3.jpg',
			'afbeeldingBeschrijving'=>'interieur glazen trein',
		),
	);

	$eenArtikel = false;
	//if id is set
	if (isset($_GET["id"]) ){	//de value van de artikelPara (=de key) staat nu in de array GET met als naam id
		$key = $_GET["id"];

		//NOG OPNIEUW BEKIJKEN
		//bestaat er in de array een doc dat bvb. id3 heeft
		if (array_key_exists($key, $artikels) ) {	//heeft de array artikels met een key die overeen komt met de key van $_get["id"]		
			$artikels = array( $artikels[$key] );	//je veranderd de array (met 3 artikels) door het ene artikel met het juiste id
			$eenArtikel = true;
		} else {
			echo "404 Webpagina niet gevonden";
			$artikels = [];	//artikels array leegmaken om deze niet te tonen
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<style type="text/css">
	#art{
		list-style-type: none;
		float: left;
		width: 400px;
		height: 600px;
		margin-left: 25px;
		padding-left: 25px;
		padding-right: 25px;

		border-style: none;
		border-width: 1px;
		border-radius: 5px;

		background-color: #F7F7F7;
	}
	#art img{
		height: 200px;
		width: 350px;

		display: block;
		margin-left: auto;
		margin-right: auto;
	}
	#art h5{
		text-align: left;
	}
	li a{
		float: right;
	}
	</style>
	
	<article>
	    <?php foreach($artikels as $artikelPara=>$value): ?>
		    <div id="art">
				<h2>
					<?php echo $value['titel']?>
				</h2>				
				<img src="images/<?php echo $value['afbeelding'] ?>">
				<h5>
					<?php echo $value['afbeeldingBeschrijving']?>
				</h5>				
				<p id="artText">

				<?php 
					if($eenArtikel){
						echo $value['inhoud'];
					} else {
						echo substr($value['inhoud'], 0, 50);
					}
				?>

				<!-- Shorthand wijze, NOG NIET JUIST!! -->
				<!-- 
				<? if ($eenArtikel): ?>
				<?php echo $value['inhoud']?>					
				<? else: ?>
				<?php echo substr($value['inhoud'], 0, 50)?>...
				<? endif; ?>
				 -->
				

				</p>
				<a href="opdracht-get.php?id=<?php echo $artikelPara?>">Lees Meer --></a>	<!--href meegegeven met id=0-->
			</div>
	    <?php endforeach ?>
	</article>
</body>
</html>