<?php
require('db.inc.php');
$coaches = name();
$suggesties = nameSuggesties();
$andere = "";
$errors = [];
$submited = false;
$naam = "";

print '<pre>';
print_r($_REQUEST);
print '</pre>';

if (@$_POST['submit']) {
    $submited = true;
    if (!isset($_POST['choice'])) { // als er geen mogelijkheid is aangeduid dan error
        $errors[] = "Duid een van de mogelijkheden aan!";
    } else {
        if ($_POST['choice'] == '-1' && $_POST['andere'] == null) { // als het niet -1 is dan error
            $errors[] = "Geef een suggestie achterlijken!";
        } else if (!in_array($_POST['choice'], array_column($coaches, 'idCoaches'))) { // als id niet bestaat dan error
            $errors[] = "ID bestaat niet dommen!";
        } else { // annders push andere in suggesties table
            $naam = $_POST['andere'];
            andere($naam);
        }
    }
}


print '<pre>';
print_r($errors);
print '</pre>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>BONDSCOACH</title>
</head>

<body>
    <h1>Wie wordt de volgende bondscoach?</h1>
    <form method="POST" action="index.php">
        <?php foreach ($coaches as $coach): ?>
            <li><input type="radio" id="<?= $coach['idCoaches'] ?>" name="choice" value="<?= $coach['idCoaches'] ?>"><?= $coach['voornaam'] ?> <?= $coach['achternaam'] ?></input></li>
        <?php endforeach; ?>
        <li><input type="radio" id="andere_radio" name="choice" value="-1">Andere: <input type="text" id="andere" name="andere" placeholder="naam"></li>
        <input type="submit" id="submit" name="submit">
    </form>
</body>

</html>