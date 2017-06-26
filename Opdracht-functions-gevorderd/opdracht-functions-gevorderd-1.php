<?php

	$md5HashKey 	= 	'd1fa402db91a7a93c4f414b8278ce073';
	$needle1			=	"2";
	$needle2			=	"8";
	$needle3			=	"a";

	function telKarakters1( $haystack, $needle )
	{
		//1st way 
		//defining lenght
		$haystackCount =  strlen( $haystack );

		//Count the number of substring occurrences
		//haystack = string to search in
		//needle is the substring to search for 
		$needleAantal = substr_count ( $haystack, $needle );

		$needleProcent = ( $needleAantal / $haystackCount ) * 100;

		return $needleProcent;
	}

	function telKarakters2( $needle )
	{
		//2nd way
		global $md5HashKey;

		$haystack = $md5HashKey;

		$haystackCount =  strlen( $haystack );

		$needleAantal = substr_count ( $haystack, $needle );

		$needleProcent = ( $needleAantal / $haystackCount ) * 100;

		return $needleProcent;
	}

	function telKarakters3( $needle )
	{
		//3rd way
		$haystack = $GLOBALS['md5HashKey'];

		$haystackCount =  strlen( $haystack );

		$needleAantal = substr_count ( $haystack, $needle );

		$needleProcent = ( $needleAantal / $haystackCount ) * 100;

		return $needleProcent;
	}

	//function calling and putting in variable
	$eersteMethode 	=	telKarakters1( $md5HashKey, $needle1 );
	$tweedeMethode 	=	telKarakters2( $needle2 );
	$derdeMethode 	=	telKarakters3( $needle3 );
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing functies gevorderd: deel1</title>
	</head>
	<body>
		<?php echo $eersteMethode ?>%
		<?php echo $tweedeMethode ?>%
		<?php echo $derdeMethode ?>%
	</body>
</html>