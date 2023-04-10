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
            <input type="text" name="gst" placeholder="Enter GST Number"><br>
            <input type="submit" name="Update" value="Update">
        </form>

    </div>
        
        <?php
        

        include 'connec.php';
 
        if (isset($_POST['Update'])) {
            session_start();
            $whname = $_POST['name'];
            $wmobile = $_POST['mobile'];
            $wgst = $_POST['gst'];
            $arrayString= explode(" ", $whname );
            $sname = $arrayString[0] . $arrayString[1];

            $_SESSION['whname'] = $sname;
            
            if (isset($_SESSION['email'])&&(isset($_SESSION['location']))) {
            
                $wemail = $_SESSION['email'];
                $wlocation = $_SESSION['location'];
                // $duplicate = mysqli_query($conn, "SELECT * FROM wholesaler WHERE w_name = '$whname'");
               
                
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
                        header("Refresh:2;url=wholesaler.php");
                    
                    }
                else{
                    $wcreate = mysqli_query($conn, "create table if not exists $sname (w_id int (100) PRIMARY KEY NOT NULL AUTO_INCREMENT, w_name varchar(255), w_category varchar(255),w_price int, w_quantity int(100), w_manufacturer varchar(255))");
                    $result = mysqli_query($conn, "INSERT INTO wholesaler (w_name,w_email,w_location,w_gst)  VALUES('$whname','$wemail','$wlocation','$wgst')");

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
                        header("Refresh:2;url=wholesaler.php?wname=$sname");
                    }
                }  
            }
        }  
    }   

    ?>
</body>
</html> 