<?php
$dbname = 'efamu-db-updated';
$server = 'localhost';
$username = 'root';
$password = '';
$con = mysqli_connect($server,$username,$password,$dbname);
date_default_timezone_set('Africa/Kampala');


/*$con = mysqli_connect("localhost","nugsoftc_efamunew","!@#$%12345qwert","nugsoftc_efamunew");*/

if (mysqli_connect_errno()){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>