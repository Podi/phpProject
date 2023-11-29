<?php
    if (isset($_POST["submit"])) {
        require_once('connect.php');
        $username = mysqli_real_escape_string($kapcsolat, $_POST["username"]);
        $password = sha1(mysqli_real_escape_string($kapcsolat, $_POST["password"]));
        $query = mysqli_query($kapcsolat,"SELECT * FROM felhasznalok Where Username='$username' AND Password='$password' LIMIT 1");
        if (mysqli_num_rows($query) == 1) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;

            $row = mysqli_fetch_assoc($query);
            $level = $row['Level'];
            $_SESSION['level'] = $level;
        
            if ($level == 'guest') {
                header("Location:guest.php");
                exit;
            } elseif ($level == 'blogger') {
                header("Location:blog.php");
                exit;
            } elseif ($level == "admin") {
                header("Location:admin.php");
                exit;
            }

            
        } else {
            header("Location:login.php?nomatch=true");
        }

    } else {
        header("Location:login.php");
        exit;
    }

?>