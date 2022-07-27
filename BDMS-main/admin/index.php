<?php 
  session_start(); 

  if (!isset($_SESSION['name'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: http://localhost/aproject/home.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['name']);
  	header("location: http://localhost/aproject/home.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <?php  if (isset($_SESSION['name'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['name']; ?></strong>,</p>
		<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <div class="container">
      <div class="offcanvas-header d-flex d-lg-none">
      <div class="offcanvas-body p-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/aproject/user/dlist.php">View Donor Details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/aproject/user/dregister.php">Add donor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="update.php">Edit donor details</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/aproject/admin/delete.php">Delete donor</a>
          </li>
		      <li class="nav-item">
            <a class="nav-link" href="http://localhost/aproject/admin/ann.php">Make announcement</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="messhow.php">Show users messages</a>
          </li>
      </div>
    </div>
  </div>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>