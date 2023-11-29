<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <form method="post">    
        <label for="name"> Név:
            <input type="textbox" name="name" id="name">
        </label><br>
        <label for="password">Jelszó:
            <input type="password" name="password" id="password">
        </label><br>
        <button type="submit">Login</button>
    </form>
    <?php 
        require_once('connect.php');
        $name = $_POST['name'];
        $password = sha1($_POST['password']);
        $result=mysqli_query($kapcsolat, "SELECT * FROM latogatas WHERE name = '$name' AND password = '$password'");
        
        if (mysqli_num_rows($result)>0){
            echo 'Beléphet.';
        } else {
            echo 'Nem léphet be.';
        }

        mysqli_free_result($result);
        mysqli_close($kapcsolat);
    ?>
</body>
</html>