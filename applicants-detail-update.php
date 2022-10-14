<?php
session_start();

include "config.php";

$applicant_id = $_GET['id'];

if (isset($_POST['submit'])) {

    $admin_id = $_SESSION['adminId'];
    

    $vote = isset($_POST['my-checkbox']) ? $_POST['my-checkbox'] : "";

    $comment = $_POST['comment'];
    $dateNow = $currentDateTime = date('Y-m-d H:i:s');

    try {
        $sonuc = $baglanti->exec("UPDATE applicant_admin SET comment='$comment', vote='$vote', created_date='$dateNow' where admin_id=$admin_id AND applicant_id=$applicant_id");

        if ($sonuc > 0) {
            echo $sonuc . " kayıt güncellendi.";
            header ("Location: applicants-detail.php?id=$applicant_id");
        } else {
            echo "Herhangi bir kayıt güncellenemedi.";
        }
        

    } catch (PDOException $e) {
        die($e->getMessage());
    }

    $baglanti = null;
}else{
    echo("hata olustu");
}
?>