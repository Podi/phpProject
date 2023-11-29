<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kosar</title>
</head>
<body>
    <?php   

        session_start();
        print("Kosár tartalma:<br>");
        if (!isset($_SESSION["kosar"])){
            print("Kosár üres:<br>");
    
        } else {

            foreach($_SESSION["kosar"] as $key => $termek) {
                print_r($termek."<br>");
            }
        }

    ?>
    <a href="rendeles.php">Vissza a rendelés oldalra</a>
</body>
</html>