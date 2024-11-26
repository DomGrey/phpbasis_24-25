<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('data.php');

$id = @$_GET['id'];

if ($id === null) {
    $id = 0;
}

if (!isset($photos[$id])) {
    $id = 0;
}

?>
<!DOCTYPE html>
<html lang="en" data-lt-installed="true">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <meta charset="utf-8">
    <meta name="description" content="My description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lego lego lego</title>

</head>

<body>
    <main>
        <section>
            <header>
                <h2>Detail lego</h2>
            </header>

            <img src="<?php echo $photos[$id]['url']; ?>" />
            <p>
                <center>
                    <b>Description:</b> <?= $photos[$id]['description']; ?><br>
                    <b>Alt Description:</b> <?= $photos[$id]['alt_description']; ?><br>
                    <b>Total Likes:</b> <?= $photos[$id]['likes']; ?><br>
                    <b>Link photo:</b> <a href=<?= $photos[$id]['link']; ?> target="_blank" title="unsplash">Unsplash</a> <br>
                    <b>Link photographer:</b> <a href=<?= $photos[$id]['user']['link']; ?> target="_blank" title="unsplash">human</a> <br>
                </center>
            </p>
        </section>
    </main>

</body>

</html>