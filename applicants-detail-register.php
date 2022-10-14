<?php
session_start();

include "config.php";

$applicant_id = $_GET['id'];

if (isset($_POST['submit'])) {

    $admin_id = $_SESSION['adminId'];
    
    $vote = $_POST['my-checkbox'];

    $comment = $_POST['comment'];
    

    try {
        $sorgu = $baglanti->prepare("INSERT INTO applicant_admin (applicant_id, admin_id, vote, comment) 
            VALUES('$applicant_id', '$admin_id','$vote','$comment')");
        $sorgu->execute();

        echo "<p>Bilgiler başarılı bir şekilde kaydedildi.</p>";
        header ("Location: applicants-detail.php?id=$applicant_id");

    } catch (PDOException $e) {
        die($e->getMessage());
    }

    $baglanti = null;
}else{
    echo("hata olustu");
}
?>