<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tipp3</title>
</head>
<body>
    <form action="tipp3.php" method="post">
		<p>Tipp: <input type="number" name="tipp" required="true"></p>
		<p><input type="submit" name="submit"></p>
	</form>
    <?php 
		session_start();
		if (! isset($_SESSION['tippszam']) ){
			$_SESSION['tippszam'] = 0;
		}

        $kitalalando = 15;
        if (isset($_POST['submit'])){
            $szam = $_POST['tipp'];
            $_SESSION['tippszam'] += 1;
            if ($szam == $kitalalando){
                echo "<h1>Talált!</h1>";
				$_SESSION['tippszam'] = 0;
            } elseif ($szam < $kitalalando){
                echo "<h1>Túl kicsi!</h1>";
            } else {
                echo "<h1>Túl nagy!</h1>";
            }
        }
        echo "<h1>Tippek száma: ".$_SESSION['tippszam']."</h1>"
        
	?>
</body>
</html>