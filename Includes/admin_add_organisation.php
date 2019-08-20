<?php
include "../db_config.php";
include "head_navbar.html";
if(isset($_POST["add_org"])) {
    
    $org_name = $_POST["org_name"];
    $org_type = $_POST["org_type"];
    $licence_no = $_POST["licence_no"];
    
    
        $query = "INSERT INTO organisation(org_name, org_type, licence_no) ";
            
        $query .= "VALUES('{$org_name}', '{$org_type}', {$licence_no}) ";
   
    
        $create_org = mysqli_query($connection, $query);
    if(!$create_org) {
        die ("Query failed! " .mysqli_error($connection));
    }
}
?>
<h1>escalla Admin - Add new organisation</h1>
<hr>
<p></p>
    <form action="" method="post" enctype="multipart/form-data">
   <h4>Add Organisation Details Below</h4>

     <div class="form-group">
        <input type="text" class="form-control" name="org_name" placeholder="Organisation name">
     </div>
     
     <div class="form-group">
        <input type="text" class="form-control" name="org_type" placeholder="Organisation type">
     </div>
        <div class="form-group">
        <input type="text" class="form-control" name="licence_no" placeholder="How many licneces?">
     </div>
        <div class="form-group">
       <input type="submit" class="btn btn-primary" name="add_org" value="Add organisation">
        </div>
    </form>