<?php 
//    session_start();
   include "connec.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SCM</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="navbar.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


<div class="wrapper">
    <div class="sidebar">
        <h3>Inventory</h3>
        <ul>
            <li><a href="manafacturer.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="manufacturerproduct.php" ><i class="fas fa-user"></i>Add Product</a></li>
            <li><a href="updaterecords.php"><i class="fas fa-address-card"></i>Update Product</a></li>
            <li><a href="deleterecords.php"><i class="fas fa-project-diagram"></i>Delete Product</a></li>
            <li><a href="listproducts.php"><i class="fas fa-blog"></i>List Products</a></li>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">
            <a href="index.php" class="logo"> <i class="fas fa-cog"></i> EasySupply <i class="fas fa-check"></i></a> 
            <a href="logout.php" id="logo">Logout</a>
        </div>
        <div class="info">
    <?php
    include 'connec.php';
    session_start();

    
    if (isset($_SESSION['brandname'])) {
        $tablename = $_SESSION['brandname'];
        $query = mysqli_query($conn,"SELECT p_id,p_name, p_category, p_price, p_quantity FROM $tablename");
        echo '<table class="table table-striped"> 
        <thead class="theading">
                <tr> 
                    <th>Product Name</th> 
                    <th>Product Category</th> 
                    <th>Product Price</th> 
                    <th>Quantity Available</th>
                </tr></thead>';
            
            if (mysqli_num_rows($query) > 0) {
                while ($row = $query->fetch_assoc()) {
                    $field1name = $row["p_id"];
                    $field2name = $row["p_name"];
                    $field3name = $row["p_category"];
                    $field5name = $row["p_price"]; 
                    $field6name = $row["p_quantity"]; 
                    $_SESSION['p_id'] = $field1name;
                        echo '<tr> 
                                <td>'.$field2name.'</td> 
                                <td>'.$field3name.'</td> 
                                <td>'.$field5name.'</td> 
                                <td>'.$field6name.'</td>
                            </tr>';
                        
                }
        }
        
    }
    
    ?>

    </div>
    </div> 
    
</div>



   
</body>
</html>
