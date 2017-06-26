<?php 
	$getallen			= array(8,7,8,7,3,2,1,2,4);
	$getallenFiltered	= array_unique($getallen);
	$sorted				= $getallenFiltered;
	sort($sorted);

	// Let op: rsort neemt de array die het sorteert by reference, wat wil zeggen dat de originele array aangepast zal worden.
	// Als het sorteren gelukt is, returnt deze functie enkel TRUE of FALSE als het niet gelukt is
	/*
	* rsort( $getallenUniqueGesorteerd );
	*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p><?php var_dump($sorted) ?></p>
</body>
</html>