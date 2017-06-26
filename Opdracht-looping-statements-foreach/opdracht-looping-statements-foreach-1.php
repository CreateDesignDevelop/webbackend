<?php
	$text 		= file_get_contents('text-file.txt');
	$charArr 		= str_split($text);
	rsort($charArr);
	$charSoReve	= array_reverse($charArr); 

	$textChars 	= array();

	foreach($charSoReve as $value)
	{
		if ( isset ( $textChars[ $value ] ) )
		{
			++$textChars[ $value ];
		}
		else
		{
			$textChars[ $value ] = 1;
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
	<pre><?php var_dump ( $textChars ) ?></pre>
</body>
</html>