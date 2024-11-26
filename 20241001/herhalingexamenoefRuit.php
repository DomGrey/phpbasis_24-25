<!-- TEKEN RUIT
(4 punten)
Maak in index.php in deze map een functie met naam "getDiamond" die een ruit teruggeeft van n grootte

Maak daarbij gebruik van spatie+underscore+spatie ( _ ) om witruimte weer te geven en een spatie+asterisk+spatie ( * ) om de ruit op te bouwen.

Het absolute middelpunt van de ruit toont spatie+X+spatie ( X ) in plaats van spatie+asterisk+spatie

Elke rij van de ruit toont een oneven aantal asterisks

Een voorbeeld van een ruit met grootte n=15, waarbij de langste rij 15 asterisks bevat, zie je hieronder:

_ _ _ _ _ _ _ * _ _ _ _ _ _ _
_ _ _ _ _ _ * * * _ _ _ _ _ _
_ _ _ _ _ * * * * * _ _ _ _ _
_ _ _ _ * * * * * * * _ _ _ _
_ _ _ * * * * * * * * * _ _ _
_ _ * * * * * * * * * * * _ _
_ * * * * * * * * * * * * * _
* * * * * * * x * * * * * * *
_ * * * * * * * * * * * * * _
_ _ * * * * * * * * * * * _ _
_ _ _ * * * * * * * * * _ _ _
_ _ _ _ * * * * * * * _ _ _ _
_ _ _ _ _ * * * * * _ _ _ _ _
_ _ _ _ _ _ * * * _ _ _ _ _ _
_ _ _ _ _ _ _ * _ _ _ _ _ _ _
n is een optionele parameter, de standaardwaarde bedraagt 5

n moet steeds een geheel getal zijn groter dan 3, anders wordt de standaardwaarde gebruikt

de functie toont zelf niets, maar heeft een String als return value.

Schrijf de code zo performant mogelijk, hou rekening met leesbaarheid en documenteer waar nodig! -->

<!-- ?php

        function printDiamond($rows)
        {
            for ($i = 1; $i <= $rows; $i++) {

                // Print spaces
                for ($j = 1; $j <= $rows - $i; $j++) {
                    echo "-";
                }

                // Print stars
                for ($k = 1; $k <= 2 * $i - 1; $k++) {
                    echo "*";
                }

                echo "\n";
            }

            for ($i = $rows - 1; $i >= 1; $i--) {

                // Print spaces
                for ($j = 1; $j <= $rows - $i; $j++) {
                    echo "-";
                }

                // Print stars
                for ($k = 1; $k <= 2 * $i - 1; $k++) {
                    echo "*";
                }

                echo "\n";
            }
        }

        // Driver code
        $row = 5;
        printDiamond($row);

      ?  -->

<html>

<head>
    <title> </title>
    <!-- insert comments html -->
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>
<main>

    <body>
        <?php

        $height = @$_GET['h'] ? @$_GET['h'] : 21;
        if ($height === null) {
            $height = 21;
        }
        if ($height % 2 == 0) {
        }
        for ($i = 1; $i <= $height; $i += 2) {

            $spaces = ($height - $i) / 2;
            // eerst printen we de leading spaces

            echo str_repeat("&nbsp", $spaces);

            // nu printen we het aantal sterretjes voor deze rij
            $char = "*";
            echo str_repeat($char, $i);

            // uiteindelijk printen we het aantal 
            echo str_repeat("&nbsp", $spaces);
            echo "<br >";
        }
        ?>
    </body>
</main>

</html>