
<?php 
session_start();
include('server/connection.php');
if(isset($_POST['add_to_cart'])){

  //if user has laready added a product to cart 
  if(isset($_SESSION['cart'])){
  
  

    $products_array_ids=array_column($_SESSION['cart'],'product_id'); // <div 2,3,10,20=""></div>
    //if product has already been added to cart or not 
    if(!in_array($_POST['product_id'],$products_array_ids)){
      $product_id = $_POST['product_id'];
      $product_array=array(
                  'product_id' => $_POST['product_id'],
                  'product_name'=>  $_POST['product_name'],
                  'product_price'=> $_POST['product_price'],
                  'product_image'=> $_POST['product_image'],
                  'product_quantity'=>  $_POST['product_quantity'] 
                );
    $_SESSION['cart'][$product_id]=$product_array ;


      //PRODUCT HAS ALREADY BEEN ADDED TO CART 
    }

    else
    {
      echo '<script>alert("Product was already added to cart");</script> ' ; 
      //echo '<script>window .location="index.php";</script>' ;
    }

    //if this is the first product

  }
  else{

    $product_id = $_POST['product_id'];
    $product_name= $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity= $_POST['product_quantity'];
    $product_array=array(
                  'product_id' => $product_id,
                  'product_name'=> $product_name,
                  'product_price'=> $product_price,
                  'product_image'=> $product_image,
                  'product_quantity'=> $product_quantity 
                );
    $_SESSION['cart'][$product_id]=$product_array ; 
    //[ ]



  }
//remove product from the cart 
}
 
else if (isset($_POST['remove_product']))
 {
  $product_id = $_POST['product_id'];
  unset($_SESSION['cart'][$product_id]);

  }
else if (isset($_POST['edit_quantity']))
 {
    //we get id and quantity from the form 
    $product_id=$_POST['product_id'];
    $product_quantity= $_POST['product_quantity'];
    //get the product array from the session 
    $product_array =$_SESSION['cart'][$product_id];
    //update product quantity
    $product_array['product_quantity']=$product_quantity;
    //return array back to its place 
    $_SESSION['cart'][$product_id]=$product_array ;
  }

else{
  header('location : index.php');
}

?>



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


<!--Cart-->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bold">Your Cart</h2>
            <hr>
            
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>
                    Product
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Subtotal
                </th>
            </tr>

            <?php  foreach($_SESSION['cart'] as $key=>$value){ ?>
            <tr>

                <td>
                    <div class="product-info">
                        <img src="assets/imgs/<?php echo $value['product_image'];?>" />
                        <div>
                            <p><?php echo $value['product_name']; ?></p>
                            <small><span>$</span><?php echo $value['product_price'];?></small>
                            <br>
                            <form action="cart.php" method="POST">
                              <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>"/>
                              <input type="submit" name="remove_product" class="remove-btn" value="remove"/>
                            </form>
                        </div>
                    </div>
                </td>
                <td>
                    
                    <form method="POST" action="cart.php">
                      <input type="hidden" name="product_id" value ="<?php echo $value['product_id'];?>"/>
                      <input type="number" name="product_quantity" value="<?php echo $value['product_quantity'];?>" />
                      <input  type="submit" class="edit-btn" value="edit" name="edit_quantity"/>
                    </form>

                </td>
                <td>
                    <span>$</span>
                    <span class="product-price"><?php echo $value['product_price'];?></span>
                </td>
            </tr>

        <?php } ?>
            
      </table>

        <div class="cart-total">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$ 1M</td>

                </tr>
                <tr>
                    <td>
                    Total
                    </td>
                    <td>$ 1M</td>
                </tr>
            </table>
        </div>


        <div class="checkout-container">
            <button class="btn checkout-btn">Checkout</button>
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