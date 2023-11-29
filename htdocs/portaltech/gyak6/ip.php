<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ip</title>
</head>
<body>
<?php
        require_once('connect.php');


        $ipAddress = $_SERVER['REMOTE_ADDR'];
        if ($ipAddress === '::1') {$ipAddress = getHostByName(getHostName());}

        
        $result=mysqli_query($kapcsolat, "SELECT Count FROM szamol WHERE IP ='$ipAddress' ");
    
        if (mysqli_num_rows($result)>0){
            $newcount = mysqli_fetch_assoc($result)['Count'] + 1;
            mysqli_query($kapcsolat,"UPDATE szamol SET Count = '$newcount'");
            echo 'Már jártál itt. Ennyiedik látogatásod: '.$newcount;
        } else {
            mysqli_query($kapcsolat,"INSERT INTO szamol (IP,Count) VALUES ('$ipAddress',1)");
            echo'Először jársz itt';
        }

        
    ?>
</body>
</html>