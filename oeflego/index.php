<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('data.php');


$itemsPerPage = 6;
$start = 0;
// $stop = $start + $itemsPerPage;

$currentPage = @$_GET['page']; // ? $_GET['page'] : 1;
$currentPage = (int)$currentPage;

if ($currentPage == 0) {
    $currentPage = 1;
}
// if (($currentPage == 0) || !is_int($currentPage)) {
// // if ($currentPage === null) {
//   $currentPage = 1;
// }

$start = (($currentPage - 1) * $itemsPerPage); // Opgelet, arrays starten bij 0, dus 1 aftrekken.

$stop = $start + $itemsPerPage;
if ($stop > $totalAmountOfPhotos) {
    $stop = $totalAmountOfPhotos;
}
// switch ($currentPage) {
//     case 2:
//         $start = 6;
//         $stop = $start + $itemsPerPage;
//         break;
//     case 3:
//         $start = 12;
//         $stop = $start + $itemsPerPage;
//         break;
// }

// switch ($currentPage) {
//   case 2:

// }

$totalAmountOfPhotos = count($photos);
$totalAmountOfPages = ceil($totalAmountOfPhotos / $itemsPerPage);

?>

<!DOCTYPE html>
<html lang="en" data-lt-installed="true">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <meta charset="utf-8">
    <meta name="description" content="My description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>lego lego</title>
</head>

<body>
    <main>
        <section>
            <header>
                <h2>Lego</h2>
                <p>Totaal : <?= count($photos) ?> foto's</p>
            </header>

            <?php
            // foreach ($photos as $index => $photo): 
            for ($i = $start; $i < $stop; $i++):
            ?>

                <aside style="background-color:<?= $photos[$i]['color']; ?>">
                    <a href="lego_detail.php?id=<?php $i; ?>">
                        <img src="<?php echo $photos[$i]['url']; ?>" />
                    </a>
                </aside>

            <?php
            endfor;
            // endforeach; 
            ?>

            <?php if ($currentPage < $totalAmountOfPages): ?>
                <a href="index.php?page=<?= $currentPage + 1; ?>"><b>Next</b></a>
            <?php endif; ?>
            <!-- <a href="#"><b>Next</b></a> -->

        </section>
    </main>

</body>

</html>