<?php 
$title="success";
require_once "includes/header.php";
require_once "db/conn.php";

if(isset($_POST['submit'])){
  //extract values from $_POST array
  $fname=$_POST["Name"];
  $email=$_POST["email"];
  $dob=$_POST["dob"];
  $speciality_id=$_POST["speciality"];
  $phone=$_POST["phone"];
  //call function to insert and track if sucess or not
  $isSucess=$crud->insertAttandees($fname,$email,$dob,$speciality_id,$phone);
  if ($isSucess){
   // echo "<h1 class='text-center text-success'> You have been registered! </h1>";
    include "includes/successMessage.php";

  }
  else{
     //echo "<h1 class='text-center text-danger'> There was an error in processing! </h1>";
    include "includes/errorMessage.php";

  }
}
?>

<br/>
<!--This section prints the values that were paassed using get method -->

<!--div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Name: <?php # echo  $_GET["Name"]; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php # echo  $_GET["speciality"]; ?></h6>
    <p class="card-text"> Date of Birth: <?php # echo  $_GET["dob"]; ?> </p>
    <p class="card-text">Email Id: <?php # echo  $_GET["email"]; ?> </p>  
    <p class="card-text">Contact Number: <?php # echo $_GET["phone"];  ?> </p>
  </div>
</div>-->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Name: <?php echo  $_POST["Name"]; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"> Specialty_id: <?php echo  $_POST["speciality"]; ?></h6>
    <p class="card-text"> Date of Birth: <?php echo  $_POST["dob"]; ?> </p>
    <p class="card-text">Email Id: <?php echo  $_POST["email"]; ?> </p>  
    <p class="card-text">Contact Number: <?php echo $_POST["phone"];  ?> </p>
  </div>
</div>
<?php require_once "includes/footer.php";?> 