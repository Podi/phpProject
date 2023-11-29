<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tipp</title>
</head>
<body>
    <form action="<?php print $_SERVER['PHP_SELF']?>" method="post">
		<p>Tipp: <input type="text" name="tipp"></p>
		<p><input type="submit" name="submit"></p>
	</form>
    <?php 
		if (isset($_POST['submit'])){
			print_r($_POST['tipp']);
		}

		
	?>
</body>
</html>