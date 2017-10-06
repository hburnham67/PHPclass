<?php
if(isset($_GET["cid"])){
    $cid=$_GET["cid"];
    try{
        include '../includes/dbConn.php';
        $db = new PDO($dsn, $username, $password, $options);
        $sql = $db->prepare("delete from customerTbl where cust_ID = :cid");
        $sql->bindValue(":cid",$cid);
        $sql->execute();

    }catch (PDOException $e){
        $error = $e->getMessage();
        echo "Error: $error";
    }
}
header("Location:customertbl.php");
?>