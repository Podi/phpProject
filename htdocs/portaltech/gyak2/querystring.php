<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>querystring</title>
</head>
<body>
    <?php
        $a=$_GET['a'];
        $b=$_GET['b'];
        print("Az első paraméter: ". $a."<br>");
        print("A második paraméter: ". $b."<br>");   
        print("A két paraméter szorzata: ". $a*$b."<br>");
    ?>
</body>
</html>