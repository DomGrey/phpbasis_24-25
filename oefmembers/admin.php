<?php
include('db.inc.php');

if (isset($_GET['delete'])) {
    $member_id = (int) $_GET['delete'];

    $stmt = $pdo->prepare("DELETE FROM members WHERE id = ?");
    $stmt->execute([$member_id]);
    header('Location: admin.php');
    exit;
}

$stmt = $pdo->query("SELECT * FROM members");
$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin overzicht</title>
</head>

<body>
    <main>
        <section>
            <header>
                <h2>Members mgmt</h2>
            </header>

            <table>
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>Username</th>
                        <th>Geslacht</th>
                        <th>Aangemaakt op</th>
                        <th>Gewijzigd op</th>
                        <th>...</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members as $member): ?>
                        <tr>
                            <td><img src="<?= $member['photo'] ?>" alt="Profile Picture" width="50"></td>
                            <td><?= $member['firstname'] ?></td>
                            <td><?= $member['lastname'] ?></td>
                            <td><?= $member['username'] ?></td>
                            <td><?= ($member['gender'] == 'm' ? 'Man' : ($member['gender'] == 'f' ? 'Vrouw' : 'X')); ?></td>
                            <td><?= $member['created']; ?></td>
                            <td><?= $member['updated']; ?></td>
                            <td><a href="?delete=<?= $member['id']; ?>">Verwijder</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div>
                <a href="/oefmembers/index.php"><button>Ga naar formulier</button></a>
            </div>
        </section>
    </main>
</body>

</html>