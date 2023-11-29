<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP</title>
</head>
<body>
    <?php
    
    /* Osztály létrehozása */
    class Fruit {
        public $name;
        function set_name($name) {
          $this->name = $name;
          echo gettype($this);
        }
      }
      $name = "asd";
      $apple = new Fruit();
      $apple->set_name("Apple");
      
      echo $apple->name."<br>";

      /* gettype() object típust ad vissza */
      echo gettype($apple)


    
    ?>
</body>
</html>