<?php
/* OEF: Bereken deze keer de soms van alle getallen (tussen $start en $start + $count zoals gezien in de laatste oefeningen)*/
$getal1 = @$_GET['start'];
$getal2 = $getal1 + @$_GET['stop'];

// $som = 10 + 11 + 12;

for ($i = $getal1; $i < $getal2; $i++) {
    echo "$i<br >";
    $som = $som + $i;
}
echo " de som bedraagt $som";

/* OEF: dit mag gerust in een apart bestand indien dat voor jou overzichtelijker is: 
Geef via een GET parameter een aantal mee als ?height=999, waarbij 999 vrij in te vullen is. 
Op het scherm wil ik een driehoek zien van 999 hoog, waarbij op de eerste lijn 1 sterretje staat, 
op de tweede lijn twee sterretjes, op de derde lijn 3, ..., ... ,... en uiteindelijk op de 999e lijn 999 sterretjes

OEF: uitbreiding op de voorgaande driehoek-oefening: 
indien het aantal sterretjes op de lijn deelbaar is door 5, print dan geen sterretjes, maar het is-gelijk-aan-teken (=).

OEF: (mag opnieuw in een apart bestand): maak een pagina die 2 optionele GET parameters accepteert:
name => een string, bevat een naam
gender => ook een string, mogelijke antwoorden zijn m, f en x
Toon op de pagina een begroeting in de vorm: Hallo [Mr.|Mv.| ] {naam}. Hou daarmee rekening met volgende criteria:
vrouwen worden aangesproken als Mv.
mannen worden aangesproken als Mr.
Indien het geslacht ongekend is, wordt de aanspreking Mv./Mr. niet getoond
De naam wordt, ongeacht hoe die in de URL parameters staat, STEEDS getoond als kleine letters, 
waarbij ieder woord/onderdeel van de naam begint met een hoofdletter. => bvb: Hallo Mr. Van De Voorde */
