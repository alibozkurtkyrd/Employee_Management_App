<?php

function getColor($status){
    switch ($status) {
        case "Pending":
          return "warning";
          break;
        case "Approved":
            return "success";
          break;
        case "Rejected":
          return "danger";
          break;
        case "Completed":
         return "secondary";
         break;
      }
}
?>