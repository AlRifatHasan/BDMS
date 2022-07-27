<?php
include('../connect.php');
$sql = "SELECT * FROM announcement ORDER BY date DESC ";
$result = $mysqli->query($sql);
$mysqli->close(); 
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Announcement Details</title>
</head>
  
<body>
    <section>
        <h1>Announcements</h1>
        <table>
            <tr>
                <th>Announcement No.</th>
                <th>Date</th>
                <th>Details</th>
            </tr>
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA-->
                <td><?php echo $rows['a_no'];?></td>
                <td><?php echo $rows['date'];?></td>
                <td><?php echo $rows['details'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
</body>
  
</html>