<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* instert comments php */
// een nieuwe variable met naam $name definieren 
// $name = "Voornaam Naam";

// $firstname = "Voornaam";
// $lastname = "Familienaam";

// $id = 1;
$id = @$_GET["volgnummer"];

$modus = @$_GET["mode"];


if ($id == 1) {
    $firstname = "vinnie";
    $lastname = "batsbak";
} elseif ($id == 2) {
    $firstname = "nico";
    $lastname = "batsbak";
} else {
    $firstname = "Voornaam";
    $lastname = "Familienaam";
}

// switch ($id) {
//     case 1:
//         $firstname = "vinnie";
//         $lastname = "batsbak";
//         break;
//     case 2:
//         $firstname = "nico";
//         $lastname = "batsbak";
//         break;
//     default:
//         $firstname = "Voornaam";
//         $lastname = "Familienaam";
// }

?>
<html>

<head>
    <title> Portfolio <?php print $firstname . " " . $lastname; ?></title>
    <!-- insert comments html -->
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>
<main>

    <body>
        <h1><?php echo $firstname . " " . $lastname; ?></h1>
        <h1><?php echo "$firstname $lastname"; ?></h1>
        <h1><?php echo '$firstname $lastname'; ?></h1>
        <h3>Jack of all trades consultant</h3>
        <p>
            Hallo ik ben Domien Grysolle.<br />
            Jouw volgende iets.<br />
            Ik kan super goed naar een scherm kijken en ook op toetsen drukken!<br />
            Mijn grootste pluspunt is mijn inspiratie :) </p>
        <p>
            blablabalbalalbalablabablabablabablbabalbblablabalbalabalblblb.<br /><br />
        <ul>
            <li><a href="https://www.facebook.com" target="_blank" title="facebook">facebook</a></li>
            <li><a href="https://www.instagram.com" target="_blank" title="instagram">instagram</a></li>
            <li><a href="https://www.linkedin.com" target="_blank" title="linkedin">linkedin</a></li>
            <li><a href="mailto:someone@example.com?subject=Contact aanvraag" target="_blank" title="mail">mail</a></li>
        </ul>
        </p>
        <footer>
            <hr>
            <p>
                <small> &copy;Copyright 2024 Made by <a href="https://www.domiengrysolle.com" target="_blank"></a></small><br>
            </p>
        </footer>
    </body>
</main>

</html>