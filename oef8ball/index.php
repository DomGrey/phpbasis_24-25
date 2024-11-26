<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('data.php');

$theanswer = @$_GET['p'];
$lastAnswer = @$_GET['l'];
// $answer = "";

function getRandomAnswer()
{
    global $answers;
    $random = array_rand($answers);
    return $random;
}

do {
    $randomIndex = getRandomAnswer();
    $answer = $answers[$randomIndex];
} while ($answer === $lastAnswer);
// }


?>

<!DOCTYPE html>
<html lang="en" data-lt-installed="true">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <meta charset="utf-8">
    <meta name="description" content="My description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>8ball</title>
</head>

<body>
    <main align="center">

        <header>
            <h1>8BALL</h1>
            <p>Press the button for answers</p>
        </header>

        <?php if ($theanswer !== null): ?>
            <h2><?php echo $answer; ?></h2>

            <a href="index.php?p=<?= $randomIndex; ?>&l=<?= urlencode($answer); ?>"><b>ASK AGAIN</b></a>
            <!-- <a href="#"><b>Next</b></a> -->

        <?php else: ?>
            <a href="index.php?p=<?= $randomIndex; ?>&l="><b>ASK 8BALL</b></a>
            <!-- <a href="#"><b></b></a> -->

        <?php endif; ?>


    </main>

</body>

</html>