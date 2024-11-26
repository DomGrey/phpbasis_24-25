<?php
// CONNECTIE CREDENTIALS
$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'members';
$db_port = 8889;
// CONNECTIE MAKEN MET DE DB
try {
    $db = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    die();
}
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
$errors = [];
function getMembers(): array
{
    global $db;
    $sql = "SELECT id, firstname, lastname, username, gender, created, updated, photo FROM members"; // Adjusted to include all needed columns
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
$members = getMembers();
// verwijder members
$memberToDelete = @$_POST['id'];
if ($memberToDelete !== null) {
    $sql = "DELETE FROM members WHERE id = :id";
    // $sql = "DELETE FROM tasks WHERE id = " . $taakIdToDelete;
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':id' => $memberToDelete
    ]);
    header("Location: overview.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://unpkg.com/mvp.css">

<head>
    <title>
        Overview members </title>
    <style>
        ul.error {
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>
    <main>
        <section id="overview">
            <header>
                <h2>Members</h2>
            </header>
            <table>
                <thead>
                    <tr>
                        <th>Profielfoto</th>
                        <th>Voornaam</th>
                        <th>Familienaam</th>
                        <th>Gebruikersnaam</th>
                        <th>Gender</th>
                        <th>Aangemaakt op</th>
                        <th>Gewijzigd op</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members as $member): ?>
                        <td><img src="<?= $member['photo'] ?>" width="100" height="100"></td>
                        <td><?= $member['firstname'] ?></td>
                        <td><?= $member['lastname'] ?></td>
                        <td><?= $member['username'] ?></td>
                        <td><?= $member['gender'] ?></td>
                        <td><?= $member['created']; ?></td>
                        <td><?= $member['updated']; ?></td>
                        <form method="post" action="overview.php">
                            <td> <input type="hidden" id="id" name="id" value="<?= $member['id']; ?>">
                                <button type="post">Verwijder deelnemer</button>
                            </td>
                        </form>
                </tbody>
            <?php endforeach; ?>
            </table>
            <p>
                <a href="/2024_11_05/oefening//form.php"><i>Formulier</i></a>
            </p>
        </section>
    </main>
</body>

</html>