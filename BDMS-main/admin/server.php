<?php
session_start();

// initializing variables
$name = "";
$a_no = "";
$details = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'bdms');

/*/ REGISTER ADMIN
if (isset($_POST['reg_admin'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Admin name is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a admin does not already exist with the same name 
  $admin_check_query = "SELECT * FROM admin WHERE name='$name' LIMIT 1";
  $result = mysqli_query($db, $admin_check_query);
  $admin = mysqli_fetch_assoc($result);
  
  if ($admin) { // if admin exists
    if ($admin['name'] === $name) {
      array_push($errors, "This admin already exists");
    }
  }

  // Finally, register admin if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO admin (name, password) 
  			  VALUES('$name', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['name'] = $name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}*/

// LOGIN ADMIN
if (isset($_POST['login_admin'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM admin WHERE name='$name' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['name'] = $name;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong name/password combination");
        }
    }
  }
  
  //Logout
  if(isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['name']);
      header('location: admin/login.php');
  }
  // ANNOUNCEMENT
if (isset($_POST['ann'])) {
  // receive all input values from the form
  $a_no = mysqli_real_escape_string($db, $_POST['a_no']);
  $details = mysqli_real_escape_string($db, $_POST['details']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($a_no)) { array_push($errors, "Announcement No. is required"); }
  if (empty($details)) { array_push($errors, "Announcement details is required"); }

  // first check the database to make sure 
  // a announcement does not already exist with the same a_no 
  $ann_check_query = "SELECT * FROM announcement WHERE a_no='$a_no' LIMIT 1";
  $result = mysqli_query($db, $ann_check_query);
  $ann = mysqli_fetch_assoc($result);
  
  if ($ann) { // if announcement no. exists
    if ($ann['a_no'] === $a_no) {
      array_push($errors, "Try another Announcement No.");
    }
  }

  // Finally, make announcement if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "INSERT INTO announcement (a_no, details) 
  			  VALUES('$a_no', '$details')";
  	mysqli_query($db, $query);
      header('location: index.php');
  }
}
  ?>