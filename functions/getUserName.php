<?php
include "config.php";
// this functions get userId and return the userName by using Admins table on Database

function getUserName($userId){

    $userName = "";

    if ($userId == "")
        return $userName;

    try {
    $query = "SELECT * FROM Admins WHERE id=$userId";

    $sorgu = $GLOBALS['baglanti']->query($query);
    $User = $sorgu->fetch(PDO::FETCH_ASSOC);
    $userName = $User['username'];

    } catch (PDOException $e) {
            
        die($e->getMessage());
    }

    return $userName;

}

// echo getUserName(5);

?>