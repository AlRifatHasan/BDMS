<?php
include('../connect.php');
$did=$_GET['did'];
$sql="DELETE FROM donor WHERE did=$did";
$data = mysqli_query($mysqli, $sql);
if($data)
{
    echo "Record Deleted";
}
else 
{
    echo "Record didn't deleted";
}
	
	header('location: ../index.php');
?>