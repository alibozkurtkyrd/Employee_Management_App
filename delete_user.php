<?php 
include "config.php";
// echo "test"; exit();
if(isset($_POST['id'])){
   $id=  $_POST['id'];

   $del =$baglanti->exec("DELETE FROM Admins  WHERE id=".$id);


   if($del){
    echo 1;

    }else{
    echo 0;

   } 

   exit;
}


