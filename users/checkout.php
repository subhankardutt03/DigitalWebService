<?php

  
session_start();
include_once '../others/config.php';

$msg ="";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $user_id=$_SESSION['uid'];
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
        $address=$_REQUEST['address'];
        $city=$_REQUEST['city'];
        $state = $_REQUEST['state'];
        
         $item_quantity = $_REQUEST['item_quantity'];
         $item_id=$_REQUEST['item_id'];
         $item_price = $_REQUEST['item_price'];
         $item_photo = $_REQUEST['item_photo'];
         $item_name = $_REQUEST['item_name'];
        
        
      
        
            $sql="insert into myorder values (NULL,'".$user_id."','".$name."','".$email."','".$address."','".$city."','".$state."','".$item_quantity."','".$item_id."','".$item_price."','".$item_photo."','".$item_name."')";
        
        $query=mysqli_query($con,$sql);
        header("location:order_details.php");
        
          $msg="<div style='background:orange;width:200px;height:30px;border:1px solid black;'>Data Inserted.</div>";
        

        
}
        

?>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.compat.css" />

  <title>checkout</title>
  <link rel="stylesheet" type="text/css" href="../css/checkout.css">
  

  <script>

    var formData = function () {
            var name = document.forms['myForm']['name'];
            var email = document.forms['myForm']['email'];
            var address = document.forms['myForm']['address'];
            var city = document.forms['myForm']['city'];
            var state = document.forms['myForm']['state'];
            var item_quantity = document.forms['myForm']['item_quantity'];
            var item_id = document.forms['myForm']['item_id'];
            var item_price = document.forms['myForm']['item_price'];
            var item_name= document.forms['myForm']['item_name'];
    }

  </script>
</head>
<body>
<?php
  include_once '../others/nav.php';
?>
<div class="container-fluid">
<br>
  <div class="row">
  <div class="col-75">
    <div class="container">
      <form name="myForm" method="POST" action="" onsubmit="return formData()">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="name" placeholder="">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="">

            <!--<div class="row">-->
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="">
              </div>
              
            <!--</div>-->

            <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                           <div class="col-50">
                <label for="zip">Product Quantity</label>
                               <input type="text" name="item_quantity" value="<?php echo $values["item_quantity"]; ?>"></div>
                               <div class="col-50">
                <label for="zip">Product id</label>
                               <input type="text" name="item_id" value="<?php echo $values["item_id"]; ?>"></div>
                           <div class="col-50">
                <label for="zip">Product Price</label>
                               <input type="text" name="item_price" value="$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?>"> </div>

                               <div class="col-50">
               
                               <input type="hidden" name="item_photo" value=" <?php echo $values["item_photo"] ?>"></div>
                               <div class="col-50">
                <label for="zip">Product Name</label>
                               <input type="text" name="item_name" value="<?php echo $values["item_name"]; ?>"></div>
                            
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  <?php  
                          }  
                          ?>
                    </div> 


          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit"  value="Continue to checkout" class="btn btn-success">
      </form>
    </div>
  </div>


</div>
</div>


    </body>
    </html>
