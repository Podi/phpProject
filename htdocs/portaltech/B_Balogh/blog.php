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
        if ($_SESSION["level"] == "blogger"){
            require_once('connect.php');
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['ujbejegyzes'])) {
                    $text = $_POST['ujbejegyzes']; 
                    $fname = $_SESSION['username'];
                    mysqli_query($kapcsolat,"INSERT INTO bejegyzesek (Text, fname) VALUES ('$text', '$fname')");
                }
            }
            

            $query = "SELECT Text, fname FROM bejegyzesek";
            $result = mysqli_query($kapcsolat, $query);

            echo '<h1> Üdvözöllek '.$_SESSION['username'].'! A jogosultságod: '.$_SESSION['level'].' </h1><br>';

            echo '<form action="logout.php">';
            echo    '<button type="submit">Kijelentkezés</button>';
            echo '</form>';

            echo '<h1> Blogbejegyzések </h1>';

            while ($row = mysqli_fetch_assoc($result)) {
            echo "<h2>" . $row['fname'] . "</h2>";
            echo "<p>" . $row['Text'] . "</p>";
            }
        } else {
            header("Location:login.php");
            exit;
        }
    ?><hr>
    <form method="post">
        <label>
            Új bejegyzés:
            <input name="ujbejegyzes" id="ujbejegyzes" type="text">
            
        </label>
    <button type="submit"> Hozzáadás </button>
</form>
</body>
</html>