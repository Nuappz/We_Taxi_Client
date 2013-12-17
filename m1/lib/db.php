<?php 
define ('DB_HOST', 'localhost');
define ('DB_USER', 'root');
define ('DB_PASS', '');
define ('DB_NAME', 'wtaxi');

$dbconn = mysqli_connect('p:'.DB_HOST, DB_USER, DB_PASS ) or	die ("couldn't connect with Database");

if (!$dbconn) exit('Could not connect: ' . mysqli_connect_error());
mysqli_select_db($dbconn, DB_NAME) or	die ("couldn't select database");
mysqli_set_charset($dbconn, "utf8");

?>