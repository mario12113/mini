<?php 
	session_start();

	// variable declaration
    $org = "";
	$first_name = "";
    $last_name = "";
	$email    = "";
    
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	include "db_config.php";

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
        $org = $_POST['org'];
		
		$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
		$password_1 = mysqli_real_escape_string($connection, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($first_name)) { array_push($errors, "First name is required"); }
        if (empty($last_name)) { array_push($errors, "Last name is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
        
        //check if exists in db, no duplicates allowed
        $sql = "SELECT email FROM user WHERE email='" . $email . "'";
        $query = mysqli_query($connection, $sql);
        
        //count number of records returned    
            $rowcount=mysqli_num_rows($query);
            
            if($rowcount > 0) {                 
                array_push($errors, "You already have a login <a href='login.php'>Sign in</a>");
            }

		// register user if there are no errors in the form
		if (count($errors) == 0) {
            
            
     
            //encrypt the password
                                              
            $password = md5($password_1);   
			
			//add user to database
            $query = "INSERT INTO user(first_name, last_name, org_id_fk, email, user_password, is_deleted) ";    
            $query .= "VALUES('{$first_name}', '{$last_name}', {$org}, '{$email}', '{$password}', 0 ) ";
            $result = mysqli_query($connection, $query);
            if(!$result) {
                die ("Query Failed! " . mysqli_error($connection));
            } 
			$_SESSION['email'] = $email;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
        
        

		if (count($errors) == 0) {
            
                             
			$password = md5($password);
            
			$query = "SELECT * FROM user WHERE email='{$email}' AND user_password='{$password}'";
			$result = mysqli_query($connection, $query);
            if(!$result) {
                die ("Query Failed! " . mysqli_error($connection));
            }
            
            while($row = mysqli_fetch_assoc($result)) {
                $email = $row["email"];
        
                echo $email;
            }
			if (mysqli_num_rows($result) > 0) {
              
				$_SESSION['email'] = $email;
				$_SESSION['success'] = "You are now logged in";
				header('location: ../view_videos_user.php');
			}else {
                
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>