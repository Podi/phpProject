<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>masodfoku</title>
</head>
<body>
    <?php
            function megoldokeplet($a, $b, $c)
            {
                if (($b*$b)-(4*$a*$c) >= 0){
                    $n1 = (-$b + sqrt(($b*$b)-(4*$a*$c)))/2*$a;
                    $n2 = (-$b - sqrt(($b*$b)-(4*$a*$c)))/2*$a;
                    
                } else {
                    $n1= null;
                    $n2= null;
                }
                return [$n1, $n2];
            }
            $a=$_GET['a'];
            $b=$_GET['b'];
            $c=$_GET['c']; 

            if (megoldokeplet($a, $b, $c)[0] == null){
                print("Nincs megoldás.<br>");
            }
            elseif  (megoldokeplet($a, $b, $c)[0] == megoldokeplet($a, $b, $c)[1]){
                print("Egy megoldás van.<br>");
                print("Megoldás: ". megoldokeplet($a, $b, $c)[0] ."<br>");
            } 
            else {
                print("Két megoldás van.<br>");
                print("Első megoldás: ". megoldokeplet($a, $b, $c)[0] ."<br>");
                print("Második megoldás: ". megoldokeplet($a, $b, $c)[1] ."<br>");
            }
        ?>
</body>
</html>
