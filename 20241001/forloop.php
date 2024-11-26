<?php
// $x = 50;
//  print $x;
// <br/>

$x = @$_GET['count'];
$start = @$_GET['start'];

// for ($i = 0; $i <= $x; $i = $i + 1) { // ($i = $i + 1) = (i++)
//     print $i . '<br/>';
// }

// for ($i = 0; $i <= $x; $i = $i + 2) { // ($i = $i + 2) = (i+=2) even
//     print $i . '<br/>';
// }


// for ($i = $start; $i <= ($start +$x); $i = $i + 2) { // start + eind waarde gevraagd
//     print $i . '<br/>';
// }

$start = 3;
for ($i = $start; $i <= ($start + $x); $i = $i + 1) { // priemgetallen
    $isPrime = true;
    for ($divider = 2; $divider < $i; $divider += 1) {
        if ($i % $divider == 0) {
            $isPrime = false;
        }
    }

    if ($isPrime) {
        print "$i is denk ik een priemgetal <br/>";
    }
}

// if ($i % 2 == 0) {
//     print $i . '<br/>';
// }
// }