<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
</head>
<body>
    <?php
    session_start();
    if ($_SESSION["level"] == "admin"){
        require_once('connect.php');
        echo '<h1> Üdvözöllek '.$_SESSION['username'].'! A jogosultságod: '.$_SESSION['level'].' </h1><br>';
        echo '<form action="logout.php">';
        echo    '<button type="submit">Kijelentkezés</button>';
        echo '</form><hr>';}
    ?>
<form method="post">
    
        <h2>Új felhasználó:</h2>
        <label> Username:
            <input name="username" id="username" type="text">
        </label><br>
        <label> Password:
            <input name="password" id="password" type="text">
        </label><br>
        </label> Level:
            <select name="level" id='level'>
                <option value="admin">admin</option>
                <option value="guest">guest</option>
                <option value="blogger">blogger</option>
            </select>
        </label><br>
    <button type="submit"> Hozzáadás </button><hr>
</form>
    <?php
        if ($_SESSION["level"] == "admin"){
            require_once('connect.php');

            

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['password']) && isset($_POST['username']) && isset($_POST['level'])) {
                    $username = $_POST['username']; 
                    $password = sha1($_POST['password']); 
                    $level = $_POST['level']; 
                    mysqli_query($kapcsolat,"INSERT INTO felhasznalok (Username, Password, Level) VALUES ('$username','$password','$level')");
                }
            }


            $result = mysqli_query($kapcsolat, "SELECT * FROM felhasznalok");
            echo '<h2>Felhasználók:</h2>';
            echo '<table>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Username</th>';
            echo '<th>Password</th>';
            echo '<th>Level</th>';
            echo '</tr>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['ID'] . '</td>';
                echo '<td>' . $row['Username'] . '</td>';
                echo '<td>' . $row['Password'] . '</td>';
                echo '<td>' . $row['Level'] . '</td>';
                echo '</tr>';
            }
        } else {
            header("Location:login.php");
            exit;
        }
    ?>
</body>
</html>