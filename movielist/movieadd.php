<?php
if(isset($_POST["txtTitle"])){
    if(isset($_POST["txtRating"])){
        $title = $_POST["txtTitle"];
        $rating = $_POST["txtRating"];

        //Database Stuff
        include '../includes/dbConn.php';

        try{
            $db = new PDO($dsn, $username, $password, $options);
            $sql = $db->prepare("insert into movieList (movieTitle, movieRating) VALUE(:Title,:Rating)");
            $sql->bindValue(":Title",$title);
            $sql->bindValue(":Rating",$rating);
            $sql->execute();

        }catch (PDOException $e){
            $error = $e->getMessage();
            echo "Error: $error";
        }

        header("Location:movielist.php");
    }
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
<header><?php include '../includes/header.php' ?></header>
<nav><?php include '../includes/nav.php' ?></nav>
<main>
    <form method="post">
        <table border="1" width="80%">
            <tr height="60">
                <td colspan="2"><h3>Add New Movie</h3></td>
            </tr>
            <tr height="40">
                <th>Movie Name</th>
                <td><input id="txtTitle" name="txtTitle" type="text" size="50"></td>
            </tr>
            <tr height="40">
                <th>Movie Rating</th>
                <td><input id="txtRating" name="txtRating" type="text" size="50"></td>
            </tr>
            <tr height="60">
                <td colspan="2">
                    <input type="submit" value="Add New Movie">
                </td>
            </tr>
        </table>
    </form>
</main>
<footer><?php include '../includes/footer.php' ?></footer>
</body>
</html>