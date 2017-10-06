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
    <h1>Customer Listing</h1>
    <table border="1" width="100%" >
        <tr>
            <th>CustomerID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <?php

        include '../includes/dbConn.php';

        try{
            $db = new PDO($dsn, $username, $password, $options);

            $sql = $db->prepare("select * from customerTbl");
            $sql->execute();
            $row = $sql->fetch();

            while ($row!=null){

                echo "<tr>";
                echo "<td><a href=customerupdate.php?cid=" . $row["cust_ID"] . ">" . $row["cust_ID"] . "</a></td>";
                echo "<td>" . $row["first_name"] . "</td>";
                echo "<td>" . $row["last_name"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["city"] . "</td>";
                echo "<td>" . $row["state"] . "</td>";
                echo "<td>" . $row["zip"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>Secret</td>";
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
    <a href="customeradd.php">Add New Customer</a>

</main>
<footer><?php include '../includes/footer.php'?></footer>
</body>
</html>