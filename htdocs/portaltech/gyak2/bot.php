<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bot</title>
</head>
<body>
    <?php
        $cmd = $_GET['cmd'];
        $n1 = $_GET['n1'];
        $n2 = $_GET['n2'];
        if ($cmd == "date"){
            $currentDate = date("Y-m-d H:i:s");
            echo "Date: " . $currentDate;
        } elseif ($cmd == "info"){
            phpinfo();
        } elseif ($cmd == "add"){
            echo $n1 + $n2;
        } elseif ($cmd == "sub"){
            echo $n1 - $n2;
        } elseif ($cmd == "mult"){
            echo $n1 * $n2;
        } elseif ($cmd == "div"){
            echo $n1 / $n2;
        } else {
            echo "Nem értem a parancsot.";
        }


    ?>
</body>
</html>