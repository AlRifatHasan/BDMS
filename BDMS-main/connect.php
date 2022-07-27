<?php
  
$servername='localhost';
$user = 'root';
$password = ''; 
$database = 'bdms'; 

$mysqli = new mysqli($servername, $user, $password, $database);
  
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
}
?>