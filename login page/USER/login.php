

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css" />
    <title>User SignIn</title>
  </head>
  <body>    
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="userserver.php" class="sign-in-form" method="post">
            <h2 class="title">Sign in</h2>
            <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-light" role="alert">
                <?=$_GET['error']?>
              </div>
              <?php } ?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password"/>
            </div>
            <div class="input-field">

            <i class="fas fa-user-circle"></i>
            <input type="text" placeholder="Wholesaler/Retailer/Manufacturer" name="role"/>
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
            </div>
          </form>
          <form action="userregistration.php" method = "post" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password"/>
            </div>
            <div class="input-field">
              <i class="fas fa-map-marked-alt"></i>
              <input type="text" placeholder="Location" name="location"/>
            </div>

            <div class="input-field">
              <i class="fas fa-user-circle"></i>
              <input type="text" placeholder="Wholesaler/Retailer/Manufacturer" name="role"/>
            </div>
            <input type="submit" class="btn" value="Sign up" name="submit"/>
            
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>

            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h1>New here ?</h1>
            <p>
              Register yourself to avail the facilities!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/new.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h1>Already registered?</h1>
            <p>
              Click here to Login!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/signup.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
