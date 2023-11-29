<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session1</title>
</head>
<body>
    <?php   

        session_start();
        $_SESSION["hozzaferesido"] = $_SERVER['REQUEST_TIME'];
        print "Session ID: ".session_id()."<br>";
        print "Session helye: ".session_save_path()."<br>";
        print "Ekkor léptél be: ".date('Y-m-d H:i:s', $_SESSION["hozzaferesido"])."<br>";
    
    ?>
    <a href="session2.php?"> Tovább a következő oldalra</a>
</body>
</html>