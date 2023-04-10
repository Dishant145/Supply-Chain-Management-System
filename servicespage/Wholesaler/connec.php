<?php  

$sname = "localhost";
$uname = "root";
$password = "mniDKJ@11";

$db_name = "my_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection Failed!";
	exit();
}