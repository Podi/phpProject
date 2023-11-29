
<?php
    $kapcsolat = mysqli_connect( "localhost", "root");

    if ( ! $kapcsolat ){die( "Nem lehet csatlakozni a MySQLkiszolgálóhoz! " . mysqli_error($kapcsolat) );}

    
    $database = "oye5kg"; 
    if (!mysqli_select_db($kapcsolat, $database)) {
        
        die("Nem lehet megnyitni a következő adatbázist: $database " . mysqli_error($kapcsolat));
    }
?>
