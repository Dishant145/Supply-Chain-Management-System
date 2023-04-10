<?php 
   session_start();
   include "connec.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCM</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="service.css">
</head>
 
<body>


<section>
<header class="header">

<a href="index.php" class="logo"> <i class="fas fa-cog"></i> EasySupply <i class="fas fa-check"></i></a>
    <div class="welcome"></div>
    <nav class="navbar">
        <a href="#services"><b>Welcome! <span id="manuser"><?php echo $_SESSION['username']; ?></span></b></a>
        <a href="logout.php">logout</a>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>

</header>
</section>
<section class="about" id="about">
    <br><br>
    <h1 class="heading"> <span>Select</span> A SERVICE </h1>
    <br>
    <div class="row">
        <div class="image">
            <img src="image/customersupport.svg" alt="">
        </div>

        <div class="content">
            <h3>Support Management</h3>
            <p>Having trouble with the late delivery of your products?Just one click and reach <out!></out!></p>
            <a href="/Project Code/servicespage/Manafacturer/complaint.php" class="btn"> Choose <span class="fas fa-chevron-right"></span> </a>
        </div>
        
    </div>

</section>

<section class="home" id="home">
    <div class="content">
        <h3><span>Inventory Management</span></h3>
        <p>Efficient way to manage your products!</p>
        <a href="/Project Code/servicespage/Manafacturer/inventory.php" class="btn"> Choose <span class="fas fa-chevron-right"></span> </a>
    </div>
    <div class="image">
        <img src="image/inventory.svg" alt="">
    </div>
</section>

<section class="home" id="home">


    <div class="content">
        <h3><span>Transparent Record Mangement</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem sed autem vero? Magnam, est laboriosam!</p>
        <a href="/Project Code/servicespage/Manafacturer/records.php" class="btn"> Choose <span class="fas fa-chevron-right"></span> </a>
    </div>

    
    <div class="image">
        <img src="image/records.svg" alt="">
    </div>

</section>

</body>
</html>
