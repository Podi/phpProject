<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <?php
        session_start();
        if ($_SESSION["level"] == "guest"){
            require_once('connect.php');
            
            echo '<h1> Üdvözöllek '.$_SESSION['username'].'! A jogosultságod: '.$_SESSION['level'].' </h1><br>';
            echo '<form action="logout.php">';
            echo    '<button type="submit">Kijelentkezés</button>';
            echo '</form>';

            echo '<h1> Blogbejegyzések </h1>';

            $query = "SELECT Text, fname FROM bejegyzesek";
            $result = mysqli_query($kapcsolat, $query);

            while ($row = mysqli_fetch_assoc($result)) {
            echo "<h2>" . $row['fname'] . "</h2>";
            echo "<p>" . $row['Text'] . "</p>";
            }
        } else {
            header("Location:login.php");
            exit;
        }
    ?>
</body>
</html>