<?php 
$title="view_record";
require_once "includes/header.php";
require_once "includes/auth_check.php";
require_once "db/conn.php";
   $results=$crud->getAttandees();
?>
<br/>
<h3 class="text-center text-secondary "> Event Attendee Details-</h3>
<br/>
<table class="table table-light">
 <tr>
  <th>#</th>
  <th>Name </th>
  <th>Specialty</th>
  <!--<th>Date Of Birth</th>
  <th>Specialty</th>
  <th>Email-id</th>
  <th>Contact Number</th>-->
  <th>Action</th>
  <th>   </th>
  <th>   </th>
 </tr>
  <?php
        while($r=$results->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr class="table-secondary">
            <td><?php echo $r["attendee_id"]?> </td>
            <td><?php echo $r["name"]?> </td>
            <td><?php echo $r["Name"]?> </td>
           <!-- <td><?php echo $r['Date_of_birth']?> </td>
           <td><?php echo $r["email_id"]?> </td>
            <td><?php echo $r["contact_number"]?> </td>-->
            <td> <a href="view.php?id=<?php echo $r["attendee_id"]?>" class="btn btn-primary">View</a>
            <td> <a href="edit.php?id=<?php echo $r["attendee_id"]?>" class="btn btn-warning">Edit</a>
            <td> <a onclick="return confirm('Are You Sure You Want To Delete This Record ?');" href="delete.php?id=
            <?php echo $r["attendee_id"]?>" class="btn btn-danger">Delete</a>

            </td>
        </tr>
        <?php } ?>
</table>


<?php require_once "includes/footer.php";?> 