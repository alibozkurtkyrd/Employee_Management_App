<?php
session_start();

include "config.php";

if (isset($_POST['submit'])) {

    $personal_id = $_POST['personal_id'];
    $auth_id = $_POST['admin_id'];
    $quantity = $_POST['quantity'];
    $type = $_POST['type'];
    $description = $_POST['description'];


    try{

        $sorgu = $baglanti->prepare("INSERT INTO LeavesLog (personal_id, auth_id, amount, type, description) 
            VALUES('$personal_id', '$auth_id','$quantity', '$type','$description')");
        $sorgu->execute();
        header ("Location: admin_profile.php?id=$personal_id");



    }catch (PDOException $e) {
        die($e->getMessage());
    }

}else{
    echo("hata olustu");
}
?>