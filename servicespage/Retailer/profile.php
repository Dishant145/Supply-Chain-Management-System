<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
        <div class="profile">
        <h1>Update Profile</h1>

        <form action="" method="post">
            <input type="text" name="name" placeholder="Enter Name">
            <input type="tel" name="mobile" placeholder="Enter Mobile Number"> 
            <input type="submit" name="Update" value="Update">
        </form>
</div>
        <?php
        

        include 'connec.php';
 
        if (isset($_POST['Update'])) {
            session_start();
            $rname = $_POST['name'];
            $rmobile = $_POST['mobile'];
            
            $arrayString= explode(" ", $rname );
            $sname = $arrayString[0] . $arrayString[1];
            
            $_SESSION['rname'] = $sname;
            $rcart = $sname;
            $rcart.= "cart";
        	$_SESSION['rcart'] = $rcart;
            
            if (isset($_SESSION['email'])&&(isset($_SESSION['location']))) {
            
                $remail = $_SESSION['email'];
                $rlocation = $_SESSION['location'];
                // $duplicate = mysqli_query($conn, "SELECT * FROM retailer WHERE r_name = '$rname'");
               
                $sql = "SHOW TABLES IN `my_db` WHERE `Tables_in_my_db` = '$sname'"; 

                $result = $conn->query($sql);
                
                if($result !== false) {
                    if ($result->num_rows > 0) {
                        ?>
                        <script>
                        Swal.fire({
                            icon: 'warning',
                            title: 'Profile Already Updated!',
                            showConfirmButton:false,
                        })
                        </script>
                        <?php
                        header("Refresh:2;url=retailer.php");
                    
                    }
                else{
                    $wcreate = mysqli_query($conn, "create table $sname (r_id int (100) PRIMARY KEY NOT NULL AUTO_INCREMENT, r_name varchar(255), r_category varchar(255),r_price int, r_quantity int(100), r_mobile int(11))");
            
                    $result = mysqli_query($conn, "INSERT INTO retailer (r_name,r_email,r_location,r_mobile)  VALUES('$rname','$remail','$rlocation','$rmobile')");

                    if ($result) {
                        ?>
                        <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Updated Successfully!',
                            showConfirmButton:false,
                        })
                        </script>
                        <?php
                        header("Refresh:2;url=retailer.php?rname=$rname");
                    }
                }  
            }
        }
    }   

    ?>
</body>
</html> 