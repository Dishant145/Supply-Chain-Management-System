<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        </div>
        <div class="info">
        <?php
    include 'connec.php';
    session_start();
    if (isset($_SESSION['whname'])) {
        $whname = $_SESSION['whname'];
        $cart = $whname."cart";
        $query = mysqli_query($conn,"SELECT * FROM $cart");
        echo '<table class="table table-striped"> 
        <thead class="theading">  
                <tr> 
                    <th> <font face="Arial">Product Name</font> </th> 
                    <th> <font face="Arial">Product Category</font> </th> 
                    <th> <font face="Arial">Product Price</font> </th> 
                    <th> <font face="Arial">Product Weight</font> </th>
                    <th> <font face="Arial">Manufacturer Name</font> </th>
                    <th> <font face="Arial">Action</font> </th> 
                </tr></thead>';
            if (mysqli_num_rows($query) > 0) {
                while ($row = $query->fetch_assoc()) {
                    $field1name = $row["c_id"];
                    $field2name = $row["c_name"];
                    $field3name = $row["c_category"];
                    $field5name = $row["c_price"]; 
                    $field6name = $row["c_quantity"]; 
                    $field7name = $row["c_manufacturer"];
                    $_SESSION['c_id'] = $field1name;
                        echo '<tr> 
                                <td>'.$field2name.'</td> 
                                <td>'.$field3name.'</td> 
                                <td>'.$field5name.'</td> 
                                <td>'.$field6name.'</td>
                                <td>'.$field7name.'</td>
                                <td><form method="post" action="deleterecords.php">
                                <input type="submit" name="Delete" value="Delete" class="btn btn-danger btn-sm rounded-0">
                                </form></td>
                            </tr>';
                        
                }
            
            }
    }
        ?>
        <?php
            if(isset($_POST['Delete'])) {
                ?>
                <script>
                    Swal.fire({
                        title: 'Are you sure you want to delete?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "delete.php";
                        }      
                    })
                </script>
             <?php
             } 
        ?>
        </div>
    </div> 
   
</div>
    
    
</body>
</html>
