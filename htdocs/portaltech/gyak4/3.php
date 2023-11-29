<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3</title>
</head>
<body>
    <?php
        include('3_class_lib.php');

        class Frissaru extends Termek{
            private $f_datum;

            function __construct($azonosito, $nev, $afa_kulcs, $f_datum){
                parent::__construct($azonosito, $nev, $afa_kulcs);
                $this->f_datum = $f_datum;
            }
            
            function set_f_datum($new_f_datum){
                $this->f_datum = $new_f_datum;
            }
            function get_f_datum(){
                return $this->f_datum;
            }
        }


        $tej = new Frissaru(1,"Háztartási tej",27,"2023.10.10");

        $tej->set_netto_ear(500);

        print("<pre>");
        print_r($tej);
        print("</pre>");

        
    ?>
</body>
</html>
