<?php
	function berekenKapitaal( $kapitaal, $renteProcent, $looptijd )
	{
		static $teller		=	1;
		static $historiek	=	array();

		if ( $teller <= $looptijd )
		{
			$renteBedrag			=		floor( $kapitaal * ( $renteProcent / 100 ) );
			$nieuwKapitaal			=		$kapitaal + $renteBedrag;
			$historiek[ $teller ]	=		'Het nieuwe bedrag bedraagt ' . $nieuwKapitaal . '€ (waarvan ' . $renteBedrag . '€ onze rente is)';

			++$teller;

			return berekenKapitaal( $nieuwKapitaal, $renteProcent, $looptijd );
		}
		else
		{
			return $historiek;
		}
	}

	$startKapitaal 	=	100000;
	$renteVoet		=	8;
	$aantalJaar		=	10;

	$winstHans = berekenKapitaal( $startKapitaal, $renteVoet, $aantalJaar );
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<ul>
		<?php foreach($winstHans as $value): ?>
			<li><?php echo $value ?></li>
		<?php endforeach ?>
	</ul>
</body>
</html>