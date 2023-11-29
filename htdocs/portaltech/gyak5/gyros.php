<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skincare</title>
</head>
<body>
    <?php 
        if (strtoupper($_SERVER['REQUEST_METHOD'])=='GET') {
	?>  
    <form action="<?php print $_SERVER['PHP_SELF']?>" method="post">
		<label> Mibe kéred?
            <select name="mibe" id="mibe">
                <option value="pita">Pita (800Ft)</option>
                <option value="tortilla">Tortilla (1000Ft)</option>
                <option value="tal">Tál (2000Ft)</option>
            </select>
        </label> <br>
        <label> Milyen hússal?
            <select name="hus" id="hus">
                <option value="sima">Sima</option>
                <option value="falafel">Falafel (+200Ft)</option>
                <option value="extra">Extra (+400Ft)</option>
            </select>
        </label><br>
        <label> Csípős?
            <input type="checkbox" name = "csipos">
        </label><br>
        <label> Elvitel?
            <input type="checkbox" name = "elvitel">
        </label><br>
		<p><input type="submit" name="submit"></p>
	</form>

    <?php }
        if (isset($_POST['submit'])){
            $ar = 0;
            switch ($_POST['mibe']) {
                case 'pita':
                    $ar += 800;
                    break;
                case "tortilla":
                    $ar += 1000;
                    break;
                case "tal":
                    $ar += 2000;
                    break;
            }
            switch ($_POST['hus']) {
                case 'sima':
                    $ar += 0;
                    break;
                case "falafel":
                    $ar += 200;
                    break;
                case "extra":
                    $ar += 400;
                    break;
            }
            echo "<h1>Köszönjük a rendelést! </h1><br>";
            echo "Rendelés adatai:<br>";
            echo "Mibe: ".$_POST['mibe']."<br>";
            echo "Hús: ".$_POST['hus']." <br>";
            if(isset($_POST['csipos'])){
                echo "Csípős: Igen<br>";
            } else {
                echo "Csípős: Nem<br>";
            }
            if(isset($_POST['elvitel'])){
                echo "Elvitel: Igen<br>";
            } else {
                echo "Elvitel: Nem<br>";
            }
            echo "Fizetendő: ".$ar."Ft<br>";
        }
	?>
</body>
</html>