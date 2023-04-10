<?php 
   session_start();
   include "conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<html>
<head>
	<title>HOME</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <?php if ($_SESSION['role'] == 'manufacturer') { 
            $_SESSION['mlocation'] = $_SESSION['location'];
            $_SESSION['memail'] = $_SESSION['email'];
      		header("Location: http://localhost/Project%20Code/servicespage/Manafacturer/profile.php");
        }

        else if ($_SESSION['role'] == 'wholesaler') {
            $_SESSION['location'] = $_SESSION['location'];
            $_SESSION['email'] = $_SESSION['email'];
            
      		header("Location: http://localhost/Project%20Code/servicespage/Wholesaler/profile.php");
        }    
        else  {
            $_SESSION['location'] = $_SESSION['location'];
            $_SESSION['email'] = $_SESSION['email'];
            header("Location: http://localhost/Project%20Code/servicespage/Retailer/profile.php");
        }           

        ?>
</body>
</html>

<?php }else{
	header("Location: index.php");
} ?>