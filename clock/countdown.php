<?php
/**
 * This is a countdown timer
 * End of semester 12-20-2017
 */

$secPerMin = 60;
$secPerHour = 60 * $secPerMin;
$secPerDay = 24 * $secPerHour;
$secPerYear = 365 * $secPerDay;

//Current Time
$now = time();

//End of Semester Time
$endOfSem = mktime(12,0,0,12,20,2017);

//Number of seconds between now and then
$seconds = $endOfSem - $now;

$Years = floor($seconds / $secPerYear);
$seconds = $seconds - ($Years * $secPerYear);

$Days = floor($seconds / $secPerDay);
$seconds = $seconds - ($Days * $secPerDay);

$Hours = floor($seconds / $secPerHour);
$seconds = $seconds - ($Hours * $secPerHour);

$Minutes = floor($seconds / $secPerMin);
$seconds = $seconds - ($Minutes * $secPerMin);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Harrison's Website</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<header><?php include '../includes/header.php'?></header>
<nav><?php include '../includes/nav.php'?></nav>
<main>
    <h3>End Of Semester Countdown</h3>
    <p>Years:<?=$Years ?> | Days<?=$Days ?> | Hours<?=$Hours ?> | Minutes<?=$Minutes ?> | Seconds<?=$seconds ?></p>
</main>
<footer><?php include '../includes/footer.php'?></footer>
</body>
</html>
