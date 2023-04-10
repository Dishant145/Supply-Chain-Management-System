<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="funds.css" />
    <title>Complaint</title>
  </head>
  <body>
    
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form">
            <br>
            <h2 class="title">Raising Complaints & Queries</h2>
            
            <h6 class="social-text">We strongly believe in Transparency at all the levels of supply chain.If you as a wholesaler feel that your retailer in delaying the delievery of your products, You can reach up to the manufacturer. </h6>
            
          
          </form>

          
          <form action="" class="sign-up-form" method="post">
            <h2 class="title">Apply here</h2>
            <h6 class="social-text">Your complaint will be validated within 2-3 working days</h6>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="wname" placeholder="Enter Wholesaler Name" />
              </div>
              <div class="input-field">
                <i class="fas fa-envelope-open"></i>
                <input type="email" placeholder="Email" name="senderemail"/>
              </div>
          
              <textarea name="complaint" class="input-field" cols="30" rows="10" placeholder="Enter your complaint">
              </textarea>

            <input type="submit" name="submit" class="btn" value="Raise Complaint" />
            
          </form>


          <?php
          
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            require 'Exception.php';
            require 'PHPMailer.php';
            require 'SMTP.php';

            include 'connec.php';
            session_start();
            if (isset($_SESSION['email']) && isset($_POST['submit'])) {
              
              $wname = $_POST['wname'];
              $semail = $_POST['senderemail'];
              $complaint = $_POST['complaint'];

              $retailer = $_SESSION['email'];
              $sql = mysqli_query($conn,"Select r_name from retailer where r_email='$retailer'");
              $sql = mysqli_fetch_assoc($sql);
              $rname = $sql['r_name'];


              $sql = mysqli_query($conn,"Select w_email from wholesaler where w_name='$wname'");
              $sql = mysqli_fetch_assoc($sql);
              $wemail = $sql['w_email'];
              $to = $wemail;

              $query = mysqli_query($conn,"insert into wholesalercomplaint (w_name,r_name,r_email,complaint) values ('$wname','$rname','$semail','$complaint')");
  
              $mail = new PHPMailer;
              $mail->isSMTP();
              $mail->SMTPSecure = 'ssl';
              $mail->SMTPAuth = true;
              $mail->Host = 'smtp.gmail.com';
              $mail->Port = 465;

              $mail->Username = 'master2legends@gmail.com';
              $mail->Password = 'zyqwfrsnqqrdmjcr';

              $mail->setFrom('master2legends@gmail.com');
              
              $mail->addAddress($to);

              $mail->addCC($semail);

              $mail->Subject = 'Complaint';

              $mail->Body = $complaint;

              $mail -> Body = "Complaint from: ".$rname." Email: ".$semail." Complaint: ".$complaint;
              

              if($mail->send()){
                ?>

                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Email Sent Successfully!',
                    showConfirmButton:false,
                })
                </script>
            <?php
              header("Refresh:2; url=retailer.php");

              }
            }
          ?>




        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h1>Want to raise a Complaint?</h1>
            <p>
              Apply for complaints through our website with valid details.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              APPLY
            </button>
          </div>
          <img src="images/charity-animate.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            
           
            
          </div>
          <img src="images/feed-animate.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="funds.js"></script>
  </body>
</html>
