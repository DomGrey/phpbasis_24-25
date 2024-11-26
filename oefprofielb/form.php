<?php
// print '<pre>';
// print_r($_POST);
// print '</pre>';

// CONNECTIE CREDENTIALS
$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'members';
$db_port = 8889;

// CONNECTIE MAKEN MET DE DB
try {
    $db = new PDO('mysql:host=' . $db_host . ';port=' . $db_port . ';dbname=' . $db_db, $db_user, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage();
    die();
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haal formuliergegevens op
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $username = trim($_POST['username']);
    $gender = $_POST['gender'];
    $photo = trim($_POST['photo']);

    // Validaties voor voornaam
    if (empty($firstname)) {
        $errors[] = 'Gelieve een voornaam in te vullen.';
    } elseif (strlen($firstname) > 100) {
        $errors[] = 'Je voornaam is te lang.';
    }

    // Validaties voor achternaam
    if (empty($lastname)) {
        $errors[] = 'Gelieve een achternaam in te vullen.';
    } elseif (strlen($lastname) > 100) {
        $errors[] = 'Je achternaam is te lang.';
    }

    // Validaties voor gebruikersnaam
    if (empty($username)) {
        $errors[] = 'Gelieve een gebruikersnaam in te vullen.';
    } elseif (strlen($username) > 20) {
        $errors[] = 'Je gebruikersnaam is te lang (maximaal 20 tekens).';
    } else {
        // Controleer of de gebruikersnaam al bestaat
        $stmt = $db->prepare("SELECT id FROM members WHERE username = :username");
        $stmt->execute([':username' => $username]);
        if ($stmt->rowCount() > 0) {
            $errors[] = 'Deze gebruikersnaam is al in gebruik. Kies een andere.';
        }
    }

    // Validaties voor geslacht
    if (!in_array($gender, ['f', 'm', 'x'])) {
        $errors[] = 'Gelieve je geslacht te selecteren.';
    }

    // Als er geen fouten zijn, gegevens invoegen in de database
    if (empty($errors)) {
        $stmt = $db->prepare("INSERT INTO members (firstname, lastname, username, gender, photo) VALUES (:firstname, :lastname, :username, :gender, :photo)");
        $stmt->execute([
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':username' => $username,
            ':gender' => $gender,
            ':photo' => $photo
        ]);
        echo "<p>Registratie succesvol!</p>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Members subscription</title>
    <style>
        ul.error {
            background-color: red;
            color: white;
            padding: 10px;
        }
    </style>

</head>

<body>
    <main>
        <section id="addform">
            <form method="post" action="form.php">
                <header>
                    <h2>Subscribe...</h2>
                </header>

                <?php if (!empty($errors)): ?>
                    <ul class="error">
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <label for="firstname">Voornaam:</label>
                <input maxlength="100" type="text" id="firstname" value="<?= $firstname ?>" name="firstname" size="20" placeholder="Typ hier je voornaam..." />

                <label for="lastname">Achternaam:</label>
                <input maxlength="100" type="text" id="lastname" value="<?= $lastname ?>" name="lastname" size="20" placeholder="Typ hier je achternaam..." />

                <label for="username">Gebruikersnaam:</label>
                <input maxlength="20" type="text" id="username" value="<?= $username ?>" name="username" size="20" placeholder="Typ hier je gebruikersnaam..." />

                <label for="gender">Geslacht:</label>
                <select id="gender" name="gender">
                    <option value="0">- selecteer -</option>
                    <option value="m" <?= (isset($gender) && $gender == 'm') ? 'selected' : '' ?>>Man</option>
                    <option value="f" <?= (isset($gender) && $gender == 'f') ? 'selected' : '' ?>>Vrouw</option>
                    <option value="x" <?= (isset($gender) && $gender == 'x') ? 'selected' : '' ?>>X</option>
                </select>

                <label for="photo">Foto URL (optioneel):</label>
                <input type="url" id="photo" name="photo" value="<?= $photo ?>" placeholder="Typ hier de URL van je foto...">

                <button id="verzenden" name="verzenden" type="submit">Voeg toe</button>
            </form>
        </section>
    </main>
</body>

</html>