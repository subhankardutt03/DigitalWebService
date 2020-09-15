
<link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
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
	


    <style>
    
      .navbar{
        background-color:#262626 ;
      }
      .nav-item:hover{
        background-color:#ff9911;
      }
      .navbar .nav-link{
        font-size:20px;
      }
    </style>
    </head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bglight ">
	<div class="container">
  <a class="navbar-brand" href="#"><h1 style="font-size:40px;" class="text-warning font-weight-bold">COREWEB</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse left-nav" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../others/dashboard.php"><span style="color:#fff;">Home </span><span class="sr-only">(current)</span></a>
        </li>
      
      <?php
  include_once "config.php";
  if (strlen($_SESSION['uid']==0)) {?>
  	<li class="nav-item">
        <a class="nav-link" href="signup.php">Sign Up</a>
      </li>
   <li class="nav-item">
        <a class="nav-link" href="login.php">Sign In</a>
      </li>
      <?php }else{  ?>
     
     <li class="nav-item">
            <a class="nav-link" href="../users/profile.php"><span style="color:#fff;">Your account </span></a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="/project.com/logout.php"><span style="color:#fff;">Log out</span></a>
          </li>
          <?php
      }
      ?>
    
      <?php
      // session_start();
     
      if ($_SESSION['user_type']!=="user") {?>
<li class="nav-item">
        <a class="nav-link" href="../admin/add_services.php"><span style="color:#fff;">Add courses</span></a>
      </li>
     
     <li class="nav-item">
        <a class="nav-link" href="../admin/fetch.php"><span style="color:#fff;">user details</span></a>
      </li>
       <!-- <li class="nav-item">
        <a class="nav-link" href="Product.php">Your Product</a>
      </li> -->
 <?php }else{  ?>
   
     	
  
       <li class="nav-item">
        <a class="nav-link" href="../users/Myorder.php"><span style="color:#fff;">My Order</span></a>
      </li>
      <?php
  }
  ?>
      

 <li class="nav-item">
        <a class="nav-link" href="../users/cart.php" tabindex="-1" ><span style="color:#fff;">My cart </span></a>
      </li>
    </ul>
  </div>
</div>
</nav>
</body>
</html>    