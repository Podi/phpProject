<?php

session_start();

if($_SESSION['loggedin']){      // ha be van jelentkezve a felhasználó...
    session_destroy();          // kilépteti őt (sessionváltozók törlése)
    header("Location: login.php"); // és átirányítja a login oldalra
} 

?>