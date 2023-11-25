<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script> -->
    <link rel="stylesheet" href="signup.css" />
    <title>Sign up Form</title>
  </head>
  <body>
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usrnm = $_POST['usrnm'];
        $pswd = $_POST['pswd'];
        
      
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "users";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        $sql = "INSERT INTO `logintable` (`username`, `password`) VALUES ('$usrnm', '$pswd')";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo 'success';
        }
        else{
             echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
           // echo 'failed';
        }

      }

    }

    
?>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="signup.php" method="post" class="sign-in-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <!-- <input type="text" placeholder="Username" id = "usrnm"/> -->
              <label for="name">username</label>
        <input type="text" name="usrnm" class="form-control" id="usrnm" aria-describedby="emailHelp">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <!-- <input type="password" placeholder="Password" id = "pswd" /> -->
              <label for="email">password</label>
        <input type="text" name="pswd" class="form-control" id="pswd" aria-describedby="emailHelp">
            </div>
            <input type="submit" value="signup" class="btn solid" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <!-- <form action="#"  class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form> -->
        </div>
      </div>
<!-- 
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Welcome to our e-commerce store! We strive to provide high-quality products...
              Our team is dedicated to delivering exceptional customer service and ensuring your shopping experience is delightful
                Feel free to explore our range of products and contact us for any inquiries
            </p>
            <button class="btn transparent" id="sign-up-btn">
              here  >>>
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
                
                Our team is dedicated to delivering exceptional customer service and ensuring your shopping experience is delightful
                Feel free to explore our range of products and contact us for any inquiries
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign up
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div> -->
    
    <!-- <script src="signup.js"></script>
   -->
  </body>
</html>