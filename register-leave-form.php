<?php
session_start();

include "config.php";

if (isset($_POST['submit'])) {

    $oneOrMulti = $_POST['oneOrMulti'];
    $reason = $_POST['reason'];
    // $start_date = ($oneOrMulti == "Günlük" ? $_POST['daily-start_date'] : $_POST['more-start_date']);
    $start_date;
    $hour;
    $end_date;
    
    
    $explanation = $_POST['explanation'];
    $admin_id = $_SESSION['adminId'];


    if ($oneOrMulti == "Daily"){
        $start_date = $_POST['daily-start_date'];
        $hour = $_POST['hour'];
        
        // split string 
        $slides = explode(" ", $hour);
        $hour = $slides[0];

        $date=date_create($start_date);
        //echo($date);
        //exit();
        $start_date = date_format($date,"Y-m-d H:i");

        $end_date = "0000-00-00";
    }else{
        $start_date = $_POST['more-start_date'];
        $end_date= $_POST['more-end_date'];

        $date=date_create($start_date);

        $start_date = date_format($date,"Y-m-d");


        $date2=date_create($end_date);

        $end_date = date_format($date2,"Y-m-d");

        // DateInterval object
        $difference = $date->diff($date2);


        $hour = ($difference->days + 1) * 8; // every day equals to 8 hour
        // I added one to day difference because end date is inside the leave. In other words empoyee will start one day later of end date
        // echo $hour;
    }
    // exit();

    

    try {
        $sorgu = $baglanti->prepare("INSERT INTO LeaveRequest (admin_id, oneOrMulti, reason, start_date, hour, end_date, explanation, status_) 
            VALUES('$admin_id', '$oneOrMulti','$reason', '$start_date','$hour', '$end_date','$explanation', 'Pending')");
        $sorgu->execute();

        echo "<p>Bilgiler başarılı bir şekilde kaydedildi.</p>";
        $admin_id = $_SESSION["adminId"];
        header ("Location: admin_profile.php?id=$admin_id");
        

    } catch (PDOException $e) {
        die($e->getMessage());
    }

    $baglanti = null;
}else{
    echo("hata olustu");
}
?>