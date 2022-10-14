<?php
session_start();
include "config.php";

if (isset($_POST['update'])) {

    $id = $_POST['update_id'];
    $username = $_POST['usernameModal'];
    $email = $_POST['emailModal'];
    $phone = $_POST['phoneModal'];
    $rolename = $_POST['roleModal'];
    $detailed_rolename = $_POST['detailed_rolenameModal'];

 
    try{ 
        $queryUpdateAdmin = "UPDATE Admins set username='$username', email='$email', phone = '$phone',  rolename='$rolename', detailed_rolename='$detailed_rolename'
        WHERE id='$id'"; 
    
        $sorgu = $baglanti->prepare($queryUpdateAdmin);
        $sorgu->execute();

    }catch (PDOException $e) {
                
            die($e->getMessage());
    }
    

    header ("Location: list_users.php");



}else{
    echo("hata olustu");
}
?>