<?php
session_start();
include("server/connection.php");
if(isset( $_POST["register"] ))
  {
  $name= $_POST['name'];
  $email= $_POST['email'];
  $password= $_POST['password'];
  $confirmPassword= $_POST['confirmPassword'];
  if($password!==$confirmPassword){
      header('Location: register.php?error=passwords dont match');
  }
    else if(strlen($password)<6){
      header('Location : register.php?error=password must be at least 6 characters');
  }
  //no error
  else{
    $stmt1=$conn->prepare("SELECT count(*) FROM users where user_email=?");
    $stmt1->bind_param('s',$email);
    $stmt1->execute();
    $stmt1->bind_result($num_rows) ;
    $stmt1->store_result();
    $stmt1->fetch();
    //if there is user already registred with this email 
    if ($num_rows != 0){
      header('Location:register.php?error=user with this email already exists');
    }
    //if no user registred with this email before
    else
      {
    //create a new user
    $stmt=$conn->prepare('INSERT INTO users(user_name,user_email,user_password) 
            VALUES(?,?,?)');
      $stmt->bind_param('sss', $name, $email,$password); //dont forget to add md5(password) later
      
      if($stmt->execute())
      {
        $_SESSION['user_email']=$email ; 
        $_SESSION['user_name']=$name ; 
        $_SESSION['logged_in']=true ;
        header('Location:account.php?register=You registered successfully');
      }
      //account could not b created 
      else{
        header('Location: register.php?error=could not create an account at the moment');
      }

    }

  }

  }
  //else if(isset($_SESSION['logged_in'])){
    //header('Location: account.php');
    //exit;
  //}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
      <!--Navbar modified-->
      <nav class="navbar navbar-expand-lg navbar-light bg-white py-1 fixed-top">
        <div class="container-fluid">
          <div class="logo" ><img src="assets/imgs/logo.jpeg" /></div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.cart">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cart.php">Cart</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="account.php">Account</a>
              </li>

              <li class="nav-item">
                <i class="fas fa-shopping-cart"></i>
                <i class="fas fa-user"></i>
               </li>
             
            </ul>
            
          </div>
        </div>
      </nav>


    <!--Register-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-3">
            <h2 class="form-weight">Register</h2>  
        </div>
        <div >
            <form  id="register-form" method="POST" action="register.php">
              <p style="color:red"><?php if(isset($_GET['error'])){echo $_GET['error'] ;}?></p>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder ="Name" required/>

                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder ="Email" required/>

                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder ="password" required/>
                    
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder ="Confirm Password" required/>
                    
                </div>
                <div class="form-group">
                    
                    <input type="submit" class="btn" id="register-btn"  name="register" value="Register"/>
                    
                </div>
                <div class="form-group">
                    
                    <a href="#" id="login-url" class="btn">Do you have account ? Login</a>
                </div>
            </form>
        </div>


    </section>


    <!--footer-->
  <footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5  " style="color:black">
      <div class="col-lg-3 col-md-6 col-sm-12">
        
        <p class="pt-1" >Explore our curated collection of exquisite bags, iconic watches, and premium perfumes. Elevate your style with sophistication at its finest</p>
      </div>
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h5 class="pb-2">Feature
          <ul class="text-uppercase"></ul>
          <li><a href="#">Women</a></li>
          <li><a href="#">men</a></li>
        </h5>
      </div>
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h5 class="pb-2" >Contact Us</h5>
      
      <div>
        <h6 class="text-uppercase">Address</h6>
        <p>123 High Street
          London, England
          WC1A 1AA</p>
      </div>
      <div>
        <h6 class="text-uppercase">Phone</h6>
        <p>+44 20 1234 5678</p>
        </div>
      <div>
        <h6 class="text-uppercase">Email</h6>
        <p>Emna.walha@insat.ucar.tn</p>
      </div>
    </div>
    <div class="footer-one col-lg-3 col-md-6 col-sm-12">
      <h5 class="pb-2">Instagram</h5>
      <div class="row logo">
        <img src="assets/imgs/P1.webp" class="image-fluid w-25 h-100 m-2"/>
        <img src="assets/imgs/featured2.webp" class="image-fluid w-25 h-100 m-2"/>
        <img src="assets/imgs/featured1.webp" class="image-fluid w-25 h-100 m-2"/>
        <img src="assets/imgs/P2.webp" class="image-fluid w-25 h-100 m-2"/>
        <img src="assets/imgs/featured3.webp" class="image-fluid w-25 h-100 m-2"/>
        

      </div>
    </div>

    </div>
    <div class="copyright mt-5">
      <div class="row container mx-auto" style="color:black">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
          <img src="assets/imgs/payment.jpg">
        </div>
        <div class="col-lg-3 col-md-5 col-sm-12  text-nowrap mb-2">
          <p>@2024 All Rights Reserved </p>
        </div>
        <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>


        </div>
      </div>
    </div>
  </footer>


  
  


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-40ix5a3dj6/qaC7tfz0Yr+p9fqWLzzAXiwxVLt9dw7UjQzGYw6rWRhFAnRapuQyK" crossorigin="anonymous"></script>
</body>
</html>

