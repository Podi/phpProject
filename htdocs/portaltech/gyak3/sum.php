<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sum</title>
</head>
<body>
    <?php
        $data = [6, 2, -1, 8, -10, 5, -3, 2, 9, -6];

        $min_index = array_search(min($data),$data);
        unset($data[$min_index]);
        $max_index = array_search(max($data),$data);
        unset($data[$max_index]);
        print("<pre>");
        print_r($data);
        print("<pre>");

        $sum = 0;
        foreach($data as $value){
            if ($value > 0){
                $sum += $value;
            }
        }
        echo $sum;

    ?>
</body>
</html>