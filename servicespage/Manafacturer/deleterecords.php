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
            <li><a href="manafacturer.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href = "manufacturerproduct.php" ><i class="fas fa-user"></i>Add Product</a></li>
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
    $brandname = $_SESSION['brandname'];
    $query = mysqli_query($conn,"SELECT p_id,p_name, p_category, p_price, p_quantity FROM $brandname ");
    echo '<table class="table table-striped"> 
    <thead class="theading">  
            <tr> 
                <th>Product Name</th> 
                <th>Product Category</th> 
                <th>Product Price</th> 
                <th>Product Weight</th>
                <th>Action</th> 
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
                            <td><form method="post" action="deleterecords.php">
                                <input type="submit" name="Delete" value="Delete" class="btn btn-danger btn-sm rounded-0">
                            </form></td>
                        </tr>';
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
