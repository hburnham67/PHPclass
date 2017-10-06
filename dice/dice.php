<?php
session_start();

$die1 = mt_rand(1,6);
$die2 = mt_rand(1,6);
$you = $die1 + $die2;

$compDie1 = mt_rand(1,6);
$compDie2 = mt_rand(1,6);
$compDie3 = mt_rand(1,6);
$comp = $compDie1 + $compDie2 + $compDie3;

if ($you > $comp){
    $result = "You Win!";
  } else if ($you < $comp) {
    $result = "Computer Wins";
  } else {
    $result = "Tie";
}

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
    <h2>Your Score:<?=$you ?></h2>
    <div id="">
        <img id="dice" src="../img/dice_<?=$die1?>.png"/>
        <img id="dice" src="../img/dice_<?=$die2?>.png"/>
    </div>
    <h2>Computer Score:<?=$comp ?></h2>
    <div>
    <img id="dice" src="../img/dice_<?=$compDie1?>.png"/>
    <img id="dice" src="../img/dice_<?=$compDie2?>.png"/>
    <img id="dice" src="../img/dice_<?=$compDie3?>.png"/>
    </div>
    <h1>Result:<?=$result ?></h1>
</main>
<footer><?php include '../includes/footer.php'?></footer>
</body>
</html>