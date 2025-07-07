<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'resident_database';


$mysqli = mysqli_connect($hostname, $username, $password, $dbname);
//if (!$mysqli) {
   // die("Connection failed: " . mysqli_connect_error());
//} else {
    // echo "Connected successfully","<br>";
//}
?>