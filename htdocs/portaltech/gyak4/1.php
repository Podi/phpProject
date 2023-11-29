<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1</title>
</head>
<body>
    <?php
        include('1_class_lib.php');

        $szemely = new Szemely("Kecske",2002,12,22);

        echo $szemely->nev." ".$szemely->szul_ev.".".$szemely->szul_honap.".".$szemely->szul_nap." napon született.<br>";

        $szemely->set_nev("András");

        echo $szemely->nev." ".$szemely->szul_ev.".".$szemely->szul_honap.".".$szemely->szul_nap." napon született.";
    ?>
</body>
</html>
