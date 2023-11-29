<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Irszam</title>
</head>
<body>
    <?php
        require_once('connect.php');

        $varos = "Előszállás";
        $kerulet = "XVIII";
        echo "Város: $varos<br>";
        echo "Kerület: $kerulet<br>";
        $result=mysqli_query($kapcsolat, "SELECT zip FROM php_zip WHERE city = '$varos'");


        if ($result) {
            $fields = mysqli_fetch_fields($result);

            echo "<table border='1'><tr>";
            foreach ($fields as $field) {
                echo "<th>" . $field->name . "</th>";
            }
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($fields as $field) {
                    echo "<td>" . $row[$field->name] . "</td>";
                }
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Hiba a lekérdezés során: " . mysqli_error($kapcsolat);
        }
    ?>
</body>
</html>