
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
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
        <form action="" method="post" class="form">

            <label for="productname">Product Name:</label>
            <input type="text" name="productname" id="productname"><br><br>

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
            <input type="text" name="productprice" id="productprice"><br><br>

            <label for="productdescription">Product Quantity:</label>
            <input type="text" name="productquantity" id="productquantity"><br><br>

            <input type="submit" value="Add Product" name="submit" class="btn btn-success btn-sm rounded-0">
        </form>
        <?php
            include 'connec.php';
            session_start();
            
            if(isset($_POST['submit']) && isset($_SESSION['brandname'])) 
            {
                $brandname = $_SESSION['brandname'];
                $productname = $_POST['productname'];
                $productcategory = $_POST['productcategory'];
                $productprice = $_POST['productprice'];
                $productquantity = $_POST['productquantity'];
                $query = mysqli_query($conn,"INSERT INTO $brandname (p_name,p_category,p_price,p_quantity) VALUES ('$productname','$productcategory','$productprice','$productquantity')");
                if($query) {
                    ?>
                        <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Product Added Successfully',
                            showConfirmButton: false,
                        })
                        </script>
                    <?php
                        header("refresh:1; url=manufacturerproduct.php");
                } else {
                    ?>
                        <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Product Not Added',
                            showConfirmButton: false,
                        })
                        </script>
                    <?php
                        header("refresh:1; url=manufacturerproduct.php");
                }
            }
            ?>
        </div>
    </div>
    
</div>
 </body>
 </html>   
