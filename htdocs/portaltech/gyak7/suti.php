<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Süti</title>
</head>
<body>
    <?php
        setcookie("count", 0, time() +1111136000);
        
        if (isset($_COOKIE["zoldseg"])){
            print("Nem először jársz itt.");
            print($_COOKIE["zoldseg"]);
        }
        else {
            print("Először.");
        }
    ?>
</body>
</html>