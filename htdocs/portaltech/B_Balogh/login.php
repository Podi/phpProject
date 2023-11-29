<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<style>
		#errors {color:red}
	</style>
</head>
<body>

<h2>Bejelentkezés</h2>

<div id="errors">
	<?php
		if(isset($_GET["nomatch"])){
			if($_GET["nomatch"] == true){
				echo"Hibás jelszó vagy felhasználónév!";
			}
		}
	?>
</div>

<form action="check.php" onSubmit="return blankcheck()" method="post">
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
	function blankcheck(){
		var errormsg="Tölts ki minden mezőt!";
		if (document.getElementById("username").value=="" || document.getElementById("password").value==""){
			document.getElementById("errors").innerHTML=errormsg;
			return false;
		} else {
			return true;
		}
	}
</script>

</body>
</html>

<!--
Továbbfejlesztési ötletek:
1: Regisztrációs felület (guesthez és bloggerhez)
2: Ne lehessen ugyan olyan nevű és jelszavú felhasználó (vagy csak ugyan olyan nevű)

-->