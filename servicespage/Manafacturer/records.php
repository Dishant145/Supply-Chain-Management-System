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
<form action="manafacturer.php" method="post">
    <input type="submit" name="back" value="Back" class = "goback">
   </form>

   <h1>Records of Retailers</h1>
    <?php
    include 'connec.php';
    session_start();

    if (isset($_SESSION['memail'])) {
        $email = $_SESSION['memail'];
        $mname = mysqli_query($conn,"SELECT m_name from manufacturer where m_email = '$email'");
        $mname = mysqli_fetch_assoc($mname);
        $mname = $mname['m_name'];
        // $mname= str_replace(' ','' ,$mname );
        $query = mysqli_query($conn,"SELECT w_name from wholesaler");
        echo '<table class="tables table-striped"> 
        <thead class="theading">
                <tr> 
                    <th>Retailer Name </th>
                    <th>Product Name </th> 
                    <th>Product Category </th> 
                    <th>Product Price </th> 
                    <th>Product Quantity </th>
                </tr></thead>';
        if (mysqli_num_rows($query) > 0) {
            while ($row = $query->fetch_assoc()) {
                $wname = $row['w_name'];
                $arrayString= explode(" ", $wname );
                $wname = $arrayString[0] . $arrayString[1];
                $wname.= 'cart';
                $search = mysqli_query($conn,"SELECT distinct c_manufacturer FROM $wname");
                if (mysqli_num_rows($search) > 0) {
                    while ($row = $search->fetch_assoc()) {
                        $c_manufacturer = $row['c_manufacturer'];
                        if (str_contains($c_manufacturer,$mname)) {
                            // echo "<script>alert('$c_manufacturer')</script>";
                            $query = mysqli_query($conn,"SELECT r_name from retailer");
                            if (mysqli_num_rows($query) > 0) {
                                while ($row = $query->fetch_assoc()) {
                                    $rname = $row['r_name'];
                                    $arrayString= explode(" ", $rname );
                                    $rname = $arrayString[0] . $arrayString[1];
                                    $rname.= 'cart';
                                    $wname = str_replace('cart','',$wname);
                                    $query = mysqli_query($conn,"SELECT * FROM $rname where c_wholesaler = '$wname'");
                                
                                    $sname = str_replace('cart','',$rname);
                                    // echo "<caption>$sname</caption>";
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
        }
    }
    ?>
</body>
</html>