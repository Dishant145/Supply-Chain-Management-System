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
    <title>HMS</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="service.css">
</head>

<body>
    
<!-- header section starts  -->
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

    <h1 class="heading"> <span>CHOOSE</span> A SERVICE </h1>
    <br>
    <div class="row">

        <div class="image">
            <img src="image/customersupport.svg" alt="">
        </div>

        <div class="content">
            <h3>Customer Support</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure ducimus, quod ex cupiditate ullam in assumenda maiores et culpa odit tempora ipsam qui, quisquam quis facere iste fuga, minus nesciunt.</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus vero ipsam laborum porro voluptates voluptatibus a nihil temporibus deserunt vel?</p>
            <a href="/Project Code/servicespage/Wholesaler/funds.php" class="btn"> Send <span class="fas fa-chevron-right"></span> </a>
            <a href="/Project Code/servicespage/Wholesaler/complaint.php" class="btn"> Complaints <span class="fas fa-chevron-right"></span> </a>
        </div>

    </div>

</section>

<section class="home" id="home">
    <div class="content">
        <h3><span>Inventory Management</span></h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem sed autem vero? Magnam, est laboriosam!</p>
        <a href="/Project Code/servicespage/Wholesaler/inventory.php" class="btn"> Choose <span class="fas fa-chevron-right"></span> </a>
    </div>
    <div class="image">
        <img src="image/inventory.svg" alt="">
    </div>
</section>

<section class="home" id="home">

    <div class="image">
        <img src="image/choice.svg" alt="">
    </div>

    <div class="content">
        <h3><span>Wide Range Of Choices</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem sed autem vero? Magnam, est laboriosam!</p>
        <a href="/Project Code/servicespage/Wholesaler/choice.php" class="btn"> Choose <span class="fas fa-chevron-right"></span> </a>
    </div>

</section>

<section class="home" id="home">
    <div class="content">
        <h3><span>Transparent Record Mangement</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem sed autem vero? Magnam, est laboriosam!</p>
        <a href="/Project Code/servicespage/Wholesaler/records.php" class="btn"> Choose <span class="fas fa-chevron-right"></span> </a>
    </div>

    
    <div class="image">
        <img src="image/records.svg" alt="">
    </div>

</section>




<!-- <script src="/landing page/js/script.js"></script> -->
</body>
</html>