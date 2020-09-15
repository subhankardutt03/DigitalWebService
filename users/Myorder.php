<?php
	session_start();
	include_once "../others/config.php";
?>

<!DOCTYPE html>  
<html lang="en">  
<head>  
  <title>My courses</title>  
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  
  <style>

	  #myorder-bg{
		  background-image:url('../images/bg2.jpg');
		  background-size:100% 100%;
		  width:100%;
		  height:100vh;
		  
	  }
  </style>
</head>  
<body>  
<?php
	include_once '../others/nav.php';
?>
  
<div class="container-fluid" id="myorder-bg">  
<br>
			<h2 style="color:#990099;font-size:60px;text-shadow:1px 1px 0px white;text-align:center;">
			<span><img src="../images/bot2.png" width="130px" height="150px"></span>My courses
				
			</h2><br>
			<br>

		<!-- <table cellspacing="25px"  class="table table-hover">
        	<tr class="table-success">
        		<td><span><b>Course</b></span></td>
				<td><span><b>Course name</b></span></td>
				<td><span><b>Course fee</b></span></td>
            </tr> -->
            <?php
   			$user_id=$_SESSION['uid'];
			$sql="select * from myorder where user_id='$user_id'"; //from table name
			$rs=mysqli_query($con,$sql);
			while($d=mysqli_fetch_array($rs))
			{
			?>

			<ul class="list-unstyled">
  			<li class="media">
    			<img src="<?php echo $d['item_photo'];?>" class="mr-3" alt="image" width="400px" height="200px">
    			<div class="media-body">
      			<h5 class="mt-0 mb-1" style="color:#555000;"><b style="font-size:30px;color:#ffaa0a">Course name: </b><?php echo $d['item_name'];?></h5>
            <p style="font-size:25px;color:red;"><b style="color:#ffaa0a">Course fee:</b> <?php echo $d['item_price'];?></p>
				</div>
				<a href="start_course.html"><button class="btn btn-success" style="margin-top:150px;margin-right:160px;"> Start Course </button></a>
  			</li>
			</ul>

            <!-- <tr>
            	<td><img src="<?php echo $d['target_file'];?>"></td>
				<td><?php echo $d['item_name'];?></td>
				<td><?php echo $d['item_price'];?></td>
            </tr> -->
			<?php
			}
			?>
        <!-- </table></div>	 -->
	</div>

<!-- </div> -->
</body>
</html>