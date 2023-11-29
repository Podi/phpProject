<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tömbök</title>
</head>
<body>
    <?php
        /*Tömb létrehozása*/
         $names = ["John", "David", "Jane"];
         $numbers = [1,2,3,4,5];
         $names[] = "asd";
         array_push($names, "Adam"); /*Végéhez adunk elemet*/
         array_unshift($names, "Robert"); /*Elejéhez adunk elemet*/
         $students=array( /* Asszociatív tömb (dictionary)*/
            "Sam"=>"12",
            "Holly"=>"11",
            "Ben"=>"9"
        );
        echo $students["Holly"];
        print("<br>");


        /*Kiiratás*/
        print $names[0];
        print("<br>");
        print("<pre>");
        print_r($names);
        print("<pre>");

        
        /*String feldarabolása*/
        $letters = str_split("asdf", 1);
        foreach($letters as $value){
            print("<br>");
            echo $value;
        }
        print("<br>");
        
    
        /*Substring*/
        echo substr("12345678",3);  /*3. karaktertől minden*/
        print("<br>");
        echo substr("12345678",2,4); /*2. karaktertől 4 karakter*/
        print("<br>");
        echo substr("12345678",-3); /*A végétől 3 karakter*/
        print("<br>");


        /*Darabolás*/
        $names = explode(",","Ken,Ben,Len,Amy");
        print("<pre>");
        print_r($names);
        print("<pre>");


        /*Összefűzés*/
        echo implode("|",$names);
        print("<br>");


        /*Tömb darabolás*/
        print("<pre>");
        print_r(array_slice($names, 1, 2)); /*1. elemtől kezdve 2 elem*/
        print("<pre>");

        /*Tömb műveletek*/
        echo count($names); /*Tömb elemszáma*/
        print("<br>");
        echo array_sum($names); /*Tömb összege*/
        print("<br>");
        echo array_rand($numbers); /*Tömb random eleme*/
        print("<br>");
        $names = array_reverse($names); /*Tömb fordított sorrend*/
        print("<pre>");
        print_r($names);
        print("<pre>");

        /*Tömbök összefűzése */
        $merged = array_merge($names,$numbers);
        print("<pre>");
        print_r($merged);
        print("<pre>");
        
        /*Rendezés */
        sort($names);
        print("<pre>");
        print_r($names);
        print("<pre>");
        rsort($names);
        print("<pre>");
        print_r($names);
        print("<pre>");
        print("<pre>");
        print_r($names);
        print("<pre>");

        /* szuper globális */
        print("<pre>");
        print_r($_SERVER);
        print("<pre>");
        echo "Elérési út: ".$_SERVER["SCRIPT_FILENAME"];
    ?>
</body>
</html>