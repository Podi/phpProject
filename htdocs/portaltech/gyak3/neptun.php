<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neptun</title>
</head>
<body>
    <?php
        $data = ["ABC123_Példa Péter", "AAA000_Gipsz Jakab", "BBB111_Cserepes Virág"];

        $neptun = array();
        foreach($data as $value){
            $neptun += [substr($value,0,5) => substr($value,7)];
        }
        print("<pre>");
        print_r($neptun);
        print("<pre>");

    ?>
</body>
</html>