<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="form.php" method="post">
		<p>Név: <input type="text" name="nev"></p>
		<p>Kor: <input type="text" name="kor"></p>
		<p>Cím: <input type="text" name="cim"></p>
		<p>Nem: </p>
		<p>
			<select name="selector" id="selector1">
				<option value="10">10</option>
				<option value="20">20</option>
				<option value="30">30</option>
			</select>
		</p>
		<p><input type="radio" name="nem" value="ffi"> Férfi</p>
		<p><input type="radio" name="nem" value="no"> Nő</p>
		<p><input type="submit"></p>
	</form>
    <?php
        print_r($_POST);
    ?>
</body>
</html>