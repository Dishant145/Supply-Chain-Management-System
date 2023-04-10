
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SCM</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="navbar.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<table class="table table-striped"> 
    <thead class="theading">
        <tr>
            <th>Name </th> 
            <th>Category </th> 
            <th>Price </th> 
            <th>Quantity Available </th>
            <th>Quantity </th>
            <th>Action</th>
        </tr>
    </thead>
<?php
        include 'connec.php';
        session_start();

        if (isset($_POST['w_name']) && isset($_POST['select'])) { 
    
            $wcart = $_POST['w_name'];
            $_SESSION['wname'] = $wcart;
            // $queryone = mysqli_query($conn,"insert IGNORE into  ( w_name, w_category, w_price, w_quantity,w_manufacturer) select p_name, p_category, p_price, p_quantity, '$mname' from $mname " );
            
            $query = mysqli_query($conn,"SELECT * FROM $wcart");
            
            
            if (mysqli_num_rows($query) > 0) {
                while ($row = $query->fetch_assoc()) {
            ?>
            
            <form method="post" action="cart.php?action=add&id=<?php echo $row["c_id"]; ?>">
				
            <tr>
                <td><?php echo $row["c_name"]; ?></td>

                <td><?php echo $row["c_category"]; ?></td>

                <td><?php echo $row["c_price"]; ?></td>

                <td><?php echo $row["c_quantity"]; ?></td>

                <td><input type="number" name="quantity" value="1" class="form-control" min="1" max = "<?php echo $row["c_quantity"]; ?>"/></td>

                <td><input type="submit" name="add_to_cart" value="Add to Cart"></td>
                    
            </tr>

                <input type="hidden" name="hidden_name" value="<?php echo $row["c_name"];?>"/>

                <input type="hidden" name="hidden_category" value="<?php echo $row["c_category"];?>"/>

                <input type="hidden" name="hidden_price" value="<?php echo $row["c_price"];?>"/>

                <input type="hidden" name="hidden_quantity" value="<?php echo $row["c_quantity"];?>"/>

                
 
				</form>
                
            <?php
                }
            }
        }
    ?>    
   <form action="choice.php" method="post">
    <input type="submit" name="back" value="Back" class="goback">
   </form>
</body>
</html>
