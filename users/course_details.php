<?php
session_start();
 include_once "../others/config.php";
   if (strlen($_SESSION['uid']==0)) {
 header('location:./login.php');
  } 
  else{$id=$_REQUEST['id'];
  $query1="select * from product where Id='".$id."'";
  $rs=mysqli_query($con,$query1);
  $d=mysqli_fetch_array($rs);
			

		}
?>
<!DOCTYPE html>
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

	<title>Course Details</title>
	<link rel="stylesheet" type="text/css" href="../css/product.css">
	<style>

	#detail{
		animation:detail 5s infinite;
	}
	@keyframes detail{
		0%{
			transform:translateY(0);
		}
		25%{
			transform:translateY(50px);
		}
		50%{
			transform:translateY(0);
		}
		75%{
			transform:translateX(-50px);
		}
		100%{
			transform:translateX(0);
		}
	}
	</style>
</head>
<body>
<?php include_once "../others/nav.php" ?>
 
  

<br>
<div class="container">
<h1> Course Details </h1>
</div>
<br>
	<div class="container text-center">	
		<div class="main">
			<div class="row">
					 <div class="col-6">
					 <img class="img-thumbnail"src="<?php echo $d['target_file'];?>" width="600px" height="400px" id="detail">
					 </div>
			<div class="col-6">
			<div class="product-card">
		<!-- <div class="badge">Hot</div> -->
		<div class="product-thumb">
		
		
		<div class="product-details" style="background-color:#E3E4E6;border-radius:10px;">
		<br><br>
			<!--<span class="product-category"></span>-->
			<h4><?php echo $d['p_name'];?></h4>
			<p><?php echo $d['description'];?></p>
			<div class="product-bottom-details">
				<div class="product-price" style="margin-top:-10px;margin-bottom:5px;font-size:30px;color:red;"><small> $ <?php echo $d['p_price'];?></small></div>		
					<div class="product-links">


					<!--<a href="../users/product-details.php?id=<?php echo $d['id'];?>">Details</a>-->
					<a href="cart.php"><i class=""><button class="btn btn-primary">Add To cart</button></i></a>
					<br><br>
				</div>
				

			
			</div></div>

	</div>
		
	</div>
</div>
           
			
		
			</div>
        
        
        
	</div>



     


</body>
</html>