<?php
include('../connect.php');
$sql = "SELECT * FROM contact ORDER BY date DESC ";
$result = $mysqli->query($sql);
$mysqli->close(); 
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Messages</title>
</head>
  
<body>
    <section>
        <h1>Users Message</h1>
        <table>
            <tr>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA-->
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['message'];?></td>
                <td><?php echo $rows['date'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
</body>
  
</html>