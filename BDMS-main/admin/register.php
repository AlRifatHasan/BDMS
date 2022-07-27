<!--?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register to BDMS</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Admin Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('../errors.php'); ?>
  	<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name" value="<?php echo $name; ?>">
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
  	  <button type="submit" class="btn" name="reg_admin" >Register</button>
  	</div>
  	<p>
  		Already have account? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>