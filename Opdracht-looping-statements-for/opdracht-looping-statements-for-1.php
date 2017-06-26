<?php
	$rijen = 10;
	$kolommen = 10;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table>
		<?php for ($i=0; $i < $rijen; $i++): ?>
			<tr>
				<?php for ($j=0; $j < $rijen; $j++): ?>
					<td>kolom</td>
				<?php endfor ?>
			</tr>
		<?php endfor ?>
	</table>
</body>
</html>