<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datetime</title>
</head>
<body>

    <?php
            print ("Aktuális idő és dátum:<br>");
            $date = date('m/d/Y h:i:s a', time());
            print($date)
        ?>
</body>
</html>
