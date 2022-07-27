<?php
session_start();

// initializing variables
$id = "";
$username = "";
$email    = "";
$message = "";
$did = "";
$fullname = "";
$email    = "";
$bgroup   = "";
$weight = "";
$dob = "";
$location = "";
$gender  = "";
$lbdate = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'bdms');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  
  //Logout
  if(isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['username']);
      header('location: login.php');
  }
  // REGISTER DONOR
if (isset($_POST['reg_donor'])) { 
 
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $bgroup = mysqli_real_escape_string($db, $_POST['bgroup']);
  $weight = mysqli_real_escape_string($db, $_POST['weight']);
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $lbdate = mysqli_real_escape_string($db, $_POST['lbdate']);

  if (empty($fullname)) { array_push($errors, "Fullname is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($bgroup)) { array_push($errors, "Blood group is required"); }
  if (empty($weight)) { array_push($errors, "Weight is required"); }
  if (empty($dob)) { array_push($errors, "Date of birth is required"); }
  if (empty($location)) { array_push($errors, "Location is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }

  $donor_check_query = "SELECT * FROM donor WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $donor_check_query);
  $donor = mysqli_fetch_assoc($result);
  
  if ($donor) { 
    if ($donor['email'] === $email) {
      array_push($errors, "Donor using this email already exists");
    }
  }

  if (count($errors) == 0) {
  	$query = "INSERT INTO donor (did, fullname, email, bgroup, weight, dob, location, gender, lbdate) 
  			  VALUES('$did','$fullname', '$email', '$bgroup', '$weight', '$dob', '$location', '$gender', '$lbdate')";
  	mysqli_query($db, $query);
  	
  }
}
  // Message
if (isset($_POST['con'])) {

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $message = mysqli_real_escape_string($db, $_POST['message']);

  if (empty($email)) { array_push($errors, "Email address required"); }
  if (empty($message)) { array_push($errors, "Write a message"); }

  $con_check_query = "SELECT * FROM contact WHERE message='$message' LIMIT 1";
  $result = mysqli_query($db, $con_check_query);
  $con = mysqli_fetch_assoc($result);
  
  if ($con) { 
    if ($con['message'] === $message) {
      array_push($errors, "This message was already given");
    }
  }

  if (count($errors) == 0) {

  	$query = "INSERT INTO contact (email, message) 
  			  VALUES('$email', '$message')";
  	mysqli_query($db, $query);
      header('location: index.php');
  }
}
  ?>