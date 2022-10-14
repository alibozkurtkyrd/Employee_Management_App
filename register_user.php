<?php


include "config.php";

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $rolename = $_POST['rolename'];
    $detailed_rolename = $_POST['detailed_rolename'];
    

    try {
        $sorgu = $baglanti->prepare("INSERT INTO Admins (username, email, phone, password, rolename,detailed_rolename) 
            VALUES('$username', '$email','$phone', '$password','$rolename','$detailed_rolename')");
        $sorgu->execute();

        echo "<p>Bilgiler başarılı bir şekilde kaydedildi.</p>";
        header ("Location: list_users.php");

    } catch (PDOException $e) {
        die($e->getMessage());
    }

    $baglanti = null;
}else{
    echo("hata olustu");
}
?>