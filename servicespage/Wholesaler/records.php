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
<form action="wholesaler.php" method="post">
    <input type="submit" name="back" value="Back" class = "goback">
   </form>

   <h1>Records of Retailers</h1>
    <?php
    include 'connec.php';
    session_start();

    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $wname = mysqli_query($conn,"SELECT w_name from wholesaler where w_email = '$email'");
        $wname = mysqli_fetch_assoc($wname);
        $wname = $wname['w_name'];
        $wname = str_replace(' ','',$wname);

        
        $query = mysqli_query($conn,"SELECT r_name from retailer");
        echo '<table class="table table-striped"> 
        <thead class="theading">  
                <tr> 
                    <th>Retailer Name</th>
                    <th>Product Name </th> 
                    <th>Product Category </th> 
                    <th>Product Price </th> 
                    <th>Product Quantity </th>
                </tr></thead>';
        if (mysqli_num_rows($query) > 0) {
            while ($row = $query->fetch_assoc()) {
                $rname = $row['r_name'];
                $arrayString= explode(" ", $rname );
                $rname = $arrayString[0] . $arrayString[1];
                $rname.= 'cart';

                // echo "<script>alert('$rname')</script>";
                $search = mysqli_query($conn,"SELECT distinct c_wholesaler FROM $rname");
                if (mysqli_num_rows($search) > 0) {
                    while ($row = $search->fetch_assoc()) {
                        $c_wholesaler = $row['c_wholesaler'];
                        if (str_contains($c_wholesaler,$wname)) {
                            $sname = str_replace('cart','',$rname);
                            // echo "<caption>$sname</caption>";
                            $query = mysqli_query($conn,"SELECT * FROM $rname");
                            if (mysqli_num_rows($query) > 0) {
                                while ($row = $query->fetch_assoc()) {
                                    $c_name = $row['c_name'];
                                    $c_category = $row['c_category'];
                                    $c_price = $row['c_price'];
                                    $c_quantity = $row['c_quantity'];
                                    echo "<tr>
                                    <td>$sname</td>
                                    <td>$c_name</td>
                                    <td>$c_category</td>
                                    <td>$c_price</td>
                                    <td>$c_quantity</td>
                                    </tr>";
                                }
                            }
                        }
                    }
    
                }

            }
        }
    }
    ?>
</body>
</html>