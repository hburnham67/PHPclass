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
    <h3>My Movie List</h3>
    <table border="1" width="80%" >
        <tr>
            <th>Key</th>
            <th>Movie Title</th>
            <th>Rating</th>
        </tr>
    <?php

        include '../includes/dbConn.php';

        try{
            $db = new PDO($dsn, $username, $password, $options);

            $sql = $db->prepare("select * from movieList");
            $sql->execute();
            $row = $sql->fetch();

            while ($row!=null){

                echo "<tr>";
                echo "<td>" . $row["movieID"] . "</td>";
                echo "<td><a href=movieupdate.php?id=" . $row["movieID"] . ">". $row["movieTitle"] . "</a></td>";
                echo "<td>" . $row["movieRating"] . "</td>";
                echo "</tr>";

                $row = $sql->fetch();
            }

        }catch (PDOException $e){
            $error = $e->getMessage();
            echo "Error: $error";
        }
        ?>
        </table>
    <br /><br />
        <a href="movieadd.php">Add New Movie</a>

</main>
<footer><?php include '../includes/footer.php'?></footer>
</body>
</html>
