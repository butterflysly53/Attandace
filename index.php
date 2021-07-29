
<?php 
$title="index";
require_once "includes/header.php";
require_once "db/conn.php";
$results=$crud->getSpeciality();
?>

<h1 class="text-center">Registration for IT Conferenence</h1>
<form  enctype='multipart/form-data' method="post" action="success.php">
<div class="mb-3">
    <label for="Name" class="form-label"> Your Full Name</label>
    <input required type="text" class="form-control" id="Name" name="Name">
  </div>
  <div class="mb-3">
    <label for="dob" class="form-label">Date of Birth</label>
    <input required type="text" class="form-control" id="dob" name="dob" placeholder="yyyy/mm/dd">
  </div>
 <div class="mb-3">
 <label for="speciality" class="form-label">Specialty</label>
  <select class="form-select" aria-label="Default select example" id="speciality" name="speciality">
   <?php while($r= $results->fetch(PDO::FETCH_ASSOC)) { ?>
     <option value="<?php echo $r['speciality_id']?>"> <?php echo $r['Name'];?> </option>
     <?php } ?>
  </select>
  <div id="Help" class="form-text text-muted">Choose any one</div>
  </div>
 <!--<div class="dropdown">
  <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton1" name="dropdownMenuButton1"
   data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-outline-dark btn-sm">Dropdown button</button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="#">Database admin</a></li>
    <li><a class="dropdown-item" href="#">Software developer</a></li>
    <li><a class="dropdown-item" href="#">Web administrater</a></li>
    <li><a class="dropdown-item" href="#">Other</a></li>
  </ul>-->
   <!-- <select class="form-control" id="Speciality" aria-describedby="Help">
        <option>Database admin</option>
        <option>Software developer</option>
        <option>Web administrater</option>
        <option>Other</option>
    </select>-->
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input required type="email" class="form-control" id="email" 
     aria-describedby="emailHelp" placeholder="xyz@gmail.com" name="email">
    <div id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Contact Number</label>
    <input required type="text" class="form-control" id="phone" aria-describedby="PhoneHelp" name="phone">
    <div id="PhoneHelp" class="form-text text-muted">We'll never share your Phone Number with anyone else.</div>
  </div>
  <div class="custom-file">
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
            <label class="custom-file-label" for="avatar">Choose File</label>
            <small id="avatar" class="form-text text-danger">File Upload is Optional</small>
            <br/>  
   </div > 
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"> Enter Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    <div id="PasswordHelp" class="form-text text-muted">It must contain minimum 8 characacters.</div>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php require_once "includes/footer.php";?> 