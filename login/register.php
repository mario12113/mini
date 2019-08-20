<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Escalla Minis</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <style>
    
        #logo {
         position:relative;
            left: 25px;
            top: 25px;
        }
    
    </style>
    
</head>
<body>

    <div id="logo">
    
    <img src ="../Images/escalla-minis-pink.png" width ="100px" alt="logo">
        
    </div>   
    
    
 
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>
        <!--create drop down for category field-->
   <div class="form-group">
       <label for="org">Organisation</label>
       <select name="org" id="org">           
           <?php 
            //get list of categories from db to put into drop down list
            $query = "SELECT * FROM organisation";
            $select_org = mysqli_query($connection, $query);            
              
        //display category names in input field
         while($row = mysqli_fetch_assoc($select_org)) {                           
            $org_id = $row["org_id"];
            $org_name = $row["org_name"];             
             echo "<option value='{$org_id}'>{$org_name}</option>";
         }
             ?>  
       </select>
        </div>
        <div class="input-group">
			<label>First name</label>
			<input type="text" name="first_name" value="<?php echo $first_name; ?>">
		</div>

		<div class="input-group">
			<label>Last name</label>
			<input type="text" name="last_name" value="<?php echo $last_name; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>