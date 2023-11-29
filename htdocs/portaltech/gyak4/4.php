<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4</title>
</head>
<body>
    <?php
        include('4_class_lib.php');

        $szemely = 
        new Szemely("Kecske",2002,12,22,80,180);

        echo $szemely->nev." ".$szemely->szul_ev.".".$szemely->szul_honap.".".$szemely->szul_nap." napon született.".
        " testtömeg-indexe: ".$szemely->BMI()."(".$szemely->BMIszoveg().")<br>";

        $szemely->hizik(30);

        echo $szemely->nev." ".$szemely->szul_ev.".".$szemely->szul_honap.".".$szemely->szul_nap." napon született.".
        " testtömeg-indexe: ".$szemely->BMI()."(".$szemely->BMIszoveg().")<br>";
    ?>
</body>
</html>
