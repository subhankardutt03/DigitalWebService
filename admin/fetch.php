<?php

	session_start();
	include_once "../others/config.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/fontawesome.min.js" integrity="sha256-NP9NujdEzS5m4ZxvNqkcbxyHB0dTRy9hG13RwTVBGwo=" crossorigin="anonymous"></script>
    <title>view table </title>

    <style>


    *{
        margin:0px;
        padding:0px;
    }
    h1{
        color:#E86737;
        margin-top:10px;
    
    }
    #bg-img{
        background-image:url('../images/bg2.jpg');
        background-size:100% 100%;
        width:100%;
        height:100vh;
    }
    #login_img{
           animation: login 5s infinite;  
       }
       @keyframes login{
           0%{
               transform:rotateY(0);
           }
           25%{
               transform:rotateY(360deg);
           }
           50%{
               transform:scale(0.75);
           }
           75%{
               transform:scale(1);
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
<div class="container-fluid text-center" id="bg-img">  
<br>
<span> <img src="../images/login3.png" id="login_img" width="200px" height="170px" style="margin-top:-30px;"></span>
<h1 style="font-weight:bold;margin-top:-20px;">REGISTERED CANDIDATE</h1>


    <form action="search.php" method="post" class="text-right">
            <input type="text" name="search" placeholder="" style="width:350px;height:50px;margin-right:20px;">
                <button type="submit" style="border-radius:50%;width:50px;height:50px;margin-right:20px;"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>

<br>
<table cellspacing="25px"  class="table table-hover">
<thead class="table-dark">
    <tr>
        <th scope="col"><span>Id</span></th>
        <th scope="col"><span >fname</span></th>
        <th scope="col"><span >lname</span></th>
        <th scope="col"><span >username </span></th>
        <th scope="col"><span >password</span></th>
        <th scope="col"><span>ph number</span></th>
        <th scope="col"><span>Description</span></th>
        <th scope="col"><span>Address</span></th>
        
        <th scope="col"><span >Edit</span></th>
        <th scope="col"><span >Delete</span></th>
    </tr>
    </thead>
    <?php
    $query="select * from SST";
    
    $result=mysqli_query($con,$query);
    while($d=mysqli_fetch_array($result))
    {
        ?>
    <tbody>
    <tr>
        <td><?php echo $d['Id'];?></td>
        <td><?php echo $d['First_Name'];?></td>
        <td><?php echo $d['Last_Name'];?></td>
        <td><?php echo $d['username'];?></td>
        <td><?php echo $d['password'];?></td>
        <td><?php echo $d['mobile_number'];?></td>
        <td><?php echo $d['description'];?></td>
        <td><?php echo $d['address'];?></td>

        <td><a href="edit.php?Id=<?php echo $d['Id'];?>"><img src="../images/edit-sp2.png" width="40" height="40"></a></td>
    <td><a href="delete.php?Id=<?php echo $d['Id'];?>"><img src="../images/delete1.png" width="35" height="35"></a></td>
    </tr>
    <?php
    }
    
    ?>
    </tbody>
</table></div>



   
</body>
</html>