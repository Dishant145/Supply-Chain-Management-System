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

    <form action="wholesaler.php" method="post">
        <input type="submit" value="Go Back" class="goback">
    </form>
    <h1>Select Manafacturer</h1>
    <?php
    
    include 'connec.php';
    session_start();
    unset($_SESSION['shopping_cart']);

    $query = mysqli_query($conn,"SELECT * FROM manufacturer");

    echo '<table class="table table-striped"> 
    <thead class="theading">  
            <tr> 
                <th> <font face="Arial">Manufacturer Name</font> </th> 
                <th> <font face="Arial">Owner Email</font> </th> 
                <th> <font face="Arial">Manufacturer Location</font> </th>
                <th> <font face="Arial">Select</font> </th>
            </tr></thead>';


    
            if (mysqli_num_rows($query) > 0) {
            while ($row = $query->fetch_assoc()) {

                $field1name = $row["m_id"];
                $field2name = $row["m_name"];
                $field3name = $row["m_email"];
                $field5name = $row["m_location"]; 
            
                
                    echo '<tr> 
                            <td>'.$field2name.'</td> 
                            <td>'.$field3name.'</td> 
                            <td>'.$field5name.'</td> 
                            <td><form method="post" action="select.php">
                            <input type="hidden" name="m_name" value="'.$field2name.'">
                            <input type="submit" name="select"  value="Select" class="btn btn-info btn-sm rounded-0"></td></form>
                        </tr>';
                    
            }
        }
        echo '</table>';
?>




</body>
</html>