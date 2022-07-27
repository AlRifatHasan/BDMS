<?php
include('../connect.php');
// SQL query to select data from database
$sql = "SELECT * FROM donor";
$result = $mysqli->query($sql);
$mysqli->close(); 
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Update Donor</title>
</head>
  
<body>
    <section>
        <h1>Update Donor Details</h1>
        <table>
            <tr>
                <th>Full Name</th>
                <th>Email Address</th>
                <th>Blood Group</th>
                <th>Weight</th>
                <th>Date of Birth</th>
                <th>Location</th>
                <th>Gender</th>
                <th>Last Blood Donation Date</th>
                <th>Update</th>
            </tr>
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA-->
                <td><?php echo $rows['fullname'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['bgroup'];?></td>
                <td><?php echo $rows['weight'];?></td>
                <td><?php echo $rows['dob'];?></td>
                <td><?php echo $rows['location'];?></td>
                <td><?php echo $rows['gender'];?></td>
                <td><?php echo $rows['lbdate'];?></td>
                <td><a href="up.php? fn=<?php echo $rows['fullname'];?> & em=<?php echo $rows['email'];?> & bg=<?php echo $rows['bgroup'];?> &
				wt=<?php echo $rows['weight'];?> & db=<?php echo $rows['dob'];?> & loc=<?php echo $rows['location'];?> & 
				gn=<?php echo $rows['gender'];?> & ld=<?php echo $rows['lbdate'];?>">update</a></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
</body>
  
</html>