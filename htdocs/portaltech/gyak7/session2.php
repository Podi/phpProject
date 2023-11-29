<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>session2</title>
</head>
<body>
    <?php
        session_start();
        print "Session ID: ".session_id()."<br>";
        print "Session helye: ".session_save_path()."<br>";
        print "Ekkor léptél be: ".date('Y-m-d H:i:s', $_SESSION["hozzaferesido"])."<br>";
        
    ?>
</body>
</html>