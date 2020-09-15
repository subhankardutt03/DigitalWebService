<?php   
 session_start();  
$connect=mysqli_connect("localhost","root","","coreweb");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_photo'            =>     $_POST["item_photo"],
                     'item_name'               =>     $_POST["hidden_name"], 
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cart.php"</script>';  
           }  
      }  
else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],
                'item_photo'            =>     $_POST["item_photo"],
                'item_name'               =>     $_POST["hidden_name"],
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="Cart.php"</script>';  
                }  
           }  
      }  
 }  
?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>cart </title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <style>

          .cart-bg{
               background-image:url('../images/bg2.jpg');
               background-size:100% 100%;
               width:100%;
               height:100vh;
               overflow:hidden;
               margin-top:-20px;
          }
          #cart{
               animation:cart 7s infinite;
          }
          @keyframes cart{
               0%{
                    transform:translateX(0);
               }
               20%{
                    transform:translateX(300px);
               }
               40%{
                    transform:rotateY(0);
               }
               60%{
                    transform:rotateY(360deg);
               }
               
               80%{
                    transform:translateX(300px);
               }
               100%{
                    transform:rotateY(360deg);
               }


          }

           </style>  
      </head>  
      <body>  
      <?php
          include_once '../others/nav.php';
      ?>
      
              <div class="container-fluid cart-bg">
              <br><br>
               <h1 style="font-size:40px">Cart Details<span><img src="../images/cart2.png" width="100px" height="100px" id="cart"></span></h1>
               <br><br>
                <div class="table-responsive">  
                     <table class="table table-hover text-center" style="font-size:20px;"> 
                     <thead class="table-dark"> 
                          <tr> 
                              <th scope="col" >Course</th>
                               <th scope="col" >Course Name</th>
                                
                               <th scope="col" >Quantity</th>  
                               <th scope="col" >Course fee</th>  
                               <th scope="col" >Total</th>  
                               <th scope="col" >Action</th>  
                          </tr> 
                          </thead>

                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                              $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?> 
                          <tbody class="table-hover">
                          <tr>
                              <!--<td><img src="<?php echo $values["item_photo"];?>"
                              height="100px" width="100px" alt=".." class="img-responsive"><td>-->
                              <td><img src="<?php echo $values["item_photo"];?>" height="100px" width="180px" style="border-radius:10px;"></td>
                               <td><?php echo $values["item_name"]; ?></td>
                               
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="Cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger"><img src="../images/delete1.png" width="30px" height="30px"></span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                                
                          </tr>  
                          
                         <?php  
                          }  
                          ?> 
                          </tbody> 
</table>  
<tr><a href="checkout.php"><button class="btn btn-danger" style="font-size:20px;margin-left:1350px;">checkout</button></a></tr>
                </div>  
           </div>  
           <br/>
           </div> 
      </body>  
 </html>