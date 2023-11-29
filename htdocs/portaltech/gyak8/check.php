<?php
    if (isset($_POST["submit"])) {
        require_once('connect.php');
        $username = mysqli_real_escape_string($kapcsolat, $_POST["username"]);
        $password = sha1(mysqli_real_escape_string($kapcsolat, $_POST["password"]));
        $query = mysqli_query($kapcsolat,"SELECT * FROM users Where username='$username' AND password='$password' LIMIT 1");
        if (mysqli_num_rows($query) == 1) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;

            header("Location:members.php");
            exit;
        } else {
            header("Location:login.php?nomatch=true");
        }

    } else {
        header("Location:login.php");
        exit;
    }

?>