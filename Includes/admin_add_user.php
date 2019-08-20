<?php
include "../db_config.php";
include "../Includes/head_navbar.html";
if(isset($_POST["add_user"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $org_id_fk = $_POST["org_id"];
    $role_id_fk = $_POST["role_id"];
    $user_password = $_POST["password"];
    $is_deleted = 0;
    $email = $_POST["email"];
    
    
        $query = "INSERT INTO user(first_name, last_name, org_id_fk, role_id_fk, user_password, salt, is_deleted, email) ";
            
        $query .= "VALUES('{$first_name}', '{$last_name}', {$org_id_fk}, {$role_id_fk}, '{$user_password}',  1, 0, '{$email}') ";
    
        $create_post = mysqli_query($connection, $query);
    if(!$create_post) {
        die ("Query failed! " .mysqli_error($connection));
    }
}
?>
<!-- Add new user form code -->
<h1>escalla Admin - Add new user</h1>
<hr>
<p></p>
    <form action="" method="post" enctype="multipart/form-data">
       <label for="role_id">Select role</label>
      <select name="role_id" id="role_id">
       
        <?php
           //get list of roles from db to put into drop down list
            $query = "SELECT * FROM roles";
            $select_roles = mysqli_query($connection, $query); 
            
            while($row = mysqli_fetch_assoc($select_roles)) {                           
            $role_id = $row["role_id"];
            $role_type = $row["role_type"];
             
             echo "<option value='{$role_id}'>{$role_type}</option>";
         }
        ?>
             </select>
        <label for="org_id">Select organisation</label>
        <select name="org_id" id="org_id">
       
        <?php
           //get list of roles from db to put into drop down list
            $query = "SELECT * FROM organisation";
            $select_org = mysqli_query($connection, $query); 
            
            while($row = mysqli_fetch_assoc($select_org)) {                           
            $org_id = $row["org_id"];
            $org_name = $row["org_name"];
             
             echo "<option value='{$org_id}'>{$org_name}</option>";
         }
        ?>
             </select>
     <div class="form-group">
        <input type="text" class="form-control" name="first_name" placeholder="Add first name">
     </div>
     <div class="form-group">
        <input type="text" class="form-control" name="last_name" placeholder="Add last name">
     </div>
     
             <div class="form-group">
        <input type="text" class="form-control" name="password" placeholder="Create password">
     </div>
        <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Enter email address">
     </div>
     <div class="form-group">
       <input type="submit" class="btn btn-primary" name="add_user" value="Add user">
     </div>
    </form>