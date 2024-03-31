<?php 
session_start();
include('connection.php');
if(isset($_POST['place_order']))
{
  //1.get user info and store it in database
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $address=$_POST['address'];
    $_order_cost=$_SESSION['total'];
    $_order_status="on_hold";
    $user_id=1 ;
    $order_date = date("Y-m-d H:i:s");

    $stmt=$conn->prepare("INSERT INTO orders (order_cost,order_status,user_id,user_phone , user_city,user_address,order_date)
    VALUES(?,?,?,?,?,?,?);");
    $stmt->bind_param('isiisss',$_order_cost,$_order_status,$user_id,$phone,$city,$address,$order_date);
    $stmt->execute() ;
    $order_id=$stmt->insert_id;
    
    



  //2.get products from cart(from session)

  //3.issue new order and store order info in database

  //4.store each single item in order_item database


  //5.remove everything from cart 


  //6 .inform user whether everythinh is finr of there is a problem


}
?>