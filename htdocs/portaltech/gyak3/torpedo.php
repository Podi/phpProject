<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torpedo</title>
</head>
<body>
    <?php
        $a=$_GET['a'];
        $b=$_GET['b'];

        $table = [];
        $torpedolist = [];
        $n_torpedos = mt_rand(10, 14);

        for ($i = 0; $i <= 98-$n_torpedos; $i++){
            array_push($torpedolist, 0);
        }
        for ($i = 0; $i <= $n_torpedos; $i++){
            array_push($torpedolist, 1);
        }
        shuffle($torpedolist);

        $counter = 0;
        for ($i = 0; $i <= 9; $i++) {
            $row = [];
            for ($j = 0; $j <= 9; $j++) {
                array_push($row,$torpedolist[$counter]);
                $counter += 1;
            }
            array_push($table,$row);
        }


        if ($table[$a][$b] == 1) {
            echo "Talált, süllyedt, a találat helye: "." (".$a.",".$b.") <br>";
        } else {
            echo " Nem talált. <br>";
        }


        for ($i = 0; $i <= 9; $i++) {
            for ($j = 0; $j <= 9; $j++) {
                echo $table[$i][$j]." (".$i.",".$j.") ";
            }
            echo "<br>";
        }

    ?>
</body>
</html>