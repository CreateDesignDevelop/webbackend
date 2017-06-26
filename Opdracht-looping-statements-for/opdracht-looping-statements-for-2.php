<?php
	$rijen = 10;
	$kolommen = 10;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>	
		.oneven
		{
			background-color: lightgreen;
		}
	</style>
</head>
<body>
	<table>
		<?php for ($i=0; $i < $rijen; $i++): ?>
			<tr>
				<?php for ($j=0; $j < $rijen; $j++): ?>
					<!--Add class oneven if condition is met-->
					<td class="<?= ( ( $i * $j ) % 2 > 0 ) ? 'oneven' : '' ?>"><?= $i * $j ?></td>
				<?php endfor ?>
			</tr>
		<?php endfor ?>
	</table>
</body>
</html>