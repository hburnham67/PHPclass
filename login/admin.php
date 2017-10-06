<?php
session_start();
$errmsg = "";

    if(!isset($_SESSION["UID"])) {
        header("Location:index.php");
    }

    if(isset($_POST["submit"])){

        if(empty($_POST["txtFName"])) {
            $errmsg = "Name is required";
        }else{
            $FName=$_POST["txtFName"];
        }

        if(empty($_POST["txtEmail"])) {
            $errmsg = "Email is required";
        }else{
            $Email=$_POST["txtEmail"];
        }

        if(empty($_POST["txtPassword"])) {
            $errmsg = "Password is required";
        }else{
            $Password=$_POST["txtPassword"];
        }

        if($Password != $_POST["txtPassword2"]) {
            $errmsg = "Password do not match!!";
        }

        if(empty($_POST["txtRole"])) {
            $errmsg = "Role is required";
        }else{
            $Role=$_POST["txtRole"];
        }

        if($errmsg==""){
            //do database work
            //Database Stuff
            include '../includes/dbConn.php';

            try{
                $db = new PDO($dsn, $username, $password, $options);
                $sql = $db->prepare("insert into memberLogin (memberName, memberEmail, memberPassword, RoleID, MemberKey) VALUE(:Name, :Email, :Password, :RID, :Key)");
                $sql->bindValue(":Name",$FName);
                $sql->bindValue(":Email",$Email);
                $sql->bindValue(":Password",$Password);
                $sql->bindValue(":RID",$Role);
                $sql->bindValue(":Key","XXXXXXX");
                $sql->execute();

            }catch (PDOException $e){
                $error = $e->getMessage();
                echo "Error: $error";
            }
            $FName="";
            $Email="";
            $Password="";
            $Role="";
            $errmsg="Member Added to Database";
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
<header><?php include '../includes/header.php'?></header>
<nav><?php include '../includes/nav.php'?></nav>
<main>
    <h1>Admin Page</h1>
    <h3 id="error"><?=$errmsg?></h3>
    <form method="POST">
        <table border="1" width="80%">
            <tr height="60">
                <td colspan="2"><h3>Admin Login</h3></td>
            </tr>
            <tr height="40">
                <th>Full Name</th>
                <td><input id="txtFName" name="txtFName" value="<?=$FName?>" type="text" size="50" required></td>
            </tr>
            <tr height="40">
                <th>Email</th>
                <td><input id="txtEmail" name="txtEmail" value="<?=$Email?>" type="text" size="50"></td>
            </tr>
            <tr height="40">
                <th>Password</th>
                <td><input id="txtPassword" name="txtPassword" type="password" size="50"></td>
            </tr>
            <tr height="40">
                <th>Retype Password</th>
                <td><input id="txtPassword2" name="txtPassword2" type="password" size="50"></td>
            </tr>
            <tr height="40">
                <th>Role</th>
                <td>
                    <select id="txtRole" name="txtRole">
                        <option value="1">Admin</option>
                        <option value="2">Operator</option>
                        <option value="3">Member</option>
                    </select>
                </td>
            </tr>
            <tr height="60">
                <td colspan="2">
                    <input type="submit" value="Add New Member" name="submit">
                </td>
            </tr>
        </table>
    </form>
    <br />
</main>
<footer><?php include '../includes/footer.php'?></footer>
</body>
</html>