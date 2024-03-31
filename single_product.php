<?php 
include('server/connection.php');
if(isset($_GET['product_id'])){
  $product_id = $_GET['product_id'];
  $stmt = $conn->prepare("SELECT * FROM products WHERE product_id=?");
  $stmt->bind_param("i", $product_id);
  $stmt->execute();
  $product = $stmt->get_result(); //array one single product
  //no product id was given
}
else
{
  header('location : index.php');
}


?>






<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
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

<!--single-product -->
      <section class="single-product container my-5 pt-5">
        <div class="row mt-5 ">

          <?php  while($row=$product->fetch_assoc()) { ?>
            
            <div class="col-lg-5  col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="assets/imgs/<?php  echo $row['product_image'];?>" id="main-img"/>
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php  echo $row['product_image'];?>"  width="100%" class="small-img"/>

                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php  echo $row['product_image2'];?>"  width="100%" class="small-img"/>
                        
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php  echo $row['product_image3'];?>"  width="100%" class="small-img"/>   
                    </div>
                    <div class="small-img-col">
                        <img src="assets/imgs/<?php  echo $row['product_image4'];?>"  width="100%" class="small-img"/>
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
                
                <h3 class="py-4"><?php  echo $row['product_name'];?></h3>
                <h2>$<?php  echo $row['product_price'];?></h2>
                
                <input style ="height:20px" type="number" name="product_quantity"value="1"/>
                  <form method="POST" action="cart.php">
                  <input type="hidden" name="product_id" value="<?php  echo $row['product_id'];?>" />
                <input type="hidden" name="product_image" value="<?php  echo $row['product_image'];?>" />
                <input type="hidden"  name="product_name" value="<?php  echo $row['product_name'];?>" />
                <input type="hidden"  name="product_price" value="<?php  echo $row['product_price'];?>" />
                <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
                <br>
                <br>
                <br>
                </form>

                <h6>Product Description</h6>

                <h4 class="mt-5 mb-5"><?php  echo $row['product_description'];?></h4>

            </div>
            
        <?php }?>

        </div>
      </section>





<!--Related-products-->
<section id="related-products" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
      <h3 style="color:black">Related Products</h3>
      <hr class="mx-auto">
    </div>

    
    <section >
        <div class="row mx-auto container-fluid">
          
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img  class="img-fluid mb-3" src="assets/imgs/featured1.webp" />
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4 class="p-name">MONTRE TANK AMÉRICAINE</h4>
            <h6>Montre Tank Américaine, petit modèle, mouvement à quartz. Boîte en acier. </h6>
            <h5 class="p-price">€
              4 350
              incl. TVA</h5>
            <button class="buy-btn">Shop Now</button>
    
          </div>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img  class="img-fluid mb-3" src="assets/imgs/featured2.webp" />
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4 class="p-name">MONTRE TANK AMÉRICAINE</h4>
            <h6>Montre Tank Américaine, petit modèle, mouvement à quartz. Boîte en or rose 750/1000</h6>
            <h5 class="p-price">€
              12 500
              incl. TVA</h5>
            <button class="buy-btn">Shop Now</button>
    
          </div>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img  class="img-fluid mb-3" src="assets/imgs/featured3.webp" />
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4 class="p-name">MONTRE SANTOS-DUMONT</h4>
            <h6>Montre Santos-Dumont, modèle XL, mouvement Manufacture mécanique à remontage manuel 430 MC<br></h6>
            <h5 class="p-price">€
              6 750
              incl. TVA</h5>
            <button class="buy-btn">Shop Now</button>
    
          </div>
          
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img  class="img-fluid mb-3" src="assets/imgs/featured4.webp" />
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h4 class="p-name">MONTRE SANTOS-DUMONT</h4>
            <h6>Montre Santos-Dumont, grand modèle, mouvement à quartz. Boîte en acier</h6>
            <h5 class="p-price">€
              6 550
              incl. TVA</h5>
            <button class="buy-btn">Shop Now</button>
    
          </div>

          

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


    <script>
        var mainImg = document.getElementById("main-img");
        var smallImg = document.getElementsByClassName("small-img");
        for(let i=0 ; i<4 ; i++){
        smallImg[i].onclick = function(){
            mainImg.src = smallImg[i].src
        }
    }

    </script>
</body>
</html>