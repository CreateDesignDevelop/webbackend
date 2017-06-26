<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Opdracht Classes begin</h1>
	<h3>Hoeveel procent is <?= $new ?> van <?= $unit ?></h3>
	<table>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Absoluut</td>
			<td><?php echo $percent->absolute?></td>
		</tr>
		<tr>
			<td>Relatief</td>
			<td><?php echo $percent->relative?></td>
		</tr>
		<tr>
			<td>Geheel getal</td>
			<td><?php echo $percent->hundred?>%</td>
		</tr>
		<tr>
			<td>Nominaal</td>
			<td><?php echo $percent->nominal?></td>
		</tr>
	</table>
</body>
</html>
