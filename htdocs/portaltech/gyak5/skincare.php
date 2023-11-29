<?php
    if (count($_POST) == 1){
        echo "Örülünk, hogy vigyázol a bőrödre!";
    } else {
        echo "A megadott bőrügyi problémákra az alábbi hatóanyagokat ajánljuk: <br>";
        if (isset($_POST['dehidratacio'])){
            echo "Hialuronsav, Béta Glukán<br>";
        }
        if (isset($_POST['pmb'])){
            echo "Niacinamid, Szalicilsav<br>";
        }
        if (isset($_POST['oregedes'])){
            echo "Retinol, Peptidek<br>";
        }
        if (isset($_POST['irritacio'])){
            echo "Pantenol, Centella Asiatica<br>";
        }
        if (isset($_POST['pigment'])){
            echo "Alpha Arbutin, C-vitamin<br>";
        }
    }
   
?>