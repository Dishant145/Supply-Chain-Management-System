
    <?php
    include 'connec.php';
    session_start();
    $editid = $_SESSION['p_id'];
    $tablename = $_SESSION['brandname'];
    $update = mysqli_query($conn, "Select * from $tablename WHERE p_id = '$editid'");
    if (mysqli_num_rows($update) > 0) {
        while ($row = $update->fetch_assoc()) {
            $productname = $row['p_name'];
            $productcategory = $row['p_category'];
            $productprice = $row['p_price'];
            $productquantity = $row['p_quantity'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
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
            
    <form action="" method="post" class="form">

    <label for="productname">Product Name:</label>
    <input type="text" name="productname" id="productname" value="<?php echo $productname?>"><br><br>

    <label for="productcategory">Product Category:</label>
    <select name="productcategory" id="productcategory">
        <option value="beverage">Beverage</option>
        <option value="coffee">Coffee</option>
        <option value="cereals">Cereals</option>
        <option value="culinary">Culinary</option>
        <option value="dairy">Dairy</option>
        <option value="nutrition">Nutrition</option>
        <option value="petcare">PetCare</option>

    </select><br><br>

    <label for="productprice">Product Price:</label>
    <input type="text" name="productprice" id="productprice" value="<?php echo $productprice?>"><br><br>

    <label for="productdescription">Product Quantity:</label>
    <input type="text" name="productquantity" id="productquantity" value="<?php echo $productquantity?>"><br><br>

    <input type="submit" value="Update Product" name="submit" class="btn btn-warning btn-sm rounded-0">
    </form>

    <?php
    if(isset($_POST['submit'])){
        $productname = $_POST['productname'];
        $productcategory = $_POST['productcategory'];
        $productprice = $_POST['productprice'];
        $productquantity = $_POST['productquantity'];
        $update = mysqli_query($conn, "UPDATE $tablename SET p_name = '$productname', p_category = '$productcategory', p_price = '$productprice', p_quantity = '$productquantity' WHERE p_id = '$editid'");
        if($update){?>

            <script>
            Swal.fire({
                icon: 'success',
                title: 'Updated Successfully!',
                showConfirmButton:false,
            })
            </script>
            <?php
            header("Refresh:2; url=update.php");
            
        }
        else{
            echo "Failed to Update";
        }
    }
    ?>
    </div>
    </div> 
    
</div>


    <script>
        const productcategory = "<?php echo $productcategory; ?>";
        var selectbox = document.getElementById("productcategory");
        const mylen = selectbox.options.length;
        for (var x = 0; x < mylen; x++) { 
        if (selectbox.options[x].value == productcategory) { 
                selectbox.options[x].selected = true; 
            
            } 
        } 
    </script>
</body>
</html>
    