<?php
if(isset($_POST["txtFname"])){
    if(isset($_POST["txtLname"])){
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
            $sql = $db->prepare("insert into customerTbl (first_name, last_name, address, city, state, zip, phone, email, custPassword)  VALUE(:First_Name,:Last_Name,:Address,:City,:State,:Zip,:Phone,:email,:custPassword)");
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
        } else {
            echo "Passwords do not match; Try again.";
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
</head>
<body>
<header><?php include '../includes/header.php' ?></header>
<nav><?php include '../includes/nav.php' ?></nav>
<main>
    <div id="container">
        <h3>Add a Customer</h3>
        <p>* Denotes a required field</p>
        <form method="post">
            <fieldset>
                <legend>Customer</legend>
                <table border="1" width="100%">
                <tr>
                    <th>*First Name:</th>
                    <td><input id="txtFname" name="txtFname" type="text" placeholder="e.g. John" autofocus required maxlength="40"></td>
                </tr>
                <tr>
                    <th>*Last Name:</th>
                    <td><input id="txtLname" name="txtLname" type="text" placeholder="e.g. Smith" required maxlength="40"></td>
                </tr>
                <tr>
                    <th>*Phone Number:</th>
                    <td><input id="txtPhone" name="txtPhone" type="text" placeholder="e.g. 555-555-5555" required maxlength="12"></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><input id="txtEmail" name="txtEmail" type="text" placeholder="e.g. joesmith@gmail.com" maxlength="50"></td>
                </tr>

                </table>
            </fieldset>
            <fieldset>
                <legend>Address</legend>
                <table border="1" width="100%">
                <tr>
                    <th>Address:</th>
                    <td><input id="txtAddress" name="txtAddress" type="text" placeholder="e.g. 123 State St." maxlength="50"></td>
                </tr>
                <tr>
                    <th>City:</th>
                    <td><input id="txtCity" name="txtCity" type="text" placeholder="e.g. New York" maxlength="30"></td>
                </tr>
                <tr>
                    <th>Zip Code:</th>
                    <td><input id="txtZip" name="txtZip" type="text" placeholder="e.g. 10005" maxlength="5"></td>
                </tr>
                <tr>
                    <th>State:</th>
                    <td><input id="txtState" name="txtState" type="text" placeholder="e.g. NY" maxlength="2"></td>
                </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend>Security</legend>
                <table border="1" width="100%">
                <tr>
                    <th>*Password:</th>
                    <td><input id="txtCustPassword" name="txtCustPassword" type="password" required placeholder="e.g. ********" maxlength="50"></td>
                </tr>
                <tr>
                    <th>*Password<br>Verification:</th>
                    <td><input id="txtCustPassword2" name="txtCustPassword2" type="password" required placeholder="e.g. ********" maxlength="50"></td>
                </tr>
                </table>
            </fieldset><br>
            <input type="submit" value="Add New Customer">
        </form>
    </div>
    <br><br>
</main>

<footer><?php include '../includes/footer.php' ?></footer>
</body>
</html>