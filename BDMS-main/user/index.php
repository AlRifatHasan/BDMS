<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: http://localhost/aproject/home.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: http://localhost/aproject/home.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body class="d-flex h-100 text-center text-white bg-black">

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
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

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <b><?php echo $_SESSION['username']; ?></b>,</p>
		<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <div class="container">
      <div class="offcanvas-header d-flex d-lg-none">
      <div class="offcanvas-body p-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/aproject/user/dregister.php">Become a volunteer donor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/aproject/user/dlist.php">View volunteer donor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/aproject/user/annshow.php">View announcement</a>
          </li>
          <!--UNSOLVED PROBLEM-->
		      <!--li class="nav-item">
            <a class="nav-link" href="http://localhost/aproject/user/update.php">Change profile information</a>
          </!--li-->
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/aproject/user/mess.php">Leave a Message</a>
          </li>
      </div>
    </div>
  </div>
   	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>