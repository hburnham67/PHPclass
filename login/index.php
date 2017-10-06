<?php
session_start();

if(isset($_POST["txtUsername"])){
    if(isset($_POST["txtPassword"])){
        $userName = $_POST["txtUsername"];
        $password = $_POST["txtPassword"];
        $errmsg = "";

        if(strtolower($userName)=="admin" && $password=="p@ss"){
            $_SESSION["UID"] = 1;
            header("Location:admin.php");

        } else{
            if(strtolower($userName)=="user" && $password=="p@ss"){
                header("Location:member.php");
            }else {
                $errmsg = "Wrong Username or Password";
            }
        }

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
                <td colspan="2"><h3>User Login</h3></td>
            </tr>
            <tr height="40">
                <th>Username</th>
                <td><input id="txtUsername" name="txtUsername" type="text" size="50"></td>
            </tr>
            <tr height="40">
                <th>Password</th>
                <td><input id="txtPassword" name="txtPassword" type="password" size="50"></td>
            </tr>
            <tr height="60">
                <td colspan="2">
                    <input type="submit" value="Login">
                </td>
            </tr>
        </table>
    </form>
</main>
<footer><?php include '../includes/footer.php' ?></footer>
</body>
</html>