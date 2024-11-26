<?php

/* OEF: dit mag gerust in een apart bestand indien dat voor jou overzichtelijker is: 
Geef via een GET parameter een aantal mee als ?height=999, waarbij 999 vrij in te vullen is. 
Op het scherm wil ik een driehoek zien van 999 hoog, waarbij op de eerste lijn 1 sterretje staat, 
op de tweede lijn twee sterretjes, op de derde lijn 3, ..., ... ,... en uiteindelijk op de 999e lijn 999 sterretjes */

$height = @$_GET['stars'];

for ($i = 1; $i <= $height; $i++) {
    // for ($x = 1; $x <= $i; $x++) {
    //     echo "*";
    // }
    $char = "*";
    if ($i % 5 == 0)

        echo str_repeat($char, $i) . "</br>";
}
