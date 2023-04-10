<?php  
session_start();

session_unset();
session_destroy();

header("Location: http://localhost/Project Code/login page/USER/login.php");

?>