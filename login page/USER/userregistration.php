<?php
    session_start();
    include 'conn.php';
    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $location = $_POST['location'];
        $password = md5($password);
        $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
        
        if(mysqli_num_rows($duplicate) > 0){
            echo
            "<script> alert('Username or Email Has Already Taken'); </script>";
        }
        else{

            $result = mysqli_query($conn, "INSERT INTO users ( role, username, password, email, location)  VALUES('$role','$username','$password','$email','$location')");
            if($result)
            {
                header("Location: login.php");
            }
            else{
                echo "failed:";
            }
        }
        
}

?>