<?php 
if(isset($_POST['submit'])){	// Ha kapott POST medódussal értéket a login formról...
    // Felépítjük a kacsolatot, csatlakozunk az adatbázishoz
	require_once("connect.php");
 
    // A felhasználó által bevitt login adatokból levédjük a speciális karaktereket, így védekezve az SQL injection támadások elől. A jelszót sha1-tel hasheljük, mert az adatbázisban is így szerepel.
    $username = mysqli_real_escape_string($kapcsolat, $_POST['username']); 
    $password = sha1(mysqli_real_escape_string($kapcsolat, $_POST['password']));
	
    // Futtatjuk a lekérdezést, ami megnézi, hogy van-e olyan sor aminél megegyeznek az értékek a felhasználó által megadott login adatokkal. Beállítjuk a limitet 1-re mert nem lehetséges több egyezés (az egyedi username miatt).
    $query = mysqli_query($kapcsolat, "SELECT * FROM Users WHERE username='$username' AND password='$password' LIMIT 1");

    if(mysqli_num_rows($query) == 1) {          // Ha volt egyező loginnév-jelszó páros akkor beléphet...
        session_start();			// Munkamenet elindítása
        $_SESSION['username'] = $username;	// Eltároljuk a munkamenet-változóban az usernevet
        $_SESSION['loggedin'] = TRUE; 		// és a loggedin bool változót is beállítjuk
        header("Location: members.php");	// végül átirányítjuk a felhasználót a members.php-ra.
        exit;					// Leállítjuk a script futását 
    } else { 
        header("Location: login.php?nomatch=true");	// Rossz nevet/jelszót adott meg az user, visszatereljük a login oldalra és átadjuk a nomatch=true értéket, hogy tudja mi a hiba
        exit;						// Leállítjuk a script futását 
    } 
} else { // Ha nem volt POST metódussal elküldött adat (azaz csak úgy beírta a check.php-t a böngészőbe)...
    header("Location: login.php");      // átirányítjuk a login oldalra  
    exit;                               // leállítjuk a script futását
} 
?>