<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>escalla Minis Login</title>
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
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Email address</label>
			<input type="text" name="email" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>


</body>
</html>