<?php
include('db.inc.php');
// print '<pre>';
// print_r($_POST);
// print '</pre>';

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
    //
    $lastname = @$_POST['lastname'];
    if (strlen($firstname) == 0) {
        $errors[] = 'Gelieve een achternaam in te vullen.';
    } else if (strlen($lastname) > 100) {
        $errors[] = 'Je achternaam is te lang...';
    }
    //
    $username = @$_POST['username'];
    if (strlen($username) == 0) {
        $errors[] = 'Gelieve een gebruikersnaam in te vullen.';
    } else if (strlen($username) > 20) {
        $errors[] = 'Je gebruikersnaam is te lang...';
    }

    // Validaties voor geslacht
    $gender = @$_POST['gender'];
    if (!in_array($gender, ['f', 'm', 'x'])) {
        $errors[] = 'Gelieve je geslacht te selecteren.';
    }

    // 
    if (!empty($photo) && !filter_var($photo, FILTER_VALIDATE_URL)) {
        $errors[] = 'Gelieve een geldige URL voor je foto in te voeren.';
    }

    // TODO: alle andere validaties...

    if (count($errors) == 0) {
        $stmt = $pdo->prepare("INSERT INTO members (firstname, lastname, username, gender, photo) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$firstname, $lastname, $username, $gender, $photo]);
        $successMessage = 'Registratie succesvol!';
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
            <form method="post" action="index.php">
                <header>
                    <h2>Subscribe</h2>
                </header>
                <?php if ($successMessage): ?>
                    <p class="success"><?= $successMessage; ?></p>
                <?php endif; ?>

                <?php if (count($errors)): ?>
                    <ul class="error">
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <label for="firstname">Voornaam:</label>
                <input maxlength="100" type="text" id="firstname" value="<?= @$firstname; ?>" required placeholder="Type hier je voornaam..." />
                <label for="lastname">Achternaam:</label>
                <input maxlength="100" type="text" id="lastname" value="<?= @$lastname; ?>" required placeholder="Type type hier je achternaam..." />
                <label for="username">Gebruikersnaam:</label>
                <input maxlength="20" type="text" id="username" value="<?= @$username; ?>" required placeholder="Type hier je gebruikersnaam..." />

                <label for="gender">Geslacht:</label>
                <select id="gender" name="gender">
                    <option value="0">- selecteer -</option>
                    <option value="f" <?= (@$_POST['gender'] == 'f' ? 'selected' : ''); ?>>Vrouw</option>
                    <option value="m" <?= (@$_POST['gender'] == 'm' ? 'selected' : ''); ?>>Man</option>
                    <option value="x" <?= (@$_POST['gender'] == 'x' ? 'selected' : ''); ?>>X</option>
                </select>
                <label for="url">Profielfoto:</label>
                <input type="text" id="url" value="<?= @$photo; ?>" placeholder="type the picture url here" />
                <button id="verzenden" name="verzenden" type="submit">Voeg toe</button>
            </form>

        </section>
        <div style="text-align:center;">
            <a href="/oefmembers/admin.php"><button>Ga naar Admin</button></a>
        </div>
    </main>
</body>
</body>

</html>