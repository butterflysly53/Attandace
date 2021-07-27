
<?php 
$title="index";
require_once "includes/header.php";
require_once "db/conn.php";
$results=$crud->getSpeciality();
if(!isset($_GET['id'])){
  //echo "error!";
  include "includes/errorMessage.php";
  header ("Location: viewrecords.php");
}
else{
  $id=$_GET['id'];
$attendees=$crud->getAttendeeDetails($id);
?>

<h1 class="text-center">Edit Details</h1>
<form method="post" action="editpost.php">
  <input type="hidden" name='id' value="<?php echo $attendees['attendee_id'] ?>"/>

<div class="mb-3">
    <label for="Name" class="form-label"> Your Full Name</label>
    <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $attendees['name'] ?>">
  </div>
  <div class="mb-3">
    <label for="dob" class="form-label">Date of Birth</label>
    <input type="text" class="form-control" id="dob" name="dob" value="<?php echo $attendees['Date_of_birth'] ?>"placeholder="yyyy/mm/dd">
  </div>

 <div class="mb-3">
 <label for="speciality" class="form-label">Specialty</label>
  <select class="form-select" aria-label="Default select example" id="speciality" name="speciality">
   <?php while($r= $results->fetch(PDO::FETCH_ASSOC)) { ?>
     <option value="<?php echo $r['speciality_id']?>"<?php if($r['speciality_id'] == $attendees['speciality_id']) 
     echo 'selected' ?>> <?php echo $r['Name'];?> 
    </option>
     <?php } ?>
  </select>
  <div id="Help" class="form-text">Choose any one</div>
  </div>
 
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" 
     aria-describedby="emailHelp" placeholder="xyz@gmail.com" name="email" value="<?php echo $attendees['email_id'] ?>">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Contact Number</label>
    <input type="text" class="form-control" id="phone" aria-describedby="PhoneHelp" name="phone"
     value="<?php echo $attendees['contact_number'] ?>">
    <div id="PhoneHelp" class="form-text">We'll never share your Phone Number with anyone else.</div>
  </div>

<a href="viewrecords.php" class="btn btn-primary">Back</a>
<button type="submit" name="submit" class="btn btn-success">Save Changes</button>
</form>
<?php } ?>
<?php require_once "includes/footer.php";?> 