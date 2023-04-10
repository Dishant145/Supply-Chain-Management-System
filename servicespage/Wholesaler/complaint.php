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
    <form action="wholesaler.php" method="post">
        <input type="submit" value="Go Back" class="goback">
    </form>
    <h1>Select Manafacturer</h1>
    <?php
   
    
    include 'connec.php';
    session_start();

    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $wname = mysqli_query($conn, "SELECT w_name FROM wholesaler WHERE w_email = '$email'");
        $wname = mysqli_fetch_assoc($wname);
        $wname = $wname['w_name'];
        $query = mysqli_query($conn,"SELECT r_name,r_email,complaint FROM wholesalercomplaint WHERE w_name = '$wname'");

    echo '<table class="table table-striped"> 
    <thead class="theading">  
            <tr> 
                <th> <font face="Arial">Reatailer Name</font> </th> 
                <th> <font face="Arial">Retailer Email</font> </th> 
                <th> <font face="Arial">Complaint</font> </th>
            </tr></thead>';

            if (mysqli_num_rows($query) > 0) {
            while ($row = $query->fetch_assoc()) {

                $field1name = $row["r_name"];
                $field2name = $row["r_email"];
                $field3name = $row["complaint"];  

                    echo '<tr> 
                            <td>'.$field1name.'</td> 
                            <td>'.$field2name.'</td> 
                            <td>'.$field3name.'</td> 
                        </tr>';
                    
            }
        }
        echo '</table>';

    }
    
?>




</body>
</html>