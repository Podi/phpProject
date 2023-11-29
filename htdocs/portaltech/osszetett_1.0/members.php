<!--<?php ob_start(); ?>  -->
<?php
session_start(); // session indítás, folytatás
if(!$_SESSION['loggedin']){  // ha nem lennénk bejelentkezve, dobjon vissza a login.php-ra és lépjen ki
    header("Location: login.php"); 
    exit;
} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Memberpage</title>
	<style>
		#errors {
			color: red;
			}
	</style>
</head>
<body>
<?php 
echo "<h2>Üdvözöllek ".$_SESSION['username']."!"; // Session változóban tárolt felhasználónevet kiírjuk
?>
<h5><a href="logout.php">Kijelentkezés</a></h5>

<?php
if ($_SESSION['username'] == "admin") { // A következő rész csak az admin nevű felhasználónak jelenik meg
?>

<h3>Felhasználók listája</h3>

<?php
// Felépítjük a kacsolatot, csatlakozunk az adatbázishoz
require_once("connect.php");

if(isset($_POST['submit'])) { // Ha új felhasználót adott hozzá az admin
	if(isset($_POST['newpassword'])) {
	$sha1pw = sha1($_POST['newpassword']); // sha1 kódolással látjuk el a jelszavát
	}
	$sql = "INSERT INTO Users (username, password)
	VALUES ('$_POST[newusername]','$sha1pw')"; 
	
	// SQL insert kód, új sort szúrunk az Users táblába
	
	if (!mysqli_query($kapcsolat, $sql)) { // Futtatjuk a fent megírt SQL kódot
	  die('Hiba: ' . mysqli_error($kapcsolat)); 
	  // Hibakezelés..
	}
}

$query = mysqli_query($kapcsolat, "SELECT * FROM Users"); // SQL lekérdezés, minden oszlop kell

?>

<table>
<tr> <!-- fejléc -->
    <td>ID</td>
    <td>Felhasználónév</td>
    <td>Jelszó (sha1)</td>
</tr>

<?php
while($row = mysqli_fetch_assoc($query)) { // bejárjuk a lekérdezés sorait (minden sor az Users táblában)
?>

<tr> <!-- egy sor, egy user, kiírjuk mindhárom ismert adatot -->
    <td><?php echo $row["userid"]; ?></td>
    <td><?php echo $row["username"]; ?></td>
    <td><?php echo $row["password"]; ?></td>
</tr>

<?php
}
echo "</table>";
?>

<h3>Felhasználó hozzáadása</h3>

<div id="errors">
<!-- ide kerülnek a JS script által kiírt hibaüzenetek (innerHTML) -->
</div>

<form action="members.php" onSubmit="return blankcheck()" method="post">
	<table>
	<tr>
	<td>Felhasználónév:</td>
	<td><input type="text" name="newusername" id="username"></td>
	</tr>
	<tr>
	<td>Jelszó:</td>
	<td><input type="password" name="newpassword" id="password"></td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Hozzáad"></td>
	</tr>
	</table>
</form>

<?php
}
?>
<script>
function blankcheck() {

var errormsg = '<h3>Töltsd ki mindkét mezőt!</h3>';

if (document.getElementById('username').value == "" || document.getElementById('password').value == "") { // vizsgálja az input mezőket
	document.getElementById('errors').innerHTML = errormsg; 
	// ha valami gond van, kiírja a hibát
	return false; // valamelyik mező hiányzik, nem engedjük tovább
}
else {
	return true; // mindkét mező ki van töltve, mehet tovább
}
}
</script>
</body>
</html>