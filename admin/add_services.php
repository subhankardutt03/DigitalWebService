
 <?php
 session_start();
 include_once '../others/config.php';

 if($_SERVER["REQUEST_METHOD"]=='POST'){

    $p_name=$_REQUEST['product_name'];
    $description=$_REQUEST['description'];
    /*$image=$_REQUEST['image'];*/
    $p_price =$_REQUEST['p_price'];

    $img_name =$_FILES['image']['name'];
    $img_size=$_FILES['image']['size'];
    $img_temp_location=$_FILES['image']['tmp_name'];

    $directory ='../uploaded_img/';
    $target_file = $directory.$img_name;

    if($img_size>2097152){
        echo 'image size larger than 2mb';
    }
    else{
        move_uploaded_file($img_temp_location,$target_file);
        $query = "insert into product(p_name,description,target_file,p_price)value('$p_name','$description','$target_file','$p_price')"; 

        $sql=mysqli_query($con,$query);
        header("location:../others/dashboard.php");
        /*echo 'product added successfully';*/
    }
 }
 
 
 ?>
 
 
 
 
 <!DOCTYPE html>
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<title>add services</title>

<style>

    .add-bg{
        background-image:url('../images/loginpage3.jpg');
             /*background-size:100% 100%;*/
             width:100%;
             height:100vh;
             
    }
    label{
        color:#181052
    }
</style>
 </head>
 <body>

 <?php

    include_once '../others/nav.php';
?>
    

 <div class="container-fluid add-bg">
     <br><br>
    <div class="text-center">
    <h1 style="color:#990099; font-weight:bold;text-shadow:1px 1px  white;font-size:60px;">ADD COURSES<h1>
 </div>
 <br><br>
 <form name="myForm" enctype="multipart/form-data" action="" method="POST" class="main-form needs-validation"
                    style="width: 500px ; margin:auto" onsubmit="return formData()">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_name">Product name </label>
                                <input type="text" id="productname" name="product_name" class="form-control">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="description">Description </label>
                                <input type="text" id="description" name="description" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image">Image </label>
                        <input type="file" accept =".jpg,.jpeg,.png" name="image" id="image" class="form-control">
                    </div>

                    <div class="col-6">
                            <div class="form-group">
                                <label for="description">Course Price </label>
                                <input type="text" id="p_price" name="p_price" class="form-control">
                            </div>
                        </div>
                    
                    <br>
                    <div class="button_menu">
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                        <button type="reset" class="btn btn-danger"
                            style="margin-left:60px; width: 100px; height: 47px;">RESET</button>
                    </div>
                </form>
                </div>
     
 </body>
 </html>
 