<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<style>
		#errors {
			color: red;
			}
	</style>
</head>
<body>
<h2>Bejelentkezés</h2>

<div id="errors">
<!-- ide kerülnek a JS script által kiírt hibaüzenetek (innerHTML) -->
<?php
if (isset($_GET["nomatch"])){ //az 'undefined' hibaüzenet kezelésére
if ($_GET["nomatch"] == true) { // ha a check.php nem talál egyezést, akkor visszajön erre az oldalra és értesítjük a felhasználót
	echo "<h3>Hibás felhasználónév/jelszó párost adtál meg!</h3>";
}
}
?>
</div>

<form action="check.php" onSubmit="return blankcheck()" method="post"> <!-- ha az onSubmit false értékkel tér vissza, itt marad az oldalon -->
	<table>
	<tr>
	<td>Felhasználónév:</td>
	<td><input type="text" name="username" id="username"></td>
	</tr>
	<tr>
	<td>Jelszó:</td>
	<td><input type="password" name="password" id="password"></td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Login"></td>
	</tr>
	</table>
</form>
<script>
function blankcheck() {

var errormsg = '<h3>Töltsd ki mindkét mezőt a belépéshez!</h3>';

if (document.getElementById('username').value == "" || document.getElementById('password').value == "") { // vizsgálja az input mezőket
	document.getElementById('errors').innerHTML = errormsg; // ha valami gond van, kiírja a hibát
	return false; // valamelyik mező hiányzik, nem engedjük tovább
}
else {
	return true; // mindkét mező ki van töltve, mehet tovább
}
}
</script>

</body>
</html>