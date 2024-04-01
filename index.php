<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                <a class="nav-link" href="shop.php">Shop</a>
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


      <!--HOME-->

    <section  id="home" class="my-5 py-5">
        <div class="container" >
            <h5>Elevate your wardrobe with timeless elegance</h5>
            <h1>Discover <span>sophistication</span> </h1>
            <h1>in every stitch</h1>
            
            <button><a href="shop.html" style="color: black;text-decoration: none;">Shop Now</a></button>
        </div>
    </section>

    <!--Brand-->

    <section id="brand" class="container">
      <div class="row">
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg"/>
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand2.jpg"/>
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand3.jpg"/>
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand4.jpg"/>
      </div>
    </section>
    <section id="new">
      <div class="row p-0 m-0">
          <!-- One -->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
              <img class="img-fluid" src="assets/imgs/1.jpg" />
              <h3>Watches</h3>
              <button class="text-uppercase">Shop Now</button>
          </div>
          <!-- Two -->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
              <img class="img-fluid" src="assets/imgs/2.jpg" />
              <h3>Bags</h3>
              <button class="text-uppercase">Shop Now</button>
          </div>
          <!-- Three -->
          <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
              <img class="img-fluid" src="assets/imgs/3.jpg" />
              <h3>Perfumes</h3>
              <button class="text-uppercase">Shop Now</button>
          </div>
      </div>
  </section>


  <!--Featured-->
  <section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
      <h3 style="color:black">Exclusive Offerings</h3>
      <hr class="mx-auto">
      <p style="color: black;"> Explore our coveted collection of premier offerings, showcasing opulence at its finest</p>
    </div>

  <!--SAC-->


  <section id="sac">
      

      <?php include('server/get_bags.php');?>
      <div class="row mx-auto container-fluid">
        <?php while($row=$bags->fetch_assoc()){ ?>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img  class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h4 class="p-name"><?php echo $row['product_name'];?></h4>
          <h6><?php echo $row['product_description']; ?></h6>
          <h5 class="p-price">€ <?php echo $row['product_price']; ?>
            </h5>
            <a href="single_product.php?product_id=<?php echo $row['product_id'];?>"><button class="buy-btn">Shop Now</button></a>
          </div>
        <?php } ?>
        
        </div>
         
    </section>
    

    <!--Montre-->
    <section id="montre">
    <?php include('server/get_watches.php');?>
    
    <div class="row mx-auto container-fluid">
    <?php while($row=$watches->fetch_assoc()){ ?>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img  class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'];?>" />
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h4 class="p-name"><?php echo $row['product_name']; ?></h4>
        <h6><?php echo $row['product_description']; ?></h6>
        <h5 class="p-price">€
        <?php echo $row['product_price']; ?></h5>
        <a href="single_product.php?product_id=<?php echo $row['product_id'];?>"><button class="buy-btn">Shop Now</button></a>
      </div>
      <?php } ?>
    </div>
    </section>


     <!--Parfum-->
     <section id="parfum">
      
    <div class="row mx-auto container-fluid">
    <?php include('server/get_perfumes.php');?>
      <?php while($row=$perfumes->fetch_assoc()){?>
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img  class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'];?>" />
        <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <h4 class="p-name"><?php echo $row['product_name'];?></h4>
        <h6><?php echo $row['product_description'];?><br>
        </h6>
        <h5 class="p-price">€ <?php echo $row['product_price'];?>
          </h5>
        <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>"><button class="buy-btn">Shop Now</button></a>
        

      </div>
      <?php }?>
    </div>
    </section>
    
    
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
