<?php

include '../includes/dbConn.php';

if(isset($_POST["txtFname"])){
    if(isset($_POST["txtLname"])){
        $cid = $_POST["txtcID"];
        $fName = $_POST["txtFname"];
        $lName = $_POST["txtLname"];
        $phone = $_POST["txtPhone"];
        $email = $_POST["txtEmail"];
        $address = $_POST["txtAddress"];
        $city = $_POST["txtCity"];
        $zip = $_POST["txtZip"];
        $state = $_POST["txtState"];
        $custPassword = $_POST["txtCustPassword"];
        $custpassword2 = $_POST["txtCustPassword2"];

        if ($custPassword == $custpassword2) {

            include '../includes/dbConn.php';

            try{
                $db = new PDO($dsn, $username, $password, $options);
                $sql = $db->prepare("update customerTbl set first_name =:First_Name, last_name =:Last_Name, address =:Address, city =:City, state =:State, zip =:Zip, phone =:Phone, email =:email, custPassword =:custPassword where cust_ID = :cid");
                $sql->bindValue(":cid",$cid);
                $sql->bindValue(":First_Name",$fName);
                $sql->bindValue(":Last_Name",$lName);
                $sql->bindValue(":Address",$address);
                $sql->bindValue(":City",$city);
                $sql->bindValue(":State",$state);
                $sql->bindValue(":Zip",$zip);
                $sql->bindValue(":Phone",$phone);
                $sql->bindValue(":email",$email);
                $sql->bindValue(":custPassword",$custPassword);
                $sql->execute();

            }catch (PDOException $e){
                $error = $e->getMessage();
                echo "Error: $error";
            }
            header("Location:customertbl.php");
        }
    }
}

if(isset($_GET["cid"])){
    $cid=$_GET["cid"];
    try{
        $db = new PDO($dsn, $username, $password, $options);
        $sql = $db->prepare("select * from customerTbl where cust_ID = :cid");
        $sql->bindValue(":cid",$cid);
        $sql->execute();
        $row = $sql->fetch();

        $fName = $row["first_name"];
        $lName = $row["last_name"];
        $phone = $row["phone"];
        $email = $row["email"];
        $address = $row["address"];
        $city = $row["city"];
        $zip = $row["zip"];
        $state = $row["state"];
        $custpassword = $row["custPassword"];
        $custpassword2 = $row["custPassword2"];

    }catch (PDOException $e){
        $error = $e->getMessage();
        echo "Error: $error";
    }
}else {
    header("Location:customerTbl.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Harrison's Website</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <style>
        #container {
            font-weight: bold;
            background-color: darkgrey;
            padding: 15px;
            width: 50%;
            clear: both;
            margin:0 auto;
        }
        #container input {
            size="150";
            align="right";
        }
        fieldset {
            margin:0 auto;
        }
        td {
            text-align: left;
            width: 50%;
        }
        th {
            text-align: right;
        }
        table {
            border-spacing: 5px;
        }
    </style>
    <script type="text/javascript">
        function DeleteCustomer(firstname, lastname, cid){
            if (confirm("Do you want to delete " + firstname + " " + lastname)){

                document.location.href = "customerdelete.php?cid=" + cid;
            }
        }
    </script>
</head>
<body>
<header><?php include '../includes/header.php' ?></header>
<nav><?php include '../includes/nav.php' ?></nav>
<main>
    <div id="container">
        <h3>Update Customer</h3>
        <form method="post">
            <fieldset>
                <legend>Customer</legend>
                <table border="1" width="100%">
                    <tr>
                        <th>*First Name:</th>
                        <td><input id="txtFname" name="txtFname" type="text" autofocus required maxlength="40" value="<?=$fName?>"</td>
                    </tr>
                    <tr>
                        <th>*Last Name:</th>
                        <td><input id="txtLname" name="txtLname" type="text" required maxlength="40" value="<?=$lName?>"></td>
                    </tr>
                    <tr>
                        <th>*Phone Number:</th>
                        <td><input id="txtPhone" name="txtPhone" type="text" required maxlength="12" value="<?=$phone?>"></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><input id="txtEmail" name="txtEmail" type="text" maxlength="50" value="<?=$email?>"></td>
                    </tr>

                </table>
            </fieldset>
            <fieldset>
                <legend>Address</legend>
                <table border="1" width="100%">
                    <tr>
                        <th>Address:</th>
                        <td><input id="txtAddress" name="txtAddress" type="text" maxlength="50" value="<?=$address?>"></td>
                    </tr>
                    <tr>
                        <th>City:</th>
                        <td><input id="txtCity" name="txtCity" type="text" maxlength="30" value="<?=$city?>"></td>
                    </tr>
                    <tr>
                        <th>Zip Code:</th>
                        <td><input id="txtZip" name="txtZip" type="text" maxlength="5" value="<?=$zip?>"></td>
                    </tr>
                    <tr>
                        <th>State:</th>
                        <td><input id="txtState" name="txtState" type="text" maxlength="2" value="<?=$state?>"></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend>Security</legend>
                <table border="1" width="100%">
                    <tr>
                        <th>*Password:</th>
                        <td><input id="txtPassword" name="txtPassword" type="password" required maxlength="50" value="<?=$custPassword?>"></td>
                    </tr>
                    <tr>
                        <th>*Password<br>Verification:</th>
                        <td><input id="txtPassword2" name="txtPassword2" type="password" required maxlength="50" value="<?=$custpassword2?>"></td>
                    </tr>
                </table>
            </fieldset><br>
            <input type="submit" value="Update Customer"> | <input type="button" onclick="DeleteCustomer('<?=$fName?>','<?=$lName?>',<?=$cid?>)" value="Delete Customer">
            <input type="hidden" id="txtcID" name="txtcID" value="<?=$cid?>">
        </form>
    </div>
    <br><br>
</main>

<footer><?php include '../includes/footer.php' ?></footer>
</body>
</html>