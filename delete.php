<?php 

$title="delete-record";

require_once "db/conn.php";
     if(!$_GET['id']){
         // echo "error!";
     include "includes/errorMessage.php";
     header ("Location: viewrecords.php");
     }
     else{
         //get id values
          $id=$_GET['id'];
         //call delete function
          $result=$crud->deleteAttendee($id);
         //redirect to list
         if($result){
            header("Location: viewrecords.php");
         }
         else{
               echo " ";
         }
     }
?>