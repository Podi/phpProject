<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tipp2</title>
</head>
<body>
    <form action="<?php print $_SERVER['PHP_SELF']?>" method="post">
		<p>Tipp: <input type="number" name="tipp"></p>
		<p><input type="submit" name="submit"></p>
	</form>

    <?php 
		$kitalalando = 15;
		if (isset($_POST['submit'])){

			$szam = $_POST['tipp'];
			if ($szam == $kitalalando){
				echo "<h1>Talált!</h1>";
			} elseif ($szam < $kitalalando){
				echo "<h1>Túl kicsi!</h1>";
			} else {
				echo "<h1>Túl nagy!</h1>";
			}
		}
	?>
</body>
</html>