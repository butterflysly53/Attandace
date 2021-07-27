<?php 
$title="view-record";
require_once "includes/header.php";
require_once "db/conn.php";
if (!isset($_GET['id'])){
    //echo "<h1 class='text-danger text-center'> Please Check Details And Try Again </h1>";
    include "includes/errorMessage.php";
}
else{
    $id= $_GET['id'];
    $result= $crud->getAttendeeDetails($id);
    
?>
<br/>
<br/>
<br/>
 <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Name: <?php echo  $result["name"]; ?></h5>
    <p class="card-text">Email Id: <?php echo  $result["email_id"]; ?> </p>  
    <p class="card-text"> Date of Birth: <?php echo  $result["Date_of_birth"]; ?> </p>
    <h6 class="card-subtitle mb-2 text-muted"> Specialty_id: <?php echo  $result["Name"]; ?></h6>
    <p class="card-text">Contact Number: <?php echo $result["contact_number"];  ?> </p>
  </div>
  </div>
  <br/>
         <a href="viewrecords.php" class="btn btn-primary">Back</a>
         <a href="edit.php?id=<?php echo $result["attendee_id"]?>" class="btn btn-warning">Edit</a>
         <a onclick="return confirm('Are You Sure You Want To Delete This Record ?');" href="delete.php?id=
          <?php echo $result["attendee_id"]?>" class="btn btn-danger">Delete</a>

<?php } ?>
<br/>
<?php require_once "includes/footer.php"; ?> 
 