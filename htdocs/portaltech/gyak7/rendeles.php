<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendelés</title>
</head>
<body>
    <?php
        session_start();

        if (!isset($_SESSION['termeklista'])) {
            $_SESSION['termeklista'] = array(
                'Termék A',
                'Termék B',
                'Termék C',
                'Termék D'
            );
        }

        if (!isset($_SESSION['kosar'])) {
            $_SESSION['kosar'] = array();
        }

        if (isset($_POST['kosarba'])) {
            $termekIndex = $_POST['termekIndex'];

            if (isset($_SESSION['termeklista'][$termekIndex])) {
                $_SESSION['kosar'][] = $_SESSION['termeklista'][$termekIndex];
            }
        }

    ?>
    <h1>Terméklista</h1>
    <form method="post" action="rendeles.php">
        <select name="termekIndex">
            <?php foreach ($_SESSION['termeklista'] as $index => $termek): ?>
                <option value="<?= $index ?>"><?= $termek ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="kosarba">Kosárba</button>
    </form>
    <a href="kosar.php">Kosár tartalma</a>
</body>
</html>
