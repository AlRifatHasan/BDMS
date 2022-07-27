<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Become Donor</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  <div class="header">
  	<h2>Donor Registration</h2>
  </div>
	
  <form method="post" action="dregister.php">
  	<?php include('../errors.php'); ?>
      <div class="input-group">
  	  <label>Fullname</label>
  	  <input type="text" name="fullname">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email">
  	</div>
      <div class="input-group">
  	  <label>Blood Group</label>
  	  <input type="text" name="bgroup">
  	</div>
      <div class="input-group">
  	  <label>Weight</label>
  	  <input type="float" name="weight">
  	</div>
      <div class="input-group">
  	  <label>Date of Birth</label>
  	  <input type="date" name="dob">
  	</div>
  	<div class="input-group">
  	  <label>Location</label>
  	  <input type="add" name="location">
  	</div>
  	<div class="input-group">
  	  <label>Gender (Male/Female)</label>
  	  <input type="text" name="gender">
  	</div>
    <div class="input-group">
  	  <label>Last blood donation date</label>
  	  <input type="date" name="lbdate">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_donor" onClick="alert('Are you sure?')">Register</button>
  	</div>
  </form>
</body>
</html>