<?php
	function berekenSom($getal1, $getal2){
		$som = $getal1 + $getal2;
		return $som;
	}

	function berekenVermenigvuldiging($getal1, $getal2){
		$vermenigvuldig = $getal1 * $getal2;
		return $vermenigvuldig;
	}

	function isEven($getal){
		if ($getal%2 == 0) {
			return true;
		}
		return false;
	}
	$som 			=	berekenSom( 4, 5 );
	$product 		= 	berekenVermenigvuldiging( 4, 5 );

	$getalPariteit 	=	11;
	$pariteit 		=	isEven( $getalPariteit );
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing functies: deel1</title>
	</head>
	<body>

		<h1>Oplossing functies: deel1</h1>

		<p>Som 4, 5 <?php echo $som?></p>
		<p>Product 4, 5 <?php echo $product?></p>

		<?php if ( $pariteit ): ?>

			<p>Het getal <?php echo $getalPariteit ?> is even</p>
		<?php else: ?>

			<p>Het getal <?php echo $getalPariteit ?> is oneven</p>
		<?php endif ?>

	</body>
</html>