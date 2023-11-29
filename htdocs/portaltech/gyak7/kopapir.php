<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kopapir</title>
</head>
<body>
    <?php session_start(); ?>

    <?php
        if (isset($_POST['valasztas'])) {
            $_SESSION['valasz'] = $_POST['valasztas'];
        }
    ?>

    <form method="post" action="kopapir.php">
        <select name="valasztas" id="valasztas">
            <option value="ko">Kő</option>
            <option value="papir">Papír</option>
            <option value="ollo">Olló</option>
        </select><br>
        <button type="submit">Küldés</button>
    </form>

    <?php
        $lehetosegek = array("ko", "papir", "ollo");
        $gep_valasz = $lehetosegek[rand(0, 2)];
        if (isset($_SESSION["valasz"])) {
            echo "A felhasználó választása: " . $_SESSION["valasz"] . "<br>";
            echo "A gép választása: " . $gep_valasz . "<br>";
            
            $a = $_SESSION["valasz"];
            $b = $gep_valasz;
            
            // Inicializáljuk a győzelmek és vereségek számát a session változókban
            if (!isset($_SESSION["gyozelmek"])) {
                $_SESSION["gyozelmek"] = 0;
            }
            if (!isset($_SESSION["veresegek"])) {
                $_SESSION["veresegek"] = 0;
            }
            
            // Játék logika és eredmények kiíratása
            if ($a == $b) {
                echo "Döntetlen";
            } elseif (
                ($a == "ko" && $b == "ollo") ||
                ($a == "papir" && $b == "ko") ||
                ($a == "ollo" && $b == "papir")
            ) {
                echo "Nyertél";
                $_SESSION["gyozelmek"]++;
            } else {
                echo "Vesztettél";
                $_SESSION["veresegek"]++;
            }
            
            echo "<br>Győzelmek: " . $_SESSION["gyozelmek"] . "<br>Vereségek: " . $_SESSION["veresegek"];
        }
    ?>
</body>
</html>
