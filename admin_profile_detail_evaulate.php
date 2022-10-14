<?php
session_start();

include "config.php";

if (isset($_POST['submit'])) {

    $leave_id = $_POST['leaveIdModal'];
    $status = $_POST['statusModal'];
    $approver_description = $_POST['comment'];

    $approver_id = $_SESSION['adminId']; // get the use info from session

    $personalId = $_POST['personalIdModal']; // This Id will be used in header function to return page

    try{
        // UPDATE GroupUser set admin_id=NULL WHERE admin_id=".$id)


        $updateQuery = "UPDATE LeaveRequest SET  approver_id = $approver_id, status_='$status', approver_description='$approver_description', edited_date=NOW() WHERE id=$leave_id";
        
        $sorgu = $baglanti->prepare($updateQuery);
        $sorgu->execute();
        header ("Location: admin_profile.php?id=$personalId");



    }catch (PDOException $e) {
        die($e->getMessage());
    }

}else{
    echo("hata olustu");
}
?>