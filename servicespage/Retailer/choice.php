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
</head>
<body>
    <form action="retailer.php" method="post">
        <input type="submit" value="Go Back" class="goback">
    </form>
    <h1>Select Manafacturer</h1>
    <?php
   
    
    include 'connec.php';
    session_start();
    unset($_SESSION['shopping_cart']);
    $query = mysqli_query($conn,"SELECT * FROM wholesaler");

    echo '<table class="table table-striped"> 
    <thead class="theading">  
            <tr> 
                <th> <font face="Arial">Wholesaler Name</font> </th> 
                <th> <font face="Arial">Owner Email</font> </th> 
                <th> <font face="Arial">Wholesaler Location</font> </th>
                <th> <font face="Arial">GST Number</font> </th>
                <th> <font face="Arial">Select</font> </th>
            </tr></thead>';

            if (mysqli_num_rows($query) > 0) {
            while ($row = $query->fetch_assoc()) {

                $field1name = $row["w_id"];
                $field2name = $row["w_name"];
                $field3name = $row["w_email"];  
                $field5name = $row["w_location"]; 
                $field6name = $row["w_gst"];

                $cart = $field2name;
                $arrayString= explode(" ", $cart );
                $wname = $arrayString[0] . $arrayString[1];
                $wname.= "cart";
                
                    echo '<tr> 
                            <td>'.$field2name.'</td> 
                            <td>'.$field3name.'</td> 
                            <td>'.$field5name.'</td> 
                            <td>'.$field6name.'</td>
                            <td><form method="post" action="select.php">
                            <input type="hidden" name="w_name" value="'.$wname.'">
                            <input type="submit" name="select" value="Select" class="btn btn-info btn-sm rounded-0"></td></form>
                        </tr>';
                    
            }
        }
        echo '</table>';
?>




</body>
</html>