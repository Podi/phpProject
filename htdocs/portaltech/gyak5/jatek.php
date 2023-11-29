<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php print $_SERVER['PHP_SELF']?>" method="post">
		<p><input type="number" name="input" required="true"></p>
		<p><input type="submit" name="submit"></p>
		
	</form>
    <?php 
        if (isset($_POST['submit'])){
            $r_szam = rand(0,10);

            if (($r_szam + $_POST['input']) % 5 == 0) {
                echo "<h1>Nyertél!</h1>";
            } else {
                echo "<h1>Vesztettél!</h1>";
            }
        }
	?>
</body>
</html>