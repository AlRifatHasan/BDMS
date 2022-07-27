<?php 
include('../connect.php');


error_reporting(0);

$fn = $_GET['fn']; 
$em = $_GET['em']; 
$bg = $_GET['bg']; 
$wt = $_GET['wt']; 
$db = $_GET['db']; 
$loc = $_GET['loc'];
$gn = $_GET['gn'];
$ld= $_GET['ld'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Donor</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
  <div class="header">
  	<h2>Donor Details</h2>
  </div>
	
  <form method="POST" action="">
      <div class="input-group">
  	  <label>Fullname</label>
  	  <input type="text" value="<?php echo $fn;?>" name="fullname">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" value="<?php echo "$em" ?>" name="email">
  	</div>
      <div class="input-group">
  	  <label>Blood Group</label>
  	  <input type="text" value="<?php echo "$bg" ?>" name="bgroup">
  	</div>
      <div class="input-group">
  	  <label>Weight</label>
  	  <input type="float" value="<?php echo "$wt" ?>" name="weight">
  	</div>
      <div class="input-group">
  	  <label>Date of Birth</label>
  	  <input type="text" value="<?php echo "$db" ?>" name="dob">
  	</div>
  	<div class="input-group">
  	  <label>Location</label>
  	  <input type="add" value="<?php echo "$loc" ?>" name="location">
  	</div>
  	<div class="input-group">
  	  <label>Gender (Male/Female)</label>
  	  <input type="text" value="<?php echo "$gn" ?>" name="gender">
  	</div>
    <div class="input-group">
  	  <label>Last blood donation date</label>
  	  <input type="text" value="<?php echo "$ld" ?>" name="lbdate">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="submit" onClick="alert('Are you sure?')">Update Details</button>
  	</div>
  </form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $bgroup = $_POST['bgroup'];
    $weight = $_POST['weight'];
    $dob = $_POST['dob'];
    $location = $_POST['location'];
    $gender = $_POST['gender'];
    $lbdate = $_POST['lbdate'];
	$sql = "UPDATE donor SET fullname = '$fullname', email = '$email', bgroup = '$bgroup', weight = '$weight', 
    dob = '$dob', location = '$location', gender = '$gender', lbdate = '$lbdate' WHERE email = '$email' ";
    $data = mysqli_query($mysqli,$sql);
    $_SESSION['message'] = "Updated!"; 
	header('location: ../user/dlist.php');
    
}
?>