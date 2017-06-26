<?php
	//22u 35m 25sec 21 januari 1904
	$mktime 	= 	mktime( 22 , 35 , 25 , 1 , 21 , 1904 );	//american way (h, m, s, month, day, year)
	$date		= 	date( 'H:i:s m/d/Y' , $mktime );		//convert to readable text
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p><?php echo $mktime?></p>
	<p><?php echo $date?></p>
</body>
</html>