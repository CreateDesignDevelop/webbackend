<?php 
	$jaar 			= 2015;
	$schrikkeljaar 	= false;
	$message 		= '';

	if ($jaar % 4 == 0 && $jaar % 100 != 0) {
		$schrikkeljaar = true;
	}
	if ($jaar % 400 == 0) {
		$schrikkeljaar = true;
	}

	if($schrikkeljaar){
		$message = ' is een schrikkeljaar';
	} else{
		$message = ' is geen schrikkeljaar';
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>jaar: <?php echo $jaar ?><?php echo $message?></p>
	<!--
	<p>Het jaar "<?php echo $jaartal ?>" is <?php echo ( $isSchrikkeljaar ) ? "een" : "geen"  ?> schrikkeljaar </p>
	-->
</body>
</html>