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
            <input type="text" name="brandname" placeholder="Enter Brand Name">
            <input type="submit" name="Update" value="Update">
        </form>
        </div>
        <?php
        
        session_start();
        include 'connec.php';
        if (isset($_POST['Update'])) {
            $brandname = $_POST['brandname'];
            $_SESSION['brandname'] = $brandname;
            if (isset($_SESSION['memail'])&&(isset($_SESSION['mlocation']))) {
                $memail = $_SESSION['memail'];
                $mlocation = $_SESSION['mlocation'];
                


                $sql = "SHOW TABLES IN `my_db` WHERE `Tables_in_my_db` = '$brandname'"; 

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
                        header("Refresh:2;url=manafacturer.php");
                    
                    }
                    else{
                        $insert = mysqli_query($conn, "INSERT INTO manufacturer (m_name,m_email,m_location)  VALUES('$brandname','$memail','$mlocation')");
                        $sql = "create table $brandname  (p_id int (100) PRIMARY KEY NOT NULL AUTO_INCREMENT, p_name varchar(255), p_category varchar(255),p_price int, p_quantity int(100))";
                        $result = mysqli_query($conn, $sql);
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
                            header("Refresh:2;url=manafacturer.php");
                        }
                    }
                    
                 }
            }
                
    }   
    
    ?>
</body>
</html>