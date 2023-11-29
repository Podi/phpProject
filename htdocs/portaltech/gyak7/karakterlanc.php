<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ű, initial-scale=1.0">
    <title>karakterlanc</title>
</head>
<body>
    <?php
        $query = array(
            "nev"=> "Gipsz Jakab",
            "erdeklodes"=> "Portáltechnológiák",
            "honlap"=> "http://uni-corvinus.hu/~internet"
        );

        $lekerdezes = http_build_query($query);

    ?>
    <a href="kiir.php?<?php print $lekerdezes ?>"> Probaljuk ki az atadast</a>
</body>
</html>