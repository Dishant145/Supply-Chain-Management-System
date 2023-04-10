<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="navbar.css">
</head>
<body>
    
<div class="wrapper">
    <div class="sidebar">
        <h3>Inventory</h3>
        <ul>
        <li><a href="wholesaler.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href = "listproducts.php" ><i class="fas fa-user"></i>List Product</a></li>
            <li><a href="updaterecords.php"><i class="fas fa-address-card"></i>Update Product</a></li>
            <li><a href="deleterecords.php"><i class="fas fa-project-diagram"></i>Delete Product</a></li>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">
            <a href="index.php" class="logo"> <i class="fas fa-cog"></i> EasySupply <i class="fas fa-check"></i></a> 
            <a href="logout.php" id="logo">Logout</a>
            <div class="info">
            <?php

                include 'connec.php';
                
                session_start();
                
                $editid = $_SESSION['c_id'];
                $cart = $_SESSION['cart'];
                        $query = mysqli_query($conn,"DELETE FROM $cart WHERE c_id = '$editid'");
                        if($query) {
                        ?>
                            <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Product Deleted Successfully',
                                showConfirmButton: false,
                            })
                            </script>
                        <?php
                            header("refresh:1; url=deleterecords.php");
                        } 

                ?>
            </div>
        </div>
    </div> 
    
</div>


</body>
</html>

