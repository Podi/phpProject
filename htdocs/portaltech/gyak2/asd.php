<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asd</title>
</head>
<body>
    <h1>
        <?php
            print ("Hello world!<br>");
            
            /*var_dump($valtozo);*/
            print ("<br>");
            $valtozo = 5.02;
            print gettype( $valtozo );
            print ("<br>");

            $name = "Tom";
            $age = 23;
            echo "Hello, " . $name . " you are " . $age . " years old."; //OK, javasolt megoldás a konkatenáció

            print ("<br>");
            echo "I bought a book called \"Hello, World!\"";

            print ("<br>");
            print $a=$_GET['a'];



        ?>
    </h1>
</body>
</html>