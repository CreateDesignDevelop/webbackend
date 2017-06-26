<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Todo-applicatie</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<div id="container">
	<img id="background" src="background.jpg">
		<div id="application">
			<h1>Todo app</h1>
			<p><?php echo $message ?></p>
			<hr id="topHr">

			<table class="toDoArray">
				<?php if ($toDoArray): ?>
					<!-- key=index, value is value from index -->
				    <?php foreach($toDoArray as $key => $value): ?>		
					    <tr>
					    	<td><a class="delete" href="application.php?delete=<?=$key?>"></a></td>				    	
					        <td class="value"><?php echo $value; ?></td>
					        <td><a class="done" href="application.php?done=<?=$key?>"></a></td>
					    </tr>			
				    <?php endforeach; ?>
				<?php endif; ?>
			</table>
			<table class="doneArray">
				<?php if ($doneArray): ?>
					<h1>Done</h1>
				    <?php foreach($doneArray as $key => $value): ?>
					    <tr>
					        <td><a class="delete" href="application.php?deleteDone=<?=$key?>"></a></td>
					        <td class="value"><?php echo $value; ?></td>
					        <td><a class="undo" href="application.php?undoDone=<?=$key?>"></a></td>
					    </tr>			
				    <?php endforeach; ?>
				<?php endif; ?>
			</table>
			<div id="toevoegen">
				<hr>
				<h1 id="toDoToevoegen">Todo toevoegen</h1>
				<form action="application.php" method="POST">
					<ul>
						<li>
							<label for="description"></label>
							<input id="description" name="description" type="text">
							<input id="buttonAdd" name="btnAddToDo" value="Add" type="submit">
						</li>
					</ul>
				</form>
			</div>

		</div>
	</div>
</body>
</html>
