
<?php
    include 'connec.php';
    session_start();
    if (isset($_SESSION['c_id']) && isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $editid = $_SESSION['c_id'];
    $update = mysqli_query($conn, "Select * from $cart WHERE c_id = '$editid'");
    if (mysqli_num_rows($update) > 0) {
        while ($row = $update->fetch_assoc()) {
            $productprice = $row['c_price'];
            $productquantity = $row['c_quantity'];
        }
    }
    
}

?>
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
        </div>
        <div class="info">
            
    <form action="" method="post">
        <label for="productprice">Product Price:</label>
        <input type="text" name="productprice" id="productprice" value="<?php echo $productprice?>"><br><br>

        <label for="productdescription">Product Quantity:</label>
        <input type="number" name="productquantity" id="productquantity" max = "<?php echo $productquantity?>" value="<?php echo $productquantity?>"><br><br>

    <input type="submit" value="Update Product" name="submit">
    </form>

    <?php
    if(isset($_POST['submit']) && isset($_SESSION['cart'])){
        $productprice = $_POST['productprice'];
        $productquantity = $_POST['productquantity'];
        $cart = $_SESSION['cart'];
        $update = mysqli_query($conn, "UPDATE $cart SET  c_price = '$productprice', c_quantity = '$productquantity' WHERE c_id = '$editid'");
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
    