<?php 
   // get values from  POST operation
    require_once "db/conn.php";

   if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $fname=$_POST["Name"];
    $email=$_POST["email"];
    $dob=$_POST["dob"];
    $specialty=$_POST["speciality"];
    $phone=$_POST["phone"];
   // call crud function
    $result= $crud->editAttendee($id,$fname,$email,$dob,$specialty,$phone);
   //redirect to view page
   if($result){
      header("Location: index.php");
   }
   else{
      //echo "error";
       include "includes/errorMessage.php";
     

   }
}
   else{
     // echo "error";
     include "includes/errorMessage.php";

   }
?>