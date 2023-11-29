<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teglatest</title>
</head>
<body>
    <?php
            $a=$_GET['a'];
            $b=$_GET['b'];
            $c=$_GET['c']; 
            print("A téglalap felülete: ". ($a*$b*2)+($a*$c*2)+($c*$b*2) ."<br>");
            print("A téglalap térfogata: ". $a*$b*$c ."<br>");
        ?>
</body>
</html>
