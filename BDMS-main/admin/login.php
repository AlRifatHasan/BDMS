<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login to BDMS</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  <div class="header">
  	<h2>Admin Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('../errors.php'); ?>
  	<div class="input-group">
  		<label>Name</label>
  		<input type="text" name="name" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_admin">Login</button>
  	</div>
  </form>
</body>
</html>