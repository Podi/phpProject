<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2</title>
</head>
<body>
    <?php
        include('2_class_lib.php');

        $labda = new Termek(1,"Focilabda",27);

        $labda->set_netto_ear(100);

        echo "Bruttó ár: ".$labda->get_brutto_ear()."<br>";

        $labda->set_afa_kulcs(25);

        echo "Új bruttó ár: ".$labda->get_brutto_ear();
        
    ?>
</body>
</html>
