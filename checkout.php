<?php 
session_start();

if( !empty($_SESSION['cart']) && isset($_POST['checkout'])){
  //let user in 



// send user to home
}else
{
  header('location : index.php') ;
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
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
                <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cart.html">Cart</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="account.html">Account</a>
              </li>

              <li class="nav-item">
                <i class="fas fa-shopping-cart"></i>
                <i class="fas fa-user"></i>
               </li>
             
            </ul>
            
          </div>
        </div>
      </nav>


<!--checkout-->

<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-3">
        <h2 class="form-weight">Check Out</h2>  
    </div>
    <div >
        <form  id="checkout-form" action="server/place_order.php" method="POST">
            <div class="form-group checkout-small-element">
                <label>Name</label>
                <input type="text" class="form-control" id="checkout-name" name="name" placeholder ="Name" required/>

            </div>
            <div class="form-group checkout-small-element">
                <label>Email</label>
                <input type="text" class="form-control" id="checkout-email" name="email" placeholder ="Email" required/>

            </div>
            <div class="form-group checkout-small-element">
                <label>Phone</label>
                <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder ="phone" required/>
                
            </div>
            <div class="form-group checkout-small-element">
                <label>City</label>
                <input type="text" class="form-control" id="checkout-city" name="city" placeholder ="City" required/>
                
            </div>
            <div class="form-group checkout-large-element">
                <label>Address</label>
                <input type="text" class="form-control" id="checkout-address" name="address" placeholder ="Address" required/>
                
            </div>
            <div class="form-group checkout-btn-container">
                
              <p>Total amount : $ <?php echo $_SESSION['total']?></p>
                <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order"/>
                
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