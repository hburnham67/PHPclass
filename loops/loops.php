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
<?php
    $number1 = 109;
    $number2 = "60";
    $number = $number1 + $number2;

    echo '<h1>$number</h1>';

    $i = 1;
    while($i < 7){
        echo "<h$i>Hello World</h$i>";
        $i = $i + 1;
    }

    $i = 6;
    do{
        echo "<h$i>Hello World</h$i>";
        $i--;
    }while($i > 0);

    for ($i=1;$i<7;$i++){
        echo "<h$i>Hello World</h$i>";
    }

    echo "<br /><br /><hr /><br />";
    $Full_Name = "Doug Smith";
    $Position = strpos($Full_Name, ' ');

    echo $Position;
    echo "<br /><br /><hr /><br />";

    echo $Full_Name;
    echo "<br />";

    $Full_Name = strtoupper($Full_Name);
    echo $Full_Name;

    echo "<br /><br /><hr /><br />";

    echo $Full_Name;
    echo "<br />";

    $Full_Name = strtolower($Full_Name);
    echo $Full_Name;

    echo "<br /><br /><hr /><br />";

    $nameParts = explode(' ', $Full_Name);
    echo $nameParts[0];
    echo "<br />";
    echo $nameParts[1];
?>
</main>
<footer><?php include '../includes/footer.php'?></footer>
</body>
</html>