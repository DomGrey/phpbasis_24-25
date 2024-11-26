<?php
include('db.inc.php');
print '<pre>';
print_r($_POST);
print '</pre>';

$errors = [];


// Check of formulier in vorige stap verzonden werd
if (@$_POST['verzenden'] !== null) {
    // hier zijn we zeker dat submit button geklikt werd.

    // Validaties voor voornaam
    $firstname = @$_POST['firstname'];
    if (strlen($firstname) == 0) {
        $errors[] = 'Gelieve een voornaam in te vullen.';
    } else if (strlen($firstname) > 100) {
        $errors[] = 'Je voornaam is te lang...';
    }

    // Validaties voor geslacht
    $gender = @$_POST['gender'];
    if (!in_array($gender, ['f', 'm', 'x'])) {
        $errors[] = 'Gelieve je geslacht te selecteren.';
    }

    // TODO: alle andere validaties...

    if (count($errors) == 0) {
        // hier weten we dat alles ok is, insert into DB!
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulieren</title>
</head>

<body>
    <main>
        <section>
            <header>
                <h1>Account Registration</h1>
            </header>
            <p style="text-align:center;">Register using the form below!</p>
            <form action="index.php" method="post" enctype="multipart/form-data">
                <label for="firstname">Firstname:</label>
                <input type="text" name="firstname" id="firstname" placeholder="type your firstname here" />

                <label for="lastname">Lastname:</label>
                <input type="text" name="lastname" id="lastname" placeholder="type your lastname here" />

                <label for="lastname">Username:</label>
                <input type="text" name="username" id="username" placeholder="type your username here" />

                <label for="lastname">Gender:</label>
                <input type="radio" name="gender" id="gender" value="male" /><label for="genderMale">Man</label><br />
                <input type="radio" name="gender" id="gender" value="female" /><label for="genderFemale">Female</label><br />
                <input type="radio" name="gender" id="gender" value="X" /><label for="genderX">X</label><br />

                <label for="url">Profile picture:</label>
                <input type="text" name="url" id="url" placeholder="type the picture url here" />
                <!-- <label for="image">Profile picture:</label>
                <input type="file" name="picture" id="picture" /><br />
                <label for="lastname">Url:</label>
                <input type="text" name="url" id="url" placeholder="type url profile picture" /> -->

                <input type="submit" name="submit" id="submit" value="send">

            </form>
        </section>
    </main>
</body>
</body>

</html>