<?php

	session_start();
	include_once "../others/config.php";
?>

<!DOCTYPE html>
<html lang="en">
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

    <title>order details </title>

    <style>
    
        .order-bg{
            background-image:url('../images/bg2.jpg');
            width:100%;
            height:100vh;
            background-size:100% 100%;
        }
        #order{
            animation:order 5s infinite;
        }
        @keyframes order{
            0%{
                transform:translateX(0);
            }
            20%{
                transform:translateX(1000px);
            }
            40%{
                transform:rotateY(0);
            }
            60%{
                transform:rotateY(360deg);
            }
            80%{
                transform:translateX(200px);
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

<section class="order-bg">
<br><br>
<h1 style="margin-left:20px;"> Order Details<span><img src="../images/my-order3.png" width="130px" height="80px" id="order"></span> </h1>
<br>
    <div class="container-fluid">
    <table class="table table-hover table1">
                <thead class="table-header table-dark">
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Address </th>
                        <th scope="col" class="text-center">City </th>
                        <th scope="col" class="text-center">State </th>
                        <th scope="col" class="text-center">Item Quantity </th>
                        <th scope="col" class="text-center">Item Id </th>
                        <th scope="col" class="text-center">Item Price </th>
                        <th scope="col" class="text-center">Item Name </th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                   $user_id=$_SESSION['uid'];
    $query="select * from myorder where user_id='$user_id'";
    
    $result=mysqli_query($con,$query);
    while($d=mysqli_fetch_array($result))
    {
        ?>
    <tr>
        <td><?php echo $d['order_id'];?></td>
        <td><?php echo $d['name'];?></td>
        <td><?php echo $d['email'];?></td>
        <td><?php echo $d['address'];?></td>
        <td><?php echo $d['city'];?></td>
        <td><?php echo $d['state'];?></td>
        <td><?php echo $d['item_quantity'];?></td>
        <td><?php echo $d['item_id'];?></td>
        <td><?php echo $d['item_price'];?></td>
        <td><?php echo $d['item_name'];?></td>
        

        <!--<td><a href="edit.php?Id=<?php echo $d['Id'];?>"><img src="images/pencil1.png" width="60" height="60"></a></td>
    <td><a href="delete.php?Id=<?php echo $d['Id'];?>"><img src="images/delete1.png" width="60" height="50"></a></td>-->
    </tr>
    <?php
    }
    
    ?>
                </tbody>
            </table>

</div>
</section>
    
</body>
</html>